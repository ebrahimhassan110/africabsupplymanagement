@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'WorkPlan Report' }}</span>

                    </div>
                    <div class="card-body p-2">
                      <table>
                          <form method="post" action="{{ route('workplan-report') }}">
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

                                              <option {{ $selected }} value="{{$employee->name}}">{{ $employee->name }} {{ '('.$employee->tel.')' }}</option>
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
                                              <option value="{{$status->id}}">{{$status->description}}</option>
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
                              <th> Day of Week</th>

                            <th> Employee</th>
                            <th>WorkType</th>
                             <th>Duration (hrs)</th>
                            <th>Status</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                          <?php  $dateold;  $i=0;?>
                          @foreach($workplan_report_data as $key=>$attendance)
                            <tr>
                              <?php 
                            $ttemp= $attendance->created_at;
                             $i++;
                             $display=1;
                                 ?>
                              <td>@if($display   ) {{ ($i) }} @endif</td>
                              <td>   @if($display) {{ $attendance->created_at  }}  @endif </td>
                                <td> <?php if(isset($attendance->start_time)){
                                  $d= $attendance->startdate; 
                                  $d=str_replace("/","-",$d);
                                  $d=date('Y-m-d', strtotime($d));  
                                 $d=date('l', strtotime($d));  
                                } 
                                  else {
                                    $d="No date";
                                  } ?> {{   $d  }} </td>
                              <td> {{   isset($attendance->Employee->name) ? $attendance->Employee->name:""  }} </td>
                              <td>     @if(isset($attendance->worktype->worktypeName)) {{ $attendance->worktype->worktypeName  }} @endif </td>
                                <td>     <?php  if(isset($attendance->start_time) && isset($attendance->end_time)) {

                                  $time1 = strtotime($attendance->end_time);  // 2012-12-06 23:56
                                   $time2 = strtotime($attendance->start_time);  // 2012-12-06 00:21
                                  $dif= ($time1 - $time2)/(60*60);
                                   }
                                   else{
                                    $dif ="End time not specified";
                                   }

                                  ?>
                                  {{$dif}}
                                </td>
                               <td>    @if(isset($attendance->work_status->description)) {{$attendance->work_status->description  }} @endif </td>
                             
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
