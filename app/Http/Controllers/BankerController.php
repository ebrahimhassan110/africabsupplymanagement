<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banker;
use App\Models\PreBooking;
use Spatie\Permission\Models\Role;
use Auth;
class BankerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if (!is_null($role->hasPermissionTo('banker-index')) && $role->hasPermissionTo('banker-index')){
        $permissions = Role::findByName($role->name)->permissions;
        foreach ($permissions as $permission)
            $all_permission[] = $permission->name;
        if(empty($all_permission))
            $all_permission[] = 'dummy text';
        $bankers = Banker::all();
        return view("banker.index",compact('bankers','all_permission'));
		}
      else
		
          return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }
	
	 public function getPFI($id)
    {
		
	$bookings=PreBooking::where('id',$id)->get();	
		return $bookings;

	}	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if (!is_null($role->hasPermissionTo('banker-add')) && $role->hasPermissionTo('banker-add')){

        return view("banker.create");
      }
      else
          return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'description' => ['required'],
        ]);

        $data = $request->all();
        $data['description'] = $data['description'];
		$data['city'] = $data['city'];
		$data['country'] = $data['country'];
		$data['mobile_no'] = $data['mobile_no'];
		$data['email'] = $data['email'];

        $banker = Banker::create($data);

        if(!is_null($banker))
            $request->session()->flash('message', 'Successfully added banker');
            return redirect()->route('banker.index');
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
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if (!is_null($role->hasPermissionTo('banker-edit')) && $role->hasPermissionTo('banker-edit')){
        $banker = Banker::find($id);

        return view("banker.edit",compact('banker'));
      }else
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
            'banker' => ['required','min:2'],
        ]);

        $documentype = Banker::find($id);
        $documentype->name =  $request->banker;
        $documentype->save();
        $request->session()->flash('message', 'Successfully edited Banker');
        return redirect()->route('banker.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
        if (!is_null($role->hasPermissionTo('banker-add')) && $role->hasPermissionTo('banker-add')){
          $banker = Banker::find($id);
          if(!is_null($banker)){
              $banker->delete();
          }


          return redirect()->route('banker.index')->with('message', 'Successfully deleted');
        }else
              return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
      }
}
