@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            @if(count($errors))
                  <div class="form-group">
                      <div class="alert alert-danger">
                          <ul>
                              @foreach($errors->all() as $error)
                                  <li>{{$error}}</li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
              @endif
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Activate PreBooking ID: - '.$prebooking->id}} </span>
                       <span style="align:right;" >    <a class="btn btn-success btn-sm mb-1 view" href="#" data-prebookingid="{{ $prebooking->id }}" type="button" data-toggle="modal" data-target="#myModal">View</a> </span>
                     
                    </div>
                    <div class="card-body">
                   
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                              <form action="{{ route('prebooking-activate-post', $prebooking->id )}}" method="post">
                                @method('POST')
                                @csrf
                                <tbody><tr>
                                    <td style="width: 50%;" valign="top">
                                       

             <div class="row">
            <div class="col">
              <label><b> 
                        PO Number<span class="required"> *</span> </b></label> 
            </div>
            <div class="col">
        <input name="po_number" type="text"  class="form-control" autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">PO Numbers</span>
                    </div>

             <div class="col ml-2">
             </div>
          </div>            
            </br>        




          
            </br>     

           <div class="row">
            <div class="col">
              <label><b> 
                        Order Confirmation Date<span class="required"> *</span></b></label> 
            </div>
            <div class="col">
            <input name="order_confirmation_date" id="order_confirmation_date" value="{{$prebooking->order_confirmation_date}}" type="date"  class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

             <div class="col ml-2">
             </div>
          </div>
        </br>

         <div class="row">
            <div class="col-4">
              <label> <b> 
                       Advance Date<span class="required"> *</span></b></label> 
            </div>
                     <div class="col-4">
                       <input name="advance_payment_date"  value="{{$prebooking->advance_payment_date}}" placeholder="Advance Payment Date" id="advance_payment_date"  type="date"   class="form-control"  autofocus="" style="width:100%;" >
                     </div>

             <div class="col-3">
              
              
             </div>
              <div class="col-1">

              </div>
          </div>  



