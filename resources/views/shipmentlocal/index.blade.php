@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Local Shipments' }}</span>
                      @if(in_array("shipment-add", $all_permission))
                        <a href="{{route('shipment_local.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a>
                      @endif
                    </div>
                    <div class="card-body">
					       	<div class="table-responsive">
                               
											 <table class="table table-responsive-sm table-striped datatable">
												  <tbody>
														<tr >
														   <td align="left">SNo.</td><td align="left">Date</td><td align="left">CFI No</td><td align="left">Amount</td> <td>Status</td><td> Action </td>
														</tr>
														@foreach($shipments as $key=>$shipment)
															<tr>
																<td> {{ ($key + 1 ) }} </td>
																<td> {{ date('d/m/Y',strtotime($shipment->created_at)) }}</td>
																<td> {{ $shipment->cfi_no }} </td>
																<td > {{ number_format($shipment->goods_value,2) }} </td>
                                <td >   @if(empty($shipment->bl_no))
                                    {{'Pending'}}
                                    @else
                                     {{'Complete'}}
                                     @endif
                                 </td>
																<td class="d-flex flex-row">

                                  <a class="btn btn-success btn-sm mb-1 view" href="{{ url('/shipment/' . $shipment->id. '/view') }}" data-shipmentid="{{ $shipment->id }}" type="button" data-toggle="modal" data-target="#myModal">View</a>
                                  @if(in_array("shipment-edit", $all_permission) && empty($shipment->bl_no))
                                   <a class="btn btn-info btn-sm mb-1 viewcompleteship" href="{{ url('/shipment/' . $shipment->id. '/view') }}" data-shipmentid="{{ $shipment->id }}" type="button" data-toggle="modal" data-target="#myModal2">Mark as Shipped</a>

                                  <a hidden href="{{ url('/shipment_local/' . $shipment->id. '/edit') }}" class="btn  btn-primary btn-sm mb-1">Edit</a>
                                  @endif
                                  @if(in_array("shipment-delete", $all_permission))
                                  <form action="{{ route('shipment.destroy', $shipment->id  ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this shipment'); ">
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
        </div>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h4 class="modal-title">Shipment Details </h4>
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

          <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h4 class="modal-title">Complete Shipment </h4>
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

    var shipmentId = $(this).data('shipmentid');

    $.ajax({
      type: "GET",
      url: "shipment/"+shipmentId ,
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




$(".table").on("click",".viewcompleteship",function(){

    var shipmentId = $(this).data('shipmentid');

    $.ajax({
      type: "GET",
      url: "shipment_local/complete/"+shipmentId ,
      beforeSend: function(){
        $("#loader").show();
      },
      success: function(data){
          $("#myModal2 .modal-body").html(data);
          $("#loader").hide();
      },
      error: function(data){
        $("#myModal2 .modal-body").html(data);
      }
    });

});



$("#myModal2").on("hidden.bs.modal",function(){

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
