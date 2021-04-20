@extends('dashboard.base')

@section('content')
        @if(Session::has('message'))
        <div class="row">
          <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
        </div>
        @endif

        <div class="container-fluid">
          <div class="animated fadeIn">
            @if(count($errors))
            <div class="row">
              <div class="col-sm-12">
                  <div class="form-group">
                      <div class="alert alert-danger">
                          <ul>
                              @foreach($errors->all() as $error)
                                  <li>{{$error}}</li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
              </div>
              </div>
              @endif

              @if(Session::has('message'))
              <div class="row">
                <div class="col-sm-12">
                  <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                </div>
              </div>
              @endif

              @if(Session::has('error'))
              <div class="row">
                <div class="col-sm-12">
                  <div class="alert alert-danger" role="alert">{{ Session::get('error') }}</div>
                </div>
              </div>
              @endif

            <div class="row">
              <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Workplan' }}</span>
                    </div>
                    <div class="card-body p-2">
                    <form action="{{ route('Workflow.update',$workplan->workorderId) }}" method="post">
                      @method("put")
                      @csrf
                    <div class="form-group row">
                      <div class="col-md-6">
                        <label class="form-col-form-label" for="inputSuccess1">Employee</label>
                        <select  class="form-control select2" name="employeeId" data-placeholder="select employee" required>
          								@php
          									$employees = \DB::table('users')->get();
          								@endphp
          								<option></option>
          								@foreach($employees as $employee)
          									@php
          										$selected = 0;
          										if(  isset($workplan->employeeId) AND $workplan->employeeId == $employee->id)
          											$selected = "selected";
          									@endphp

          									<option {{ $selected }} value="{{$employee->id}}">{{ $employee->name }} {{ '('.$employee->tel.')' }}</option>
          								@endforeach
          							</select>
                        <div class="invalid-feedback"></div>
                      </div>
                      <div class="col-md-6">
                        <label class="form-col-form-label" for="inputSuccess1">Customer</label>
                        <select  class="form-control select2" name="customerId" data-placeholder="select customer" required>
                          <option></option>
                            @php
                              $customers = \DB::table('tbcustomer')->get();
                            @endphp
                            @foreach($customers as $customer)
                              @php
                                $selected = 0;
                                if(  isset($workplan->customerId ) AND  $workplan->customerId == $customer->customerId)
                                  $selected = "selected";
                              @endphp
                              <option {{$selected}} value="{{$customer->customerId}}">{{ $customer->name }} {{ '('.$customer->tel.')' }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback"></div>
                      </div>
                    </div>

          <div class="form-group row availability_details p-0 m-0">
          </div>
              <div class="form-group row">
                    <div class="col-md-6">
                      <label class="form-col-form-label" for="inputSuccess1">Work Type</label>
                      <select  class="form-control select2" name="worktypeId" data-placeholder="select employee" required>
        								<option></option>
        								<option value="0">All</option>
        								@php
        									$worktypes = \DB::table('tbworktype')->get();
        								@endphp
        								 @foreach($worktypes as $worktype)
        								@php
        									$selected = 0;
        									if(  isset($workplan->worktypeId) AND $workplan->worktypeId == $worktype->worktypeId)
        										$selected = "selected";
        								@endphp
        								<option {{ $selected }} value="{{ $worktype->worktypeId }}">{{ $worktype->worktypeName }}</option>
        								@endforeach
        							</select>
                      <div class="invalid-feedback">Please Select Work Type</div>
                    </div>
                    <div class="col-md-6">
                      <label class="form-col-form-label" for="inputSuccess1">Remark</label>
                      <input type="text" name="remark" value="{{ $workplan->remark }}" class="form-control" >
                      <div class="invalid-feedback">Please enter remark</div>
                    </div>
                    </div>
                    <div class="form-group row" id="jqueryExample">
                        <div class="col-md-3">
                          <label class="form-col-form-label" for="inputSuccess1">From Date</label>
                          <input type="text" name="startdate" class="form-control datepicker start" value="{{ $workplan->startdate }}" required/>
                        </div>
                        <div class="col-md-3">
                          <label class="form-col-form-label" for="inputSuccess1">Start Time</label>
                          <input type="text"  name="time" value="{{date('H:i A',strtotime($workplan->start_time))}}" class="form-control time start" required/>
                          <input type="hidden"  name="end_time" class="form-control" value="{{ $workplan->end_time}}" required>
                          <input type="hidden" class="form-control" name="start_time" value="{{ $workplan->start_time }}"  id="start_time" />
                        </div>
                        <div class="col-md-3">
                          <label class="form-col-form-label" for="inputSuccess1">End Time</label>
                          <input type="text" class="form-control time end" name="time_end" value="{{ date('H:i A',strtotime($workplan->end_time)) }}" onchange="setEndTime()" />
                        </div>
                        <div class="col-md-3">
                          <label class="form-col-form-label" for="inputSuccess1">End Date</label>
                          <input type="text" class="form-control datepicker end" name="end_date" value="{{ date('d/m/Y',strtotime($workplan->end_time)) }}" />
                       </div>
                    </div>
                    <div class="row form-group" id="checkAvailability" style="display:none">
                    </div>
                    <div class="row form-group">
                      <div class="col-md-6">
                        <label class="form-col-form-label" for="inputSuccess1">Status</label>

                        <select name="status"  class="form-control select2" data-placeholder="select status" required >
                          <option selected="selected" value="0">-Select-</option>
                          @foreach($status as $stats)
                          @php
                            $selected = "";
                            if( $workplan->status == $stats->id)
                              $selected = "selected";
                          @endphp
                          <option {{$selected}} value="{{$stats->id}}">{{$stats->description}}</option>
                          @endforeach
                        </select>

                        <div class="invalid-feedback">Please enter remark</div>
                      </div>
                      <div class="col-md-6">
                          @if(count($helpers))
                            <label class='form-col-form-label' for='inputSuccess1'>Current Helper</label>
                            <select name="helperEmployeeId[]" class="form-control select2"  id="helperEmployeeId" data-placeholder="select helper" multiple="multiple">
                            @foreach($helpers as $helper)
                              <option selected value="{{$helper->id}}">{{$helper->name}}<span style="color:red">x</span></option>
                            @endforeach
                            </select>
                          @endif
                      </div>
                    </div>
                    <div class="form-group row">
                       <div class="col-md-6">
                          <label class='form-col-form-label' for='inputSuccess1'>Current Unavailable Helper</label>
                          <select name="unavailableHelperEmployeeId[]" class="form-control"  id="unavailablehelper" data-placeholder="select helper" multiple="multiple">
                          </select>
                       </div>
                       <div class="col-md-6">
                         <span class="p-0 m-0" id="helper" style="display:none;">
                           <label class='form-col-form-label' for='inputSuccess1'>Available Helper</label>
                           <select name="_helperEmployeeId[]" class="select2"  id="helperEmployeeId" data-placeholder="select helper" multiple="multiple">
                             <option></option>
                           </select>
                         </span>
                       </div>
                    </div>
                    <div class="form-group row">
                      <!-- <div class="col-md-4">
                        <input type="button" id="add_helper"  name="submit" value="Add Helper"  class="btn btn-primary">
                      </div> -->
                      <div class="col-md-6">
                        <input type="button" id="check_availability"  value="Check Availability"  class="btn btn-primary">
                      </div>
                      <div class="col-md-6">
                        <input type="submit" name="submit" value="update"  class="btn btn-primary">
                        <input type="hidden" name="getdate" id="getdate" value="gedate" value="{{old('getdate')}}">
                      </div>
                    </div>
                    </form>

                    </div>
                </div>
              </div>
              <div class="col-md-6 p-0">
                <div class="card ">
                  <div id='loading'></div>
                  <div id='calendar'></div>
                </div>
              </div>
            </div>
          </div>
        </div>
@endsection


@section('javascript')
<style>
.fc-toolbar.fc-header-toolbar {
 margin-bottom: 0.5em !important;
}
.fc-toolbar h2 {
    font-size: 1.3em !important;
    margin: 0 !important;
}

.fc-toolbar.fc-header-toolbar {
    margin-bottom: 0  !important;
}

.fc-button {
    padding: 0.2em 0.50em !important;
 }
</style>
<link href='{{ url("/fullcalendar/packages/core/main.css") }}' rel='stylesheet' />
<link href='{{ url("/fullcalendar/packages/daygrid/main.css") }}' rel='stylesheet' />
<link href='{{ url("/fullcalendar/packages/timegrid/main.css") }}' rel='stylesheet' />
<link href='{{ url("/fullcalendar/packages/list/main.css") }}' rel='stylesheet' />
<link href='{{ url("/css/jquery.timepicker.min.css") }}' rel='stylesheet' />
<script src='{{ url("/fullcalendar/packages/core/main.js") }}'></script>
<script src='{{ url("/fullcalendar/packages/interaction/main.js") }}'></script>
<script src='{{ url("/fullcalendar/packages/daygrid/main.js") }}'></script>
<script src='{{ url("/fullcalendar/packages/timegrid/main.js") }}'></script>
<script src='{{ url("/fullcalendar/packages/list/main.js") }}'></script>
<script src='{{ url("/fullcalendar/packages/popperjs/popper.min.js") }}'></script>
<script src='{{ url("/fullcalendar/packages/tooltip/tooltip.min.js") }}'></script>
<script src='{{ url("/js/moment.min.js") }}'></script>
<script src='{{ url("/js/jquery.timepicker.min.js") }}'></script>
<script src='{{ url("/js/jquery.datepair.min.js") }}'></script>

<script>
var employeeId = "{{$workplan->employeeId}}";
function onTimeChange(inputEle) {
  var timeSplit = inputEle.value.split(':'),
    hours,
    minutes,
    meridian;
  hours = timeSplit[0];
  minutes = timeSplit[1];
  if (hours > 12) {
    meridian = 'PM';
    hours -= 12;
  } else if (hours < 12) {
    meridian = 'AM';
    if (hours == 0) {
      hours = 12;
    }
  } else {
    meridian = 'PM';
  }
  alert(hours + ':' + minutes + ' ' + meridian);
}

function convertTime12to24(){
  var time12h = $("input[name='time']").val();
  const [time, modifier] = time12h.split(/(am|pm)/);
  let [hours, minutes] = time.split(':');
  if (hours === '12') {
    hours = '00';
  }
  if (modifier === 'PM' || modifier === 'pm') {
    hours = parseInt(hours, 10) + 12;
  }

  var start_date = $("input[name='startdate']").val();
  var _date = moment(start_date+" "+hours+":"+minutes+":00","DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");
  $("input[name='start_time']").val(_date);
}

$("input[name='time']").change(function(){
   convertTime12to24();
   setTimeout(function(){
     setEndTime();
   },100);
});

function setEndTime(){
  //var time12h = $(".time.end").val();
  var time12h = $("input[name='time_end']").val();
  const [time, modifier] = time12h.split(/(am|pm)/);
  let [hours, minutes] = time.split(':');

  if (hours === '12') {
    hours = '00';
  }
  if (modifier === 'PM' || modifier === 'pm') {
    hours = parseInt(hours, 10) + 12;
  }
  var end_date = $(".date.end").val();
  var start_date = $(".date.start").val();

  if( end_date != "" ){
    var _date = moment(end_date+" "+hours+":"+minutes+":00","DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");
  }
  else if( start_date != "" ){
    var _date = moment(start_date+" "+hours+":"+minutes+":00","DD/MM/YYYY HH:mm:ss").format("YYYY-MM-DD HH:mm:ss");
  }else{
    var _date = moment(new Date()).format("DD/MM/YYYY HH:mm:ss");
  }

  $("input[name='end_time']").val(_date);

}



$("input[name='startdate']").on('change',function(){
  convertTime12to24();
  setTimeout(function(){
    setEndTime();
  },100);
});

$('#jqueryExample .time').timepicker({
   'showDuration': true,
   'timeFormat': 'g:ia',
});

$('#jqueryExample .datepicker').datepicker({
   'format': 'm/d/yyyy',
   'autoclose': true,
   'startDate':"{{ date('d/m/Y',strtotime($workplan->start_time)) }}"

});

// initialize datepair
$('#jqueryExample').datepair();
<?php
  //$datetime = new DateTime('now', 'Africa/Dar_es_Salaam');
  $datetime = new DateTime('now', new DateTimeZone('Africa/Dar_es_Salaam'));
  $datetime_string = $datetime->format('c');
 ?>

document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'timeGridWeek',
        plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridYear,dayGridMonth,timeGridWeek,timeGridDay,listWeek'
        },
        editable: true,
        navLinks: true, // can click day/week names to navigate views
        eventLimit: true, // allow "more" link when too many events
        views: {
        timelineDay: {
          slotLabelFormat: ['H:mm'],
        },
        timelineMonth: {
          slotLabelFormat: ['DD'],
        },
      },
        eventClick: function(info) {

        },
        dateClick: function(info) {


        },
        navLinkDayClick: function(date, jsEvent) {
          var _date = moment(date).format("DD/MM/YYYY");
          convertTime12to24(_date);
          $("input[name='startdate']").val( _date);
          calendar.changeView('timeGridDay');
          calendar.gotoDate(date);
        },
        select: function(info) {

        },
        eventRender: function(info) {
            var tooltip = new Tooltip(info.el, {
                title: info.event.extendedProps.description,
                placement: 'top',
                trigger: 'hover',
                container: 'body'
            });
        },
        events: {
          @if(!is_null($workplan->employeeId) || trim($workplan->employeeId) != "")
          url: "{{ url('Workflow/getworkplan') }}",
          extraParams: {
            employeeId: employeeId,
          },
          @else


          @endif
        },
        loading: function(bool) {
          document.getElementById('loading').style.display =
              bool ? 'block' : 'none';
        },

    });

    calendar.render();

    $("input[name='startdate']").on('change', function() {
      var date = $(this).val();
      calendar.gotoDate(moment(date,"DD/MM/YYYY").format("YYYY-MM-DD"));
      calendar.changeView('timeGridDay');
    });

    $("select[name='employeeId']").change(function(){
      var date = $("input[name='startdate']").val();
      if(date != "")
        calendar.gotoDate(moment(date,"DD/MM/YYYY").format("YYYY-MM-DD"));

      var employeeId = $(this).val();
      calendar.removeAllEvents();
      calendar.addEventSource({
        url: "{{ url('Workflow/getworkplan') }}",
        extraParams: {
          employeeId: employeeId,
        },
      });
      calendar.changeView('timeGridDay');
    });


});


