<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Models\Worktype;
use App\Models\PreBooking;
use App\Models\Supplier;
use App\Models\Company;
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
        $prebookings = PreBooking::whereNull('po_number')->get();
		
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
        return view("prebooking.create",compact('suppliers','companies'));

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
        $data = $request->all();

        unset($data['_token']);
         unset($data['submit']);
		 unset($data['cancel']);
		 
     
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
      if (!is_null($role->hasPermissionTo('worktype-edit')) && $role->hasPermissionTo('worktype-edit')){
        $worktypes = Worktype::find($id);

        return view("prebooking.edit",compact('worktypes'));
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
            'worktype' => ['required','min:2'],
        ]);

        $worktypes = Worktype::find($id);
        $worktypes->worktypeName =  $request->worktype;
        $worktypes->save();
        $request->session()->flash('message', 'Successfully added Worktype');
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
        $worktypes = Worktype::find($id);
        $worktypes->delete();

        return redirect()->route('prebooking.index')->with('message', 'Successfully deleted');
    }
}
