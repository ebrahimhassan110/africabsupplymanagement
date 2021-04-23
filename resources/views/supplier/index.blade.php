@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Add Supplier' }}</span>
                        @if(in_array("supplier-add", $all_permission))
                          <a href="{{route('supplier.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add Supplier</a>
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
                                               <td> </td>   <td>Supplier Code</td><td>Company Name</td><td>Address</td><td>City</td><td>District</td><td>Country</td><td align="center" valign="middle">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @php
                                                $sn = 1;
                                            @endphp
                                            @foreach($suppliers as $c)
                                                <tr>
                                                    <td>{{ $sn }}</td>
                                                    <td>{{ $c->supplier_code }}</td>
                                                    <td> @if(isset($c->company->name)) {{  $c->company->name }} @endif </td>
                                                    <td>{{ $c->adress }}</td>
                                                    <td>{{ $c->city }}</td>
                                                    <td>{{ $c->district }}</td>
                                                    <td>{{ $c->country }}</td>

                                                    <td class="d-flex flex-row">
                                                        <a class="btn btn-success btn-sm mb-1 view" href="{{ url('/supplier/' . $c->id. '/view') }}" data-customerId="{{ $c->id }}" type="button" data-toggle="modal" data-target="#myModal">View</a>
                                                      @if(in_array("supplier-edit", $all_permission))
                                                        <a href="{{ url('/supplier/' .  $c->id . '/edit') }}" class="btn  mb-1 btn-primary btn-sm">Edit</a>
                                                      @endif
                                                      @if(in_array("supplier-delete", $all_permission))
                                                      <form action="{{ route('supplier.destroy', $c->id  ) }}" method="POST">
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
                 <h4 class="modal-title">Supplier Details </h4>
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
      url: "supplier/view/"+customerId,
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
