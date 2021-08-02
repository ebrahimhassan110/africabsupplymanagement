          

              <div class="row">

              <div class="container">


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

                <form method="POST" action="{{ route('payment.store') }}" id="payment_form">
                    @csrf
                    <input type="hidden" name="_payment_type" value="{{ $payment_type }}">

                <div class="row">
                <div class="col-sm">
                  <div class="card top-box">
                    <div class="card-body">
                      @if( $payment_type == 1)
                         <span class="font-weight-bold"> PFI Value</span>
                      @else
                          <span class="font-weight-bold"> CFI Value</span>
                      @endif

                      <div class="text-value-lg">
                          @if( $payment_type == 1)
                            {{ $prebooking->pfi_value  }}
                          @else
                            {{ $prebooking->goods_value  }}
                          @endif
                      </div>

                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm">
                  <div class="card top-box">
                    <div class="card-body">
                      <span class="font-weight-bold"> Advance Payment </span>
                      @if( $payment_type == 1)
                          <?php $advance_paid_value =  $prebooking->advance_paid; ?>
                      @else
                          <?php $advance_paid_value = $prebooking->advance_paid_value; ?>
                      @endif
                      <div class="text-value-lg"> {{ $advance_paid_value }} </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm">
                  <div class="card top-box">
                    <div class="card-body">
                      <span class="font-weight-bold"> Total Paid</span>
                      
                      @if( $payment_type == 1)
                          <?php $actual_paid =  $prebooking->actual_advance_paid; ?>
                      @else
                          <?php $actual_paid = $prebooking->actual_paid; ?>
                      @endif
                      
                      <div class="text-value-lg">{{ $actual_paid }}</div>

                    </div>
                  </div>
                </div>
                <!-- /.col-->
                @if( $payment_type == 2)
                  <div class="col-sm">
                    <div class="card top-box">
                    <div class="card-body">
                     <span class="font-weight-bold">Other Expenses</span>
                      <div class="text-value-lg">
                          {{ $prebooking->other_expense_value }}
                      </div>
                        
                    </div>
                    </div>
                  </div>
                 @endif

              </div>

                    <div class="row form-group">
                      <input type="hidden" name="booking_no" value="{{ $prebooking->id }}">
                      <div class="col-md-4">
                        <label> Payment Date: </label>
                        <input type="text" name="payment_date" class="form-control date"/>
                      </div>
                      <div class="col-md-8">
                      <label> Payment Type: </label>
                        @if( $payment_type == 1)
                          <input type="hidden" name="payment_type" value="1" >
                          <input type="text" class="form-control " value="Advance Payment" readonly/>
                        @elseif( $payment_type == 2 )                       
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
                        @endif
                      </div>

                      

                    </div>

                    <div class="row form-group">
                      <div class="col-md-4">
                        <label> Amount: </label>
                        <input class="form-control" type="text" placeholder="{{ 'Amount' }}" id="amount" name="amount" value="{{ old('amount') }}" required>
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
                          <label>Banker:</label>
                            <select class="form-control select2" name="banker" data-placeholder="select banker">
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
                            
                          </span>
                      </div>
                      <div class="col-md-4">
                          <label> &nbsp; </label>
                          <input class="form-control" hidden min="1" max="100" type="text" id="parcent" placeholder="%" name="percent" value="{{ old('tt_charges') }}">
                          <input class="form-control" type="text" id="tt_charges"  name="tt_charges" value="{{ old('tt_charges') }}" required>
                      </div>
                      
                    </div>
                     <div class="row form-group">
                     <div class="col-md-12">
                          <label>Naration </label>
                            <textarea class="form-control"  placeholder="{{  'naration' }}" name="naration" value="{{ old('naration') }}" min="1" required></textarea>
                          </div>
                     </div>

                    <button class="btn btn-block btn-success" id="paybtn" type="submit">{{ 'save' }}</button>
                </form>

        </div>
      </div>
    </div>
              </div>



<style>
  .tab-content .card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    min-height: 82px;
    padding: 1.25rem;
    position: relative;
  }
  
  .card.top-box .card-body{
      padding: 0.4em;
  }
  
  .card.top-box .card-body{
      padding: 0.4em;
  }
  .card.top-box .card-body div{
      
      position: absolute;
      top: 40%;
      left: 35%;
  }
  
  
  
</style>

@section('javascript')
 
@endsection
