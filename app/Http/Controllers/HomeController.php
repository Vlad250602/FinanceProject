<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Services\RateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function profile(RateService $rateService)
    {

        $total = $rateService->getTotal();
        return view('profile.profile', ['accounts' => Account::where('user_id', Auth::user()->id)->get(), 'total' => $total]);
    }

    public function index()
    {
        return view('home');
    }
}
