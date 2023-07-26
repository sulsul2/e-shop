<?php

namespace App\Http\Controllers;

use App\Http\APIURL;
use App\Models\Product;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function all(Request $request)
    {
        $client = new Client();
        $url = "http://localhost:5000/products";

        $headers = [
            'Authorization' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjEsInVzZXJuYW1lIjoiQmFuYW5hIiwiaWF0IjoxNjg5NDI1MTA2fQ.dmOI8Py0-BsDDKIDB6YlX1vgZJqIeRY3xJNiIzIxKJU'
        ];

        $response = $client->request('GET', $url, [
            'headers' => $headers,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        if ($request->search) {
            $key = $request->search;
            $responseBody = collect($responseBody)->filter(function ($item) use ($key) {
                return false !== stripos($item->name, $key);
            });
        }

        return view('katalog-barang', ['data' => $responseBody]);
    }

    function detail($id)
    {
        $client = new Client();
        $url = "http://localhost:5000/products";

        $headers = [
            'Authorization' => 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VySWQiOjEsInVzZXJuYW1lIjoiQmFuYW5hIiwiaWF0IjoxNjg5NDI1MTA2fQ.dmOI8Py0-BsDDKIDB6YlX1vgZJqIeRY3xJNiIzIxKJU'
        ];

        $response = $client->request('GET', $url, [
            'headers' => $headers,
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        $responseBody = collect($responseBody)->filter(function ($item) use ($id) {
            return false !== stripos($item->id, $id);
        });

        return view('detail-barang', ['product' => $responseBody->first()]);
    }
}
