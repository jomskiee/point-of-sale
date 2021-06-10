<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Auth;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('UserMan.index')->with('users', $users);
    }
        /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $roles = Role::all();
        return view('UserMan.create')->with([
            'user'=> $user,
            'roles' => $roles
        ]);
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {
        $this->validate($request,[
            'username' => ['required'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'username' => $request['username'],
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->roles()->sync($request->roles);
        $role = Role::select('id')->where('name', 'user')->first();

        $user->roles()->attach($role);
        
        $user->save();

        return redirect()->route('users.index');
    }
    public function show(User $user){
        $roles = Role::all();
        return view('UserMan.show')->with([
            'user'=> $user,
            'roles'=> $roles
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('UserMan.edit')->with([
            'user'=> $user,
            'roles'=> $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        $this->validate($request,[
            'username' => ['required'],
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        if($user->save()){
            $request->session()->flash('success', $user->name. ' has been updated');
        }else{
            $request->session()->flash('error', 'Error Update');
        }
        return redirect()->route('users.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $currentUser = Auth::user();
        
        if ($currentUser != $user) {
            $user->roles()->detach();
            $user->delete();

            return redirect()->route('users.index')->with('success', 'Successfully deleted the user!');
        }
        return back()->with('error', 'You cannot delete yourself!');
    }
}
