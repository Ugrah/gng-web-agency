<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserMessageRepository;

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
        $this->middleware('ajax', ['only' => ['getLastUserMessage']]);
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
}
