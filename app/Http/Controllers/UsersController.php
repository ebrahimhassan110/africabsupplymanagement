<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
class UsersController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if( Auth::user()->role_id != 1 )
        return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
      $you = auth()->user();
      $users = User::where('isDel',0)->get();
      return view('dashboard.admin.usersList', compact('users', 'you'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('dashboard.admin.userShow', compact( 'user' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.admin.userEditForm', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user){
            $user->isDel = 1;
            $user->save();
        }
        return redirect()->route('users.index');
    }


    protected function update(Request $request,$id)
    {
         $user = User::find($id);
        if(!is_null($user)){
            $user->password = Hash::make('password');
            $user->save();
            $request->session()->flash('message', 'Successfully resset password :  password  ');
        }
        $request->session()->flash('error', 'error userpassword could not be changed ');
        return redirect()->route('users.index');
    }
}
