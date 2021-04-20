@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            @if(Session::has('not_permitted'))
            <div class="form-group row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <div class="alert alert-danger" role="alert">{{ Session::get('not_permitted') }}</div>
            </div>
            </div>
            @endif
            <div class="row">

              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                  <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Recored Register ' }}</span>
                      <a href="{{route('Recordregister.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a>
                  </div>
                    <div class="card-body">
                      <div class="table-responsive">
                              <table cellpadding="0" cellspacing="0" width="100%">
                                  <tbody>
                                    <tr style="height: 40px;">
                                      <td style="width: 10%;" valign="top">
                                          Customer
                                      </td>
                                      <td style="width: 30%;" valign="top">
                                        <select  name="customer" class="form-control select2" data-placeholder="choose customer" style="width:90%;">
                													<option></option>
                													<option value="0">All</option>
                													@foreach($customers as $customer)

                														@php
                															$selected = 0;
                															if(  isset($_customer) AND  $_customer == $customer->customerId)
                																$selected = "selected";
                														@endphp
                														<option {{$selected}} value="{{$customer->customerId}}">{{ $customer->name }} {{ '('.$customer->tel.')' }}</option>
                													@endforeach
                												</select>
                                      </td>
                                      <td style="width: 10%;" valign="top">
                                          Employee
                                      </td>
                                      <td style="width: 30%;" valign="top">
                                        <select name="employee"  class="form-control select2" data-placeholder="choose employee" style="width:90%;">
                                            <option></option>
                                            <option value="0">All</option>
                                           @foreach($employees as $employee)
                                                @php
                                                    $selected = 0;
                                                    if(  isset($_employee) AND  $_employee == $employee->id)
                                                        $selected = "selected";
                                                @endphp

                                                <option {{ $selected }} value="{{$employee->id}}">{{ $employee->name }} {{ '('.$employee->tel.')' }}</option>
                                            @endforeach

                                        </select>
                                      </td>
                                      <td style="width: 20%;" valign="top">

                                      </td>
                                  </tr>
                                  <tr style="height: 40px;">
                                      <td valign="top">
                                          From Date
                                      </td>
                                      <td valign="top">
                                          <input name="start_date" type="text" id="start_date" class="form-control date" style="width:90%;">

                                       </td>
                                      <td valign="top">
                                          To Date
                                      </td>
                                      <td valign="top">
                                          <input name="end_date" type="text" id="end_date" class="form-control date" style="width:90%;">

                                       </td>
                                      <td valign="top">
                                          <input type="submit" name="ctl00$ContentPlaceHolder1$btnsearch" value="Search" id="ctl00_ContentPlaceHolder1_btnsearch" class="btn btn-primary btn-sm">
                                          <input type="submit" name="ctl00$ContentPlaceHolder1$btnexit" value="Cancel" id="ctl00_ContentPlaceHolder1_btnexit" class="btn btn-primary btn-sm">
                                      </td>
                                  </tr>
                                  <tr>
                                    <td colspan="5">
                                      <table class="table" cellspacing="0" cellpadding="0" border="0" id="ctl00_ContentPlaceHolder1_dgoutsourceInfo" style="border-style:None;width:100%;border-collapse:collapse;">
                                      <thead>
                                        <tr class="sorting_asc" align="left" valign="top" style="font-weight:bold;">
                                          <td align="left">SNo.</td><td align="left">Date</td><td align="left">Customer</td><td align="left">Employee</td><td align="left">Office</td><td align="left">Status</td><td>attachment</td><td align="center" valign="middle">Action</td>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($recordregister as $key=>$record)
                                          <tr>
                                              <td>{{($key+1)}}</td>
                                              <td>{{ date('d/m/Y',strtotime($record->created_at)) }}</td>
                                              <td>{{ isset($record->customer->name)? $record->customer->name:""  }}</td>
                                              <td>{{ isset($record->employee->name)? $record->employee->name:"" }}</td>
                                              <td>{{ $record->office }}</td>
                                              <td>{{ $record->description }}</td>
                                              <td><a target="_blank" href='{{ url("/public/attachments/recordregister", $record->attachment ) }}'>link</a></td>
                                              <td class="d-flex flex-row">
                                                <a href="{{ url('/Recordregister/' . $record->outsourceId . '/edit') }}" class="btn  btn-primary btn-sm">Edit</a>
              																	<form action="{{ route('Recordregister.destroy', $record->outsourceId  ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item'); ">
              																	  @method('DELETE')
              																	  @csrf
              																	  <button class="btn btn-danger btn-sm">Delete</button>
              																	</form>
              																</td>
                                          </tr>
                                        @endforeach
                                      </tbody>
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
