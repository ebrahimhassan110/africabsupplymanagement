@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Add Customer' }}</span>
                        @if(in_array("customer-add", $all_permission))
                          <a href="{{route('customer.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a>
                        @endif
                    </div>
                    <div class="card-body p-2">
                <div class="table-responsive">
                <table cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                                            <tr>
                                    <td colspan="6">
                                        <table class="table" cellspacing="0" cellpadding="0" border="0" id="table" name="table" style="border-style:None;width:100%;border-collapse:collapse;">
                                            <thead>
                                                <tr class="sorting_asc" align="left" valign="top" style="font-weight:bold;">
                                                  <td>S/No.</td><td>Trading Name</td><td>Contact No</td><td>Email Address</td><td>Address</td><td>Tin No</td><td>Vrn No</td><td align="center" valign="middle">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $sn = 1;
                                            @endphp
                                            @foreach($customers as $c)
                                                <tr>
                                                    <td>{{ $sn }}</td>
                                                    <td>{{ $c->name }}</td>
                                                    <td>{{ $c->tel }}</td>

                                                    <td>{{ $c->email }}</td>
                                                    <td>{{ $c->address }}</td>
                                                    <td>{{ $c->tinno }}</td>
                                                    <td>{{ $c->vrnno }}</td>

                                                    <td class="d-flex flex-row">
                                                        <a class="btn btn-success btn-sm mb-1 view" href="{{ url('/customer/' . $c->customerId. '/edit') }}" data-customerId="{{ $c->customerId }}" type="button" data-toggle="modal" data-target="#myModal">View</a>
                                                      @if(in_array("customer-edit", $all_permission))
                                                        <a href="{{ url('/customer/' .  $c->customerId . '/edit') }}" class="btn  mb-1 btn-primary btn-sm">Edit</a>
                                                      @endif
                                                      @if(in_array("customer-delete", $all_permission))
                                                      <form action="{{ route('customer.destroy', $c->customerId  ) }}" method="POST">
                                                          @method('DELETE')
                                                          @csrf
                                                          <button class="btn btn-danger btn-sm">Delete</button>
                                                      </form>
                                                      @endif
                                                    </td>
                                                </tr>

                                                @php
                                                    $sn++
                                                @endphp
                                            @endforeach
                                        </tbody>
                                        </table>

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

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h4 class="modal-title">Customer Details </h4>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                 <p>Loading ....... …</p>
               </div>
               <div class="modal-footer">
                 <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>

               </div>
             </div>
             <!-- /.modal-content-->
           </div>
           <!-- /.modal-dialog-->
         </div>

@endsection


@section('javascript')


<script type="text/javascript">



$(document).ready( function () {
    $('#table').DataTable();
});


</script>

<script>
$(".table").on("click",".view",function(){

    var customerId = $(this).data('customerid');

    $.ajax({
      type: "GET",
      url: "customer/"+customerId,
      beforeSend: function(){
        $("#loader").show();
      },
      success: function(data){
          $("#myModal .modal-body").html(data);
          $("#loader").hide();
      },
      error: function(data){
        $("#myModal .modal-body").html(data);
      }
    });

});


$("#myModal").on("hidden.bs.modal",function(){

    $(this).find(".modal-body").html("Loading .....");
});

</script>
@if(Session::get('message'))
      <script>


        $(document).ready(function(){
          showToastr('success',"{{ session('message') }}");
        });
      </script>
@endif
@endsection
