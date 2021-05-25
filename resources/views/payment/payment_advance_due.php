@extends('dashboard.base')

@section('content')


        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Add Payment' }}</span>
                      @if(in_array("payment-add", $all_permission))
                        <a href="{{route('Workflow.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a>
                      @endif
                    </div>
                    <div class="card-body p-2">
                <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                                        
                                    <td colspan="6">
                                    <table class="table table-responsive-sm table-striped datatable mt-4">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Date</th>
                                            <th>Supplier</th>
                                            
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
                                            
                                            
                                            <td> {{$payment->pfi_no}} </td>
                                            <td> {{ number_format( $payment->pfi_value,2) }}</td>
                                            <td>{{ number_format( $payment->advance_paid,2) }}</td>
                                            
                                           
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
