<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClearingAgent;
use Spatie\Permission\Models\Role;
use Auth;
class ClearingAgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if (!is_null($role->hasPermissionTo('clearingagent-index')) && $role->hasPermissionTo('clearingagent-index')){
        $permissions = Role::findByName($role->name)->permissions;
        foreach ($permissions as $permission)
            $all_permission[] = $permission->name;
        if(empty($all_permission))
            $all_permission[] = 'dummy text';
        $clearingagents = ClearingAgent::get();
        return view("clearingagent.index",compact('clearingagents','all_permission'));
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
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if (!is_null($role->hasPermissionTo('clearingagent-add')) && $role->hasPermissionTo('clearingagent-add')){

        return view("clearingagent.create");
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
            'documentype' => ['required','min:2'],
        ]);

        $data = $request->all();
        $data['name'] = $data['documentype'];

        $clearingagent = ClearingAgent::create($data);

        if(!is_null($clearingagent))
            $request->session()->flash('message', 'Successfully added clearingagent');
            return redirect()->route('clearingagent.index');
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
      if (!is_null($role->hasPermissionTo('clearingagent-edit')) && $role->hasPermissionTo('clearingagent-edit')){
        $clearingagent = ClearingAgent::find($id);

        return view("clearingagent.edit",compact('clearingagent'));
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
            'clearingagent' => ['required','min:2'],
        ]);

        $documentype = ClearingAgent::find($id);
        $documentype->name =  $request->clearingagent;
        $documentype->save();
        $request->session()->flash('message', 'Successfully edited clearingagent');
        return redirect()->route('clearingagent.index');
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
        if (!is_null($role->hasPermissionTo('clearingagent-add')) && $role->hasPermissionTo('clearingagent-add')){
          $clearingagent = ClearingAgent::find($id);
          if(!is_null($clearingagent)){
              $clearingagent->delete();
          }


          return redirect()->route('clearingagent.index')->with('message', 'Successfully deleted');
        }else
              return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
      }
}
