<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Workplan;
use App\Models\Supplier;
use App\Models\Company;
use App\Models\SupplierContact;
use App\Models\WorkType;
use App\Models\User;
use App\Models\Institute;

use App\Models\InstituteCustomer;
use Auth;
use Spatie\Permission\Models\Role;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      $role = Role::firstOrCreate(['id' => Auth::user()->role_id]);
      if ($role->hasPermissionTo('supplier-index')){

        $permissions = Role::findByName($role->name)->permissions;
        foreach ($permissions as $permission)
          $all_permission[] = $permission->name;
        if(empty($all_permission))
          $all_permission[] = 'dummy text';

        $workplans = '';
        $suppliers =  Supplier::where('isDel','0')->get();
        $Workstypes =  WorkType::all();
        $partners =  User::all();
        return view('supplier.index',compact('workplans','suppliers','Workstypes','partners','all_permission'));
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
      if ($role->hasPermissionTo('supplier-add')){
          $suppliers =  Supplier::where('isDel','0')->get();
         // $Workstypes =  WorkType::all();
         // $partners =  User::where('empTypeId','4')->get();
         // $staffs =  User::where('empTypeId','7')->get();
         // $users =  User::all();
          $company =  Company::all();

        return view('supplier.create',compact('suppliers','company'));
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
 
    $image = $request->file('attachment');

      $temp= [];
 
      if($image){
          $imageName = time()."".$image->getClientOriginalName();
        
          $image_names[] = $imageName;
            if($image->move('attachments\supplier', $imageName)){
           $temp['attachment'] = implode(",", $image_names);

         }
      }else{
          $temp['attachment'] = NULL;
      }
     $request['attachment'] = $temp['attachment'];




        $data = $request->all();
         unset($data['file']);
          unset($data['attachment']);
         $data['attachment'] = $temp['attachment'];
        unset($data['_token']);
         unset($data['submit']);
		$position=$data['position'];
		$name=$data['name'];
		$number=$data['number'];
		$email=$data['email'];
		unset($data['name']);
		unset($data['position']);
		unset($data['number']);
		unset($data['email']);
        $data["isDel"] = '0';
        $cmpname=$data["company_name"];
		$cmp=  Company::where('name',$cmpname)->get();
        $data['company_id']=$cmp[0]->id;
       
        $idinserted = DB::table('supplier')->insertGetId(
                $data
        );
		
		if(count($position)>0){
		    foreach ($position as $id=>$part) {
				$data2=[];
				$data2['position']=$part;
				$data2['supplier_id']=$idinserted;
				$data2['name']=$name[$id];
				$data2['number']=$number[$id];
				$data2['email']=$email[$id];
				if($data2['name'] !='' && $data2['number']!=''){
			$idinsertedprebookingvalues = DB::table('supplier_contact')->insertGetId(
                $data2);
				}
				
			}
		}
			
    


        return redirect()->back()->with("message","Supplier Details Added Successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     //   $customer =  Customer::where('customerId',$id)->where('isDel','0')->first();
      //  return view("customer.show",compact('customer'));
    }
	
	
	  public function view($id)
    {
        $supplier =  Supplier::where('id',$id)->first();
		$supplier_contact =  SupplierContact::where('supplier_id',$id)->get();
		//return $supplier;
        return view("supplier.show",compact('supplier','supplier_contact'));
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
      if ($role->hasPermissionTo('customer-edit')){
        $customer = Customer::where('customerId',$id)->get();
        $partners =  User::where('empTypeId','4')->get();
         $staffs =  User::where('empTypeId','7')->get();
          $institutes =  InstituteCustomer::where('customer_id',$id)->get();
        return view('customer.edit', ['customer' => $customer,'partners' => $partners  ,'staffs' => $staffs,'institutes' => $institutes ]);
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
        //var_dump('bazinga');
        //die();

        $data = $request->all();
        unset($data['_token']);
         unset($data['_method']);

         unset($data['submit']);
         $institute=$data['institute'];
          unset($data['institute']);

         $type=$data['type'];

         $typestring = implode(',',$type);
          unset($data['type']);
         $data['type']=$typestring;

        $data["created_by"] = Auth::user()->id;
        $data["isDel"] = '0';
         $data["name"] = 'Fakhri ttt';

        //return $request;
        $customer = Customer::find($id);
       
        
        foreach ($data as $key => $value) {
            $customer->$key=$value;
        //echo "$key => $value\n";
        }
    
         $customer->save();


        $inst = InstituteCustomer::where('customer_id', $id)->get();
  
        foreach ($inst as $i) {

           
            $id=$i->institute_id;
            //id is istitute id
        //echo "$key => $value\n";
            $value=$institute[$id];
           $data=[];

            $data['institute_name']=$value['name'];
              $data['institute_no']=$value['no'];
              $data['institute_control_no']=$value['control_no'];
              $data['institute_password']=$value['institute_password'];
               $data['institute_online_password']=$value['password'];
                  $customer_institute = InstituteCustomer::find($id);

                    foreach ($data as $key => $value) {
                     $customer_institute->$key=$value;
                                }
                $customer_institute->save();
            }

        $request->session()->flash('message', 'Successfully edited Customer');
        return redirect()->route('customer.index');
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

         $customer = Customer::where('customerId',$id);
        if($customer){
            $customer->delete();
        }
        return redirect()->route('customer.index');
    }
}
