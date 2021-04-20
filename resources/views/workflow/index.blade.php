@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Workflow' }}</span>
                      @if(in_array("workplan-add", $all_permission))
                        <a href="{{route('Workflow.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a>
                      @endif
                    </div>
                    <div class="card-body p-2">
                <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                                            <form method="post" action="{{ route('workplan-filter') }}">
                                                  @csrf
                                              <tr style="height: 40px;">
                                              <td style="width: 10%;" valign="top">
                                                  Customer
                                              </td>
                                  						<td style="width: 23%;" valign="top">
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

                                                <td style="width: 23%;" valign="top">
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
                                                <td style="width: 10%;" valign="top">
                                                    Work Type
                                                </td>
                                                <td style="width: 24%;" valign="top">
                                                    <select name="worktype" class="form-control select2"  data-placeholder="choose work type">
                                                        <option></option>
                                                        <option value="0">All</option>
                                                    @foreach($worktypes as $worktype)
                                                        @php
                                                            $selected = 0;
                                                            if(  isset($_worktype) AND isset($_worktype)  == $worktype->worktypeId)
                                                                $selected = "selected";
                                                        @endphp
                                                        <option {{ $selected }} value="{{ $worktype->worktypeId }}">{{ $worktype->worktypeName }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr style="height: 40px;">
                                                <td valign="top">
                                                    From Date
                                                </td>
                                                <td valign="top">
                                                    <input name="start_date" type="text" value="@if(isset($_start_date)) {{ $_start_date }} @endif" class="form-control date" style="width:90%;">

                                                </td>
                                                <td valign="top">
                                                    To Date
                                                </td>
                                                <td valign="top">
                                                    <input name="end_date" type="text" value="@if(isset($_end_date)) {{ $_end_date }} @endif" class="form-control date" style="width:90%;">

                                                </td>
                                                <td valign="top">
                                                    Remark
                                                </td>
                                                <td valign="top">
                                                    <input name="comment" type="text"  value="@if(isset($_remark)) {{ $_remark }} @endif" class="form-control" style="width:90%;">
                                                </td>
                                            </tr>
                                            <tr style="height: 40px;">
                                                <td style="width: 10%;" valign="top">
                                                    Status
                                                </td>
                                                <td style="width: 24%;" valign="top">
                                                  <select name="status"  class="form-control select2" data-placeholder="select status" required >
                                                    <option selected="selected" value="0">-Select-</option>
                                                    @foreach($status as $stats)
                                                    @php
                                                      $selected = "";
                                                      if( old('status') == $stats->id)
                                                        $selected = "selected";
                                                    @endphp
                                                    <option {{$selected}} value="{{$stats->id}}">{{$stats->description}}</option>
                                                    @endforeach

                                                  </select>
                                                </td>
                                                <td valign="top" colspan="4">
                                                    <input type="submit" name="ctl00$ContentPlaceHolder1$btnsearch" value="Search" id="ctl00_ContentPlaceHolder1_btnsearch" class="btn btn-primary btn-sm">
                                                    <input type="submit" name="ctl00$ContentPlaceHolder1$btnexit" value="Cancel" id="ctl00_ContentPlaceHolder1_btnexit" class="btn btn-primary btn-sm">
                                                </td>
                                            </tr>
                                            <tr>
                                    </form>
                                    <td colspan="6">
                                        <table class="table" cellspacing="0" cellpadding="0" border="0" id="ctl00_ContentPlaceHolder1_dgworkorderInfo" style="border-style:None;width:100%;border-collapse:collapse;">
                                            <thead>
                                                <tr class="sorting_asc" align="left" valign="top" style="font-weight:bold;">
                                                    <td align="left">SNo.</td><td align="left">Date</td><td align="left">Customer</td><td align="left">Employee</td><td align="left">Start Time</td><td align="left">End Time</td><td align="left">Work Type</td><td align="left">Status</td><td align="left">Remark</td><td align="center" valign="middle">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $sn = 1;
                                            @endphp
                                            @foreach($workplans as $workplan)
                                                <tr>
                                                    <td>{{ $sn }}</td>
                                                    <td>{{ \Carbon\Carbon::create($workplan->start_time)->format('d/m/Y') }}</td>
                                                    <td>{{ $workplan->name }}</td>
                                                    <td>{{ $workplan->name }}</td>
                                                    <td>{{ \Carbon\Carbon::create($workplan->start_time)->toTimeString() }}</td>
                                                    <td>{{ \Carbon\Carbon::create($workplan->end_time)->toTimeString() }}</td>
                                                    <td>{{ $workplan->worktypeName }}</td>
                                                    <td>{{ $workplan->description }}</td>
                                                    <td>{{ $workplan->remark }}</td>
                                                    <td class="d-flex flex-row">
                                                      @if(in_array("workplan-edit", $all_permission))
                                                      <a href="{{ url('/Workflow/' .  $workplan->workorderId . '/edit') }}" class="btn  btn-primary btn-sm">Edit</a>
                                                      @endif
                                                      @if(in_array("workplan-delete", $all_permission))
                                                      <form action="{{ route('users.destroy', $workplan->workorderId  ) }}" method="POST">
                                                          @method('DELETE')
                                                          @csrf
                                                          <button class="btn btn-danger btn-sm">Delete</button>
                                                      </form>
                                                      @endif
                                                    </td>
                                                </tr>

                                                @php
                                                    $sn++
                                                @endphp
                                            @endforeach
                                        </tbody>
                                        </table>
                                        <nav>
                                        {{ $workplans->links() }}
                                        </nav>
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
@endsection


@section('javascript')
<script>
@if(Session::get('message'))
      <script>
        $(document).ready(function(){
          showToastr('success',"{{ session('message') }}");
        });
      </script>
@endif
</script>
@endsection
