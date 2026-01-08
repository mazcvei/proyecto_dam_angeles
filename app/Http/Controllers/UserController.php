<?php

namespace App\Http\Controllers;

use App\Http\Helpers\UsersHelper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Rol;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(20);
        //dd($users);
        return view('users.index',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'rol_id' => 'exists:roles,id',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'rol_id' => $request->rol_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()
            ->route('user.index')
            ->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $user = Auth::user();
        $roles = Rol::all();
        return view('users.show', compact ('user','roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id = null)
    {
        $roles = Rol::all();
        if ($id) {
            $user = User::find($id);
            if ($user){
                return view('users.create_edit', compact('user', 'roles'));
            } else {
                abort(404);
            }
        } else {
            return view('users.create_edit', compact ('roles'));
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = User::find($request->id);
        $request->validate([
            'rol_id' => 'required|exists:roles,id',
            'name' => 'required|max:250',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if(UsersHelper::checkAdmin()){
            $user->rol_id = $request->rol_id;
        }
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()
        ->route('user.index')
        ->with("success", "Usuario actualizado correctamente");
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()
                ->route('user.index')
                ->with("success", "Usuario eliminado correctamente");
        } else {
            abort(404);
        }

    }

    public function showFormRecoveryPwd()  {
            return view('auth.reset-password');
    }

    public function showFormForgetPwd(){
          return view('auth.forgot-password');
    }
}


