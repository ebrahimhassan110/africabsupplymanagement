
@extends('dashboard.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <div class="row">

              <div class="container">
              @if(count($errors))
                  <div class="form-group">
                      <div class="alert alert-danger">
                          <ul>
                              @foreach($errors->all() as $error)
                                  <li>{{$error}}</li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
              @endif

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
        <div class="col-md-12">
          <div class="card">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('payment.store') }}" id="payment_form">
                    @csrf
                    <input type="hidden" name="_payment_type" value="{{ $payment_type }}">
                     
                    <p class="text-muted pb-3 mb-1" style="border-bottom: 3px solid #00a65a">Add Payment</p>
                    <div class="row form-group">
                      <div class="col-md-12 info-card">
                        <div class="row-desc">
                          <label> Booking PFI Value: </label> 
                          <div class="value">
                            {{ $prebooking->pfi_value }}
                          </div>
                        </div>
                        <div class="row-desc">
                          <label> Booking Advanced Value: </label> 
                          <div class="value">
                            {{ $prebooking->advance_paid }}
                          </div>
                        </div>

                        <div class="row-desc">
                          <label> Actual paid pfi Value: </label> 
                          <div class="value">
                            {{ $prebooking->actual_paid  }}
                          </div>
                        </div>

                        <div class="row-desc">
                          <label> Actual Paid Advance Value: </label> 
                          <div class="value">
                            {{ $prebooking->actual_advance_paid }}
                          </div>
                        </div>
                       
                      </div>
                    </div>
                    <div class="row form-group">

                      <div class="col-md-4">
                        <label> Supplier: </label>
                        <div class="pt-2  font-weight-bold">

                        {{ $prebooking->supplier->supplier_name }} ( {{ $prebooking->supplier->supplier_code }} ) - 
                        {{ $prebooking->supplier->address }} - 
                        {{ $prebooking->supplier->city }}

                        </div>
                      </div>

                      <input type="hidden" name="booking_no" value="{{ $prebooking->id }}">

                      <div class="col-md-4">
                        <label> Payment Type: </label>
                        <div class="pt-2">
                            <select class="form-control select2" name="payment_type" data-placeholder="select payment type">
                              <option></option>
                              @foreach($payment_types as $payment_type)
                                @php
                                  $selected = 0;
                                  if( old('payment_type') == $payment_type->id)
                                    $selected = "selected";
                                @endphp
                                <option {{ $selected }} value="{{$payment_type->id}}">{{ $payment_type->description  }} </option>
                              @endforeach
                            </select>
                        </div>
                      </div>

                      <div class="col-md-4">
                      
                      </div>

                    </div>

                    <div class="row form-group">
                      <div class="col-md-4">
                        <label> Amount: </label>
                        <input class="form-control" type="text" placeholder="{{ 'Cash Value' }}" id="amount" name="amount" value="{{ old('amount') }}" required>
                      </div>
                      <div class="col-md-4">
                          <label> Bank Value: </label>
                          <input class="form-control" type="text" placeholder="{{  'Bank Value'  }}" id="bk_value" name="bank_value" value="{{ old('bank_value') }}" required>
                      </div>

                      <div class="col-md-4">
                          <label> Cash Value: </label>
                          <input class="form-control" type="text" placeholder="{{ 'Cash Value' }}" id="cs_value" name="cash_value" value="{{ old('cash_value') }}" required>
                      </div>

                    </div>

                    <div class="row form-group">
                      <div class="col-md-4">
                          <label> {{  'Telegraphic transfer Charges' }} </label>
                          <span class="d-flex flex-row align-middle">
                            <div class="d-flex flex-row mr-1">
                                <label>Value:</label>
                                <input type="radio" class="type" value="value" name="type" checked>
                            </div>
                            <div class="d-flex flex-row mr-2">
                              <label> Perc(%):</label>
                              <input type="radio"  class="type" value="perc" name="type">
                            </div>
                            <input class="form-control" hidden min="1" max="100" type="text" id="parcent" placeholder="%" name="percent" value="{{ old('tt_charges') }}">
                            <input class="form-control" type="text" id="tt_charges"  name="tt_charges" value="{{ old('tt_charges') }}" required>
                          </span>
                      </div>
                      <div class="col-md-4">
                          <label>Banker:</label>
                         
                            <select class="form-control select2" name="banker" data-placeholder="select payment type">
                              <option></option>
                              @foreach($bankers as $banker)
                                @php
                                  $selected = 0;
                                  if( old('banker') == $banker->id)
                                    $selected = "selected";
                                @endphp
                                <option {{ $selected }} value="{{$banker->id}}">{{ $banker->description  }} </option>
                              @endforeach
                            </select>
                      
                      </div>
                      <div class="col-md-4">
                          <label>Naration </label>
                          <input class="form-control" type="text" placeholder="{{  'naration' }}" name="naration" value="{{ old('naration') }}" min="1" required>
                      </div>
                    </div>
 
                    <button class="btn btn-block btn-success" type="submit">{{ 'save' }}</button>
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
              </div>
            </div>
          </div>

@endsection

@section('javascript')
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

    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <script>

      function calculatePercentage(amount,tt_charges){
          var perc = (tt_charges / 100  ) * amount;
          return perc;
      }

      $(".type").change(function(){
        
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


 
      $("#parcent").on("input",function(e){
          
          var amount = $("#amount").val();
          var type = $("[name='type']:checked").val();
          if(type == "perc"){
             
            $("#tt_charges").val(calculatePercentage(amount,$("#parcent").val()));
             
          }
      });

      $("#amount").on("input",function(e){
          
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
          console.log(total);
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

    </script>
@endsection
