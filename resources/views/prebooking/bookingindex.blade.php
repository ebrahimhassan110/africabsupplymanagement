@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Bookings' }}</span>
                      <a href="{{route('prebooking.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a>
                    </div>
                    <div class="card-body p-0">

                        <table class="table table-responsive-sm table-striped datatable">
                        <thead>
                          <tr>
                            <th>ID</th>
                          
							<th>Supplier</th>
							  <th>Company</th>
                            <th>PFI Number</th>
                            <th>Lpo No</th>
							<th></th>

                          </tr>
                        </thead>
                        <tbody>

                            @foreach($prebookings as $prebooking)
                            <tr>
                              <td>{{$prebooking->id}}</td>
                              <td>{{$prebooking->supplier->supplier_code}}</td>
                              <td>{{$prebooking->company_name}}</td>
                              <td>{{$prebooking->pfi_no}}</td>
                              <td>{{ $prebooking->po_number }}</td>
                              <td class="d-flex flex-row">
                                  <a class="btn btn-success btn-sm  view" href="{{ url('/prebooking/' . $prebooking->id. '/view') }}" data-prebookingid="{{ $prebooking->id }}" type="button" data-toggle="modal" data-target="#myModal">View</a>
                             
                                    @if(in_array("prebooking-edit", $all_permission))
                                      <a hidden href="{{ url('/prebooking/' . $prebooking->id . '/edit') }}" class="btn  btn-primary btn-sm">Edit</a>
                                    @endif
                                    @if(in_array("prebooking-delete", $all_permission))
                                      <form action="{{ route('prebooking.removebooking', $prebooking->id  ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item'); ">
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
                 <h4 class="modal-title">Booking Details </h4>
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
<script>
$(".table").on("click",".view",function(){

    var customerId = $(this).data('prebookingid');

    $.ajax({
      type: "GET",
      url: "prebooking/"+customerId,
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
