<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Worktype;
use App\Models\PreBooking;
use App\Models\PreBookingPart;
use App\Models\Supplier;
use App\Models\Company;
use App\Models\Currency;
use App\Models\Shipment;
use Spatie\Permission\Models\Role;
use Auth;
class PreBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if (!is_null($role->hasPermissionTo('prebooking-index')) && $role->hasPermissionTo('prebooking-index')){
        $permissions = Role::findByName($role->name)->permissions;
        foreach ($permissions as $permission)
            $all_permission[] = $permission->name;
        if(empty($all_permission))
            $all_permission[] = 'dummy text';
        $prebookings = PreBooking::whereNull('po_number')->with("supplier")->get();
		
        return view("prebooking.index",compact('prebookings','all_permission'));
      }
      else
          return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }
	
	
	
	  public function activate($id)
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if (!is_null($role->hasPermissionTo('prebooking-edit')) && $role->hasPermissionTo('prebooking-edit')){
        $permissions = Role::findByName($role->name)->permissions;
        foreach ($permissions as $permission)
            $all_permission[] = $permission->name;
        if(empty($all_permission))
            $all_permission[] = 'dummy text';
        $prebooking = PreBooking::find($id);
		
        return view("prebooking.activate",compact('prebooking','all_permission'));
      }
      else
          return redirect()->back()->with('not_permitted', 'Sorry! You are not allowed to access this module');
    }






	
	 public function activatepost(Request $request, $id)
    {
        $request->validate([
            'po_number' => ['required'],
        ]);

        $worktypes = PreBooking::find($id);
        $worktypes->po_number =  $request->po_number;
         $worktypes->radio =  $request->radio;
        $worktypes->activated_at =  date('Y-m-d H:i:s');
        $worktypes->activated_by =   Auth::user()->id;
         $worktypes->order_confirmation_date =   $request->order_confirmation_date;
          $worktypes->advance_payment_date =   $request->advance_payment_date;
           $worktypes->delivery_period_days =   $request->delivery_period_days;
            $worktypes->delivery_date =   $request->delivery_date;


        $worktypes->save();
        $request->session()->flash('message', 'Successfully Activated PreBooking');
        return redirect()->route('prebooking.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
    public function create()
    {
        //
		$suppliers = Supplier::get();
		$companies = Company::get();
         $currency = Currency::get();
        return view("prebooking.create",compact('suppliers','companies','currency'));

    }

    public function show($id)
    {
        //
		$prebooking = PreBooking::with("supplier")->where("id",$id)->first();                          
        
	 
        return view("prebooking.show",compact('prebooking'));

    }


    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $request->validate([
            'worktype' => ['required','min:2'],
        ]);
	*/


         $image = $request->file('attachment');
         $temp= [];
 
      if($image){
          $imageName = time()."".$image->getClientOriginalName();
            $image_names[] = $imageName;
            if($image->move('attachments\prebooking', $imageName)){
           $temp['attachment'] = implode(",", $image_names);
         
         }
      }else{

          $temp['attachment'] = NULL;
      }
     $request['attachment'] = $imageName;


        $data = $request->all();
        //radio value 1,or 2
      //  unset($data['radio']);
        unset($data['_token']);
         unset($data['submit']);
		 unset($data['cancel']);
          unset($data['attachment']);

           $data['attachment'] = $imageName;

		 
        $comapanyname=$data['company_name'];
        $cmp= Company::where('name',$comapanyname)->get();
        $cmpid=$cmp[0]->id;
        $data['company_id']=$cmpid;
        $data['company_name']=$comapanyname;

        $data["created_by"] = Auth::user()->id;
		
		$partName= $data["partName"];
		$partValue= $data["partValue"];
		$partDate= $data["partDate"];
		
		 unset($data['partName']);
		 unset($data['partValue']);
		 unset($data['partDate']);
		 
		
        $idinserted = DB::table('prebooking')->insertGetId(
                $data
        );
		if(count($partName)>0){
		    foreach ($partName as $id=>$part) {
				$data2=[];
				$data2['name']=$part;
				$data2['prebooking_id']=$idinserted;
				$data2['value']=$partValue[$id];
				$data2['date']=$partDate[$id];
				if($data2['name'] !='' && $data2['value']!=''){
			$idinsertedprebookingvalues = DB::table('prebooking_parts')->insertGetId(
                $data2);
				}
				
			}
		}
			

        if(!is_null($idinserted))
            $request->session()->flash('message', 'Successfully added PreBooking');
            return redirect()->route('prebooking.index');
    }


   

    /**
     * Display the specified resource.
     *
     * 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if (!is_null($role->hasPermissionTo('prebooking-edit')) && $role->hasPermissionTo('prebooking-edit')){

        $suppliers = Supplier::get();
        $companies = Company::get();
         $currency = Currency::get();
        $prebooking = PreBooking::find($id);
        $prebooking_parts = PreBookingPart::where('prebooking_id',$id)->get();
      
        return view("prebooking.edit",compact('prebooking','suppliers','companies','currency','prebooking_parts'));
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
      
        $data = $request->all();
        unset($data['radio']);
        unset($data['_token']);
        unset($data['submit']);
        unset($data['cancel']);
        unset($data['_method']);
        
        $comapanyname=$data['company_name'];
        $cmp= Company::where('name',$comapanyname)->get();
        $cmpid=$cmp[0]->id;
        $data['company_id']=$cmpid;
        $data['company_name']=$comapanyname;
        $data["created_by"] = Auth::user()->id;


        $partName= $data["partName"];
        $partValue= $data["partValue"];
        $partDate= $data["partDate"];
        $partId= $data["partId"];
        
         unset($data['partName']);
         unset($data['partValue']);
         unset($data['partDate']);
         unset($data['partId']);
        $prebooking_id=$id;

        $prebooking = PreBooking::find($id);

            foreach ($data as $key=>$val) {
            $prebooking[$key]=$val;
            }
            $prebooking->save();

            if(count($partName)>0){

            foreach ($partName as $id=>$part) {

              if(isset($partId[$id])){
                  $idpart=$partId[$id];
              }
              else{
                 $idpart='0';
              }
                $data2=[];
                $data2['name']=$part;
                $data2['value']=$partValue[$id];
                $data2['date']=$partDate[$id];
                if($data2['name'] !='' && $data2['value']!=''){
                  $count = PreBookingPart::where('id', $idpart)->count();
                  if($count){
                 $prebooking_part = PreBookingPart::find($idpart);
                 $prebooking_part->name= $data2['name'];
                 $prebooking_part->value= $data2['value'];
                 $prebooking_part->date= $data2['date'];
                 $prebooking_part->save();
                }
                else {
                $data2['prebooking_id']=$prebooking_id;
                $idinsertedprebookingvalues = DB::table('prebooking_parts')->insertGetId(
                $data2);
                }
            }

                
              }
              }    




        $request->session()->flash('message', 'Successfully updated PreBooking');
        return redirect()->route('prebooking.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipment = Shipment::where('booking_id',$id)->count();
        if($shipment){
            return redirect()->route('prebooking.index')->with('message', 'can not deleted booking while in use');
        }else{
            
		    $prebooking = PreBooking::find($id);        

            if(!is_null($prebooking))
            {
              $prebooking->delete();
            }

          
        }

        return redirect()->route('prebooking.index')->with('message', 'Successfully deleted');
    }

    public function removeBooking($id){

        $shipment = Shipment::where('booking_id',$id)->count();
        if($shipment){

            return redirect()->route('booking.index')->with('message', 'can not deleted booking while in use');
        }else{
            $prebooking = PreBooking::find($id);  
            $prebooking->po_number = NULL;
            $prebooking->save(); 
        }
        return redirect()->route('booking.index')->with('message', 'Successfully deleted');

    }
}
