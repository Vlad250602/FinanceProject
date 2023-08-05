<?php

namespace App\Services;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Services\RateService;

class TransactionService
{
    protected $user;

    public function construct(){

        $this->user = Auth::user();

    }

    public function getUserTransactions()
    {
        $result = DB::table('transactions')
            ->select('transactions.*', 'accounts.name as account')
            ->leftJoin('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->where('transactions.user_id', '=', Auth::user()->id)->orderBy('id','desc')
            ->get();

        return $result;
    }

    public function createIncome($request){
        $accountService = new AccountService();
        $transaction = new Transaction();

        $transaction->user_id = Auth::user()->id;
        $transaction->account_id = $request->account;
        $transaction->type = 'income';
        $transaction->currency = $request->currency;
        $transaction->count = $request->count;
        $transaction->save();

        $accountService->addToAccount($request);

    }

    public function createExpence($request){
        $accountService = new AccountService();
        $transaction = new Transaction();

        $transaction->user_id = Auth::user()->id;
        $transaction->account_id = $request->account;
        $transaction->type = 'expense';
        $transaction->currency = $request->currency;
        $transaction->count = $request->count;
        $transaction->save();

        $accountService->removeFromAccount($request);
    }

    public function createBetweenAcc(){
        //Todo
    }

}
