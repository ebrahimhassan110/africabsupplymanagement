
          					<table cellpadding="0" cellspacing="0" border="0" width="100%">
          						

                          <tbody>
          									<tr>
          										<td style="width: 33%;" valign="top">
          											<div class="form-group">
          												<label>
          													Customer
                                                                       </label>
          													 <b> {{ $customer->name }} </b>
          												<span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
          											</div>
          										</td>
          										<td style="width: 33%;" valign="top">
          											<div class="form-group">
          												<label>
          													Date</label>
          												 <b> {{ date('d/m/Y',strtotime($customer->created_at)) }} </b>
          												<span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
          										</td>
          										<td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Business Type</label>
                                                                       <b> {{ $customer->businesstype }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
          									</tr>
          									<tr>


                                                       <tr>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Mobile No
                                                                       </label>
                                                                            <b> {{ $customer->tel }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                 </div>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Email</label>
                                                                       <b> {{ $customer->email }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                            Tax File Name</label>
                                                                       <b> {{ $customer->taxfilename }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                       </tr>




                                                       <?php 

                                                            if($customer->businesstype=='Limited' ){
                                                         ?>

                                                              <tr>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           ShareHolder Name
                                                                       </label>
                                                                            <b> {{ $customer->shareholder_name }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                 </div>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Director Name</label>
                                                                       <b> {{ $customer->director_name }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                   <div class="form-group">
                                                                      <label>
                                                                           Nida No</label>
                                                                       <b> {{ $customer->nida }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                               
                                                            </td>
                                                       </tr>

                                                            <?php

                                                                       }

                                                       if($customer->businesstype=='Partnership' ){

                                                       ?>     
                                                         <tr>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Name of Partner
                                                                       </label>
                                                                            <b> {{ $customer->partner_name }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                 </div>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                    <label>
                                                                           Nida No</label>
                                                                       <b> {{ $customer->nida }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                    
                                                            </td>
                                                       </tr>
                                                  <?php } 

                                                       if($customer->businesstype=='NGO' ){  
                                                       ?>

                                                       <tr>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Name of Trustee
                                                                       </label>
                                                                            <b> {{ $customer->trustee_name }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                 </div>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                    <label>
                                                                           Nida No</label>
                                                                       <b> {{ $customer->nida }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                    
                                                            </td>
                                                       </tr>
                                                       <?php   }  ?>        


                                                        <tr>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Partner Incharge
                                                                       </label>
                                                                            <b> {{ $customer['partner']->name }} </b>

                                                                      <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                 </div>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                            Staff Incharge</label>
                                                                       <b> {{   $customer['staff']->name  }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Year End</label>
                                                                       <b> {{ $customer->yearend }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                       </tr>




                                                        <tr>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                         Year end
                                                                       </label>
                                                                            <b> {{ $customer->yearend }} </b>

                                                                      <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                 </div>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                          Whatsapp No</label>
                                                                       <b> {{   $customer->whatsappno  }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           P.O Box No </label>
                                                                       <b> {{ $customer->pobox }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                       </tr>

                                                        <tr>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                         Street
                                                                       </label>
                                                                            <b> {{ $customer->street }} </b>

                                                                      <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                 </div>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                          Plot No</label>
                                                                       <b> {{   $customer->plotNo  }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Block No </label>
                                                                       <b> {{ $customer->blockNo }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                       </tr>            


                                                        <tr>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                         Contact Person
                                                                       </label>
                                                                            <b> {{ $customer->contactperson }} </b>

                                                                      <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                 </div>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                         Tax Payer Name</label>
                                                                       <b> {{  $customer->taxpayername  }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 
                                                            </td>
                                                       </tr>   

                                                        <tr>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                         TIN No
                                                                       </label>
                                                                            <b> {{ $customer->tinno }} </b>

                                                                      <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                 </div>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                          VRN No</label>
                                                                       <b> {{   $customer->vrnno  }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Registration Date </label>
                                                                       <b> {{ $customer->registrationdate }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                       </tr>        


                                                        <tr>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                        Tax Audit Last Finalize year
                                                                       </label>
                                                                            <b> {{ $customer->taxauditlastfinalizedate }} </b>

                                                                      <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                                                 </div>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                        Business License Expiry Date</label>
                                                                       <b> {{   $customer->businesslicenseexpirydate  }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                            <td style="width: 33%;" valign="top">
                                                                 <div class="form-group">
                                                                      <label>
                                                                           Registration Date </label>
                                                                       <b> {{ $customer->registrationdate }} </b>
                                                                      <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
                                                            </td>
                                                       </tr>                    






                                                       <tr hidden>          





          										<td colspan="3">
                                <table class="table" cellspacing="0" cellpadding="0" border="0" id="ctl00_ContentPlaceHolder1_dgcustomerfeesInfo" style="border-style:None;width:99%;border-collapse:collapse;">
          												<tbody>
          													<tr class="sorting_asc" align="left" valign="top" style="font-weight:bold;">
          														<td>S/No.</td><td>Fee Type</td><td>Amount</td><td>Remark</td>
          													</tr>


          													<input type="hidden" name="total" value=" ">
          												</tbody>
          											
          											</table>
          										</td>
          									</tr>
          								</tbody>
          							</table>
                    	</div>
