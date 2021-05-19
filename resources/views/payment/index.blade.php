@extends('dashboard.base')

@section('content')


        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Add Payment' }}</span>
                    </div>
                    <div class="card-body p-2">
             
                        <form method="GET" action="{{ route('payment.addpayment') }}">
                          @csrf
                          <div class="row form-group">
                            <div class="col-12">
                            <label>
                            Supplier
                            </label>
                            <select  name="supplier" id="supplier" class="form-control select2" data-placeholder="choose supplier" required>
                              <option></option>

                              @foreach($suppliers as $supplier)

                                @php
                                  $selected = 0;
                                  if(   old('supplier') == $supplier->id )
                                    $selected = "selected";
                                @endphp
                                <option {{$selected}} value="{{$supplier->id}}">{{ $supplier->supplier_name }} {{ '('.$supplier->address.')' }}</option>
                              @endforeach
                            </select>
                            </div>
                          </div>

                          <div class="row form-group">
                          <div class="col-12">
                          <label>
                          Payment For:
                          </label>
                          <select class="form-control select2" name="payment_type" data-placeholder="select payment type" required>
                            <option></option>
                            <option value="1">BOOKING</option>
                            <option value="2">SHIPPING</option>
                          </select>  
                          </div> 
                          </div> 
                          <div class="row form-group">
                          <div class="col-12 ajax-data">
                          </div> 
                          </div>						  
                          <div class="row form-group ">
                            <div class="col-12 prebooking-details">
                            </div>
                          </div>   
                        <input class="btn btn-primary" type="submit" value="Add Payment">              
                      </form>
                     
                  
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
<script>

      var getData = function(payment_type,supplier_id){
           $.ajax({
             data: { supplier_id : supplier_id, payment_type: payment_type },
             url: "{{ route("payment.getdata") }}",
             success: function(data){
                $('.ajax-data').html(data);
                $('.select2').select2({
                    theme: 'bootstrap4',

                });
             }
           });
      }

      $("select[name='payment_type']").change(function(){
         var payment_type = $(this).val();
         var supplier_id =  $("select[name='supplier'] option:selected").val();
         if(supplier_id == "") {
          alert("Please Select supplier");
          return false;
         }  
         getData(payment_type,supplier_id);  
      });

      $("select[name='supplier']").change(function(){
        var supplier_id = $(this).val();
        var payment_type = $("select[name='payment_type'] option:selected").val();
        if(payment_type == "") {
          return false;
        }
        getData(payment_type,supplier_id); 
      });

      var getBookingData = function(payment_type,preebooking_id){
        var url = "";
        if(payment_type == 1 ){
          url = "prebooking/"+preebooking_id;
          
        }else{
          url = "shipment/"+preebooking_id;
        }
       

        $.ajax({
          type: "GET",
          url: url,
          beforeSend: function(){
            $("#loader").show();
          },
          success: function(data){
              $(".prebooking-details").html(data);
              
              $("#loader").hide();
          },
          error: function(data){
            $("#myModal .modal-body").html(data);
          }
        });

      }

      $(document).on("change","select[name='preebooking']",function(){
        var payment_type = $(this).data("payment_type");
        var preebooking_id = $(this).val();
        getBookingData(payment_type,preebooking_id);        
      });

</script>
 
@endsection
