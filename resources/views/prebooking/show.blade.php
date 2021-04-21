
          					@php
                                $prebooking_parts = \DB::table("prebooking_parts")->where("prebooking_id",$prebooking->id)->get();
                            @endphp

                            <div class="form-group">
                                <label>
                                    Attachment</label>
                                    <a href="{{ url('/public/attachments/customerfees/'.$prebooking->attachment) }}" target="_blank" > {{ $prebooking->attachment }} </a>
                            </div>

                              <table cellpadding="0" cellspacing="0" border="0" width="100%">
          						
                                  <tbody>
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
                                                                                    pfi value</label>
                                                                               <b> {{   $prebooking->pfi_value  }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   advanced paid</label>
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
                                                                                   order confirm Date </label>
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
                                                            
                                                                </table>
                                                            </div>
        