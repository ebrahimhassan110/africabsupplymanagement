
          					<table cellpadding="0" cellspacing="0" border="0" width="100%">
          						

                          <tbody>
          									<tr>
          										<td style="width: 33%;" valign="top">
          											<div class="form-group">
          												<label>
          													Supplier Name
                                                                       </label>
          													 <b> {{ $supplier->supplier_name }} </b>
          												<span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
          											</div>
          										</td>
          									
          										<td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Code</label>
                                                                       <b> {{ $supplier->supplier_code  }} </b>
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
                                                                            <b> {{ $supplier->company_name }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                 </div>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Address</label>
                                                                       <b> {{ $supplier->address }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                            City</label>
                                                                       <b> {{ $supplier->city }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                       </tr>

                                                        <tr>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           District
                                                                       </label>
                                                                            <b> {{ $supplier->district  }} </b>

                                                                      <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                 </div>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                            Country</label>
                                                                       <b> {{   $supplier->country  }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Bank Details</label>
                                                                       <b> {{ $supplier->bank_detail }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                       </tr>




                                                        <tr>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                        Advance Terms
                                                                       </label>
                                                                            <b> {{ $supplier->advance_terms }} </b>

                                                                      <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                 </div>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                         Payment Terms</label>
                                                                       <b> {{   $supplier->payment_terms  }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Credit Days </label>
                                                                       <b> {{ $supplier->credit_days }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                       </tr>

                                                        






                                                       <tr >          


          										<td colspan="3">
												<h3>  Contact Information</h3>
                                <table class="table" cellspacing="0" cellpadding="0" border="0" id="ctl00_ContentPlaceHolder1_dgsupplierfeesInfo" style="border-style:None;width:99%;border-collapse:collapse;">
													<thead>
													<th> Position  </th>
													<th>  Name </th>
													<th>  Phone </th>
													<th>  Email </th>
													
													</thead>
													<tbody>
													@foreach($supplier_contact as $s)
          													<tr class="sorting_asc" align="left" valign="top" style="font-weight:bold;">
          														<td>{{$s->position}}</td><td>{{ $s->name}}</td><td>{{$s->number}}</td><td>{{$s->email}}</td>
          													</tr>

														@endforeach
          														
          											</table>
          										</td>
          									</tr>
          								</tbody>
          							</table>
                    	</div>
