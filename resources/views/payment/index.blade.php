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
                                            <form method="post" action="{{ route('workplan-filter') }}">
                                                  @csrf
                                              <tr style="height: 40px;">
                                              <td style="width: 10%;" valign="top">
                                                  Supplier
                                              </td>
                                  						<td style="width: 23%;" valign="top">
                                  									<select  name="supplier" class="form-control select2" data-placeholder="choose payment" style="width:90%;">
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
        
                                            </tr>
                                            <tr style="height: 40px;">
                                                <td valign="top">
                                                    From Date
                                                </td>
                                                <td valign="top">
                                                    <input name="start_date" type="text" value="{{old('start_date')}}" class="form-control date" style="width:90%;">

                                                </td>
                                                <td valign="top">
                                                    To Date
                                                </td>
                                                <td valign="top">
                                                    <input name="end_date" type="text"  value="{{old('end_date')}}" class="form-control date" style="width:90%;">

                                                </td>
                                                
                                            </tr>
                                            
                                            <tr>
                                    </form>
                                    <td colspan="6">
                                    <table class="table table-responsive-sm table-striped datatable">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                        
                                                        <th>Supplier</th>
                                                        <th>Company</th>
                                            <th>PFI Number</th>
                                            <th>PFI Value</th>
                                            
                                                    <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                            @foreach($prebookings as $prebooking)
                                            <tr>
                                            <td>{{$prebooking->id}}</td>
                                            <td>@if(isset($prebooking->supplier->supplier_name)) {{ $prebooking->supplier->supplier_code }} {{ $prebooking->supplier->address }} @endif  </td>
                                            <td>{{$prebooking->company_name}}</td>
                                            
                                            <td> {{$prebooking->pfi_no}} </td>
                                            <td> {{ number_format( $prebooking->pfi_value,2) }}</td>
                                            <td>{{ number_format( $prebooking->pfi_value,2) }}</td>
                                            
                                            <td class="d-flex flex-row">
                                                <a class="btn btn-success btn-sm mb-1 view" href="{{ url('/prebooking/' . $prebooking->id. '/view') }}" data-prebookingid="{{ $prebooking->id }}" type="button" data-toggle="modal" data-target="#myModal">View</a>
                                                 @if(in_array("prebooking-add", $all_permission))
                                                <a  href="{{ route('payment.addpayment', $prebooking->id) }}" class="btn  btn-primary btn-sm">Add</a>
                                                @endif
                                                @if(in_array("prebooking-edit", $all_permission))
                                                <a hidden href="{{ url('/prebooking/' . $prebooking->id . '/edit') }}" class="btn  btn-primary btn-sm">Edit</a>
                                                @endif
                                                @if(in_array("prebooking-delete", $all_permission))
                                                <form action="{{ route('prebooking.destroy', $prebooking->id  ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item'); ">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                                @endif
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                        <nav>
                                        {{ $prebookings->links() }}
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
