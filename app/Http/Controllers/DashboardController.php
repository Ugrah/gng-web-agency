<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserMessageRepository;
use Illuminate\Support\Facades\Input;

class DashboardController extends Controller
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
        $this->middleware('ajax', ['only' => ['getLastUserMessage', 'getSingleUserMessage']]);
        $this->userMessageRepository = $userMessageRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.home');
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
}
