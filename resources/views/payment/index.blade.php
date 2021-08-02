@extends('dashboard.base')

@section('content')


        <div class="container-fluid">
          <div class="animated fadeIn">
          @if(session('error'))
                  <div class="form-group">
                      <div class="alert alert-danger">
                          <ul>
                              @foreach(session('error') as $err)
                                  <li>{{$err}}</li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
              @endif
            <div class="row">
              <div class="col-sm-4">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Add Payment' }}</span>
                    </div>
                    <div class="card-body p-2">
                        @csrf
                      <div class="row form-group">
                        <div class="col-sm-12">
                        <label>
                        Supplier
                        </label>
                        <select  name="supplier" id="supplier" class="form-control select2" width="50" data-placeholder="choose supplier" required>
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
                      <div class="col-sm-12">
                        <label>
                          Payment For:
                        </label>
                        <select class="form-control select2" name="payment_type"  width="100" data-placeholder="select payment type" required>
                          <option></option>
                          <option value="1">BOOKING</option>
                          <option value="2">SHIPPING</option>
                        </select>
                      </div>
                    </div>
                    <div class="row form-group">
                      <div class="col-sm-12 ajax-data">
                      </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
                          <div class="row form-group">

                            <div class="col-12 prebooking-details">

                            </div>
                          </div>
            </div>
          </div>
        </div>          
        </div>

@endsection
<style>

.nav-tabs-boxed .nav-tabs{
    border-bottom: 1px solid !important;
    border-color: #c4c9d0!important;
    padding: 0.75rem 1.25rem !important;
 }
 
 select{
    max-width: 350px !important; 
 }
 
 .nav-link{
     padding: 1rem 1rem !important;
 }
 
 .nav-tabs-boxed .nav-tabs{
     padding:0 !important;
 }
 
</style>
<style>

      .info-card {
        display: flex;
        flex-wrap: nowrap;
      }

      .info-card div{
         padding: 1em;
      }

      .info-card div label{
         font-weight: bold;
      }

</style>

@section('javascript')

@if(Session::get('message'))

<script>
  $(document).ready(function(){
    showToastr('success',"{{ session('message') }}");
  });

