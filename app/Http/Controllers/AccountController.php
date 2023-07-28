<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function create(){
        return view('account-create');
    }

    public function createSubmit(Request $request){
        $account = new Account();

        $account->user_id = Auth::user()->id;
        $account->name = $request->name;
        $account->currency = $request->currency;
        $account->count = $request->count;

        $account->save();

        return redirect()->route('cabinet');
    }

    public function view(){
        return view('accounts',['accounts' => Account::where('user_id', Auth::user()->id)->get()]);
    }
}
