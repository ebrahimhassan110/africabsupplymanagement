<?php

namespace App\Http\Controllers;

use App\Models\RecordRegister;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\DocumentType;
use Auth;
use DB;
class RecordRegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $recordregister = RecordRegister::join('recregister_status','recregister_status.id','tboutsource.status')->with("employee")->with("customer")->with("documentype")->get();
         $customers =  Customer::all();
         $employees =  User::all();

         return view("recordregister.index",compact("recordregister","customers","employees"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $customers = Customer::all();
      $employees = User::all();
      $documenttypes = DocumentType::all();
      $status =  DB::table('recregister_status')->get();
      return view("recordregister.create",compact("customers","employees","documenttypes","status"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'file' => 'mimes:pdf,xlx,csv|max:2048',
      ]);
      $image = $request->file;
      $total = $request->total;
      $data= [];
      if($image){
          $imageName = time()."".$image->getClientOriginalName();
          $image->move('public/attachments/recordregister', $imageName);
          $image_names[] = $imageName;
          $data['attachment'] = implode(",", $image_names);
      }else{
          $data['attachment'] = NULL;
      }
     $request['attachment'] = $data['attachment'];
     $request['created_by'] = Auth::id();
     $request = $request->all();
     $recordregister = RecordRegister::create($request);
     //$request->session()->flash('message', 'Successfully added feetypeName');
     return redirect()->route('Recordregister.index')->with('message', 'Successfully added feetypeName');
     // return route("Recoredregister.index")->with("message","record added successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RecordRegister  $recordRegister
     * @return \Illuminate\Http\Response
     */
    public function show(RecordRegister $recordRegister)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RecordRegister  $recordRegister
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $recordRegister = RecordRegister::find($id);
      $customers = Customer::all();
      $employees = User::all();
      $documenttypes = DocumentType::all();
      $status =  DB::table('recregister_status')->get();
      return view("recordregister.edit",compact("customers","employees","documenttypes","recordRegister","status"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RecordRegister  $recordRegister
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $request->validate([
          'attachment' => 'mimes:pdf,xlx,csv|max:1024',
      ]);

      $image = $request->attachment;

      $data= [];
      if($image){
          $imageName = time()."".$image->getClientOriginalName();
          $image->move('public/attachments/recordregister', $imageName);
          $image_names[] = $imageName;
          $data['attachment'] = implode(",", $image_names);
      }else{
          $data['attachment'] = NULL;
      }

      $recordregister =  RecordRegister::find($id);
      $recordregister->customerId = $request->customerId;
      $recordregister->office = $request->office;
      $recordregister->doctypeId = $request->doctypeId;
      $recordregister->employeeId = $request->employeeId;
      $recordregister->status = $request->status;
      $recordregister->remark = $request->remark;
      $recordregister->updated_by =  Auth::id();
      if(!is_null($data['attachment'])){
          $recordregister->attachment = $data['attachment'];
      }
      $recordregister->save();;
      return redirect()->route('Recordregister.index')->with('message', 'Successfully updated');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RecordRegister  $recordRegister
     * @return \Illuminate\Http\Response
     */
    public function destroy(RecordRegister $recordRegister)
    {
        //
    }
}
