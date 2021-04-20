@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Attendance' }}</span>

                    </div>
                    <div class="card-body p-2">
                        <form action="{{ route('attendance-search') }}" method="post">
                            @csrf
                         <div class="row form-group">
                            <div class="col-sm-2">
                                Date
                            </div>
                            <div class="col-sm-4 d-flex flex-row">
                                 <input name="attendance_date" type="text" value="<?php echo isset($date) ? date('d/m/Y',strtotime($date)):date('d/m/Y'); ?>" id="attendance_date" class="form-control date" style="width:170px;">
                                 <input type="submit" name="search" value="Search" class="btn btn-primary btn-sm">
                            </div>

                         </div>
                        </form>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                    <form action="{{ route('Attendance.store') }}" method="post">
                                    @csrf
                                    <table class="table table-responsive-sm table-striped" style="font-size: 14px;" >
                                        <thead>
                                            <tr>
                                                <th>S/No.</th><th>Employee Name</th> <th>Action</th><th align="center" colspan="2">Time-In</th><th align="center" colspan="2">Time-Out</th><th>Remark</th><th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $sn = 1;
                                            @endphp
                                            @foreach($attendance_data as $attendance)
                                                <tr>
                                                    <td>{{ $sn }}</td>
                                                    <td> @php echo isset($attendance->name) ?  $attendance->name  :""; @endphp </td>
                                                    <td>
                                                        <select  class="form-control" name="employeeId" data-placeholder="select employee" required>
                                                            <option></option>
                                                            @foreach($status as $stats)
                                                                <option value="{{$stats->id}}">{{ $stats->description }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        @if(isset($attendance->regtime) AND !is_null($attendance->created_by) AND  !Auth::user()->menu_role = 'admin')
                                                            <input type="text" class="time_in1 form-control" value="{{ explode(':',$attendance->regtime)[0] }}" name="time_in1" readonly>
                                                        @else
                                                            <select name="time_in1"   class="form-control time_in1">
                                                                <option selected="selected" value="00">00</option>
                                                                @for($i = 1; $i <= 23 ; $i++)
                                                                    @php
                                                                        $selected = "";
                                                                        if(isset($attendance->regtime) &&  explode(':',$attendance->regtime)[0] == str_pad( $i , 2 , '0' , 0 ) )
                                                                            $selected = "selected";
                                                                    @endphp
                                                                    <option value="{{ str_pad( $i , 2 , '0' , 0 ) }}" {{ $selected }}> {{ str_pad( $i , 2 , '0' , 0 ) }} </option>
                                                                    @endfor
                                                            </select>
                                                        @endif
													                          </td>
                                                    <td colspan="2" class="d-flex-inline flex-row">
                                                        @if(isset($attendance->regtime) AND !is_null($attendance->created_by) AND  !Auth::user()->menu_role = 'admin')
                                                            <input type="text" class="time_in2 form-control" value="{{ explode(':',$attendance->regtime)[1] }}" name="time_in2" readonly>
                                                        @else
                                                            <select name="time_in2"   class="form-control time_in2">
                                                                <option selected="selected" value="00">00</option>
                                                                @for($i = 1; $i <= 59 ; $i++)
                                                                    @php
                                                                        $selected = "";
                                                                        if(isset($attendance->regtime))
                                                                            if(isset(explode(':',$attendance->regtime)[1]) &&  explode(':',$attendance->regtime)[1] == str_pad( $i , 2 , '0' , 0 ))
                                                                                $selected = "selected";
                                                                    @endphp
                                                                    <option value="{{ str_pad( $i , 2 , '0' , 0 ) }}" {{ $selected }}> {{ str_pad( $i , 2 , '0' , 0 ) }} </option>
                                                                @endfor
                                                            </select>
                                                        @endif
                                                    </td>
													                          <td>
                                                         <select name="time_out1"   class="form-control time_out1">
                                                            <option selected="selected" value="00">00</option>
                                                                @for($i = 1; $i <= 23 ; $i++)
                                                                    @php
                                                                        $selected = "";
                                                                        if(isset($attendance->outtime) &&  explode(':',$attendance->outtime)[0] == str_pad( $i , 2 , '0' , 0 ) )
                                                                            $selected = "selected";
                                                                    @endphp
                                                                    <option value="{{ str_pad( $i , 2 , '0' , 0 ) }}" {{ $selected }}> {{ str_pad( $i , 2 , '0' , 0 ) }} </option>
                                                                @endfor
                                                        </select>
                                                    </td>
                                                    <td class="d-flex-inline flex-row">
                                                        <select name="time_out2"   class="form-control time_out2">
                                                            <option selected="selected" value="00">00</option>
                                                            @for($i = 1; $i <= 59 ; $i++)
                                                                @php
                                                                     $selected = "";
                                                                        if(isset($attendance->outtime))
                                                                            if(isset(explode(':',$attendance->outtime)[1]) &&  explode(':',$attendance->outtime)[1] == str_pad( $i , 2 , '0' , 0 ))
                                                                                $selected = "selected";
                                                                @endphp
                                                                <option value="{{ str_pad( $i , 2 , '0' , 0 ) }}" {{ $selected }}> {{ str_pad( $i , 2 , '0' , 0 ) }} </option>
                                                            @endfor
                                                        </select>
													                          </td>
                                                    <td><textarea class="remark" name="remark"> {{  $attendance->comment }}</textarea></td>
                                                    <td><a  class="btn btn-primary save">save </a></td>
                                                </tr>
                                                @php
                                                    $sn++
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <input type="hidden" name="total_rows" value="{{ $sn-- }}">
                                    <!-- <input type="submit" name="save" value="save" class="btn btn-primary"> -->
                                    </form>


                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection
<style>
    .table input[type='text']{
        width: 50px !important;
    }
</style>

@section('javascript')
<script>
      $(".table").on("click",".check_status",function(){
          var tr = $(this).closest("tr");
          var status = tr.find(".status");
          status.val($(this).val());
      });

      $(".table").on("click",".save",function(){
          var tr = $(this).closest("tr");
          var _status = tr.find(".status").val();
          var _employee = tr.find(".employee_id").val();
          var _time_in1 = tr.find(".time_in1").val();
          var _time_out1 = tr.find(".time_out1").val();
          var _time_in2 = tr.find(".time_in2").val();
          var _time_out2 = tr.find(".time_out2").val();
          var _remark = tr.find(".remark").val();
          tr.find(".time_in").find('.is-invalid').toggleClass('is-invalid is_valid');

          if(  _time_in1 == "" ){
              tr.find(".time_in1").addClass("is-invalid");
              alert("fill time in field");
              return;
          }

          _time_in = _time_in1+":"+_time_in2;
          console.log(_time_in);
           _time_out = _time_out1+":"+_time_out2;

          var _data = { status: _status, employee: _employee, time_in:_time_in,time_out: _time_out,remark:_remark };

          $.ajax({
              url: "{{ route('Attendance.store') }} ",
              type:"post",
              data: _data,
              dataType: "json",
              success:function(data){
                  showToastr('success',data.success);
                  tr.find(".checked").html('<span class="badge badge-success">Checked</span>');
              },error:function(data){
                  console.log(data);
              },beforeSend:function(){
                  showToastr('info',"processing please wait ..");
              }
          });

      });

</script>
@endsection
