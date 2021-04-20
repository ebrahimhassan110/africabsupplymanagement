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
                        <li><i class="fa fa-bars"></i>Shipment Information</li>
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

         <form action="{{ route('shipment.store') }}" method="post">
                    @csrf


                                    <table id="ctl00_ContentPlaceHolder1_tblmain" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody><tr>
            <td style="width: 50%;" valign="top">
				
												
                                                <div class="form-group">
                                                    <label>
                                                        Supplier<span class="required"> *</span></label>
                                                    <select required name="supplier_id" id="supplier_id" tabindex="1" class="form-control" style="width:50%;">
									 <option value="">- Select -</option>
										  @foreach($suppliers as $spl)    
														<option value="{{$spl->id}}">{{ $spl->supplier_code }} </option>
											 @endforeach

													</select>
													   <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator24" style="color:Red;display:none;">Supplier</span>
												</div>
												
												
												  <div class="form-group">
                                                    <label>
                                                        PFI Number<span class="required"> *</span></label>
                                                    <select required name="booking_id" id="booking_id" tabindex="1" class="form-control" style="width:50%;">
									 <option value="">- Select -</option>
										 </select>
										<span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator24" style="color:Red;display:none;">PFI Number</span>
												</div>
												
												
												
											<div  class="form-group ltd">
                                                    <label>
                                                       CFI Number<span class="required"> *</span></label>
                                                     <input required name="cfi_no"  type="text" id="" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">CFI Number</span>
                                                </div>
												
											<div  class="form-group fullfield">
                                                    <label>
                                                       CFI Goods Value<span class="required"> *</span></label>
                                                     <input required name="goods_value"  type="text" id="goods_value" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> CFI Goods Value</span>
                                                </div>	
											
												
												<div  class="form-group fullfield">
                                                    <label>
                                                    CFI Other Expense  </label>
                                                     <input  name="other_expense_value"  type="email" id="other_expense_value" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Director Email</span>
                                                </div>	

											<div  class="form-group fullfield">
                                                    <label>
                                                       Advance Paid Value<span class="required"> *</span></label>
                                                     <input  name="advance_paid_value"  type="text" id="advance_paid_value" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Address</span>
                                                </div>
											<div  class="form-group">
											<table hidden id="part_table">
											<thead>
											<th> Part Name  </th>
											<th> Max Value  </th>
											<th> CFI Goods Value </th> 
											<th>   CFI Other Expense </th>
											<th>   Advance Paid Value </th>
											</thead>
											<tbody>
											
											
											</tbody>
											</table>
											</div>											
												<div  class="form-group ltd">
                                                    <label>
                                                       Local Delivery Date<span class="required"> *</span></label>
                                                     <input  required name="local_delivery_date"  type="date" id="" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">City</span>
                                                </div>
					
                                                
                                            </td>
            <td style="width: 50%;" valign="top">
                                                <div class="form-group">
                                                    <label>
                                                        ETD <span class="required"> *</span></label>
                                                    <input  required name="etd" type="date" id="etd" tabindex="2" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvusername" style="color:Red;display:none;">ETD</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        ETA<span class="required">*</span></label>
                                                    <input required name="eta" type="date"  id="eta" tabindex="4" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator25" style="color:Red;display:none;">ETA</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Duty Value<span class="required"> *</span></label>
                                                    <input required name="duty_value" type="text"  tabindex="4" class="form-control" style="width:50%;">
                                                     <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator25" style="color:Red;display:none;">Duty Value</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Due Date</label>
                                                    <input  name="due_date" type="date" id="advance_terms" tabindex="6" class="form-control" style="width:50%;">
                                                
													<span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator4" style="color:Red;display:none;">Due Date</span>
                                                </div>
                                                  <div class="form-group">
                                                    <label>
                                                        Narration</label>
                                                    <input  name="narration" type="text" id="ctl00_ContentPlaceHolder1_txttaxfilename" tabindex="3" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator26" style="color:Red;display:none;">Payment Terms</span>
                                                </div>
                                               
											   
											    <div class="form-group">
                                                    <label>
                                                        Credit Days</label>
                                                    <input  name="credit_days" type="text" id="ctl00_ContentPlaceHolder1_txttaxfilename" tabindex="3" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator26" style="color:Red;display:none;">Credit Days</span>
                                                </div>
												
												 <div class="form-group">
                                            <label>
                                                Attachment</label>
                                            <input type="file" name="file" id="ctl00_ContentPlaceHolder1_fludocument" style="width:50%;">
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
//	$("#mySelect").append('<option value=1>My option</option>');
	
     var select=$("#supplier_id");
    $("#supplier_id").change(function () {
        var val = $(this).val(); //get the value
		
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
	
	
	    $("#booking_id").change(function () {
        var val = $(this).val(); //get the value
		for(x=0;x<bookings.length;x+=1){
                     var dat = bookings[x];
					 var declaration_type=dat.declaration_type;
					  var booking_id=dat.id;
					  //if same booking id as selected
					  if(booking_id==val){
						  //save no_of days_for payment_days
						payment_days=dat.payment_days;  
					 if(declaration_type=='PARTIAL'){
							$(".fullfield").attr("hidden",true);
						  	$('#goods_value').removeAttr('required');
							$('#other_expense_value').removeAttr('required');
							$('#advance_paid_value').removeAttr('required');
								
							 $.ajax({
            url         :'getBookingPart/'+booking_id,
             type       :'GET',
             dataType   :'JSON',
             success    :'success',
             data       :{},
             success    : function(result){
                 var data = result;
				 bookings=data
				var x;
                 for(x=0;x<data.length;x+=1){
                     var dat = data[x];
					var partname=dat.name;
					var partid=dat.id;
					var partvalue=dat.value;
					
					var shippedvalue=dat.shipped_value;
					
					
					if(shippedvalue==null){
						shippedvalue=0;
					}
					
                    var diff= parseFloat(partvalue) -parseFloat(shippedvalue);
					//diff=diff.toString();
					console.log("hello"+shippedvalue);
					$('#part_table').removeAttr('hidden');
				var tbody = $('#part_table').children('tbody');
     
     //Then if no tbody just select your table 
				 var table = tbody.length ? tbody : $('#part_table');
				 
			
				 //Add row
				 tbody.append('<tr>\n\
				<td><input hidden name="partId[]" value="'+partid+'" /> <input  class="form-control" readonly value="'+partname+'" name="partName[]" type="text"/></td>\n\
				<td> '+diff+' </td><td><input class="form-control"  required name="goods_value[]" max="'+diff+'" type="number"/></td>\n\
				<td><input class="form-control"   name="other_expense_value[]"  type="text"/></td>\n\
				<td><input class="form-control" name="advance_paid_value[]" type="text"/></td> <td></td>\n\
				</tr>');
				 
  	
                 }
				 
             }
				});
						
				}
				}
					 console.log(dat.pfi_no);
                  
                 }

//alert(val);
    });



$('#etd').change(function() {
    var date = $(this).val();
//	var result = new Date(date);
  //  result.setDate(date.getDate() + payment_days);
   var result = new Date(date);
  result.setDate(result.getDate() + 4);  
  alert(result.getDate());

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

