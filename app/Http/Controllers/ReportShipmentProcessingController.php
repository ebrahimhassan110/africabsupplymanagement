<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\PreBooking;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Shipment;
use DB;


class ReportShipmentProcessingController extends Controller
{
  



    public function processView($id){
            
      $shipments= Shipment::where('id',$id);
      $suppliers =  Supplier::all();
      $shipment_id=$id;  
      return view('report.shipmentprocessing.custom_declaraton_form',compact('shipments','shipment_id'));   
    }


     public function processShipment($id, Request $request,$status){

      
                
        $image = $request->file('attachment');
         $temp= [];
 
      if($image){
          $imageName = time()."".$image->getClientOriginalName();
          
             $temp['attachment'] = $imageName;

            if($image->move('attachments\shipments', $imageName)){
          
         
         }
      }else{

          $temp['attachment'] = NULL;
      }
  
      $data = $request->all();
         $data['attachment'] = $temp['attachment'];
       //  print_r($data['attachment']);
        // die;
       
        unset($data['_token']);
        unset($data['submit']);
        unset($data['cancel']);
       $data["created_by"] = Auth::user()->id;
        $shipment = Shipment::find($id);
        $shipment->status=$status+1;
        $shipment->save();


         $idinserted = DB::table('shipment_processing')->insertGetId(
                $data
        );

         if(!is_null($idinserted))
            $request->session()->flash('message', 'Successfully processed Shipment');
            return redirect()->route('prebooking.index');




    }
    





