<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(15);
        return view('admin.users.index', compact('users'));
    }


    public function create(){
        return view('admin.users.create');
    }


    public function store(StoreUserRequest $request){

        User::create($request->validated());
        return redirect()
                ->route('users')
                ->with('success', 'User created successfully');
    }


    public function edit(string $id){

        if (!$user = User::find($id)){
            return redirect()->route('users');
        }

        return view('admin.users.edit', compact('user'));
    }


    public function update(UpdateUserRequest $request, string $id){

        if (!$user = User::find($id)){
            return redirect()->route('users');
        }

        $data = $request->only('name', 'email');
        
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()
                ->route('users')
                ->with('success', 'User Edit successfully');
    }

    public function show(string $id){

        if (!$user = User::find($id)){
            return redirect()->route('users')->with('message', 'User not found');
        }
        return view('admin.users.show', compact('user'));
    }

    public function destroy(string $id){

        if (!$user = User::find($id)){
            return redirect()->route('users');
        }

        // usuario nao pode eliminar ele mesmo
        if(Auth::user()->id === $user->id){
            return back()->with('message', 'You can not delete yourself');
        }
        
        $user->delete();
        return redirect()
            ->route('users')
            ->with('success', 'User deleted successfully');
    }
}
