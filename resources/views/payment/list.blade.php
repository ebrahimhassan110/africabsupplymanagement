@extends('dashboard.base')

@section('content')


        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Add Payment' }}</span>
                      @if(in_array("workplan-add", $all_permission))
                        <a href="{{route('Workflow.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a>
                      @endif
                    </div>
                    <div class="card-body p-2">
                <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                                            <form method="post" action="{{ route('payment.filterbooking') }}">
                                                  @csrf
                                              <tr style="height: 40px;">
                                              <td style="width: 10%;" valign="top">
                                                  Supplier
                                              </td>
                                  						<td style="width: 23%;" valign="top">
                                  									<select  name="supplier" class="form-control select2" data-placeholder="choose supplier" style="width:90%;">
                                  										<option></option>
                                  										<option value="0">All</option>
                                  										@foreach($suppliers as $supplier)

                                  											@php
                                  												$selected = 0;
                                  												if(   old('supplier') == $supplier->id )
                                  													$selected = "selected";
                                  											@endphp
                                  											<option {{$selected}} value="{{$supplier->id}}">{{ $supplier->supplier_name }} {{ '('.$supplier->address.')' }}</option>
                                  										@endforeach
                                  									</select>
                                  						</td>
                                              <td valign="top">
                                                    From Date
                                                </td>
                                                <td valign="top">
                                                    <input name="start_date" type="text" value="{{old('start_date')}}" class="form-control date" style="width:90%;" required >

                                                </td>
                                                <td valign="top">
                                                    To Date
                                                </td>
                                                <td valign="top">
                                                    <input name="end_date" type="text"  value="{{old('end_date')}}" class="form-control date" style="width:90%;" required>

                                                </td>
                                            </tr>
                                            <tr style="height: 40px;">
                                            <td>
                                                <input class="btn btn-primary" type="submit" value="Search Booking">

                                            </td>
                                                
                                                
                                            </tr>
                                            
                                            <tr>
                                    </form>
                                    <td colspan="6">
                                    <table class="table table-responsive-sm table-striped datatable mt-4">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Supplier</th>
                                            <th>Company</th>
                                            <th>PFI Number</th>
                                            <th>PFI Value</th>
                                            <th>Amount</th>
                                            

                                        </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($payments as $key=>$payment)
                                            <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ date("d/m/Y",strtotime($payment->created_at))}}</td>
                                            <td>@if(isset($payment->supplier_name)) {{ $payment->supplier_code }} {{ $payment->address }} @endif  </td>
                                            <td>{{$payment->company_name}}</td>
                                            
                                            <td> {{$payment->pfi_no}} </td>
                                            <td> {{ number_format( $payment->pfi_value,2) }}</td>
                                            <td>{{ number_format( $payment->amount,2) }}</td>
                                            
                                           
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                        <nav>
                                        {{ $payments->links() }}
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
 
@if(Session::get('message'))

      <script>
        $(document).ready(function(){
          showToastr('success',"{{ session('message') }}");
        });
      </script>
@endif
 
@endsection
