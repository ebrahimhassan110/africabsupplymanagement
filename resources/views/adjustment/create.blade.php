@extends('dashboard.base')

@section('content')
 @if(Session::has('message'))
                <div class="row">
                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                </div>
                @endif
        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    

                    <div class="card-body p-2">
                <div class="table-responsive">
      
    <div id="main-content">
        <div class="wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <ol class="breadcrumb">
                        <li><i class="fa fa-bars"></i>Adjustment Information</li>
                    </ol>
                    <div class="panel">
                        <div class="panel-body">
                            <div id="ctl00_ContentPlaceHolder1_updatepnl">
    
                                    <div id="ctl00_ContentPlaceHolder1_upUpdateProgressDp" style="display:none;" role="status" aria-hidden="true">
        
                                            <div id="divLoading" style="margin: 0px; padding: 0px; position: fixed; right: 0px;
                                                top: 0px; width: 100%; height: 100%; background-color: rgb(102, 102, 102); z-index: 30001;
                                                opacity: 0.8;">
                                                <p style="position: absolute; color: White; top: 50%; left: 45%;">
                                                    Loading, please wait...
                                                    <img src="./Customer Information_files/loading.gif" alt="loading">
                                                </p>
                                            </div>
                                        
    </div>

         <form enctype="multipart/form-data" action="{{ route('adjustment.store') }}" method="post">
                    @csrf


                                  <table id="ctl00_ContentPlaceHolder1_tblmain" cellpadding="0" cellspacing="0" border="0" width="100%">
                                     <tbody><tr>
                                           <td style="width: 50%;" valign="top">
    				
												<div class="form-group">
                                                    <label>
                                                        Supplier<span class="required"> *</span></label>
                                                    <select required name="supplier_id" id="supplier_id" tabindex="1" class="form-control select2" style="width:50%;">
									 <option value="">- Select -</option>
										  @foreach($suppliers as $spl)    
														<option value="{{$spl->id}}">{{ $spl->supplier_code }} </option>
											 @endforeach

													</select>
													   <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator24" style="color:Red;display:none;">From Supplier</span>
												</div>
												
												
												  <div class="form-group">
                                                    <label>
                                                      From  PFI Number<span class="required"> *</span></label>
                                                    <select required name="from_booking_id" id="booking_id" tabindex="1" class="form-control select2" style="width:50%;">
									 <option value="">- Select -</option>
										 </select>
										<span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator24" style="color:Red;display:none;">PFI Number</span>
												</div>



                                                <div class="form-group">
                                                    <label>
                                                       To Supplier<span class="required"> *</span></label>
                                                    <select required name="to_supplier_id" id="to_supplier_id" tabindex="1" class="form-control select2" style="width:50%;">
                                     <option value="">- Select -</option>
                                          @foreach($suppliers as $spl)    
                                                        <option value="{{$spl->id}}">{{ $spl->supplier_code }} </option>
                                             @endforeach

                                                    </select>
                                                       <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator24" style="color:Red;display:none;">Supplier</span>
                                                </div>
                                                
                                                
                                                  <div class="form-group">
                                                    <label>
                                                      To  PFI Number<span class="required"> *</span></label>
                                                    <select required name="to_booking_id" id="to_booking_id" tabindex="1" class="form-control select2" style="width:50%;">
                                     <option value="">- Select -</option>
                                         </select>
                                        <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator24" style="color:Red;display:none;">PFI Number</span>
                                                </div>


												
										<div id="booking_info">


                               

											<div  class="form-group ltd">
                                                    <label>
                                                       Transfer Value<span class="required"> *</span></label>
                                                     <input required name="transfer_value"  type="number" id="transfer_value" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Transfer Value</span>
                                                </div>
												
											<div  class="form-group fullfield">
                                                    <label>
                                                       Narration<span class="required"> *</span></label>
                                                     <input required name="narration"  type="text" id="narration" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Narratiom</span>
                                                </div>	
											
												
											
																					
												
					                           
                                                 <div class="form-group">
                                            <label>
                                                Attachment<span class="required">*</span></label>
                                            <input type="file" required name="attachment" id="ctl00_ContentPlaceHolder1_fludocument" style="width:50%;">
                                            </div>
                                               
                                                
                                            </td>


                                      
                                             </tr>




    </tbody></table>

     <div class="form-group">
                        <input type="submit" name="submit" value="submit"  class="btn btn-primary">
                       
                    </div>
    </form>
                                    
                                    
                                
</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<script type="text/javascript">

					
	var bookings=[];
	var payment_days;
    var incoterms;
     var shipped_value;
     var pfi_value;
     var shipment_type;
//	$("#mySelect").append('<option value=1>My option</option>');
	
     var select=$("#supplier_id");
    $("#supplier_id").change(function () {
        var val = $(this).val(); //get the value
	document.getElementById("booking_id").options.length = 0;	
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

                 $('#booking_id').append($('<option>', {
                        value: '',
                        text: "- Select -"
                    }));



                 for(x=0;x<data.length;x+=1){
                     var dat = data[x];
					 console.log(dat.pfi_no);
					 
                    // select.append('<option value="'+dat.id+'">'+dat.pfi_no+'</option>');
					
					$('#booking_id').append($('<option>', {
						value: dat.id,
						text: dat.pfi_no
					}));
                 }
				 
             }
         });
		

//alert(val);
    });






         var select=$("#to_supplier_id");
    $("#to_supplier_id").change(function () {
        var val = $(this).val(); //get the value
    document.getElementById("to_booking_id").options.length = 0;   
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

                 $('#to_booking_id').append($('<option>', {
                        value: '',
                        text: "- Select -"
                    }));



                 for(x=0;x<data.length;x+=1){
                     var dat = data[x];
                     console.log(dat.pfi_no);
                     
                    // select.append('<option value="'+dat.id+'">'+dat.pfi_no+'</option>');
                    
                    $('#to_booking_id').append($('<option>', {
                        value: dat.id,
                        text: dat.pfi_no
                    }));
                 }
                 
             }
         });
        

//alert(val);
    });





   





    //pfi changes o display all pfi infos


	
	
	    $("#booking_id").change(function () {
        var val = $(this).val(); //get the value
       var x=0;     
     // alert(bookings.length);
		for(x=0;x<bookings.length;x+=1){
                     var dat = bookings[x];

					var pfi_value=dat.pfi_value;

					  //if same booking id as selected
                      // alert('yes');   
					  if(pfi_value!='0' || pfi_value!=''){
                           $("#transfer_value").attr({
                               "max" : pfi_value
                                 });

			             	}
					 console.log(dat.pfi_value);
                  
                 }


          

//alert(val);
    });






jQuery(function($) {
  var requiredCheckboxes = $(':checkbox[required]');
  requiredCheckboxes.on('change', function(e) {
    var checkboxGroup = requiredCheckboxes.filter('[name="' + $(this).attr('name') + '"]');
    var isChecked = checkboxGroup.is(':checked');
    checkboxGroup.prop('required', !isChecked);
  });
  requiredCheckboxes.trigger('change');
});

</script>


@endsection

