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

         <form enctype="multipart/form-data" action="{{ route('shipment.store') }}" method="post">
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
													   <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator24" style="color:Red;display:none;">Supplier</span>
												</div>
												
												
												  <div class="form-group">
                                                    <label>
                                                        PFI Number<span class="required"> *</span></label>
                                                    <select required name="booking_id" id="booking_id" tabindex="1" class="form-control select2" style="width:50%;">
									 <option value="">- Select -</option>
										 </select>
										<span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator24" style="color:Red;display:none;">PFI Number</span>
												</div>
												
										<div id="booking_info">


                                        </div>	

                                         <div hidden class="form-group">
                                                    <label>
                                                        Delivery Type<span class="required"> *</span></label>
                                                    <select  name="delivery_type" id="delivery_type" tabindex="1" class="form-control select2" style="width:50%;">
                                                 <option value="">- Select -</option>
                                        
                                                        <option value="local">Local</option>
                                                        <option value="other">Other</option>
                                            
                                                  </select>
                                                       <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator24" style="color:Red;display:none;">Delivery type</span>
                                                </div>	
										
                                        <div  id="blnotext" class="form-group">
                                                    <label>
                                                       BL No<span class="required"> *</span></label>
                                                     <input required name="bl_no_text"  type="text" id="bl_no_text" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">BL Number</span>
                                        </div>

                                        <div  hidden id="blnoselect" class="form-group blnoselect">
                                                    <label>
                                                       BL No<span class="required"> *</span></label>
                                    
                                                    <select required name="bl_no_select" id="bl_no_select" tabindex="1" class="form-control select2" style="width:50%;">
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
                                                     <input required name="goods_value"  type="number" id="goods_value" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> CFI Goods Value</span>
                                                </div>	
											
												
												<div  class="form-group fullfield">
                                                    <label id="cfi_other_expense" >
                                                    CFI Other Expense  </label>
                                                     <input  name="other_expense_value"  type="number" id="other_expense_value" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Director Email</span>
                                                </div>	

											<div  class="form-group fullfield">
                                                    <label>
                                                       Advance Paid Value<span class="required"> *</span></label>
                                                     <input  name="advance_paid_value"  type="number" id="advance_paid_value" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Address</span>
                                                </div>
											<div  class="form-group">
											<table hidden id="part_table">
											<thead>
											<th> Part Name  </th>
											<th> Max Value  </th>
											<th> CFI Goods Value </th> 
											<th id="cfi_other_expense2">   CFI Other Expense </th>
											<th>   Advance Paid Value </th>
											</thead>
											<tbody>
											
											
											</tbody>
											</table>
											</div>											
												<div  id="local_delivery_date" class="form-group ltd">
                                                    <label>
                                                       Local Delivery Date<span class="required"> *</span></label>
                                                     <input   name="local_delivery_date"  type="date" id="" tabindex="1" class="form-control inltd" style="width:50%;">
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
                                                <div id="eta" class="form-group">
                                                    <label>
                                                        ETA<span class="required">*</span></label>
                                                    <input required name="eta" type="date"  id="eta" tabindex="4" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator25" style="color:Red;display:none;">ETA</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Duty Value<span class="required"> *</span></label>
                                                    <input required name="duty_value" type="number"  tabindex="4" class="form-control" style="width:50%;">
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
                                               
											   <input  name="order_type" type="text" id="order_type" hidden value="">

											   
												
												 <div class="form-group">
                                            <label>
                                                Attachment</label>
                                            <input type="file" name="attachment" id="ctl00_ContentPlaceHolder1_fludocument" style="width:50%;">
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







    //delivery type change

       $("#delivery_type").change(function () {
        var val = $(this).val(); //get the value
      
        if(val=='local'){
             $('#bl_no_text').removeAttr('required');
             $("#blnotext *").prop('disabled',true);
           
                $("#blnotext").attr("hidden",true);
                 $("#blnoselect").attr("hidden",false);
                 

                   $('input[name="local_delivery_date"]').attr("hidden",false); 
                   $("#local_delivery_date").attr("hidden",false);  
                   $("#local_delivery_date").attr("required",true); 

                    $('input[name="eta"]').attr("hidden",true); 
                   $("#eta").attr("hidden",true);  
                   $("#eta").attr("required",false);  


                 document.getElementById("bl_no_select").options.length = 0;  
                 // get BL No
                 $.ajax({
            url         :'getBl/',
             type       :'GET',
             dataType   :'JSON',
             success    :'success',
             data       :{},
             success    :function(result){
                 var data = result;
                
                
                 var x;

                 $('#bl_no_select').append($('<option>', {
                        value: '',
                        text: "- Select -"
                    }));



                 for(x=0;x<data.length;x+=1){
                     var dat = data[x];
                     
                    $('#bl_no_select').append($('<option>', {
                        value: dat.bl_no,
                        text: dat.bl_no
                    }));
                 }
                 
             }
         });
        



                }
                else{
                   $('#bl_no_text').attr("required",true);
               $("#bl_no_text *").prop('disabled',false);
           
                $("#blnotext").attr("hidden",false);
               alert('t');
                  $("#bl_no_select").attr("required",false);    
                    $("#blnoselect").attr("hidden",true);       


                    $('input[name="local_delivery_date"]').attr("hidden",true); 
                   $("#local_delivery_date").attr("hidden",true); 
                    $("#local_delivery_date").attr("required",false);  


                    $('input[name="eta"]').attr("hidden",false); 
                   $("#eta").attr("hidden",false);  
                   $("#eta").attr("required",true); 
                

                }

    });
















    //pfi changes o display all pfi infos


	
	
	    $("#booking_id").change(function () {
        var val = $(this).val(); //get the value
       var x=0;     
     // alert(bookings.length);
		for(x=0;x<bookings.length;x+=1){
                     var dat = bookings[x];

					 var declaration_type=dat.declaration_type;
                      var order_type=dat.order_type;
					  var booking_id=dat.id;
					  //if same booking id as selected
                      // alert('yes');   
					  if(booking_id==val){
                     //   console.log('BOOKINGS ID'+booking_id);
                      //    console.log('BOOKINGS VALUE'+val+declaration_type);
						  //save no_of days_for payment_days
						payment_days=dat.payment_days; 
                        incoterms=dat.incoterms; 
                        shipped_value=dat.shipped_value;
                        pfi_value=dat.pfi_value;
                        shipment_type=dat.shipment_type;

					 if(order_type=='BLANKET'){
                                
							$(".fullfield").attr("hidden",true);
						  	$('#goods_value').removeAttr('required');
							$('#other_expense_value').removeAttr('required');
							$('#advance_paid_value').removeAttr('required');
							//set order type
                             $("#order_type").val("BLANKET");	
							 $.ajax({
            url         :'getBookingPart/'+booking_id,
             type       :'GET',
             dataType   :'JSON',
             success    :'success',
             data       :{},
             success    : function(result){
                 var data = result;
				 
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

                    //remove all content of table
                  
				var tbody = $('#part_table').children('tbody');
     
     //Then if no tbody just select your table 
				 var table = tbody.length ? tbody : $('#part_table');
				 
			    var tbl = document.getElementById("part_table"); // Get the table
               tbl.getElementsByTagName("tbody")[0].innerHTML="";
				 //Add row
                  if(max>0){  
				 tbody.append('<tr>\n\
				<td><input hidden name="partId[]" value="'+partid+'" /> <input  class="form-control" readonly value="'+partname+'" name="partName[]" type="text"/></td>\n\
				<td> '+diff+' </td><td><input class="form-control"  required name="goods_value[]" max="'+diff+'" type="number"/></td>\n\
				<td><input class="form-control"   name="other_expense_value[]"  type="number"/></td>\n\
				<td><input class="form-control" name="advance_paid_value[]" type="number"/></td> <td></td>\n\
				</tr>');
				 }
  	
                 }
				 
             }
				});
						
				}
                else {
                      //for backend ref  
                      $("#order_type").val("NORMAL");  

                      //max shipped value
                      var bal=pfi_value-shipped_value;
                      if(bal){
                         $("#goods_value").prop('max',bal);
                      }
                      console.log('BALANCE'+bal);
                  
                      //set other field normal
                             $(".fullfield").attr("hidden",false);
                              $("#goods_value").attr("hidden",false);
                               $("#other_expense_value").attr("hidden",false);
                                $("#advance_paid_value").attr("hidden",false);
                                  $("#goods_value").attr("required",true);
                               $("#other_expense_value").attr("required",true);
                                $("#advance_paid_value").attr("required",true);

               var tbl = document.getElementById("part_table"); // Get the table
               tbl.getElementsByTagName("tbody")[0].innerHTML="";
                $("#part_table").attr("hidden",true);
                }




                if( (incoterms=='CIF') || (incoterms=='EXB') || (incoterms=='FOB'))
                {

                    document.getElementById('cfi_other_expense').style.color = "red";
                    document.getElementById('cfi_other_expense2').style.color = "red";
                }else{
                      document.getElementById('cfi_other_expense').style.color = "black";    
                    document.getElementById('cfi_other_expense2').style.color = "black";
                }



                 if(shipment_type=='Local'){
                  
             $('#bl_no_text').removeAttr('required');
             $("#bl_no_text").prop('disabled',true);
           
                $("#blnotext").attr("hidden",true);
                 $("#blnoselect").attr("hidden",false);
                  $("#bl_no_select").attr("required",true);
                 

                   $('input[name="local_delivery_date"]').attr("hidden",false); 
                   $("#local_delivery_date").attr("hidden",false);  
                   $("#local_delivery_date").attr("required",true); 

                    $('input[name="eta"]').attr("hidden",true); 
                   $("#eta").attr("hidden",true);  
                   $("#eta").attr("required",false);  


                 document.getElementById("bl_no_select").options.length = 0;  
                 // get BL No
                 $.ajax({
            url         :'getBl/',
             type       :'GET',
             dataType   :'JSON',
             success    :'success',
             data       :{},
             success    :function(result){
                 var data = result;
                
                
                 var x;

                 $('#bl_no_select').append($('<option>', {
                        value: '',
                        text: "- Select -"
                    }));



                 for(x=0;x<data.length;x+=1){
                     var dat = data[x];
                     
                    $('#bl_no_select').append($('<option>', {
                        value: dat.bl_no,
                        text: dat.bl_no
                    }));
                 }
                 
                    }
                }); 
             }
                else{
                   $('#bl_no_text').attr("required",true);
               $("#bl_no_text").prop('disabled',false);
                 $("#blnotext").attr("hidden",false);
                 $("#bl_no_select").attr("hidden",true);      
                  $("#bl_no_select").attr("required",false);      


                    $('input[name="local_delivery_date"]').attr("hidden",true); 
                   $("#local_delivery_date").attr("hidden",true); 
                    $("#local_delivery_date").attr("required",false);  


                    $('input[name="eta"]').attr("hidden",false); 
                   $("#eta").attr("hidden",false);  
                   $("#eta").attr("required",true); 
                

                }




				}
					 console.log(dat.pfi_no);
                  
                 }


                 //show booking informations

                   $.ajax({
            url         :'getBooking/'+val,
             type       :'GET',
             dataType   :'JSON',
             success    :'success',
             data       :{},
             success    :function(result){
                 var data = result;
                  console.log("display data");
                 console.log(data[0]);
                 
                 var bdata=data[0];
                 delete bdata.id ;
                 delete bdata.supplier_id ;
                 delete bdata.supplier_id ;
                 delete bdata.pfi_no  ;
                 delete bdata.status  ;
                 delete bdata.attachment  ;
                 delete bdata.created_at  ;
                 delete bdata.updated_at  ;
                 delete bdata.created_by  ;

                var nHTML='';
                  
                for (var key in bdata) {
    var value = bdata[key];
    console.log(key, value);
    var k=key.replace(/_/g," ");
    k= k.toUpperCase();

    nHTML += '<li>' + k + ' : - '+value+'</li>';
            }



               
            
                    console.log(nHTML);
                document.getElementById("booking_info").innerHTML = '<ul>' + nHTML + '</ul>';
        
                 
             }







         });

//alert(val);
    });



$('#etd').change(function() {
    var date = $(this).val();
//	var result = new Date(date);
  //  result.setDate(date.getDate() + payment_days);
  //ebra
  /*
   var result = new Date(date);
  result.setDate(result.getDate() + payment_days);  
  alert(result);
  */

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

