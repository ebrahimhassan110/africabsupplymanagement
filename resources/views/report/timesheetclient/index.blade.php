@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Time Sheet For Client' }}</span>

                    </div>
                    <div class="card-body p-2 table-responsive">
                      <table class="table">
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
                                      Customer
                                  </td>

                                      <td style="width: 23%;" valign="top">
                                      <select name="customer"  class="form-control select2" data-placeholder="choose customer" style="width:90%;">
                                          <option></option>
                                          <option value="0">All</option>
                                         @foreach($customers as $employee)
                                              @php
                                                  $selected = 0;
                                                  if(  isset($_employee) AND  $_employee == $employee->id)
                                                      $selected = "selected";
                                              @endphp

                                              <option {{ $selected }} value="{{$employee->customerId}}">{{ $employee->name }} {{ '('.$employee->whatsappno.')' }}</option>
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
                          @foreach($customers as $cust)
`
                          <?php
                          $cname=$cust->name;
                          echo  "<h2> <b> $cname </b> </h2>"; 
                            ?>

                        <table class="table table-responsive-sm table-striped datatable">
                        <thead>

                          <tr>
                            <th>Employee </th>
                         <?php 
                         $custid=$cust->id;
                         $f=$first;
                         $e=$end;
                         $firstt=$first;
                         $endt=$end;
                             while (strtotime($first) <= strtotime($end)) {
                //echo "$date\n";
                              $dt = date("d/m",strtotime($first));
                          echo " <th> $dt </th>";
                $first = date ("Y-m-d", strtotime("+1 day", strtotime($first)));
                    }
                    $first=$firstt;
                    $endt=$endt;


                         ?>
                           
                          </tr>
                        </thead>
                        <tbody>
                          <?php  $dateold;  $i=0;?>
                         
                          <?php
                         // $users = \DB::table("users")->get();
                          foreach ($employees as $user) {

                            echo "<tr><td>  $user->name</td>";
                            $employeeId=$user->id;
                            $ft=$f;
                            $fe=$e;
                             while (strtotime($f) <= strtotime($e)) {
                //echo "$date\n";
                              $dt = date("m-d",strtotime($f));
                         // echo " <td> $dt </td>";
                           $f = date ("Y-m-d", strtotime("+1 day", strtotime($f)));
                           
                            $work=\DB::select("select sum(a) as b from ( select *,TIMESTAMPDIFF(SQL_TSI_MINUTE, start_time,end_time) a from `tbworkorder` where `employeeId` = '$employeeId' and `start_time` like '%$f%' and customerId='$custid' ) tb");
                          

                           $minute=$work[0]->b;
                           echo " <td> $minute </td>";
                        

                          }
                          $f=$ft;
                          $e=$fe;

                           echo "</tr>";


                           } 
                     ?>     

                         
                        </tbody>




                      </table>

                      @endforeach
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
