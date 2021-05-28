<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Currency;
use Spatie\Permission\Models\Role;
use Auth;
class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if (!is_null($role->hasPermissionTo('currency-index')) && $role->hasPermissionTo('currency-index')){
        $permissions = Role::findByName($role->name)->permissions;
        foreach ($permissions as $permission)
            $all_permission[] = $permission->name;
        if(empty($all_permission))
            $all_permission[] = 'dummy text';
        $currencys = Currency::get();
        return view("currency.index",compact('currencys','all_permission'));
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
      if (!is_null($role->hasPermissionTo('currency-add')) && $role->hasPermissionTo('currency-add')){

        return view("currency.create");
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

        $currency = Currency::create($data);

        if(!is_null($currency))
            $request->session()->flash('message', 'Successfully added currency');
            return redirect()->route('currency.index');
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
      if (!is_null($role->hasPermissionTo('currency-edit')) && $role->hasPermissionTo('currency-edit')){
        $currency = Currency::find($id);

        return view("currency.edit",compact('currency'));
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
            'currency' => ['required','min:2'],
        ]);

        $documentype = Currency::find($id);
        $documentype->name =  $request->currency;
        $documentype->save();
        $request->session()->flash('message', 'Successfully edited Currency');
        return redirect()->route('currency.index');
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
        if (!is_null($role->hasPermissionTo('currency-add')) && $role->hasPermissionTo('currency-add')){
          $currency = Currency::find($id);
          if(!is_null($currency)){
              $currency->delete();
          }


          return redirect()->route('currency.index')->with('message', 'Successfully deleted');
        }else
              return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
      }
}
