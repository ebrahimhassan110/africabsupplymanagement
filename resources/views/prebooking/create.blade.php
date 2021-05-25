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
                      <span class="card-title">{{ 'Pre Booking' }}</span>
                  
                    </div>
                    <div class="card-body">
                  <form id="form" enctype="multipart/form-data"  action="{{ route('prebooking.store')}}" method="post">


                  	  @csrf


                  <div class="row">
				    <div class="col">
				      <label><b> 
                       Company<span class="required"> *</span></b></label>
				    </div>
				    <div class="col">
				      <select required name="company_name"  tabindex="1" class="select2 form-control" style="width:100%;">
								<option value="0">- Select -</option>
								@foreach($companies as $cmp)    
                                <option value="{{$cmp->name}}">{{ $cmp->name }} </option>
									@endforeach

									</select>  
				    </div>

				     <div class="col ml-2">
				     </div>
				  </div>	  



				</br>

				   <div class="row">
				    <div class="col">
				      <label><b> 
                       Supplier<span class="required"> *</span></b></label>
				    </div>
				    <div class="col">
				     <select required name="supplier_id" class="select2" id="ctl00_ContentPlaceHolder1_ddlbusinesstype" tabindex="1" class="form-control" style="width:100%;" >
									 <option value="0">- Select -</option>
											@foreach($suppliers as $spl)    
									 <option value="{{$spl->id}}">{{$spl->supplier_name}}-{{ $spl->supplier_code }}  </option>
												@endforeach
										</select>    
				    </div>

				     <div class="col ml-2">
				     </div>
				  </div>
                            
                              
					</br>

				   <div class="row">
				    <div class="col">
				      <label><b> 
                        PFI No<span class="required"> *</span></b></label>
				    </div>
				    <div class="col">
				   <input name="pfi_no" type="text"  class="form-control"  placeholder="PFI No" autofocus="" style="width:100%;" required>
                    </div>

				     <div class="col ml-2">
				     </div>
				  </div>						
						</br>	


					 <div class="row">
				    <div class="col-4">
				      <label><b> 
                        PFI Value<span class="required"> *</span></b></label>
				    </div>
				    <div class="col-2">
				   <select required name="currency" id="ctl00_ContentPlaceHolder1_ddlbusinesstype" tabindex="1" class="form-control" style="width:100%;">
								<option value="0">- Select Currency-</option>
								@foreach($currency as $cmp)    
                                <option value="{{$cmp->name}}">{{ $cmp->name }} </option>
									@endforeach
						</select>  
                    </div>

                     <div class="col-2">
						 <input name="pfi_value" id="pfi_value" placeholder="Amount" type="number"  class="form-control"  autofocus="" style="width:100%;" required>
                     </div>	

				     <div class="col-3">
				     	
				     </div>
				      <div class="col-1">
				      </div>
				  </div>			

				</br>

				 <div class="row">
				    <div class="col">
				      <label><b> 
                        PFI Date<span class="required"> *</span> </b></label> 
				    </div>
				    <div class="col">
				   <input name="pfi_date" type="date"  class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

				     <div class="col ml-2">
				     </div>
				  </div>						
						</br>	  	


						 <div class="row">
				    <div class="col">
				      <label><b> 
                        Request For Proposal Date<span class="required"> *</span></b></label> 
				    </div>
				    <div class="col">
				    <input name="rfp_date" id="rfp_date" type="date"  class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

				     <div class="col ml-2">
				     </div>
				  </div>


						</br>	

                                       
										
						 <div class="row">
				    <div class="col-4">
				      <label> <b> 
                       Advance Required/Date<span class="required"> *</span></b></label> 
				    </div>
				    <div class="col-2">
				  <input name="advance_paid"  id="advance_paid"  type="number" placeholder="Advance"  class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

                     <div class="col-2">
                     	 <input name="advance_payment_date"  placeholder="Advance Payment Date" id="advance_payment_date"  type="date"   class="form-control"  autofocus="" style="width:100%;" >
                     </div>

				     <div class="col-3">
				     	
				     	
				     </div>
				      <div class="col-1">

				      </div>
				  </div>	


				</br>
				</br>

					 <div class="row">
				    <div class="col">
				      <label><b> 
                        Order Confirmation Date<span class="required"> *</span></b></label> 
				    </div>
				    <div class="col">
				    <input name="order_confirmation_date" id="order_confirmation_date" type="date"  class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

				     <div class="col ml-2">
				     </div>
				  </div>
				</br>




				  	<div class="row">
				    <div class="col-4">
				      <label> <b> 
                        Delivery Days<span class="required"> *</span></b></label> 
				    </div>
				    <div class="col-2">
				  <input name="delivery_period_days" id="delivery_period_days" type="number" placeholder="Days" class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

				     <div class="col-2">
				      <label> <b>
                        Delivery Date Based On </b></label>
                         	<label>	<input type="checkbox" id="checkbox1" class="radio" value="1" name="radio" />Advance Payment Date</label>
							<label>	<input type="checkbox" id="checkbox2" class="radio" value="2" name="radio" />Confirmation Date</label>
				     </div>
				      <div class="col-4">

				      </div>
				  </div>	

									
				  </br>

					 <div class="row">
				    <div class="col">
				      <label><b> 
                         Delivery Date<span class="required"> *</span></b></label> 
				    </div>
				    <div class="col">
				    <input name="delivery_date" readonly="true" type="date" id="delivery_date" class="form-control"  autofocus="" style="width:100%;" required>
                    </div>

				     <div class="col ml-2">
				     </div>
				  </div>

				</br>




						<div class="row">
					    <div class="col-4">
					      <label><b> 
	                           Payment Mode<span class="required"> *</span></b></label> 
					    </div>
					    <div class="col-2">
					       			 <select required name="payment_mode" id="payment_mode" tabindex="1" class="form-control" style="width:100%;">
											<option value="OA" >OA</option>
											<option value="LC" >LC</option>
											<option value="AVZ" >AVZ</option>
											<option value="CAD" >CAD</option>
											<option value="Before-DLVRT" >Before-DLVRT</option>
											<option value="AG/BL" >AG/BL</option>
											
											</select>   
	                    </div>

					     <div class="col-2" id="payment_days">
					     	  <input  name="payment_days" required id="payment_days" type="number" placeholder="Payment Days" class="form-control"  autofocus="" style="width:100%;" >
					     </div>
					      <div class="col-4">
					      </div>
					  </div>
						</br>
						</br>
					   <div class="row">
				    <div class="col">
				      <label><b> 
                           Order Type</b></label> 
				    </div>
				    <div class="col">
				         <select required name="order_type" id="order_type" tabindex="1" class="form-control" style="width:100%;">
											<option value="NORMAL" >Normal</option>
											<option value="BLANKET" >Blanket</option>
											</select>  
                    </div>

				     <div class="col ml-2">
				     </div>
				  </div>

				</br>	
				</br>			

				 <div class="row" hidden id="parttable" >
				 	 <div class="col-4">
				 	 	 <label><b> 
                          Part Details</b></label> 
				 	 </div>
				    <div class="col-8">
					 <div  >
									<h3 style="color:red" id="alert" ></h3>	 	
									<table id="tablepart">
								<thead>
								<tr>
								  <th scope="col">Part Name</th>
								  <th scope="col">Value</th>
								  <th scope="col">Delivery Date</th>
								   <th scope="col"></th>
								 
								</tr>
							  </thead>
							  
							  <tbody>
								<tr>
								  <th scope="row"><input class="form-control"  type="text" name="partName[]" /></th>
								  <td><input class="form-control"  type="number" oninput="validatesum()" name="partValue[]" /></td>
								  <td><input class="form-control"  type="date" name="partDate[]" /></td>
								  <td><button type="button" id="addpart">Add  </button></td>
								  
								</tr>
								<tr>
								  <th scope="row"><input class="form-control"  type="text" name="partName[]" /></th>
								  <td><input class="form-control"  type="number" oninput="validatesum()" name="partValue[]" /></td>
								  <td><input class="form-control"  type="date" name="partDate[]" /></td>
								  <td></td>
								  
								</tr>
								</tbody>
									</table>		
									</div>						
								</div>

								 <div class="col-2">
								 </div>
							</div>


								</br>


								  <div class="row">
				    <div class="col">
				      <label><b> 
                          Declaration Type</b></label> 
				    </div>
				    <div class="col">
				       <select required name="declaration_type" id="declaration_type" placeholder="Declaration Type" tabindex="1" class="form-control" style="width:100%;">
							<option value="FULL" >FULL</option>
							<option value="PARTIAL" >PARTIAL</option>
											
							</select> 
                    </div>

				     <div class="col ml-2">
				     </div>
				  </div>


				  <div class="row bank_value">
					 			<p style="color:red" id="alert2" ></p>		
					 	</div>	
					 <div class="row bank_value" hidden>

				    <div class="col-1">
				      <label><b> 
                       Bank Value</b></label> 
				    </div>
				    <div class="col-2">
				     <input  name="bank_value" id="bank_value" type="text" placeholder="Bank Value" oninput="validatesumpartial()"  class="form-control partialvalues"  autofocus="" style="width:100%;" >  
                    </div>

                     <div class="col-2">
                     </div>	
                      <div class="col-1">
                      		 <label><b> 
                         Cash Value</b></label> 
                      </div>



				     <div class="col-2">
				        <input   name="cash_value" id="cash_value" type="text" placeholder="Cash Value"  oninput="validatesumpartial()" class="form-control partialvalues"  autofocus="" style="width:100%;" >
				     </div>
				      <div class="col-4">
                     </div>	
				  </div>
				</br>
