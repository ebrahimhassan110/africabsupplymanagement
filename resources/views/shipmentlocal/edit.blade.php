@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
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
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Edit Customr Fee ' }}</span>
                    </div>
                    <div class="card-body  ">
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
          													<select  name="customer" class="form-control select2" data-placeholder="choose customer" style="width:90%;" required>
          														<option></option>
          														<option value="0">All</option>
          														@foreach($customers as $customer)
                                          @php
                                              $selected = 0;
                                              if(  isset($customerfee->customerId ) AND  $customerfee->customerId == $customer->customerId)
                                                  $selected = "selected";
                                          @endphp
          															<option  {{$selected}} value="{{$customer->customerId}}">{{ $customer->name }} {{ '('.$customer->tel.')' }}</option>
          														@endforeach
          													</select>
          												<span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
          											</div>
          										</td>
          										<td style="width: 33%;" valign="top">
          											<div class="form-group">
          												<label>
          													Date<span class="required"> *  </span></label>
          												<input name="ctl00$ContentPlaceHolder1$txtdate" type="text" value="{{ date('d/m/Y',strtotime($customerfee->created_at)) }}" id="ctl00_ContentPlaceHolder1_txtdate" class="form-control" style="width:60%;">
          												<span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>
          										</td>
          										<td style="width: 33%;" valign="top">
          											<div class="form-group">
          												<label>
          													Document</label>
          												<input type="file" name="file" id="attachment" style="width:60%;">
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
          																<select  name="feetype_{{$i}}" class="form-control select2" data-placeholder="choose customer" style="width:90%;">
          																	<option></option>
          																	@foreach( $feetypes as $feetype )
                                              @php
                                                $selected = 0;
                                                if(  isset( $customerfee->feetypeId ) AND  $customerfee->feetypeId == $feetype->feetypeId)
                                                  $selected = "selected";
                                              @endphp
          																		<option {{$selected}} value="{{ $feetype->feetypeId }}">{{ $feetype->feetypeName }}</option>
          																	@endforeach
          																</select>
          															</td>
          															<td> <input type="number" class="form-control" value="{{ $customerfee->amount }}" name="amount_{{$i}}"> </td>
          															<td>
          																<textarea name="remark_{{$i}}" class="form-control"> {{ $customerfee->comment }} </textarea>
          															</td>
          														</tr>
          														@php $total++; @endphp
          													@endforeach
          													<tr>
          														<td colspan="3">
          															<input type="submit" name="ctl00$ContentPlaceHolder1$btnsave" value="update" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$btnsave&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ctl00_ContentPlaceHolder1_btnsave" tabindex="8" class="btn btn-primary">
          															<!-- <input type="submit" name="ctl00$ContentPlaceHolder1$btncancel" value="Cancel" id="ctl00_ContentPlaceHolder1_btncancel" tabindex="9" class="btn btn-primary"> -->
          														</td>
          													</tr>
          													<input type="hidden" name="total" value="{{ $total }}">
          												</tbody>
          												</form>
          											</table>
          										</td>
          									</tr>
          								</tbody>
          							</table>
                    	</div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')
@if(Session::get('message'))
      <script>
        $(document).ready(function(){
          showToastr('success',"{{ session('message') }}");
        });
      </script>
@endif
@endsection
