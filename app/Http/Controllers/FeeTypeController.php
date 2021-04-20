<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeeType;
use Spatie\Permission\Models\Role;
use Auth;
class FeeTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if ($role->hasPermissionTo('feetype-index')){
          $permissions = Role::findByName($role->name)->permissions;
          foreach ($permissions as $permission)
            $all_permission[] = $permission->name;
          if(empty($all_permission))
            $all_permission[] = 'dummy text';
        $feetypes = FeeType::get();
        return view("feetype.index",compact('feetypes','all_permission'));
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
        //
        return view("feetype.create");
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
            'feetypeName' => ['required','min:2'],
        ]);

        $data = $request->all();
        $data['name'] = $data['feetypeName'];

        $feetype = FeeType::create($data);

        if(!is_null($feetype))
            $request->session()->flash('message', 'Successfully added Company');
            return redirect()->route('Feetype.index');
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
      if ($role->hasPermissionTo('feetype-index')){
        $feetype = FeeType::find($id);

        return view("feetype.edit",compact('feetype'));
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
            'feetypeName' => ['required','min:2'],
        ]);

        $documentype = FeeType::find($id);
        $documentype->name =  $request->feetypeName;
        $documentype->save();
        $request->session()->flash('message', 'Successfully updated FeeType');
        return redirect()->route('Feetype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feetype = FeeType::find($id);
        if(!is_null($feetype)){
            $feetype->delete();
        }

        return redirect()->route('Feetype.index')->with('message', 'Successfully deleted');
    }
}
