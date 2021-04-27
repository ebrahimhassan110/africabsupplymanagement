@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Supplier A/C Report' }}</span>

                    </div>
                    <div class="card-body p-2">
                      <table>
                          <form method="post" action="{{ route('supplier-individual-report') }}">
                              @csrf
                          <tr style="height: 40px;">

                                  <td style="width: 10%;" valign="top">
                                      Supplier
                                  </td>

                                      <td style="width: 23%;" valign="top">
                                      <select name="supplier"  class="form-control select2" data-placeholder="choose supplier" style="width:90%;">
                                          <option></option>
                                          <option value="0">All</option>
                                         @foreach($suppliers as $sup)
                                              @php
                                                  $selected = 0;
                                                  if(  isset($_supplier) AND  $_supplier == $sup->id)
                                                      $selected = "selected";
                                              @endphp

                                              <option {{ $selected }} value="{{$sup->id}}">{{ $sup->supplier_name }} {{ '('.$sup->supplier_code.')' }}</option>
                                          @endforeach

                                      </select>
                                      </td>
                                    


                                  </tr>
                                  <tr style="height: 40px;">
                                      <td valign="top">
                                          From Date
                                      </td>
                                      <td valign="top">
                                          <input required name="start_date" type="text" value="@if(isset($_start_date)) {{ $_start_date }} @endif" class="form-control date" style="width:90%;" required>
                                      </td>
                                      <td valign="top">
                                          To Date
                                      </td>
                                      <td valign="top">
                                          <input required name="end_date" type="text" value="@if(isset($_end_date)) {{ $_end_date }} @endif" class="form-control date" style="width:90%;" required>
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
                            <th> Supplier Name</th>
                            <th> PFI No</th>
                            <th> PO Number</th>
                            <th> PFI Value</th>
                            <th> Shipped Value </th>
                            <th> Advance Paid </th>
                             <th> Payment Paid </th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($prebookings as $key=>$pre)
                            <tr>
                              <td> {{   ($key+1) }}</td>
                              <td> {{   $pre->supplier->supplier_name  }} </td>
                              <td> {{   $pre->pfi_no  }} </td>
                              <td> {{   is_null($pre->po_number) ? '-':$pre->po_number  }} </td>
                              <td> {{   is_null($pre->pfi_value) ? '-':$pre->pfi_value  }} </td>
                              <td> {{   is_null($pre->shipped_value) ? '-' : $pre->shipped_value  }} </td>
                              <td> {{   $pre->advance_paid  }} </td>
                               <td> {{   $pre->actual_paid  }} </td>    
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
