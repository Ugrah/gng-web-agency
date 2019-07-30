<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserMessageRepository;

class DashboardController extends Controller
{

    protected $userMessageRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserMessageRepository $userMessageRepository)
    {
        $this->middleware('admin');
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
}
