<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class UsersController extends Controller
{

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function index()
    {
        if (request('search')) {
            $users = User::where('first_name', 'like', '%' . request('search') . '%')
                ->orWhere('last_name', 'like', '%' . request('search') . '%')
                ->paginate(2);
        } else {
            $users = User::latest()->paginate(5);
        }

        return view('dashboard.users.index', compact('users'));
    }


    public function create()
    {
        return view('dashboard.users.create');
    }


    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'image' => 'image',
            'password' => 'required',
        ]);

        $request_data = $request->except('password', 'image');

        if ($request->image) {
            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/users/' . $request->image->hashName());
        }
        $request_data['password'] = bcrypt($request->password);
        $request_data['image'] = $request->image->hashName();
        $user = User::create($request_data);

        session()->flash('success', trans('site.added_successfly'));
        return redirect()->route('users.index');

    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {

        $user = User::FindOrFail($id);

        $requestArray = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,

        ];
        if (request()->has('password') && request()->get('password')) {
            $requestArray = $requestArray + ['password' => Hash::make($request->password)];
        }

        if ($request->image) {
            if ($user->image != 'default.png') {

                Storage::disk('public_uploads')->delete('/users/' . $user->image);
            }

            Image::make($request->image)->resize(300, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save('uploads/users/' . $request->image->hashName());
            $requestArray['image'] = $request->image->hashName();
        }



        $user->update($requestArray);
        return redirect()->route('users.index');
    }


    public function destroy(User $user, $id)
    {
        $user = User::find($id);
        if ($user->image != "default.png") {
            Storage::disk('public_uploads')->delete('/users/' . $user->image);
        }
        $user->delete();
        return redirect()->route('users.index');
    }
}
