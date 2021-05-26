

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
                          <label> <input checked readonly type="checkbox" id="checkbox1" class="radio" value="1" name="radio" />Advance Payment Date</label>
                          @else
                   <label> <input readonly checked type="checkbox" id="checkbox2" class="radio" value="2" name="radio" />Confirmation Date</label>
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
                <input readonly  value="{{ $prebooking->cash_value }}"  name="cash_value" id="cash_value" type="text" placeholder="Cash Value"  class="form-control partialvalues"  autofocus="" style="width:100%;" >
             </div>
              <div class="col-4">
                     </div> 
          </div>
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

               <div class="col-3" id="payment_days">
                  <input readonly  name="payment_days"  value="{{ date_format($created_at,'Y-m-d') }}" required id="payment_days" type="date" placeholder="Payment Days" class="form-control"  autofocus="" style="width:100%;" >
               </div>
                <div class="col-3">
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
                $activated_at=$prebooking->activated_at;
               ?>
                       <input readonly name="payment_mode" value="{{ $created_by[0]->name }}" readonly="true" type="text" id="delivery_date" class="form-control"  autofocus="" style="width:100%;" > 
                      </div>

               <div class="col-2" id="payment_days">
                  <input readonly  name="payment_days"  value="{{ $activated_at }}" required id="payment_days" type="date" placeholder="Activated Date" class="form-control"  autofocus="" style="width:100%;" >
               </div>
                <div class="col-4">
                </div>
            </div>
            @endif
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
                                                            </body>
                                                       </table>
                                                          
        
