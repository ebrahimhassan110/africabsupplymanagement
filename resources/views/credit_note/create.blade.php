@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
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
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Credit Note' }}</span>
                  
                    </div>
                    <div class="card-body">
                   
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                              <form action="{{ route('credit_note.store')}}" method="post">
                                @csrf
                                <tbody><tr>
								
                                    <td style="width: 50%;" valign="top">
                                        <div class="form-group">
                                            <label>
                                                PreBooking Id<span class="required"> *</span></label>
                                                <select required name="prebooking_id" id="prebooking_id" tabindex="1" class="form-control select2" style="width:100%;">
												<option value="">- Select -</option>
                                            
											@foreach($prebookings as $spl)    
                                                        <option value="{{$spl->id}}">{{ $spl->pfi_no }} - {{ $spl->po_number }} </option>
                                             @endforeach

                                                    </select>  
													</div>
										
										  <div class="form-group">
                                            <label>
                                               Type<span class="required"> *</span></label>
                                          <select required name="type" id="type" tabindex="1" class="form-control select2" style="width:100%;">
												<option value="">- Select -</option>
                                            
                                             <option value="credit">Credit </option>
                                              <option value="debit">Debit </option>
												</select>  
												</div>
										
											
											 <div class="form-group">
                                            <label>
                                                Currency<span class="required"> *</span></label>
                                            <input name="currency" id="currency" type="text" readonly  value="{{ old('currency')}}" class="form-control" autofocus="" style="width:50%;" required>
                                           </div>
											
										  <div class="form-group">
                                            <label>
                                                Amount<span class="required"> *</span></label>
                                            <input name="amount" type="text"  value="{{ old('amount')}}" class="form-control" autofocus="" style="width:50%;" required>
                                           </div>
										
										
										
										
                                        <input type="submit"  value="Save"  id="ctl00_ContentPlaceHolder1_btnsave" class="btn btn-primary">
                                        <input type="submit" value="Cancel" id="ctl00_ContentPlaceHolder1_btncancel" class="btn btn-primary">
                                        
                                    </td>
                                </tr>
                            </tbody>
                          </form>
                          </table>
                      
                    </div>
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
		var bookings=[];
		
		    $("#prebooking_id").change(function () {
				
     var val = $(this).val(); //get the value
  //document.getElementById("booking_id").options.length = 0;	
		 $.ajax({
            url         :'getPFI/'+val,
             type       :'GET',
             dataType   :'JSON',
             success    :'success',
             data       :{},
             success    :function(result){
                 var data = result;
				 bookings=data
				 console.log(data);
				 
                 var x;

              

					//alert(data[0].currency);
					//alert(data[0].pfi_value);
					document.getElementById("currency").value=data[0].currency;
										
					
             }
         });
		

//alert(val);
    });
	
      </script>

@endsection

