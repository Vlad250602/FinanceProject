<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function view(){
        return view('accounts.accounts',['accounts' => Account::where('user_id', Auth::user()->id)->get()]);
    }
    public function create(){
        return view('accounts.account-create');
    }

    public function createSubmit(Request $request){
        $account = new Account();

        $account->user_id = Auth::user()->id;
        $account->name = $request->name;
        $account->currency = $request->currency;
        $account->count = $request->count;

        $account->save();

        return redirect()->route('profile');
    }

    public function edit($id)
    {
        $account = Account::where('id', $id)->first();

        return view('accounts.account-edit', ['account' => $account]);
    }

    public function editSubmit(Request $request, $id)
    {
        $account = Account::where('id', $id)->first();

        $account->name = $request->name;

        $account->save();

        return redirect()->route('accounts');
    }
}
