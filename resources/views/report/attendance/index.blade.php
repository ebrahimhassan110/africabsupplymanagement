@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Attendance Report' }}</span>

                    </div>
                    <div class="card-body p-2">
                      <table>
                          <form method="post" action="{{ route('attendance-report') }}">
                              @csrf
                          <tr style="height: 40px;">

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
                                          Status
                                      </td>
                                      <td style="width: 24%;" valign="top">
                                          <select name="status" class="form-control select2" data-placeholder="choose status" style="width:90%;">
                                            <option></option>
                                            <option value="0">All</option>
                                            @foreach($statuses as $status)
                                              <option value="{{$status->statusId}}">{{$status->statusName}}</option>
                                            @endforeach
                                          </select>
                                      </td>


                                  </tr>
                                  <tr style="height: 40px;">
                                      <td valign="top">
                                          From Date
                                      </td>
                                      <td valign="top">
                                          <input name="start_date" type="text" value="@if(isset($_start_date)) {{ $_start_date }} @endif" class="form-control date" style="width:90%;" required>
                                      </td>
                                      <td valign="top">
                                          To Date
                                      </td>
                                      <td valign="top">
                                          <input name="end_date" type="text" value="@if(isset($_end_date)) {{ $_end_date }} @endif" class="form-control date" style="width:90%;" required>
                                      </td>
                                  </tr>
                                  <tr style="height: 40px;">

                                      <td valign="top" colspan="4">
                                          <input type="submit" name="ctl00$ContentPlaceHolder1$btnsearch" value="Search" id="ctl00_ContentPlaceHolder1_btnsearch" class="btn btn-primary btn-sm">
                                          <input type="submit" name="ctl00$ContentPlaceHolder1$btnexit" value="Cancel" id="ctl00_ContentPlaceHolder1_btnexit" class="btn btn-primary btn-sm">
                                      </td>
                                  </tr>
                                  <tr>
                            </form>
                      </table>

                        <table class="table table-responsive-sm table-striped datatable">
                        <thead>
                          <tr>
                            <th> SN </th>
                            <th> Date</th>
                            <th> Employee</th>
                            <th> Time In</th>
                            <th> Time Out</th>
                            <th> Status </th>
                            <th> Comment </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($attendance_report_data as $key=>$attendance)
                            <tr>
                              <td> {{   ($key+1) }}</td>
                              <td> {{   $attendance->created_at  }} </td>
                              <td> {{   $attendance->name  }} </td>
                              <td> {{   is_null($attendance->regtime) ? '-':$attendance->regtime  }} </td>
                              <td> {{   is_null($attendance->outtime) ? '-':$attendance->outtime  }} </td>
                              <td> {{   is_null($attendance->status) ? 'Absent' : $attendance->status  }} </td>
                              <td> {{   $attendance->comment  }} </td>
                            </tr>
                          @endforeach
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