<h4> Additional Fields  </h4>
			<hr/>
			
		</br>
			
		</br>
										
				 <div class="row">
				    <div class="col-1">
				      <label><b> 
                          Shipment Type</b></label> 
				    </div>
				    <div class="col-2">
				     <select required name="shipment_type" id="ctl00_ContentPlaceHolder1_ddlbusinesstype" tabindex="1" class="form-control" style="width:100%;">
											<option value="FCL" >FCL</option>
											<option value="LCL" >LCL</option>
											<option value="Local" >Local</option>
					</select>  
                    </div>

                     <div class="col-2">
                     </div>	
                      <div class="col-1">
                      		 <label><b> 
                         CBM</b></label> 
                      </div>



				     <div class="col-2">
				     	 <input name="cbm" type="number"  placeholder="CBM" class="form-control"  autofocus="" style="width:100%;" >
				     </div>
				      <div class="col-4">
                     </div>	
				  </div>

				</br>	

				 <div class="row">
				    <div class="col-1">
				      <label><b> 
                         Net weight</b></label> 
				    </div>
				    <div class="col-2">
				     <input name="nw" type="number"  class="form-control"  placeholder="Net Weight" style="width:100%;" >
                    </div>

                     <div class="col-2">
                     </div>	
                      <div class="col-1">
                      		 <label><b> 
                         Gross weight</b></label> 
                      </div>



				     <div class="col-2">
				     	 <input name="gw" type="number"  class="form-control" placeholder="Gross Weight"  autofocus="" style="width:100%;" >
				     </div>
				      <div class="col-4">
                     </div>	
				  </div>
				
				</br>


				 <div class="row">
				    <div class="col-1">
				      <label><b> 
                        No of Container</b></label> 
				    </div>
				    <div class="col-2">
				     <input name="no_of_container" type="number"  class="form-control" placeholder="No of Container"  autofocus="" style="width:100%;" >
                    </div>

                     <div class="col-2">
                     </div>	
                      <div class="col-1">
                      		 <label><b> 
                        Incoterms</b></label> 
                      </div>



				     <div class="col-2">
				     	  <select required name="incoterms" placeholder="Incoterms" id="ctl00_ContentPlaceHolder1_ddlbusinesstype" tabindex="1" class="form-control" style="width:100%;">
												<option value="EXW" >EXW</option>
												<option value="FOB" >FOB</option>
												<option value="CIF" >CIF</option>
												<option value="CFR" >CFR</option>
												<option value="DDP" >DDP</option>
												</select>   
				     </div>
				      <div class="col-4">
                     </div>	
				  </div>
				
				</br>	

				 <div class="row">
				    <div class="col-1">
				      <label><b> 
                        Shipment Way</b></label> 
				    </div>
				    <div class="col-2">
				    <select required name="shipment_way" placeholder="Shipment Way"  id="ctl00_ContentPlaceHolder1_ddlbusinesstype" tabindex="1" class="form-control" style="width:100%;">
											<option value="SEA" >SEA</option>
											<option value="AIR" >AIR</option>
											<option value="AIR-DTD" >AIR-DTD</option>
											<option value="LAND" >LAND</option>
											<option value="LAND-DTD" >LAND-DTD</option>
											
											</select>   
                    </div>

                     <div class="col-2">
                     </div>	
                      <div class="col-1">
                      		
                      </div>



				     <div class="col-2">
				     
				     </div>
				      <div class="col-4">
                     </div>	
				  </div>
				
						
				
						</br>	


						<div class="row">
					 	<h3 style="color:red" id="alert2" ></h3>	
				    <div class="col-1">
				      <label><b> 
                       Narration</b></label> 
				    </div>
				    <div class="col-2">
				     <input name="narration" type="text"  class="form-control" placeholder="Narration"  autofocus="" style="width:100%;" >
                    </div>

                     <div class="col-2">
                     </div>	
                      <div class="col-1">
                      		 <label><b> 
                         Attachment</b></label> 
                      </div>



				     <div class="col-2">
				        <input required name="attachment" type="file" placeholder="Attachment" id="ctl00_ContentPlaceHolder1_txttaxfilename" tabindex="3" class="form-control" style="width:100%;">
				     </div>
				      <div class="col-4">
                     </div>	
				  </div>
				
						</br>	

											
					
										
										 <div hidden  class="form-group">
                                            <label>
                                               Expected Delivery Date<span class="required"> *</span></label>
                                            <input name="expected_delivery_date" type="date"  class="form-control"  autofocus="" style="width:100%;" >
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Expected Delivery Date</span>
                                        </div>
										
                                        <input type="submit" name="submit" value="Save"  class="btn btn-primary" />
                                        <input type="submit" name="cancel" value="Cancel" id="ctl00_ContentPlaceHolder1_btncancel" class="btn btn-primary"/>
                                  
									   
									   
										 
									
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

									   
									
		
        
