<?php

namespace App\Http\Controllers\Dashboard\Client;

use App\Category;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {

    }

    public function create($id)
    {
        $client = Client::find($id);
        $categories = Category::with('products')->get();
       return view('dashboard.clients.orders.create' , compact('client' , 'categories'));
    }

    public function store(Request $request , Client $client)
    {

    }

    public function edit(Client $client , $id)
    {

    }
}
