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
            ->rawColumns(['read_message', 'reply', 'delete'])
            ->addColumn('read_message', function($user_message){
                return '<a href="{!! route(\'user-message.show\', [\'user_message\' => '.$user_message->id.'])) !!}" class="btn btn-link btn-block read-button" data-user-message="'.$user_message->id.'">Read</a>';
            })
            ->addColumn('reply', function($user_message){
                return '<a href="{!! route(\'user-message.reply\', [\'user_message\' => '.$user_message->id.'])) !!}" class="btn btn-link btn-block reply-button" data-user-message="'.$user_message->id.'">Reply</a>';
            })
            ->addColumn('delete', function($user_message){
                return Form::open(['method' => 'DELETE', 'route' => ['user-message.destroy', $user_message->id], 'class' => 'delete-form']).
                Form::button('<i class="fas fa-trash-alt fa-lg"></i>', [
                    'type' => 'submit',
                    'class'=> 'btn btn-danger btn-block',
                    'onclick'=>'return confirm("Are you sure?")'
                ]).
                Form::close();
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
        //
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
