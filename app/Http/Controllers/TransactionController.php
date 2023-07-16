<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    function transactionHistory(Request $request){
        $id = Auth::id();
        
        $transactions = Transaction::where('user_id',$id)->get();

        dd($transactions);

        return view('history',[$transactions]);
    }
}