    public function index(){
      $today = date('Y-m-d');
      $_start_date = date('d/m/Y',strtotime($today));
      $_end_date = date('d/m/Y',strtotime($today));
/*
      $attendance_report_data = User::leftjoin('tbattendance',function($join) use($today){
                                  $join->on("users.id","tbattendance.employeeId")->whereDate('tbattendance.created_at',$today);
                                })
                              ->leftJoin('status','status.id','tbattendance.status')
                              ->select('users.id as id','users.name as name','users.tel as tel','tbattendance.regtime','tbattendance.outtime','tbattendance.status')
                              ->get();
                              */
							  
							  
$shipments= DB::select("select   a.*,b.pfi_no,b.po_number,s.supplier_name,
		CASE 
        WHEN DATEDIFF('$today' ,a.created_at) > 3  THEN 'OVER'
		WHEN DATEDIFF('$today' ,a.created_at) <= 3  THEN 'LESS' 
		ELSE NULL END as time
       from shipment a,supplier s,prebooking  b where a.booking_id=b.id and a.supplier_id=s.id and DATEDIFF('$today' ,a.created_at) >= 3");
	   
	  
      // return $attendance_report_data;
      $suppliers =  Supplier::all();
      $status=2;
      return view('report.shipmentprocessing.custom_declaration',compact('shipments','suppliers','_start_date','_end_date','status'));
    
    }



      public function org_bl_received(){
      $today = date('Y-m-d');
      $_start_date = date('d/m/Y',strtotime($today));
      $_end_date = date('d/m/Y',strtotime($today));

                
      $shipments= DB::select("select   a.*,b.pfi_no,b.po_number,s.supplier_name,
        CASE 
            WHEN DATEDIFF('$today' ,a.created_at) > 10  THEN 'OVER'
        WHEN DATEDIFF('$today' ,a.created_at) <= 10  THEN 'LESS' 
        ELSE NULL END as time
          from shipment a,supplier s,prebooking  b where where a.status = 3 and a.booking_id=b.id and a.supplier_id=s.id and DATEDIFF('$today' ,a.created_at) >= 3");
        
    
      // return $attendance_report_data;
      $suppliers =  Supplier::all();
      $status=3;
      return view('report.shipmentprocessing.custom_declaration',compact('shipments','suppliers','_start_date','_end_date','status'));
    
    }


      public function info_to_stores(){
      $today = date('Y-m-d');
      $_start_date = date('d/m/Y',strtotime($today));
      $_end_date = date('d/m/Y',strtotime($today));

                
    $shipments= DB::select("select   a.*,b.pfi_no,b.po_number,s.supplier_name,
    CASE 
        WHEN DATEDIFF('$today' ,a.created_at) > 10  THEN 'OVER'
    WHEN DATEDIFF('$today' ,a.created_at) <= 10  THEN 'LESS' 
    ELSE NULL END as time
       from shipment a,supplier s,prebooking  b where a.booking_id=b.id and a.supplier_id=s.id and DATEDIFF('$today' ,a.created_at) >= 3");
     
    
      // return $attendance_report_data;
      $suppliers =  Supplier::all();
      $status=4;
      return view('report.shipmentprocessing.custom_declaration',compact('shipments','suppliers','_start_date','_end_date','status'));
    
    }

      public function alert_for_duty(){
      $today = date('Y-m-d');
      $_start_date = date('d/m/Y',strtotime($today));
      $_end_date = date('d/m/Y',strtotime($today));

                
    $shipments= DB::select("select   a.*,b.pfi_no,b.po_number,s.supplier_name,
    CASE 
        WHEN DATEDIFF('$today' ,a.created_at) > 10  THEN 'OVER'
    WHEN DATEDIFF('$today' ,a.created_at) <= 10  THEN 'LESS' 
    ELSE NULL END as time
       from shipment a,supplier s,prebooking  b where a.booking_id=b.id and a.supplier_id=s.id and DATEDIFF('$today' ,a.created_at) >= 3");
     
    
      // return $attendance_report_data;
      $suppliers =  Supplier::all();
      $status=5;
      return view('report.shipmentprocessing.custom_declaration',compact('shipments','suppliers','_start_date','_end_date','status'));
    
    }

      public function alert_for_payment(){
      $today = date('Y-m-d');
      $_start_date = date('d/m/Y',strtotime($today));
      $_end_date = date('d/m/Y',strtotime($today));

                
    $shipments= DB::select("select   a.*,b.pfi_no,b.po_number,s.supplier_name,
    CASE 
        WHEN DATEDIFF('$today' ,a.created_at) > 10  THEN 'OVER'
    WHEN DATEDIFF('$today' ,a.created_at) <= 10  THEN 'LESS' 
    ELSE NULL END as time
       from shipment a,supplier s,prebooking  b where a.booking_id=b.id and a.supplier_id=s.id and DATEDIFF('$today' ,a.created_at) >= 3");
     
    
      // return $attendance_report_data;
      $suppliers =  Supplier::all();
      $status=6;
      return view('report.shipmentprocessing.custom_declaration',compact('shipments','suppliers','_start_date','_end_date','status'));
    
    }

      public function clearing_bill(){
      $today = date('Y-m-d');
      $_start_date = date('d/m/Y',strtotime($today));
      $_end_date = date('d/m/Y',strtotime($today));

                
    $shipments= DB::select("select   a.*,b.pfi_no,b.po_number,s.supplier_name,
    CASE 
        WHEN DATEDIFF('$today' ,a.created_at) > 10  THEN 'OVER'
    WHEN DATEDIFF('$today' ,a.created_at) <= 10  THEN 'LESS' 
    ELSE NULL END as time
       from shipment a,supplier s,prebooking  b where a.booking_id=b.id and a.supplier_id=s.id and DATEDIFF('$today' ,a.created_at) >= 3");
     
    
      // return $attendance_report_data;
      $suppliers =  Supplier::all();
      $status=7;
      return view('report.shipmentprocessing.custom_declaration',compact('shipments','suppliers','_start_date','_end_date','status'));
    
    }

      public function alert_for_costing(){
      $today = date('Y-m-d');
      $_start_date = date('d/m/Y',strtotime($today));
      $_end_date = date('d/m/Y',strtotime($today));

                
    $shipments= DB::select("select   a.*,b.pfi_no,b.po_number,s.supplier_name,
    CASE 
        WHEN DATEDIFF('$today' ,a.created_at) > 10  THEN 'OVER'
    WHEN DATEDIFF('$today' ,a.created_at) <= 10  THEN 'LESS' 
    ELSE NULL END as time
       from shipment a,supplier s,prebooking  b where a.booking_id=b.id and a.supplier_id=s.id and DATEDIFF('$today' ,a.created_at) >= 3");
     
    
      // return $attendance_report_data;
      $suppliers =  Supplier::all();
      $status=8;
      return view('report.shipmentprocessing.custom_declaration',compact('shipments','suppliers','_start_date','_end_date','status'));
    
    }









    public function show(Request $request){
      $request->validate([
          'start_date' => ['required','date_format:d/m/Y'],
          'end_date' => ['required','date_format:d/m/Y']
      ]);

      $start_date= Carbon::createFromFormat('d/m/Y',$request->start_date);
      $start_date = $start_date->format("Y-m-d");
      $end_date= Carbon::createFromFormat('d/m/Y',$request->end_date);
      $end_date = $end_date->format("Y-m-d");


    $prebookings=PreBooking::whereNotNull('po_number');
      if(!is_null($request->supplier) AND $request->supplier != '0'){

        $prebookings->where('supplier_id',$request->supplier);
      }
        $prebookings->whereDate('created_at','>=',$start_date)->whereDate('created_at','<=',$end_date)->get();               

      // return $attendance_report_data;
        $_start_date=$start_date;
        $_end_date=$end_date;
        $_supplier=$request->supplier;
      $suppliers =  Supplier::all();
       return view('report.supplierindividual.index',compact('prebookings','suppliers','_start_date','_end_date','_supplier'));
      
    }
}
