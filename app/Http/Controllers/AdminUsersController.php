<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsersRequest;
use App\User;
use App\Role;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $users = User::all();
      return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $roles = [];
      $obj = Role::select('name','id')->get();
      foreach ($obj as $role) {
        $roles[$role->id] = $role->name;
      }
      return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
      $user = User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password),
          'role_id' => $request->role_id
      ]);
      if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        // $path = $request->photo->store('images');
        $path = Storage::put('public/images', $request->file('photo'));
        $user->photo()->create(['path'=>$path]);
      }
      return redirect('admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id);

      $roles = [];
      $obj = Role::select('name','id')->get();
      foreach ($obj as $role) {
        $roles[$role->id] = $role->name;
      }

      return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersRequest $request, $id)
    {
      $user = User::findOrFail($id);
      //empty password check
      if (empty(trim($request->password))) {
        $input = $request->except('password');
      } else {
        //password validation
        if (Hash::check($request->old_password, $user->password)) {
          $request['password'] = bcrypt($request->password);
          $input = $request->all();
        } else {
          return redirect(route('users.edit', $user))
              ->with('password', 'Wrong password!');
        }
      }
      //user update
      $user->update($input);
      //image update/create
      if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
        $path = Storage::put('public/images', $request->file('photo'));
        if(!$user->photo) {
          $user->photo()->create(['path'=>$path]);
        } else {
          $user->photo()->update(['path'=>$path]);
        }
      }
      return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = User::find($id);
      if ($user->photo) {
        Storage::delete($user->photo->path);
      }
      if ($user->delete()) {
        return redirect('admin/users')->with('success', 'User Deleted!');
      }
      return redirect('admin/users')->with('error', 'Something went wrong!');
    }
}
