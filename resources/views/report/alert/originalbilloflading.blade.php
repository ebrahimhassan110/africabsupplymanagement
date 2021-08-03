@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'ORG B/L RCVD' }}</span>

                    </div>
                    <div class="card-body p-2">
                

                        <table class="table table-responsive-sm table-striped datatable">
                        <thead>
                          <tr>
                            <th> SN </th>
                            <th> Supplier Name</th>
                            <th> PFI No</th>
                            <th> PO Number</th>
                            <th> Goods Value</th>
                            <th> BL No </th>
                            <th>ETD </th>
                            <th> Date Created </th>
                            <th> Status</th>
                            <th> Action</th>
                          </tr>
                          
                        </thead>
                        <tbody>
                          @foreach($orgBillOfLading as $key=>$pre)
                            <tr>
                              <td> {{   ($key+1) }}</td>
                              <td> @if(isset($pre->supplier_name)) {{ $pre->supplier_name }} @endif </td>
                              <td> {{   $pre->pfi_no  }} </td>
                              <td> {{   is_null($pre->po_number) ? '-':$pre->po_number  }} </td>
                              <td> {{   is_null($pre->goods_value) ? '-':$pre->goods_value  }} </td>
                              <td> {{   is_null($pre->bl_no) ? '-' : $pre->bl_no  }} </td>
                              <td> {{   $pre->etd  }} </td>

                              <?php
                                $d=$pre->created_at;
                                $d=date_create($d);
                               ?>
                               <td> {{   date_format($d,'d/m/Y')  }} </td>    
                                <td> <?php  if($pre->time=='OVER')  {
                                  echo "OVERTIME";
                                }
                                else{
                                  echo "LESSTIME";
                                }
                                ?>
                                 </td>    
                                  <td>
                                    <a class="btn btn-success btn-sm  view" href="{{ url('/shipment-process-get/' . $pre->id. '') }}" data-shipmentid="{{ $pre->id }}"  type="button" data-toggle="modal" data-target="#myModal">Process</a>
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
                <form method="post" action="{{ route('addoriginalbillofladingattachement') }}" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="shipmentid" id="shipmentid"/>
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
