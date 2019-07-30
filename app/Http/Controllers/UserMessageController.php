<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserMessageRepository;
use Illuminate\Support\Facades\Input;

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
        $this->middleware('ajax', ['only' => ['getLastUserMessage', 'getSingleUserMessage', 'updateUserMessage']]);
        $this->userMessageRepository = $userMessageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
