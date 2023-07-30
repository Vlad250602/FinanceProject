<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use App\Services\RateService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function view()
    {
        $transactions = DB::table('transactions')
            ->select('transactions.*', 'accounts.name as account')
            ->leftJoin('accounts', 'accounts.id', '=', 'transactions.account_id')
            ->where('transactions.user_id', '=', Auth::user()->id)
            ->get();

        return view('transactions.transactions', ['transactions' => $transactions]);
    }

    public function createIncome()
    {
        $accounts = Account::where('user_id', Auth::user()->id)->get();

        return view('transactions.transaction-income', ['accounts' => $accounts]);
    }

    public function createIncomeSubmit(Request $request, RateService $rateService)
    {
        $account = Account::where('id', $request->account)->first();
        $transaction = new Transaction();

        $transaction->user_id = Auth::user()->id;
        $transaction->account_id = $request->account;
        $transaction->type = 'income';
        $transaction->currency = $request->currency;
        $transaction->count = $request->count;
        $transaction->save();
        $account->count += $rateService->convert($request->currency, $account->currency, $request->count);
        $account->save();
        return redirect()->route('transactions');
    }
}
