<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreditNote;
use Spatie\Permission\Models\Role;
use Auth;
use App\Models\PreBooking;

class CreditNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if (!is_null($role->hasPermissionTo('credit_note-index')) && $role->hasPermissionTo('credit_note-index')){
        $permissions = Role::findByName($role->name)->permissions;
        foreach ($permissions as $permission)
            $all_permission[] = $permission->name;
        if(empty($all_permission))
            $all_permission[] = 'dummy text';
        $credit_notes = CreditNote::all();
        return view("credit_note.index",compact('credit_notes','all_permission'));
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
      if (!is_null($role->hasPermissionTo('credit_note-create')) ){
        $permissions = Role::findByName($role->name)->permissions;
	  }
        foreach ($permissions as $permission)
            $all_permission[] = $permission->name;
        if(empty($all_permission))
            $all_permission[] = 'dummy text';
	   $prebookings =  PreBooking::whereNotNull('po_number')->get();
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if (!is_null($role->hasPermissionTo('credit_note-add')) && $role->hasPermissionTo('credit_note-add')){
		
        return view("credit_note.create" ,compact('prebookings','all_permission'));
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
            'amount' => ['required'],
        ]);

        $data = $request->all();
        $data['prebooking_id'] = $data['prebooking_id'];
		$data['type'] = $data['type'];
		$data['amount'] = $data['amount'];
		$data['created_by'] = 	Auth::user()->id;
		$data['currency'] = $data['currency'];

        $credit_note = CreditNote::create($data);

        if(!is_null($credit_note))
            $request->session()->flash('message', 'Successfully added Credit Note');
            return redirect()->route('credit_note.index');
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
      if (!is_null($role->hasPermissionTo('credit_note-edit')) && $role->hasPermissionTo('credit_note-edit')){
        $credit_note = CreditNote::find($id);
		 $prebookings =  PreBooking::whereNotNull('po_number')->get();
        return view("credit_note.edit",compact('credit_note'));
      } else
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
            'amount' => ['required','min:1'],
        ]);

        $documentype = CreditNote::find($id);
        $documentype->amount =  $request->amount;
        $documentype->save();
        $request->session()->flash('message', 'Successfully edited CreditNote');
        return redirect()->route('credit_note.index');
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
        if (!is_null($role->hasPermissionTo('credit_note-add')) && $role->hasPermissionTo('credit_note-add')){
          $credit_note = CreditNote::find($id);
          if(!is_null($credit_note)){
              $credit_note->delete();
          }


          return redirect()->route('credit_note.index')->with('message', 'Successfully deleted');
        }else
              return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
      }
}
