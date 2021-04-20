<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Auth;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dob' => ['required','date_format:d/m/Y'],
            'datejoin' => ['required','date_format:d/m/Y']

        ]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the users list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if( Auth::user()->role_id != 1 )
          return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');

        $you = auth()->user();
        $users = User::all();
        return view('dashboard.admin.usersList', compact('users', 'you'));
    }

    /**
     *  Remove user
     *
     *  @param int $id
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function remove( $id )
    {
        $user = User::find($id);
        if($user){
            $user->delete();
        }
        return redirect()->route('adminUsers');
    }

    /**
     *  Show the form for editing the user.
     *
     *  @param int $id
     *  @return \Illuminate\Contracts\Support\Renderable
     */
    public function editForm( $id )
    {
        $user = User::find($id);
        return view('dashboard.admin.userEditForm', compact('user'));
    }

    public function edit(){

    }

    public function register()
    {
        if( Auth::user()->role_id != 1 )
          return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
        return view("dashboard.auth-temp.register");


    }

    public function store(Request $data)
    {

        $request = $data;
        $data->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'dob' => ['required','date_format:d/m/Y'],
            'datejoin' => ['required','date_format:d/m/Y']

        ]);

        $data = $data->all();

        $date= Carbon::createFromFormat('d/m/Y',$data['dob']);
        $data['dob'] =  $date->format("Y-m-d");
        $date= Carbon::createFromFormat('d/m/Y',$data['datejoin']);
        $data['datejoin'] =  $date->format("Y-m-d");
         //return   $data;
        $user =  User::create([
            'name' => $data['name'],
            'age' => $data['age'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'tel' => $data['tel'],
            'nida' => $data['nida'],
            'tinno' => $data['tinno'],
            'joinyear' => $data['joinyear'],
            'datejoin' => $data['datejoin'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id'=> $data['role']
        ]);

        $role = $data['role'];
        $user->assignRole($role);
        $request->session()->flash('message', 'Successfully added user');
        return redirect()->route('users.index');

         //return view("dashboard.auth-temp.register");
    }


    public function update(Request $data){
        $request = $data;
        $data->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'dob' => ['required','date_format:d/m/Y'],
            'datejoin' => ['required','date_format:d/m/Y']

        ]);

        $data = $data->all();

        $date= Carbon::createFromFormat('d/m/Y',$data['dob']);
        $data['dob'] =  $date->format("Y-m-d");
        $date= Carbon::createFromFormat('d/m/Y',$data['datejoin']);
        $data['datejoin'] =  $date->format("Y-m-d");

        $employee = User::find( $request->id );

        $employee->name = $request->name;
        $employee->age = $request->age;
        $employee->dob = $data['dob'];
        $employee->address = $request->address;
        $employee->tel = $request->tel;
        $employee->tinno = $request->tinno;
        $employee->joinyear = $request->tjoinyearel;
        $employee->datejoin = $data['datejoin'];
        $employee->email = $request->email;
        $employee->menuroles = "admin";
        $employee->save();

        //$role = $data['role'];
        $employee->assignRole('admin');
        $request->session()->flash('message', 'Successfully Updated');
        return redirect()->route('users.index');

    }



}