</br>
            <div class="row">
            <div class="col-4">
              <label> <b> 
                        Delivery Days<span class="required"> *</span></b></label> 
            </div>
            <div class="col-2">
          <input name="delivery_period_days" id="delivery_period_days" value="{{$prebooking->delivery_period_days}}" type="number" placeholder="Days" class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

             <div class="col-2">
              <label> <b>
                        Delivery Date Based On </b></label>

                         
                          <label>  <input   <?php if($prebooking->radio=='1') echo 'checked';  ?> type="checkbox" id="checkbox1" class="radio" value="1" name="radio" />Advance Payment Date</label>
                      
              <label> <input type="checkbox" <?php if($prebooking->radio=='2') echo 'checked';  ?>  id="checkbox2" class="radio" value="2" name="radio" />Confirmation Date</label>
                         
             </div>
              <div class="col-4">

              </div>
          </div>  

                  
          </br>

           <div class="row">
            <div class="col">
              <label><b> 
                         Delivery Date<span class="required"> *</span></b></label> 
            </div>
            <div class="col">
            <input name="delivery_date" value="{{$prebooking->delivery_date}}" readonly="true" type="date" id="delivery_date" class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

             <div class="col ml-2">
             </div>
          </div>

        </br>



                                        



                                        <input type="submit" name="ctl00$ContentPlaceHolder1$btnsave" value="Activate" class="btn btn-primary">
                                         
                                        
                                    </td>
                                </tr>
                            </tbody>
                          </form>
                          </table>
                      
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!--ebra-->






                    @php
                                $prebooking_parts = \DB::table("prebooking_parts")->where("prebooking_id",$prebooking->id)->get();
                            @endphp

                            <div  hidden class="form-group">
                                <label class="font-weight-bold">
                                    Attachment</label>
                                    <a href="{{ url('/attachments/prebooking/'.$prebooking->attachment) }}" target="_blank" > {{ $prebooking->attachment }} </a>
                            </div>

                              <table class="ml-2"  hidden  style="margin-left:40px;"  cellpadding="0" cellspacing="0" border="0" width="100%">
                      
                                  <tbody  style="margin-left:40px;" >
                                                      <tr>
                                                          <td style="width: 33%;" valign="top">
                                                              <div class="form-group">
                                                                  <label>
                                                                      Supplier Name
                                                                               </label>
                                                                       <b> {{ $prebooking->supplier->name }} </b>
                                                                  <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                              </div>
                                                          </td>
                                                      
                                                          <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   Code</label>
                                                                               <b> {{ $prebooking->supplier->supplier_code  }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                      </tr>
                                                      <tr>
        
        
                                                               <tr>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   Company Name
                                                                               </label>
                                                                                    <b> {{ $prebooking->supplier->company_name }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                         </div>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   Address</label>
                                                                               <b> {{ $prebooking->supplier->address }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                                    
                                                               </tr>
        
                                                                <tr>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   PFI No
                                                                               </label>
                                                                                    <b> {{ $prebooking->pfi_no  }} </b>
        
                                                                              <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                         </div>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                    Pfi value</label>
                                                                               <b> {{   $prebooking->pfi_value  }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   Advanced paid</label>
                                                                               <b> {{ $prebooking->advance_paid }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                               </tr>

                                                               
                                                               <tr>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   Delivery Period Days 
                                                                               </label>
                                                                                    <b> {{ $prebooking->delivery_period_days  }} </b>
        
                                                                              <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                         </div>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                              Expected delivery date</label>
                                                                               <b> {{   $prebooking->expected_delivery_date  }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                              Shipment Type</label>
                                                                               <b> {{ $prebooking->shipment_type }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                               </tr>

                                                               <tr>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   CBM
                                                                               </label>
                                                                                    <b> {{ $prebooking->cbm  }} </b>
        
                                                                              <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                         </div>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                             Net Weight(nw)<label>
                                                                               <b> {{   $prebooking->nw  }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                              Gross Weight(gw)</label>
                                                                               <b> {{ $prebooking->gw }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                               </tr>
        
                                                               <tr>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   Order Type
                                                                               </label>
                                                                                    <b> {{ $prebooking->order_type  }} </b>
        
                                                                              <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                         </div>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                              Incoterms <label>
                                                                               <b> {{   $prebooking->incoterms  }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                              Shipment Ways</label>
                                                                               <b> {{ $prebooking->shipment_way }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                               </tr>

                                                               <tr>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   Payment Mode
                                                                               </label>
                                                                                    <b> {{ $prebooking->payment_mode  }} </b>
        
                                                                              <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                         </div>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                              Payment Days <label>
                                                                               <b> {{   $prebooking->payment_days  }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                              Declaration Type</label>
                                                                               <b> {{ $prebooking->declaration_type }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                               </tr>
        
        
                                                                <tr>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                Advance Payment Date
                                                                               </label>
                                                                                    <b> {{ $prebooking->advance_payment_date }} </b>
        
                                                                              <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                         </div>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                 Rfp Date</label>
                                                                               <b> {{   $prebooking->rfp_date  }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   Order confirm Date </label>
                                                                               <b> {{ $prebooking->order_confirmation_date }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                               </tr>

                                                               <tr>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                Bank Value
                                                                               </label>
                                                                                    <b> {{ $prebooking->bank_value }} </b>
        
                                                                              <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                         </div>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                 Cash Value</label>
                                                                               <b> {{   $prebooking->cash  }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   Naration </label>
                                                                               <b> {{ $prebooking->naration }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                               </tr>

                                                           

                                                              @if(count($prebooking_parts))      
                                                               <tr>          
                                                                    <td colspan="3">
                                                                        <h3>  PreBooking Parts </h3>
                                                                        <table class="table" cellspacing="0" cellpadding="0" border="0" id="ctl00_ContentPlaceHolder1_dgsupplierfeesInfo" style="border-style:None;width:99%;border-collapse:collapse;">
                                                                            <thead>
                                                                        
                                                                                <th>  Name </th>
                                                                                <th>  Value </th>
                                                                                
                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach($prebooking_parts as $pre_booking)
                                                                                    <tr class="sorting_asc" align="left" valign="top">
                                                                                        <td>{{ $pre_booking->name }}</td><td>{{ $pre_booking->value}}</td>
                                                                                    </tr>
                        
                                                                                @endforeach
                                                                            </tbody>
                                                                                    
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                                @endif  
                                                            
                                                                </table>
                                                            </div>



                                                              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h4 class="modal-title">PreBooking Details </h4>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                

        @php
               $prebooking_parts = \DB::table("prebooking_parts")->where("prebooking_id",$prebooking->id)->get();
           @endphp
      
                  <div class="row">
            <div class="col">
              <label><b> 
                       Company<span class="required"> *</span></b></label>
            </div>
            <div class="col">
             <input readonly name="pfi_no" type="text"  class="form-control"  value="{{ $prebooking->company_name }}"  placeholder="PFI No" autofocus="" style="width:100%;" required>
                    </div>
            
             <div class="col ml-2">
             </div>
          </div>    



        </br>

           <div class="row">
            <div class="col">
              <label><b> 
                       Supplier<span class="required"> *</span></b></label>
            </div>
            <div class="col">
             <input readonly name="pfi_no" type="text"  class="form-control"  value="{{ $prebooking->supplier->supplier_name }}"  placeholder="PFI No" autofocus="" style="width:100%;" required>
             </div>
  

             <div class="col ml-2">
             </div>
          </div>
                            
                              
          </br>

           <div class="row">
            <div class="col">
              <label><b> 
                        PFI No<span class="required"> *</span></b></label>
            </div>
            <div class="col">
           <input readonly name="pfi_no" type="text"  class="form-control" value="{{ $prebooking->pfi_no }}"  placeholder="PFI No" autofocus="" style="width:100%;" required>
                    </div>

             <div class="col ml-2">
             </div>
          </div>            
            </br> 


           <div class="row">
            <div class="col-4">
              <label><b> 
                        PFI Value<span class="required"> *</span></b></label>
            </div>
            <div class="col-2">
            <input readonly name="pfi_no" type="text"  class="form-control" value="{{ $prebooking->currency }}"  placeholder="PFI No" autofocus="" style="width:100%;" required>
                    </div>

                     <div class="col-2">
             <input readonly name="pfi_value" id="pfi_value" placeholder="Amount" type="number" value="{{ $prebooking->pfi_value }}"  class="form-control"  autofocus="" style="width:100%;" required>
                     </div> 

             <div class="col-3">
              
             </div>
              <div class="col-1">
              </div>
          </div>      

        </br>

         <div class="row">
            <div class="col">
              <label><b> 
                        PFI Date<span class="required"> *</span> </b></label> 
            </div>
            <div class="col">
           <input readonly name="pfi_date" type="date"  value="{{ $prebooking->pfi_date }}" class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

             <div class="col ml-2">
             </div>
          </div>            
            </br>     


             <div class="row">
            <div class="col">
              <label><b> 
                        Request For Proposal Date<span class="required"> *</span></b></label> 
            </div>
            <div class="col">
            <input readonly value="{{ $prebooking->rfp_date }}" name="rfp_date" id="rfp_date" type="date"  class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

             <div class="col ml-2">
             </div>
          </div>


            </br> 

                                       
                    
             <div class="row">
            <div class="col-4">
              <label> <b> 
                       Advance Required/Date<span class="required"> *</span></b></label> 
            </div>
            <div class="col-2">
          <input readonly value="{{ $prebooking->advance_paid }}" name="advance_paid"  id="advance_paid"  type="number" placeholder="Advance"  class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

                     <div class="col-3">
                       <input  value="{{ $prebooking->advance_payment_date }}"  readonly name="advance_payment_date"  placeholder="Advance Payment Date" id="advance_payment_date"  type="date"   class="form-control"  autofocus="" style="width:100%;" >
                     </div>

             <div class="col-3">
              
              
             </div>
           
          </div>  


        </br>
        </br>

           <div class="row">
            <div class="col">
              <label><b> 
                        Order Confirmation Date<span class="required"> *</span></b></label> 
            </div>
            <div class="col">
            <input readonly value="{{ $prebooking->order_confirmation_date }}" name="order_confirmation_date" id="order_confirmation_date" type="date"  class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

             <div class="col ml-2">
             </div>
          </div>
        </br>




            <div class="row">
            <div class="col-4">
              <label> <b> 
                        Delivery Days<span class="required"> *</span></b></label> 
            </div>
            <div class="col-2">
          <input readonly name="delivery_period_days" value="{{ $prebooking->delivery_period_days }}" id="delivery_period_days" type="number" placeholder="Days" class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

             <div class="col-2">
              <label> <b>
                        Delivery Date Based On </b></label>
                        @if($prebooking->radio=='1')
                          <label> <input readonly type="checkbox" id="checkbox1" class="radio" value="1" name="radio" />Advance Payment Date</label>
                          @else
                   <label> <input readonly type="checkbox" id="checkbox2" class="radio" value="2" name="radio" />Confirmation Date</label>
                       @endif
             </div>
              <div class="col-4">

              </div>
          </div>  

                  
          </br>

           <div class="row">
            <div class="col">
              <label><b> 
                         Delivery Date<span class="required"> *</span></b></label> 
            </div>
            <div class="col">
            <input readonly name="delivery_date" value="{{ $prebooking->delivery_date }}" readonly="true" type="date" id="delivery_date" class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

             <div class="col ml-2">
             </div>
          </div>

        </br>




            <div class="row">
              <div class="col-4">
                <label><b> 
                             Payment Mode<span class="required"> *</span></b></label> 
              </div>
              <div class="col-2">
                       <input readonly name="payment_mode" value="{{ $prebooking->payment_mode }}" readonly="true" type="text" id="delivery_date" class="form-control"  autofocus="" style="width:100%;" > 
                      </div>

               <div class="col-2" id="payment_days">
                  <input readonly  name="payment_days"  value="{{ $prebooking->payment_days }}" required id="payment_days" type="number" placeholder="Payment Days" class="form-control"  autofocus="" style="width:100%;" >
               </div>
                <div class="col-4">
                </div>
            </div>
            </br>
            </br>
             <div class="row">
            <div class="col">
              <label><b> 
                           Order Type</b></label> 
            </div>
            <div class="col">
                  <input readonly  name="order_type"  value="{{$prebooking->order_type}}" required id="payment_days" type="text" placeholder="Order Type" class="form-control"  autofocus=""  style="width:100%;" >
                    </div>

             <div class="col ml-2">
             </div>
          </div>

        </br> 
        </br>     
            @if(count($prebooking_parts))     
         <div class="row"  id="parttable" >
           <div class="col-4">
             <label><b> 
                          Part Details</b></label> 
           </div>
            <div class="col-8">
           <div  >
                  <h3 style="color:red" id="alert" ></h3>   
                  <table id="tablepart">
                <thead>
                <tr>
                  <th scope="col">Part Name</th>
                  <th scope="col">Value</th>
                  <th scope="col">Delivery Date</th>
                  
                </tr>
                </thead>
                
                <tbody>
                    @foreach($prebooking_parts as $pre_booking)
                      <tr>
                  <th scope="row">{{ $pre_booking->name }}</th>
                  <td>{{ $pre_booking->value }}</td>
                  <td>{{ $pre_booking->date }}</td>
                 
                </tr>
               @endforeach

              </tbody>
                  </table>    
                  </div>            
                </div>

                
              </div>
              @endif

                </br>


                  <div class="row">
            <div class="col">
              <label><b> 
                          Declaration Type</b></label> 
            </div>
            <div class="col">
              <input readonly  name="order_type"  value="{{ $prebooking->declaration_type }}" required id="payment_days" type="text" placeholder="Declaration Type" class="form-control"  autofocus="" style="width:100%;" >
                    </div>

             <div class="col ml-2">
             </div>
          </div>


          <div class="row bank_value">
                <p style="color:red" id="alert2" ></p>    
            </div>  
           <div class="row bank_value" >

            <div class="col-1">
              <label><b> 
                       Bank Value</b></label> 
            </div>
            <div class="col-2">
             <input readonly value="{{ $prebooking->bank_value }}"  name="bank_value" id="bank_value" type="text" placeholder="Bank Value" oninput="validatesumpartial()"  class="form-control partialvalues"  autofocus="" style="width:100%;" >  
                    </div>

                     <div class="col-2">
                     </div> 
                      <div class="col-1">
                           <label><b> 
                         Cash Value</b></label> 
                      </div>



             <div class="col-2">
                <input readonly  value="{{ $prebooking->cash_value }}"  name="cash_value" id="cash_value" type="text" placeholder="Cash Value"  oninput="validatesumpartial()" class="form-control partialvalues"  autofocus="" style="width:100%;" >
             </div>
              <div class="col-4">
                     </div> 
          </div>


        </br>
      </br>

           <div class="row">
              <div class="col-4">
                <label><b> 
                             Created By/At<span class="required"> *</span></b></label> 
              </div>
              <div class="col-2">
               <?php
             $created_by = \DB::table("users")->where("id",$prebooking->created_by)->get();
             $created_at=$prebooking->created_at;
               ?>
                       <input readonly name="payment_mode" value="{{ $created_by[0]->name }}" readonly="true" type="text" id="delivery_date" class="form-control"  autofocus="" style="width:100%;" > 
                      </div>

               <div class="col-2" id="payment_days">
                  <input readonly  name="payment_days"  value="{{ date_format($created_at,'Y-m-d') }}" required id="payment_days" type="date" placeholder="Payment Days" class="form-control"  autofocus="" style="width:100%;" >
               </div>
                <div class="col-4">
                </div>
            </div>
            </br>

            @if($prebooking->po_number!='')
             <div class="row">
              <div class="col-4">
                <label><b> 
                             Activated By/At<span class="required"> *</span></b></label> 
              </div>
              <div class="col-2">
               <?php
             $created_by = \DB::table("users")->where("id",$prebooking->activated_by)->get();
               ?>
                       <input readonly name="payment_mode" value="{{ $created_by[0]->name }}" readonly="true" type="text" id="delivery_date" class="form-control"  autofocus="" style="width:100%;" > 
                      </div>

               <div class="col-2" id="payment_days">
                  <input readonly  name="payment_days"  value="{{ date_format($prebooking->activated_at,'Y-m-d') }}" required id="payment_days" type="date" placeholder="Activated Date" class="form-control"  autofocus="" style="width:100%;" >
               </div>
                <div class="col-4">
                </div>
            </div>
            @endif
            </br>




        </br>
<h4> Additional Fields  </h4>
      <hr/>
      
    </br>
      
    </br>
                    
         <div class="row">
            <div class="col-1">
              <label><b> 
                          Shipment Type</b></label> 
            </div>
            <div class="col-2">
          <input readonly  value="{{ $prebooking->shipment_type }}"  name="cash_value" id="cash_value" type="text" placeholder="Cash Value"  oninput="validatesumpartial()" class="form-control partialvalues"  autofocus="" style="width:100%;" >
                    </div>

                     <div class="col-2">
                     </div> 
                      <div class="col-1">
                           <label><b> 
                         CBM</b></label> 
                      </div>



             <div class="col-2">
              <input readonly  value="{{ $prebooking->cbm }}"  name="cash_value" id="cash_value" type="text" placeholder="Cash Value"  oninput="validatesumpartial()" class="form-control partialvalues"  autofocus="" style="width:100%;" >
             </div>
              <div class="col-4">
                     </div> 
          </div>

        </br> 

         <div class="row">
            <div class="col-1">
              <label><b> 
                         Net weight</b></label> 
            </div>
            <div class="col-2">
             <input readonly name="nw" value="{{ $prebooking->nw }}" type="number"  class="form-control"  placeholder="Net Weight" style="width:100%;" >
                    </div>

                     <div class="col-2">
                     </div> 
                      <div class="col-1">
                           <label><b> 
                         Gross weight</b></label> 
                      </div>



             <div class="col-2">
               <input readonly name="gw" value="{{ $prebooking->gw }}" type="number"  class="form-control" placeholder="Gross Weight"  autofocus="" style="width:100%;" >
             </div>
              <div class="col-4">
                     </div> 
          </div>
        
        </br>


         <div class="row">
            <div class="col-1">
              <label><b> 
                        No of Container</b></label> 
            </div>
            <div class="col-2">
             <input readonly name="no_of_container" value="{{ $prebooking->no_of_container }}" type="number"  class="form-control" placeholder="No of Container"  autofocus="" style="width:100%;" >
                    </div>

                     <div class="col-2">
                     </div> 
                      <div class="col-1">
                           <label><b> 
                        Incoterms</b></label> 
                      </div>



             <div class="col-2">
               <input readonly name="incoterms" value="{{ $prebooking->incoterms }}" type="text"  class="form-control" placeholder="No of Container"  autofocus="" style="width:100%;" >
             </div>
              <div class="col-4">
                     </div> 
          </div>
        
        </br> 

         <div class="row">
            <div class="col-1">
              <label><b> 
                        Shipment Way</b></label> 
            </div>
            <div class="col-2">
            <input readonly name="shipment_way" value="{{ $prebooking->shipment_way }}" type="text"  class="form-control" placeholder="No of Container"  autofocus="" style="width:100%;" >
                    </div>

                     <div class="col-2">
                     </div> 
                      <div class="col-1">
                          
                      </div>



             <div class="col-2">
             
             </div>
              <div class="col-4">
                     </div> 
          </div>
        
            
        
            </br> 


            <div class="row">
            <h3 style="color:red" id="alert2" ></h3>  
            <div class="col-1">
              <label><b> 
                       Narration</b></label> 
            </div>
            <div class="col-2">
             <input readonly name="narration" value="{{ $prebooking->narration }}" type="text"  class="form-control" placeholder="Narration"  autofocus="" style="width:100%;" >
                    </div>

                     <div class="col-2">
                     </div> 
                      <div class="col-1">
                           <label><b> 
                         Attachment</b></label> 
                      </div>



             <div class="col-5">
               <a href="{{ url('/attachments/prebooking/'.$prebooking->attachment) }}" target="_blank" > {{ $prebooking->attachment }} </a>
             </div>
              <div class="col-1">
                     </div> 
          </div>
        
            </br> 

                      
          
                    
                                 
                    
                                    
                     
                     
                   
     
                     
                  
 
               </div>
               <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>

               </div>
             </div>
             <!-- /.modal-content-->
           </div>
           <!-- /.modal-dialog-->
         </div>
        






        <!--ebra -->






@endsection


@section('javascript')

<script>


$(".view").click(function(){

    var customerId = $(this).data('prebookingid');
      $("#loader").hide();
/*
    $.ajax({
      type: "GET",
      url: "prebooking/"+customerId,
      beforeSend: function(){
        $("#loader").show();
      },
      success: function(data){
          $("#myModal .modal-body").html(data);
          $("#loader").hide();
      },
      error: function(data){
        $("#myModal .modal-body").html(data);
      }
    });
    */

});


$("#myModal").on("hidden.bs.modal",function(){

 //   $(this).find(".modal-body").html("Loading .....");
});

$("input:checkbox").on('click', function() {

   
var $box = $(this);
var date;
  if ($box.is(":checked")) {
    var val= $box.val();
    var delivery_period_days=$("#delivery_period_days").val();
        var group = "input:checkbox[name='" + $box.attr("name") + "']";

    $(group).prop("checked", false);
  //org file
    $box.prop("checked", true);
       if(val==1){


       var rfp_date=$("#advance_payment_date").val();
        if(rfp_date=='' || delivery_period_days==''){
        alert("Date for Advance Payment and Delivery days required");
        $('#checkbox1').prop("checked", false);
          }
       else{
        //$box.prop("checked", true);
       $('#checkbox1').prop("checked", true); 
       
      
      var date = new Date(rfp_date);
      var date_delivery=new Date();
      var no_of_delivery_days= parseInt(delivery_period_days); 
      date_delivery.setDate(date.getDate()+no_of_delivery_days);
      var y=date_delivery.getFullYear();
      var m=date_delivery.getMonth()+1; 
      m=String(m);

      if(m.length==1){
        m="0"+m;
      }
      var d=date_delivery.getDate();  
      d=String(d);
      if(d.length==1){
        d="0"+d;
      }   
      var datedel=y+"-"+m+"-"+d;
       console.log('days'+delivery_period_days);
       console.log('date present'+rfp_date);
       console.log('date future'+datedel);
      var dd= new Date(datedel);
       console.log('dddate'+dd);

    //add with days and change value
       $("#delivery_date").val(datedel);

      
        }
    
    }
    else{
      var order_confirmation_date=$("#order_confirmation_date").val();
        if(order_confirmation_date=='' ||  delivery_period_days=='' ){
        alert("Date Order Confirmation, Delivery Days required");
         $('#checkbox2').prop("checked", false);
      }
      else{
       $('#checkbox2').prop("checked", true);
      
      var date = new Date(order_confirmation_date);
      var date_delivery=new Date();
      var no_of_delivery_days= parseInt(delivery_period_days); 
      date_delivery.setDate(date.getDate()+no_of_delivery_days);
      var y=date_delivery.getFullYear();
      var m=date_delivery.getMonth()+1; 
      m=String(m);

      if(m.length==1){
        m="0"+m;
      }
      var d=date_delivery.getDate();  
      d=String(d);
      if(d.length==1){
        d="0"+d;
      }   
      var datedel=y+"-"+m+"-"+d;
       console.log('days'+delivery_period_days);
       console.log('date present'+rfp_date);
       console.log('date future'+datedel);
      var dd= new Date(datedel);
       console.log('dddate'+dd);

    //add with days and change value
       $("#delivery_date").val(datedel);

    }
      
    }
    
     

  } else {
    $box.prop("checked", false);
  }
});

</script>
@if(Session::get('message'))
      <script>
        $(document).ready(function(){
          showToastr('success',"{{ session('message') }}");
        });



      </script>
@endif
@endsection

