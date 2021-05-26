
                                   @php
                                $shipment_parts = \DB::table("shipment_part")->where("shipment_id",$shipment->id)->get();
                            @endphp

                            <div class="form-group">
                                <label class="font-weight-bold">
                                    Attachment</label>
                                    <a href="{{ url('/attachments/shipments/'.$shipment->attachment) }}" target="_blank" > {{ $shipment->attachment }} </a>
                            </div>

                              <table cellpadding="0" cellspacing="0" border="0" width="100%">

                                  <tbody>
                                                      <tr>
                                                          <td style="width: 33%;" valign="top">
                                                              <div class="form-group">
                                                                  <label>
                                                                      Supplier Name
                                                                               </label>
                                                                       <b> {{ $shipment->supplier->name }} </b>
                                                                  <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                              </div>
                                                          </td>

                                                          <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   Code</label>
                                                                               <b> {{ $shipment->supplier->supplier_code  }} </b>
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
                                                                                    <b> {{ $shipment->supplier->company_name }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                         </div>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   Address</label>
                                                                               <b> {{ $shipment->supplier->address }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>

                                                               </tr>

                                                                <tr>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   PFI No
                                                                               </label>
                                                                                    <b> {{ $shipment->booking->pfi_no  }} </b>

                                                                              <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                         </div>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                    PFI value</label>
                                                                               <b> {{   $shipment->booking->pfi_value  }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   Order Type</label>
                                                                               <b> {{ $shipment->order_type }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                               </tr>


                                                               <tr>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   CFI No
                                                                               </label>
                                                                                    <b> {{ $shipment->cfi_no  }} </b>

                                                                              <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                         </div>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                              Shipment Goods Value</label>
                                                                               <b> {{   $shipment->goods_value  }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                             Other Expense Value</label>
                                                                               <b> {{ $shipment->other_expense_value }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                               </tr>

                                                               <tr>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                   Advance Paid Value
                                                                               </label>
                                                                                    <b> {{ $shipment->advance_paid_value  }} </b>

                                                                              <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                         </div>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                             Local Delivery Date<label>
                                                                               <b> {{   $shipment->local_delivery_date  }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                              BL No</label>
                                                                               <b> {{ $shipment->bl_no }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                               </tr>

                                                               <tr>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                  ETD
                                                                               </label>
                                                                                    <b> {{ $shipment->etd  }} </b>

                                                                              <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                         </div>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                              ETA <label>
                                                                               <b> {{   $shipment->eta  }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                              Due Date</label>
                                                                               <b> {{ $shipment->due_date }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                    </td>
                                                               </tr>

                                                               <tr>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                                  Narrtion
                                                                               </label>
                                                                                    <b> {{ $shipment->narration  }} </b>

                                                                              <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                         </div>
                                                                    </td>
                                                                    <td style="width: 33%;" valign="top">
                                                                         <div class="form-group">
                                                                              <label>
                                                                             Date Created </label>
                                                                              <?php
                                                                              $d=$shipment->created_at;
                                                                               $d= date_format($d,'d/m/Y');

                                                                              ?>
                                                                               <b> {{   $d  }} </b>
                                                                              <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                                          </div>
                                                                    </td>

                                                               </tr>




                                                               <tr>
                                                                    <td colspan="3">
                                                                        <h3>  Shipment Parts </h3>
                                                                        <table class="table" cellspacing="0" cellpadding="0" border="0" id="ctl00_ContentPlaceHolder1_dgsupplierfeesInfo" style="border-style:None;width:99%;border-collapse:collapse;">
                                                                            <thead>

                                                                                <th>  Name </th>
                                                                                <th>  Value </th>
                                                                                 <th>  Other Expense Value </th>
                                                                                 <th>  Advance Paid Value </th>

                                                                            </thead>
                                                                            <tbody>
                                                                                @foreach($shipment_parts as $pre_booking)
                                                                                    <tr class="sorting_asc" align="left" valign="top">
                                                                                        <td>{{ $pre_booking->part_name }}</td>
                                                                                        <td>{{ $pre_booking->goods_value}}</td>
                                                                                         <td>{{ $pre_booking->other_expense_value}}</td>
                                                                                          <td>{{ $pre_booking->advance_paid_value}}</td>
                                                                                    </tr>

                                                                                @endforeach
                                                                            </tbody>

                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                              </tbody>
                                                                </table>
