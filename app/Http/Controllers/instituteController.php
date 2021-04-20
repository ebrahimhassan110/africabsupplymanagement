<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
use App\Models\Institute;
use Auth;
use Spatie\Permission\Models\Role;

class instituteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if ($role->hasPermissionTo('institute-index')){
          $permissions = Role::findByName($role->name)->permissions;
          foreach ($permissions as $permission)
            $all_permission[] = $permission->name;
          if(empty($all_permission))
            $all_permission[] = 'dummy text';
        $institutes = Institute::get();
        return view("institute.index",compact('institutes','all_permission'));
      }
      else
          return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		return view("institute.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
		$data_save = array();
		$data_save["instituteName"] = $data['instituteName'];
        $data_save["created_by"] = Auth::user()->id;
        $data_save["isDel"] = '0';
        $add_institute = Institute::create(
            $data_save
        );

        return redirect()->back()->with("message","Institute Details Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if ($role->hasPermissionTo('institute-index')){
        $institute = Institute::find($id);

        return view("institute.edit",compact('institute'));
      }
      else
          return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'instituteName' => ['required','min:2'],
        ]);

        $institute = Institute::find($id);
        $institute->instituteName =  $request->instituteName;
        $institute->save();
        $request->session()->flash('message', 'Institute successfully added');
        return redirect()->route('institute.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $institute = Institute::find($id);
        if(!is_null($institute)){
            $institute->delete();
        }

        return redirect()->route('institute.index')->with('message', 'Institute successfully deleted');
    }
}
