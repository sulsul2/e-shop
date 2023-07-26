<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    function transactionHistory(Request $request)
    {
        $id = Auth::id();

        $transactions = Transaction::where('user_id', $id)->get();

        return view('history', ['transactions' => $transactions]);
    }

    function addTransaction(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'stok' => 'required',
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'jumlah_barang' => 'numeric|required|max:' . $request->stok,
            'nama_penerima' => 'required',
            'alamat_pengiriman' => 'required',
        ]);
        $transactions = Transaction::create([
            'user_id' => Auth::id(),
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
            'jumlah_barang' => $request->jumlah_barang,
            'total_harga' => $request->jumlah_barang * $request->harga_barang,
            'nama_penerima' => $request->nama_penerima,
            'alamat_pengiriman' => $request->alamat_pengiriman,
        ]);

        // update stok
        $client = new Client();
        $url = "http://localhost:5000/products/" . $request->id;

        $headers = [
            'Authorization' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjEsInVzZXJuYW1lIjoiQmFuYW5hIiwiaWF0IjoxNjg5NDI1MTA2fQ.dmOI8Py0-BsDDKIDB6YlX1vgZJqIeRY3xJNiIzIxKJU',
            'Content-Type' => 'application/json'
        ];

        $body = json_encode(
            [
                'stok' => $request->stok - $request->jumlah_barang
            ]
        );

        $response = $client->request('PATCH', $url, [
            'body' => $body,
            'headers' => $headers,
            'verify'  => false,
        ]);

        return redirect('/');
    }
}