$("#add_helper").on("click",function(){
    var employeeId = $("select[name='employeeId'] option:selected").val();
    var _start_time = $("input[name='start_time']").val();
    var _end_time = $("input[name='end_time']").val();
    $.ajax({
      type: "post",
      data:{ start_time: _start_time,end_time: _end_time },
      url: "{{ url('/workplan/getfreehelper') }}",
      beforeSend: function(){
        $("#loader").show();
      },
      success: function(data){
          var select = "";
          $.each(data,function(key,value){
            if(value.id != employeeId ){
              select += "<option value='"+value.id+"'>"+value.name+" ("+value.tel+")</option>";
            }

          });
          select += "";
          $("#helper").show(select);
          $("#helper #helperEmployeeId").html(select);
          $("#loader").hide();

      }
    });

});

$("#check_availability").click(function(){
  var _workorderId = "{{ $workplan->workorderId }}";
  var _employeeId = $("select[name='employeeId'] option:selected").val();

  var _helperEmployeeId = $("#helperEmployeeId :selected").map(function(i, el) {
                            return $(el).val();
                          }).get();

  var _start_time = $("input[name='start_time']").val();
  var _end_time = $("input[name='end_time']").val();

  $.ajax({
    type: "post",
    data:{ workorderId: _workorderId,employeeId: _employeeId,start_time: _start_time,end_time: _end_time ,helperEmployeeId:_helperEmployeeId},
    url: "{{ url('/workplan/checkAvailability') }}",
    beforeSend: function(){
      $("#loader").show();
    },
    success: function(data){
      var sms = "<div class='col-lg-8'>"+data.message+"</div>";
      if(data.code == "1"){
        $("#checkAvailability").html(sms).css({"color":"green"}).show();
      }
      else{
        $("#checkAvailability").html(sms).css({"color":"red"}).show();
      }

      var select = "";
      $.each(data.helpers,function(key,value){
        if(value.id != employeeId ){
          select += "<option value='"+value.id+"'>"+value.name+" ("+value.tel+")</option>";
        }

      });


      select += "";
      $("#helper").show();
      $("#helper #helperEmployeeId").html(select);
      //check for current unavailable employee
      var employeesid = data.helpers.map(function(key,value){
        return key.id;
      });

      var index = -1;
      if( _helperEmployeeId != "undefined" && _helperEmployeeId.length > 0){
        var unavalablehelper = "";
        $.each(_helperEmployeeId,function(key,empid){
          index = employeesid.indexOf(parseInt(empid));

          if(index === -1){
            var  Id = $("#helperEmployeeId [value|='"+empid+"']").val();
            var name = $("#helperEmployeeId [value|='"+empid+"']").text();
            unavalablehelper += "<option selected value='"+Id+"'>"+name+"</option>";
          }
        });
      }

      if(unavalablehelper){
          $("#unavailablehelper").html(unavalablehelper).css("border","1px solid red");
      }else{
        $("#unavailablehelper").html("");
      }


    },complete:function(){
       $("#loader").hide();
    }
    });
});

</script>
@endsection
