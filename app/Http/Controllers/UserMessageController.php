<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserMessageRepository;
use Illuminate\Support\Facades\Input;
use DataTables;
use App\UserMessage;
use Form;

class UserMessageController extends Controller
{
    protected $userMessageRepository;
    protected $lastMessageLimit = 4;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserMessageRepository $userMessageRepository)
    {
        $this->middleware('admin');
        $this->middleware('ajax', ['only' => ['getLastUserMessage', 'getSingleUserMessage', 'updateUserMessage', 'getUserMessagesData']]);
        $this->userMessageRepository = $userMessageRepository;
    }
    
    /**
     * Get a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserMessagesData()
    {
        return DataTables::of(UserMessage::query())
            ->rawColumns(['read_message', 'reply', 'actions'])
            ->addColumn('read_message', function($user_message){
                $button = '<a href="'. route('user-message.show', ['user_message' => $user_message->id]).'" class="btn btn-link btn-block read-button" data-user-message="'.$user_message->id.'">';
                ($user_message->read) ? $button .= '<i class="far fa-envelope-open fa-2x text-center text-success d-block"></a>' : $button .= '<i class="far fa-envelope fa-2x text-center text-success d-block"></a>' ;
                return $button;
            })
            ->addColumn('reply', function($user_message){
                return '<a href="'. route('user-message.reply', ['user_message' => $user_message->id]).'" class="btn btn-link btn-block reply-button" data-user-message="'.$user_message->id.'">Reply</a>';
            })
            ->addColumn('actions', function($user_message){
                $button = '';
                if ($user_message->read){
                    $button = '<a title="marquer comme non lu" href="'. route('user-message.status', ['user_message' => $user_message->id]).'" class="btn btn-link status-button rounded px-0 reply-button" role="button" data-user-message="'.$user_message->id.'"><i class="fas fa-envelope fa-lg"></i></a>';
                }
                else {
                    $button = '<a title="marquer comme lu" href="'. route('user-message.status', ['user_message' => $user_message->id]).'" class="btn btn-link status-button rounded px-0 reply-button" role="button" data-user-message="'.$user_message->id.'"><i class="fas fa-envelope-open-text fa-lg"></i></a>' ;
                } 
                $form = Form::open(['method' => 'DELETE', 'route' => ['user-message.destroy', $user_message->id], 'class' => 'delete-form']).
                Form::button('<i class="fas fa-trash-alt fa-lg"></i>', [
                    'type' => 'submit',
                    'class'=> 'btn btn-danger rounded',
                    'onclick'=>'return confirm("Are you sure?")',
                    'title' => 'Supprimer'
                ]).
                Form::close();
                return '<div class="d-flex justify-content-around">'.$button.$form.'</div>';
            })->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.user_messages.index');        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $message = $this->userMessageRepository->getById($id);
        return view('dashboard.user_messages.show', compact('message'));
    }

    /**
     * Reply to user message the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reply($id)
    {
        return view('dashboard.user_messages.reply');                
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update user message status.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        return response()->json();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getLastUserMessage()
    {
        return response()->json([
            'numberNewMessage' => $this->userMessageRepository->getNewMessageCount(),
            'lastMessages' => $this->userMessageRepository->getLastMessage($this->lastMessageLimit)
        ]);
    }

    public function getSingleUserMessage()
    {
        $message = $this->userMessageRepository->getById(Input::get('user_message'));
        return response()->json($message);
    }

    public function updateUserMessage()
    {
        $this->userMessageRepository->getById(Input::get('user_message'))->update(['read' => true]);
        return response()->json();
    }
}
