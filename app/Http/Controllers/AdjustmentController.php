<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\FeeType;
use App\Models\PreBooking;
use App\Models\PreBookingPart;
use App\Models\Shipment;
use App\Models\Adjustment;
use App\Models\Supplier;
//suse App\Models\ShipmentDetails;
use Auth;
use DB;
use Spatie\Permission\Models\Role;
class AdjustmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if ($role->hasPermissionTo('adjustment-index')){
        $permissions = Role::findByName($role->name)->permissions;
        foreach ($permissions as $permission)
            $all_permission[] = $permission->name;
        if(empty($all_permission))
            $all_permission[] = 'dummy text';

        $adjustments = Adjustment::get();

        return view("adjustment.index",compact("adjustments","all_permission"));
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
        $suppliers =  Supplier::all();
       // $feetypes =  FeeType::all();
        return view("adjustment.create",compact('suppliers'));
    }
	


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $image = $request->file('attachment');
         $temp= [];
 
      if($image){
          $imageName = time()."".$image->getClientOriginalName();
          
             $temp['attachment'] = $imageName;

            if($image->move('attachments\adjustment', $imageName)){
          
         
         }
      }else{

          $temp['attachment'] = NULL;
      }
  
      $data = $request->all();
         $data['attachment'] = $temp['attachment'];
       //  print_r($data['attachment']);
        // die;
        unset($data['supplier_id']);
		unset($data['to_supplier_id']);
        unset($data['_token']);
        unset($data['submit']);
        unset($data['cancel']);
       $data["created_by"] = Auth::user()->id;




      $idinserted = DB::table('adjustments')->insertGetId(
                $data
        );


        if(!is_null($idinserted))
            $request->session()->flash('message', 'Successfully added Shipment');
            return redirect()->route('adjustment.index');


	
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
	 public function getPFI($id)
    {
		
	$bookings=PreBooking::whereNotNull('po_number')->where('supplier_id',$id)->get();	
		return $bookings;

	}	

     public function getBL()
    {
    
  $shipment=Shipment::select('bl_no')->whereNotNull('bl_no')->get(); 
    return $shipment;

  } 


  public function getBooking($id)
    {
    
  $bookings=PreBooking::whereNotNull('po_number')->where('id',$id)->get(); 
    return $bookings;

  } 

	public function getBookingPart($id)
    {
		
	$parts=PreBookingPart::where('prebooking_id',$id)->get();	
		return $parts;

	}		
	 
	 
	 
	 
	 
    public function show($id)
    {

    $shipment = Shipment::with("supplier")->where("id",$id)->first();                          
    return view("shipment.show",compact('shipment'));
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
      if ($role->hasPermissionTo('shipment-edit')){
        $shipment = DB::table('tbshipment')
                                  //->join('tbcustomer','tbcustomer.customerId','tbshipment.customerId')
                                  ->where('tbshipment.id',$id)
                                  ->first();
        $id = $shipment->id;
        $shipment_details = DB::table('tbshipmentdetails')
                                  //->Leftjoin('tbfeetype','tbfeetype.feetypeId','tbshipmentdetails.feetypeId')
                                  ->rightjoin('tbfeetype',function($join) use($id){
                                      $join->on('tbfeetype.feetypeId','=','tbshipmentdetails.feetypeId')->where('tbshipmentdetails.shipmentId',$id);
                                  })
                                  ->select("tbshipmentdetails.*","tbfeetype.feetypeId as _feetypeId","tbfeetype.feetypeName")
                                  ->get();
        $customers  =  Customer::all();
        $feetypes = FeeType::all();
        return view("shipment.edit",compact('shipment_details','shipment','customers','feetypes'));
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
          'file' => 'mimes:pdf,xlx,csv|max:2048',
      ]);

      $image = $request->file;
      $total = $request->total;
      $data = [];

      if($image){
          $imageName = time()."".$image->getClientOriginalName();
          $image->move('public/attachments/shipments', $imageName);
          $image_names[] = $imageName;
          $data['attachment'] = implode(",", $image_names);
      }else{
          $data['attachment'] = NULL;
      }
      $shipment =  shipment::find($id);
      $shipment->customerId = $request['customer'];
      $shipment->updated_by =  Auth::id();
      $total_amount = 0;
      for( $i = 0 ; $i < $total; $i++ ){
           if( !is_null($request['feetype_'.$i])  AND  !is_null($request['amount_'.$i])){
             $total_amount +=   floatval($request['amount_'.$i]);
           }
      }

      $shipment->amount = $total_amount;
      $shipment->save();
      $data_details['shipmentId'] =  $id;
      $shipmentdetails = shipmentDetails::where('shipmentId', $id);
      $shipmentdetails->delete();

      for( $i = 0 ; $i < $total; $i++ ) {
           if( !is_null($request['feetype_'.$i])  AND  !is_null($request['amount_'.$i])){
              $data_details['feetypeId'] = $request['feetype_'.$i];
              $data_details['amount'] = $request['amount_'.$i];
              $data_details['comment'] = $request['remark_'.$i];
              $data_details['created_by'] = Auth::id();
              shipmentDetails::create($data_details);
           }
      }

      if(!is_null($shipment))
      $request->session()->flash('message', 'Successfully updated feetypeName');
      return redirect()->route('shipment.index');
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
