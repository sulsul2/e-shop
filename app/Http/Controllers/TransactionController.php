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

        return view('history',['transactions'=>$transactions]);
    }

    function addTransaction(Request $request){
        $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'jumlah_barang' => 'required',
            'nama_penerima'=>'required',
            'alamat_pengiriman'=>'required',
        ]);
        $transactions = Transaction::create([
            'user_id' => Auth::id(),
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'total_harga' => $request->jumlah_barang * $request->harga_barang,
            'nama_penerima'=>$request->nama_penerima,
            'alamat_pengiriman'=>$request->alamat_pengiriman,
        ]);

        return redirect('/');
    }
}