@endsection


@section('javascript')


<script type="text/javascript">
    
	
	
function validatesum() {
//  var x = document.getElementById("myInput").value;

var sum=$("#pfi_value").val();
var sumpart=0;
    $("input[name='partValue[]']").each(function() {
     //   alert(this.value);
     var a= this.value;

     if (a.length) {
     	a=parseFloat(a);
     	sumpart=sumpart+a;
     }


    });

     if(sumpart==sum){
        document.getElementById("alert").innerHTML = "";

     }
     else{
     //	alert("The sum do not match");
     document.getElementById("alert").innerHTML = "The sum of Parts and PFI Value do not match";
     }
         

     }

	
	
	$("#advance_paid").change(function () {
 var val = parseFloat($(this).val()); //get the Value
var pfi_value= parseFloat($("#pfi_value").val());
if(val>pfi_value){
	alert("Advance Value cannot be greater than PFI Value");
	$("#advance_paid").val("");
}

	});	


    $("#declaration_type").change(function () {
        var val = $(this).val(); //get the value
        if(val=='PARTIAL'){
		var bank_value=parseFloat($("#bank_value").val());
		var cash_value=parseFloat($("#cash_value").val());
		var pfi_value=parseFloat($("#pfi_value").val());
		var sum=bank_value+cash_value;
		if(pfi_value!=sum){
			 document.getElementById("alert2").innerHTML = "The sum of Bank and Cash Value with PFI Value do not match";
    
		}
		else{
				 document.getElementById("alert2").innerHTML = "";
    
		}

        }
    });

    function validatesumpartial() {

		var bank_value=parseFloat($("#bank_value").val());
		var cash_value=parseFloat($("#cash_value").val());
		var pfi_value=parseFloat($("#pfi_value").val());
		var sum=bank_value+cash_value;
		if(pfi_value!=sum){
			 document.getElementById("alert2").innerHTML = "The sum of Bank and Cash Value with PFI Value do not match";
    
		}
		else{
				 document.getElementById("alert2").innerHTML = "";
    
		}


    }
	
	
	
	
    $("#order_type").change(function () {
        var val = $(this).val(); //get the value
        if(val=='BLANKET'){

$('#parttable').removeAttr('hidden');
 //$('.inltd').prop("disabled", false); 

		}
		else{
			
		 $("#parttable").attr("hidden",true);	
		}
		});
		
		
		    $("#payment_mode").change(function () {
        var val = $(this).val(); //get the value
        if(val=='Before-DLVRT'){
			$('#payment_days').prop("disabled", true); 
			 $("#payment_days").attr("hidden",true);
		} else if(val=='AG/BL'){
			$('#payment_days').prop("disabled", true); 
			 $("#payment_days").attr("hidden",true);
			}
			else{
			$('#payment_days').prop("disabled", false); 
			$('#payment_days').removeAttr('hidden');
		}
		});
		
		
		
		$("#declaration_type").change(function () {
        var val = $(this).val(); //get the value
        if(val=='PARTIAL'){

			$('.bank_value').removeAttr('hidden');
			$('.cash_value').removeAttr('hidden');

		}
		else{
			 $(".bank_value").attr("hidden",true);
			 $(".cash_value").attr("hidden",true);
		}
		});


