<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DB;
use Auth;
use App\Models\PreBooking;
use App\Models\Supplier;
use App\Models\Payment;
use Carbon\Carbon;
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

    public function paymentlist()
    {
        $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
        if (!is_null($role->hasPermissionTo('payment-index')) && $role->hasPermissionTo('payment-index')){
          $permissions = Role::findByName($role->name)->permissions;
          foreach ($permissions as $permission)
              $all_permission[] = $permission->name;
          if(empty($all_permission))
              $all_permission[] = 'dummy text';

            $payments = Payment::join("prebooking","prebooking.id","payments.booking_no")
                            ->join("supplier","supplier.id","prebooking.supplier_id")
                            ->paginate(100);
            
            $suppliers = Supplier::get();
            return view("payment.list",compact('payments','suppliers','all_permission'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    public function paymentlistfilter(){
        
        $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
        if (!is_null($role->hasPermissionTo('payment-index')) && $role->hasPermissionTo('payment-index')){
          $permissions = Role::findByName($role->name)->permissions;
          foreach ($permissions as $permission)
              $all_permission[] = $permission->name;
          if(empty($all_permission))
              $all_permission[] = 'dummy text';

            $request->validate([
                'start_date' => ['required','date_format:d/m/Y'],
                'end_date' => ['required','date_format:d/m/Y']
            ]);

            $date = Carbon::createFromFormat('d/m/Y',$request->start_date);
            $start_date = $date->format("Y-m-d");
            $date = Carbon::createFromFormat('d/m/Y',$request->end_date);
            $end_date = $date->format("Y-m-d");
            
            if( $request->supplier == "0" ){
               
                $payments = Payment::join("prebooking","prebooking.id","payments.booking_no")
                                ->join("supplier","supplier.id","prebooking.supplier_id")
                                ->whereDate("created_at",">=",$start_date)
                                ->whereDate("created_at","<=",$end_date)->paginate(100);
                
            }else{
                $payments = Payment::join("prebooking","prebooking.id","payments.booking_no")
                ->join("supplier","supplier.id","prebooking.supplier_id")
                ->where("prebooking.supplier_id",$request->supplier)
                ->whereDate("created_at",">=",$start_date)
                ->whereDate("created_at","<=",$end_date)->paginate(100);
               
            }
            $suppliers = Supplier::get();
            return view("payment.list",compact('payments','suppliers','all_permission'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }

    public function filterBooking(Request $request){
         

        $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
        if (!is_null($role->hasPermissionTo('payment-index')) && $role->hasPermissionTo('payment-index')){
          $permissions = Role::findByName($role->name)->permissions;
          foreach ($permissions as $permission)
              $all_permission[] = $permission->name;
          if(empty($all_permission))
              $all_permission[] = 'dummy text';

            $request->validate([
                'start_date' => ['required','date_format:d/m/Y'],
                'end_date' => ['required','date_format:d/m/Y']
            ]);

            $date = Carbon::createFromFormat('d/m/Y',$request->start_date);
            $start_date = $date->format("Y-m-d");
            $date = Carbon::createFromFormat('d/m/Y',$request->end_date);
            $end_date = $date->format("Y-m-d");
            
            if( $request->supplier == "0" ){
               
                $prebookings = PreBooking::with("supplier")
                ->whereDate("created_at",">=",$start_date)
                ->whereDate("created_at","<=",$end_date)->paginate(100);
                
            }else{
                $prebookings = PreBooking::with("supplier")->where("supplier_id",$request->supplier)
                ->whereDate("created_at",">=",$start_date)
                ->whereDate("created_at","<=",$end_date)->paginate(100);
               
            }
            $suppliers = Supplier::get();
            return view("payment.index",compact('prebookings','suppliers','all_permission'));
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
        $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
        if (!is_null($role->hasPermissionTo('payment-index')) && $role->hasPermissionTo('payment-index')){
            $permissions = Role::findByName($role->name)->permissions;
            foreach ($permissions as $permission)
                $all_permission[] = $permission->name;
            if(empty($all_permission))
                $all_permission[] = 'dummy text';

            $booking =  PreBooking::find($request->booking_no);
            
            $payment_type  = $request->payment_type;
            //payment type 1 : advance payment 
            //payment type 2 : release payment 
            //payment type 3 : outstanding payment 
            if( $payment_type == 1 ){
                $tobepayed = $request->amount + $booking->actual_advance_paid;
                 
                if( $tobepayed > $booking->advance_paid ||  $tobepayed > ($booking->actual_advance_paid + $request->amount) ){
                    $error["payment"] = "Amount exceeds advance payment value";
                    return redirect()->back()->with("error",$error)->withInput();
                } 
                $booking->actual_advance_paid = $tobepayed;
                $booking->save();
            }else if( $payment_type == 2 ){

            }else if( $payment_type == 3 ){
                $tobepayed_book_value =  ($booking->pfi_value - $booking->advance_paid)  - $booking->actual_paid;
                $error = [];
                if($tobepayed_book_value < 1){
                    $error["payment"] = "Payment completed";
                    return redirect()->back()->with("error",$error)->withInput();
                } 
    
                $actual_paid = $booking->actual_paid + $request->amount;
                if($tobepayed_book_value > $actual_paid){
                    $error["payment"] = "Payment exceed proforma invoice value";
                    return redirect()->back()->with("error",$error)->withInput();
                } 
    
                $booking->actual_paid = $actual_paid;
                $booking->bank_value = $request->bank_value;
                $booking->cash_value = $request->cash_value;
                $booking->save();
                
                
            }

            $data = $request->all();
            $data["user_id"] =  Auth::id();
            $booking =  Payment::create($data);
            return redirect()->route("payment.index")->with("message","Payment added successfully");
            
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
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
