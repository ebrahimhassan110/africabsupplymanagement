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
use App\Models\Shipment;

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

    public function addpayment(Request $request)
    {

        $id = $request->prebooking;
        $payment_type = $request->payment_type;
     
        if(is_null($id)){
            return redirect()->back();
        }
        if(  $payment_type  == 1){
            $prebooking = PreBooking::with("supplier")->where("id",$id)->first();
            $filter_column = "booking_no";
        }
        else {
            $prebooking = Shipment::with("supplier")->where("id",$id)->first();
            $filter_column = "shipment_id";
        }
        $query = array("amount as total_paid");
        $paymentdetails = Payment::where($filter_column,$prebooking->id)->selectRaw(implode(',', $query))->first();
        
        $payment_types = DB::table("payment_types")->where("status",1)->get();
        $bankers = DB::table("tbbanker")->get();

        return  view("payment.create",compact("prebooking","payment_types","bankers","payment_type","paymentdetails"));
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


    public function paymentDue()
    {
        $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
        if (!is_null($role->hasPermissionTo('payment-index')) && $role->hasPermissionTo('payment-index')){
          $permissions = Role::findByName($role->name)->permissions;
          foreach ($permissions as $permission)
              $all_permission[] = $permission->name;
          if(empty($all_permission))
              $all_permission[] = 'dummy text';


          $d=time();
        $date=date("Y-m-d", $d);
            $payments = PreBooking::join("supplier","supplier.id","prebooking.supplier_id")
                            ->where('advance_payment_date','LIKE','%'.$date.'%')
                            ->paginate(100);

            $suppliers = Supplier::get();
            return view("payment.payment_advance_due",compact('payments','suppliers','all_permission'));
        }
        else
            return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }



    public function paymentlistfilter(Request $request){

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
                                ->whereDate("payments.created_at",">=",$start_date)
                                ->whereDate("payments.created_at","<=",$end_date)->paginate(100);

            }else{
                $payments = Payment::join("prebooking","prebooking.id","payments.booking_no")
                ->join("supplier","supplier.id","prebooking.supplier_id")
                ->where("prebooking.supplier_id",$request->supplier)
                ->whereDate("payments.created_at",">=",$start_date)
                ->whereDate("payments.created_at","<=",$end_date)->paginate(100);

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
            
            $data = $request->all();
            $_payment_type = $request->_payment_type;
            $payment_type  = $request->payment_type;
           
            $date = Carbon::createFromFormat('d/m/Y',$request->payment_date);
            $payment_date = $date->format("Y-m-d");
            
          
            //return $_payment_type;
            if($_payment_type == 1 ){
                //booking payment
                $prebookingData =  PreBooking::find($request->booking_no);
                if( $payment_type == 1 ){
                    //return "here";
                    $tobepayed = $request->amount + $prebookingData->actual_advance_paid;

                    if( $tobepayed > $prebookingData->advance_paid  ){
                        $error["payment"] = "Amount to be paid exceeds advance payment value";
                        return redirect()->back()->with("error",$error)->withInput();
                    }
               
                    if($prebookingData->radio == 1){

                        $delivery_period_days = $prebookingData->delivery_period_days;
                    
                        $prebookingData->delivery_date =  date('Y-m-d',strtotime("+$delivery_period_days days",strtotime($payment_date)));

                    }

                    $prebookingData->advance_payment_date = $payment_date;
                    $prebookingData->actual_advance_paid = $tobepayed;
                    $prebookingData->save();
                }
            }
            else{
                //shipping payment                
                $prebookingData =  Shipment::find($request->booking_no);
                $availableForPayment = ( $prebookingData->goods_value + $prebookingData->other_expense_value ) - $prebookingData->actual_paid-$prebookingData->advance_paid_value;
                if( $request->amount > $availableForPayment ){
                    $error["payment"] = "Amount exceeds advance payment value";
                    return redirect()->back()->with("error",$error)->withInput();
                }

                $prebookingData->actual_paid_value = $prebookingData->actual_paid_value + $request->amount;
                  $prebookingData->save();

                  $bid=$prebookingData->booking_id;



                $data["booking_no"] = null;
                $data["shipment_id"]  = $request->booking_no;
            }
           
           
            $data["user_id"] =  Auth::id();
            $prebookingData =  Payment::create($data);
            
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


    public function paymentHistory($id,$type)
    {

        $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
        if (!is_null($role->hasPermissionTo('payment-add')) && $role->hasPermissionTo('payment-add')){
            return view("payment.payment_history",compact("id","type"));
        }
        else{
          return "Not Allowed";
        }
    }



    public function getData(Request $request)
    {
         $payment_type = $request->payment_type;
         $supplier_id = $request->supplier_id;
         if($payment_type == 1){

            $preebookings =  PreBooking::where("supplier_id",$supplier_id)->get();
            $select = "<select data-placeholder = 'Select Booking PFI no ' name = 'preebooking' class='select2 form-control' data-payment_type = '1' required>";
            $select .= "<option></option>";
            foreach($preebookings as $preebooking){
                $select .= "<option value='".$preebooking->id."'>".$preebooking->pfi_no."</option>";
            }
            $select .= "</select>";
            return $select;
         }else{
            $shipments =  Shipment::where("supplier_id",$supplier_id)->get();
            $select = "<select data-placeholder = 'Select Shipment cfi no' name = 'preebooking' class='select2 form-control' data-payment_type = '2' required>";
            $select .= "<option></option>";
            foreach($shipments as $shipment){
                $select .= "<option value='".$shipment->id."'>".$shipment->cfi_no."</option>";
            }
            $select .= "</select>";
            return $select;
         }
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
