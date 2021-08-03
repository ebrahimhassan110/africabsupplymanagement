@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Custom Declaration Alert Center ' }}</span>
                    </div>
                    <div class="card-body">
                        <table class="table table-responsive-sm table-striped datatable">
                        <thead>
                            <tr>
                            <th>SNo.</th>
                            <th>Date</th>
                            <th>CFI No</th>
                            <th>Amount</th>
                            <th>Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($customdeclarational as $key=>$shipment)
                              <tr>
                                <td> {{ ($key + 1 ) }} </td>
                                <td> {{ date('d/m/Y',strtotime($shipment->created_at)) }}</td>
                                <td> {{ $shipment->cfi_no }} </td>
                                <td > {{ number_format($shipment->goods_value,2) }} </td>
                                <td class="d-flex flex-row">
                                  <a class="btn btn-success btn-sm mb-1 view" href="{{ url('/shipment/' . $shipment->id. '/view') }}" data-shipmentid="{{ $shipment->id }}" type="button" data-toggle="modal" data-target="#myModal">Add Attachment</a>
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
                 <h4 class="modal-title">ATTACHMENT CONTROL DOCS </h4>
                 <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               </div>
               <div class="modal-body">
                <form method="post" action="{{ route('addshipmentattachment') }}" enctype="multipart/form-data">
                  @csrf
                  <input type="text" name="shipmentid" id="shipmentid"/>
                  <div class="form-group">
                    <label>File Number</label>
                    <input type="text" class="form-control form-control-sm" name="file_no" /required>
                  </div>

                  <div class="form-group">
                    <label>Attachement</label>
                    <input type="file" class="form-control form-control-sm" name="attachment" required/>
                  </div>
                  <div class="form-group">
                    <label>Attachement Description</label>
                    <textarea class="form-control form-control-sm" name="description" required></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" class="btn btn-primary" name="submit">
                  </div>
                 </div>
                </form>
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
    var shipmentid = $(this).data('shipmentid');
    $("#shipmentid").val(shipmentid);
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
