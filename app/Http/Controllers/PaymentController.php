<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DB;
use Auth;
use App\Models\PreBooking;
use App\Models\Supplier;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
        if (!is_null($role->hasPermissionTo('payment-index')) && $role->hasPermissionTo('payment-index')){
          $permissions = Role::findByName($role->name)->permissions;
          foreach ($permissions as $permission)
              $all_permission[] = $permission->name;
          if(empty($all_permission))
              $all_permission[] = 'dummy text';
          $prebookings = PreBooking::with("supplier")->paginate(100);
          $suppliers = Supplier::get();
     
          return view("payment.index",compact('prebookings','suppliers','all_permission'));
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
    }
    public function addpayment($id)
    {
        $prebooking = PreBooking::with("supplier")->where("id",$id)->first();   
        $payment_types = DB::table("payment_types")->get();
        $bankers = DB::table("tbbanker")->get();
        return  view("payment.create",compact("prebooking","payment_types","bankers"));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