</script>
@endif
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
<!-- <script src="{{ asset('js/main.js') }}" defer></script> -->
<script>      
      var getData = function(payment_type,supplier_id){
           $.ajax({
             data: { supplier_id : supplier_id, payment_type: payment_type },
             url: "{{ route("payment.getdata") }}",
             success: function(data){
                $('.ajax-data').html(data);               
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
              var html = "<div class='card  nav-tabs-boxed'>";
              html  += '<ul class="nav nav-tabs" role="tablist"><li class="nav-item"><a class="nav-link booking_details_tab active" data-toggle="tab" href="#booking_details_tab" role="tab" aria-controls="home" aria-selected="true">View Details</a></li>';
              html  += '<li class="nav-item "><a class="nav-link profile-3" data-toggle="tab" href="#profile-3" role="tab" aria-controls="profile" aria-selected="false">Payment History </a></li>';
              html  += '<li class="nav-item "><a class="nav-link profile-1" data-toggle="tab" href="#profile-1" role="tab" aria-controls="profile" aria-selected="false">Add Payment</a></li>';
              html  += '</ul>';
              html  += "<div class='card-body p-0'>";
              html  += "<div class='tab-content'>";
              html  += '<div class="tab-pane active" id="booking_details_tab" role="tabpanel">';
              html  += data;
              html  += '</div>';
              html  += '<div class="tab-pane  payment_history" id="profile-3" role="tabpane3">';
              html  += '</div>';
              html  += '<div class="tab-pane  add_payment" id="profile-1" role="tabpane2">';
              html  += '</div>';
              html  += '</div>';
              html  += "</div>";
              html  += "</div>";
              $(".prebooking-details").html(html);                        
          },
          error: function(data){
            $("#myModal .modal-body").html(data);
          },complete:function(){
                    
          }
        });

      }

      // function renderDataCard()

      $(document).on("change","select[name='preebooking']",function(){
        var payment_type = $(this).data("payment_type");
        var preebooking_id = $(this).val();
        getBookingData(payment_type,preebooking_id);
      });

      $(document).on("click",".booking_details_tab",function(){
          var that = $("select[name='preebooking']");
          var payment_type = that.data("payment_type");
          var preebooking_id = that.val();
          getBookingData(payment_type,preebooking_id);
      });

      $(document).on("click",".profile-1",function(e){
          e.preventDefault();
          var prebooking = $("select[name='preebooking']").val();
          var payment_type = $("select[name='payment_type'] option:selected").val();
          $.ajax({
              url: "{{ route('payment.addpayment') }}",
              data: { prebooking: prebooking ,payment_type: payment_type },
              success: function(data){
              $(".add_payment").html(data);
              }
          });
      });

      $(document).on("click",".profile-3",function(e){
          e.preventDefault();
          var prebooking = $("select[name='preebooking']").val();
          var payment_type = $("select[name='payment_type'] option:selected").val();
          if(payment_type == 1 ){
             payment_type ="Booking";
          }else{
            payment_type ="Shipping";
          }

          $.ajax({
              url: "./payment/history/"+prebooking+"/"+payment_type,
              success: function(data){
                $(".payment_history").html(data);
              }
          });
      });


      function calculatePercentage(amount,tt_charges){
          var perc = (tt_charges / 100  ) * amount;
          return perc;
      }

      $(document).on("change",".type",function(){
          if( $(this).val() == "perc"){
            $("#parcent").prop("hidden",false);
            $("#parcent").prop("required",true);
            var amount = $("#amount").val();
            $("#tt_charges").val(calculatePercentage(amount,$("#parcent").val()));
          }else{
            $("#parcent").prop("hidden",true);
            $("#parcent").prop("required",false);
            $("#tt_charges").val("");
          }
      });

      $(document).on("input","#parcent",function(e){
          var amount = $("#amount").val();
          var type = $("[name='type']:checked").val();
          if(type == "perc"){
            $("#tt_charges").val(calculatePercentage(amount,$("#parcent").val()));
          }
      });

      $(document).on("input","#amount",function(e){
          var amount = $(this).val();
          var type = $("[name='type']:checked").val();
          if(type == "perc"){
            $("#tt_charges").val(calculatePercentage(amount,$("#parcent").val()));
          }        
      });

      function validateNumber(amount,bank_value,cash_value){
        if(isNaN(amount)){
          alert("Amount is not a number ");
          return false;
        }
        if(isNaN(bank_value)){
          alert("Bank Value is not a number ");
          return false;
        }
        if(isNaN(cash_value)){
          alert("Cash Value is not a number ");
          return false;
        }
      }

      function checksum(amount,bank_value,cash_value){
          var total = parseFloat(bank_value) + parseFloat(cash_value);
          if( amount != total ){
            alert("Bank value and cash value does not match Amount");
            return false;
          }
      }

      $("#payment_form").submit(function(e){
        var amount = $("#amount").val();
        var bank_value = $("#bk_value").val();
        var cash_value = $("#cs_value").val();
        if(validateNumber(amount,bank_value,cash_value) == false){
          return false;
        }
        if(checksum(amount,bank_value,cash_value) == false ){
          return false;
        }
      });

      function calculatePercentage(amount,tt_charges){
          var perc = (tt_charges / 100  ) * amount;
          return perc;
      }

      function validateNumber(amount,bank_value,cash_value){

        if(isNaN(amount)){
          alert("Amount is not a number ");
          return false;
        }

        if(isNaN(bank_value)){
          alert("Bank Value is not a number ");
          return false;
        }
        if(isNaN(cash_value)){
          alert("Cash Value is not a number ");
          return false;
        }
      }

      function checksum(amount,bank_value,cash_value){
          var total = parseFloat(bank_value) + parseFloat(cash_value);

          if( amount != total ){
            alert("Bank value and cash value does not match Amount");
            return false;
          }
      }

      $(document).on("submit","#payment_form",function(e){
           
        var amount = $("#amount").val();
        var bank_value = $("#bk_value").val();
        var cash_value = $("#cs_value").val();

        if(validateNumber(amount,bank_value,cash_value) == false){
          return false;
        }

        if(checksum(amount,bank_value,cash_value) == false ){
          return false;
        }

      });
      
     
      
       

    </script>

@endsection
