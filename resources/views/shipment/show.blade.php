
          					<table cellpadding="0" cellspacing="0" border="0" width="100%">
          						<form action="{{ route('Customerfee.update',$customerfee->id) }}" method="post" enctype="multipart/form-data">
													@csrf
                          @method('PUT')

                          <tbody>
          									<tr>
          										<td style="width: 33%;" valign="top">
          											<div class="form-group">
          												<label>
          													Customer<span class="required"> *</span>
                                  </label>
          													 <b> {{ $customerfee->customer }} </b>
          												<span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
          											</div>
          										</td>
          										<td style="width: 33%;" valign="top">
          											<div class="form-group">
          												<label>
          													Date<span class="required"> *  </span></label>
          												 <b> {{ date('d/m/Y',strtotime($customerfee->created_at)) }} </b>
          												<span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
          										</td>
          										<td style="width: 33%;" valign="top">
          											<div class="form-group">
          												<label>
          													Document</label>
          												 <a href="{{ url('/public/attachments/customerfees/'.$customerfee->attachment) }}" target="_blank" > {{ $customerfee->attachment }} </a>
          											</div>
          										</td>
          									</tr>
          									<tr>
          										<td colspan="3">
                                <table class="table" cellspacing="0" cellpadding="0" border="0" id="ctl00_ContentPlaceHolder1_dgcustomerfeesInfo" style="border-style:None;width:99%;border-collapse:collapse;">
          												<tbody>
          													<tr class="sorting_asc" align="left" valign="top" style="font-weight:bold;">
          														<td>S/No.</td><td>Fee Type</td><td>Amount</td><td>Remark</td>
          													</tr>
          													@php
          														$total = 0;
          													@endphp
          													@foreach( $customerfee_details  as $i=>$customerfee )
          														<tr class="odd gradeX" valign="top">
          															<td> {{ ($i + 1) }} </td>
          															<td>
                                          
          																  {{ $customerfee->feetypeName }}

          															</td>
          															<td>  {{ $customerfee->amount }}  </td>
          															<td>
          															  {{ $customerfee->comment }}
          															</td>
          														</tr>
          														@php $total++; @endphp
          													@endforeach

          													<input type="hidden" name="total" value="{{ $total }}">
          												</tbody>
          												</form>
          											</table>
          										</td>
          									</tr>
          								</tbody>
          							</table>
                    	</div>
