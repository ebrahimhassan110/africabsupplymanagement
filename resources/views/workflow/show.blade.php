@extends('dashboard.base')

@section('content')
                @if(Session::has('message'))
                <div class="row">
                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                </div>
                @endif
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Workplan' }}</span>
                      <a href="{{ route('register') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a>
                    </div>
                    <div class="card-body p-2">

                    <form action="{{ route('Workflow.store') }}" method="post">
                    @csrf
                    <div class="form-group">
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
                    <div class="form-group">
                        <label class="form-col-form-label" for="inputSuccess1">Employee</label>
                        <select  class="form-control select2" name="employeeId" data-placeholder="select employee" required>
                            @php
                                $employees = \DB::table('users')->get();
                            @endphp
                            <option></option>
                            @foreach($employees as $employee)
                                @php
                                    $selected = 0;
                                    if(  isset($workplan->employeeId) AND  $workplan->employeeId == $employee->id)
                                        $selected = "selected";
                                @endphp

                                <option {{ $selected }} value="{{$employee->id}}">{{ $employee->name }} {{ '('.$employee->tel.')' }}</option>
                            @endforeach



                        </select>

                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
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
                    <div class="form-group">
                        <label class="form-col-form-label" for="inputSuccess1">From Date</label>
                        <input type="text" name="startdate" class="form-control date" value="{{ date('d/m/Y',strtotime($workplan->startdate))}}" required >
                        <div class="invalid-feedback">Please select from date</div>
                    </div>
                    <div class="form-group">
                        <label class="form-col-form-label" for="inputSuccess1">Target hour</label>
                        <input type="text" name="targethour" class="form-control" value="{{  $workplan->targethour }}" required >
                        <div class="invalid-feedback">Please select from date</div>
                    </div>
                    <div class="form-group">
                        <label class="form-col-form-label" for="inputSuccess1">Start Time</label>
                        <input type="text" length="2" max="2" min="0" name="starttime" class="form-control" value="{{ $workplan->starttime }}" required >
                        <div class="invalid-feedback">Please select from date</div>
                    </div>

                    <div class="form-group">
                        <label class="form-col-form-label" for="inputSuccess1">Remark</label>
                        <textarea name="remark" class="form-control form-control-xl"> {{ $workplan->remark }}  </textarea>
                        <div class="invalid-feedback">Please enter remark</div>
                    </div>
                    <div class="form-group">
                        <label class="form-col-form-label" for="inputSuccess1">Status</label>
                        <select name="status"  class="form-control select2" data-placeholder="select status" required >
                            <option selected="selected" value="0">-Select-</option>
                            <option value="Complete">Complete</option>
                            <option value="Paid">Paid</option>
                            <option value="Pending">Pending</option>
                        </select>
                        <div class="invalid-feedback">Please enter remark</div>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="submit"  class="btn btn-primary">

                    </div>

                    </form>

                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection


@section('javascript')

@endsection