// f1 = 112
// f2 = 113
// f3 = 114
 
$(document).keyup(function (event) {
    console.log(event.keyCode);
    if (event.keyCode == 173) {
        console.log("you pressed F1");
		var order_confirmation_date=$("#order_confirmation_date").val();
		
		if(order_confirmation_date!=""){
			//alert(order_confirmation_date);
			 $("#delivery_date").val(order_confirmation_date)
		}
		
    }
	else if (event.keyCode == 174) {
        console.log("you pressed F1");
		var advance_payment_date=$("#advance_payment_date").val();
		
		if(advance_payment_date!=""){
		//	alert(order_confirmation_date);
			 $("#delivery_date").val(advance_payment_date)
		}
		
    };
   
    $("#log").append("<p>keyCode=" + event.keyCode + "</p>");
}); //keyup

	var tbody = $('#tablepart').children('tbody');
     
     //Then if no tbody just select your table 
     var table = tbody.length ? tbody : $('#myTable');
     
     
     $('#addpart').click(function(){
     //Add row
     tbody.append('<tr>\n\
    <td><input class="form-control"  name="partName[]" type="text"/></td>\n\
    <td><input class="form-control"  oninput="validatesum()" name="partValue[]" type="text"/></td>\n\
    <td><input class="form-control" name="partDate[]" type="date"/></td> <td></td>\n\
    </tr>');
     })
  
  
  //checkbox 
	$("input:checkbox").on('click', function() {
var $box = $(this);
var date;
  if ($box.is(":checked")) {
	  var val= $box.val();
	  var delivery_period_days=$("#delivery_period_days").val();
	      var group = "input:checkbox[name='" + $box.attr("name") + "']";

    $(group).prop("checked", false);
	//org file
    $box.prop("checked", true);
	  	 if(val==1){


			 var rfp_date=$("#advance_payment_date").val();
			  if(rfp_date=='' || delivery_period_days==''){
			  alert("Date for Advance Payment and Delivery days required");
			  $('#checkbox1').prop("checked", false);
			    }
			 else{
				//$box.prop("checked", true);
			 $('#checkbox1').prop("checked", true);	
			 
			
			var date = new Date(rfp_date);
			var date_delivery=new Date();
			var no_of_delivery_days= parseInt(delivery_period_days); 
			date_delivery.setDate(date.getDate()+no_of_delivery_days);
			var y=date_delivery.getFullYear();
			var m=date_delivery.getMonth()+1; 
			m=String(m);

			if(m.length==1){
				m="0"+m;
			}
			var d=date_delivery.getDate();  
			d=String(d);
			if(d.length==1){
				d="0"+d;
			}   
			var datedel=y+"-"+m+"-"+d;
			 console.log('days'+delivery_period_days);
			 console.log('date present'+rfp_date);
			 console.log('date future'+datedel);
			var dd= new Date(datedel);
			 console.log('dddate'+dd);

		//add with days and change value
			 $("#delivery_date").val(datedel);

			
				}
		
		}
		else{
			var order_confirmation_date=$("#order_confirmation_date").val();
			  if(order_confirmation_date=='' ||  delivery_period_days=='' ){
			  alert("Date Order Confirmation, Delivery Days required");
			   $('#checkbox2').prop("checked", false);
			}
			else{
			 $('#checkbox2').prop("checked", true);
			
			var date = new Date(order_confirmation_date);
			var date_delivery=new Date();
			var no_of_delivery_days= parseInt(delivery_period_days); 
			date_delivery.setDate(date.getDate()+no_of_delivery_days);
			var y=date_delivery.getFullYear();
			var m=date_delivery.getMonth()+1; 
			m=String(m);

			if(m.length==1){
				m="0"+m;
			}
			var d=date_delivery.getDate();  
			d=String(d);
			if(d.length==1){
				d="0"+d;
			}   
			var datedel=y+"-"+m+"-"+d;
			 console.log('days'+delivery_period_days);
			 console.log('date present'+rfp_date);
			 console.log('date future'+datedel);
			var dd= new Date(datedel);
			 console.log('dddate'+dd);

		//add with days and change value
			 $("#delivery_date").val(datedel);

		}
			
		}
	  
		 

  } else {
    $box.prop("checked", false);
  }
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

