<?php

namespace App\Http\Controllers\Dashboard;
use App\Client;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $clients = Client::when($request->search , function($q) use ($request){

            return $q->where('name' , 'like' , '%' . $request->search . '%')
                ->orWhere('phone' , 'like' , '%' . $request->search . '%')
                ->orWhere('address' , 'like' , '%' . $request->search . '%');

        })->latest()->paginate(5);

        return view('dashboard.clients.index' ,compact('clients'));
    }


    public function create()
    {
        return view('dashboard.clients.create');
    }

    public function store(Request $request)
    {
         $request->validate([

             'name' => 'required' ,
             'phone' => 'required|min:1' ,
             'address' => 'required' ,

         ]);



         Client::create( $request->all());
         return redirect()->route('clients.index');
    }

    public function edit($id)
    {
        $client = Client::find($id);
        return view('dashboard.clients.edit' , compact('client'));
    }

    public function update(Request $request, $id)
    {
       $client = Client::FindOrFail($id) ;

        $request->validate([

            'name' => 'required' ,
            'phone' => 'required|min:1' ,
            'address' => 'required' ,

        ]);

        $client->update($request->all());
        return redirect()->route('clients.index');



    }


    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('clients.index');
    }
}
