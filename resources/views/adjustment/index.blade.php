@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Adjustment' }}</span>
                      @if(in_array("adjustment-add", $all_permission))
                        <a href="{{route('adjustment.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a>
                      @endif
                    </div>
                    <div class="" ass="card-body">
						<div class="table-responsive">
                                <table width="100%">
                                    <tbody>
									
										<tr>
											<td colspan="5">
												<table class="table table-responsive-sm table-striped datatable" id="table" cellspacing="0" cellpadding="0" border="0" id="ctl00_ContentPlaceHolder1_dgshipmentInfo" style="border-style:None;width:100%;border-collapse:collapse;">
												  <tbody>
														<tr class="sorting_asc" align="left" valign="top" style="font-weight:bold;">
														   <td align="left">SNo.</td><td align="left">Date</td><td align="left">PFI No</td><td align="left">Amount</td>
														</tr>
														@foreach($adjustments as $key=>$shipment)
															<tr>
																<td> {{ ($key + 1 ) }} </td>
																<td> {{ date('d/m/Y',strtotime($shipment->created_at)) }}</td>
																<td> {{ $shipment['from_booking']->pfi_no }}</td>
																
                                <td > {{ $shipment->transfer_value }}</td>
																<td class="d-flex flex-row">
                           
                                  <a hidden class="btn btn-success btn-sm mb-1 view" href="{{ url('/adjustment/' . $shipment->id. '/view') }}" data-shipmentid="{{ $shipment->id }}" type="button" data-toggle="modal" data-target="#myModal">View</a>
                                  @if(in_array("adjustment-edit", $all_permission))
                                  <a hidden href="{{ url('/adjustment/' . $shipment->id. '/edit') }}" class="btn  btn-primary btn-sm mb-1">Edit</a>
                                  @endif
                                  @if(in_array("adjustment-delete", $all_permission))
                                  <form hidden  action="{{ route('adjustment.destroy', $shipment->id  ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item'); ">
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

</script>
@if(Session::get('message'))
      <script>


        $(document).ready(function(){
          showToastr('success',"{{ session('message') }}");
        });
      </script>
@endif
@endsection
