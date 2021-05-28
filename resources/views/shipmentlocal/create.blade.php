@extends('dashboard.base')

@section('content')
 @if(Session::has('message'))
                <div class="row">
                <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                </div>
                @endif
           <div class="row m-2">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Shipment' }}</span>
                  
                    </div>
                    <div class="card-body">
                    <form enctype="multipart/form-data" action="{{ route('shipment_local.store') }}" method="post">
                    @csrf


                     <div class="row">
                    <div class="col">
                      <label><b> 
                       Shipment Date<span class="required"> *</span></b></label>
                    </div>
                    <div class="col">
                     <input placeholder="Shipment Date" required name="shipment_date"  type="date" id="shipment_date" tabindex="1" class="form-control inltd" style="width:100%;">
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
                    <select required name="supplier_id" id="supplier_id" tabindex="1" class="form-control select2" style="width:100%;">
                                     <option value="">- Select -</option>
                                          @foreach($suppliers as $spl)    
                                                        <option value="{{$spl->id}}">{{ $spl->supplier_name }} - {{ $spl->supplier_code }} </option>
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
                       PFI Number<span class="required"> *</span></b></label>
                    </div>
                    <div class="col">
                     <select required name="booking_id" id="booking_id" tabindex="1" class="form-control select2" style="width:100%;">
                                     <option value="">- Select -</option>
                                         </select>
                    </div>

                     <div class="col ml-2">
                     </div>
                  </div>      
                 </br>   

                  <div id="booking_info">

                    </div>
                    </br>
                  </br>


                   <div class="row">
                    <div class="col">
                      <label><b> 
                      Local Delivery Date<span class="required"> *</span></b></label>
                    </div>
                    <div class="col">
                     <input placeholder="Local Delivery Date" required name="local_delivery_date"  type="date" id="local_delivery_date" tabindex="1" class="form-control" style="width:100%;">
                    </div>

                     <div class="col ml-2">
                     </div>
                  </div>      
                 </br>   
                  
                   

                          


                  

                    <div  class="row ltd">
                    <div class="col">
                      <label><b> 
                        CFI Number <span class="required"> *</span></b></label>
                    </div>
                    <div class="col">
                       <input placeholder="CFI Number" required name="cfi_no"  type="text" id="" tabindex="1" class="form-control inltd" style="width:100%;">
                    </div>

                     <div class="col ml-2">
                     </div>
                  </div>  
                  </br>                      
                                                
                    
                    <div  class="row fullfield" >
                         
                    <div class="col">
                      <label><b> 
                        CFI Value <span class="required"> *</span></b></label>
                        <p id="maxcfi" style="color:red;">  </p>
                            
                    </div>
                    <div class="col">
                        <input placeholder="CFI Value" required name="goods_value"  type="number" id="goods_value" tabindex="1" class="form-control inltd" style="width:100%;">
                    </div>



                     <div class="col ml-2">
                     </div>
                  </div>  
                  </br>    


                   <div  class="row declarationfield" >
                    
                    <div class="col">
                      <label><b> 
                        Bank Value <span class="required"> *</span></b>
                          <p id="alert2" style="color:red;">  </p>
                    </label>
                             
                    </div>
                    <div class="col">
                        <input oninput="validatesum3()" placeholder="Bank Value" required name="bank_value"  type="number" id="bank_value" tabindex="1" class="form-control inltd" style="width:100%;">
                    </div>



                     <div class="col ml-2">
                     </div>
                  </div>  
                  </br>  

                   <div  class="row declarationfield" >
                   
                    <div class="col">
                      <label><b> 
                        Cash Value <span class="required"> *</span></b></label>
                            
                    </div>
                    <div class="col">
                        <input oninput="validatesum3()" placeholder="Cash Value" required name="cash_value"  type="number" id="cash_value" tabindex="1" class="form-control inltd" style="width:100%;">
                    </div>



                     <div class="col ml-2">
                     </div>
                  </div>  
                  </br>  

                    


                    <div  class="row fullfield">
                    <div class="col">
                      <label id="cfi_other_expense"><b> 
                        CFI Other Expense <span class="required"> *</span></b></label>
                    </div>
                    <div class="col">
                             <input   placeholder="CFI Other Expense" name="other_expense_value"  type="number" id="other_expense_value" tabindex="1" class="form-control inltd" style="width:100%;">
                    </div>

                    

                     <div class="col ml-2">
                     </div>
                  </div>  
                  </br>    

                                           
                      <div  class="row fullfield">
                         
                    <div class="col">
                      <label ><b> 
                       Advance Paid Value <span class="required"> *</span></b>
                       <p id="maxadvance" style="color:red;">  </p>
                   </label>
                    </div>
                    <div class="col">
                               <input  oninput="validatesum2()" placeholder="Advance Paid Value " name="advance_paid_value"  type="number" id="advance_paid_value" tabindex="1" class="form-control inltd" style="width:100%;">
                    </div>

                    

                     <div class="col ml-2">
                     </div>
                  </div>  
                  </br>         


                   <div  class="row">
                    <div class="col">
                      <label ><b> 
                      Duty Value <span class="required"> *</span></b></label>
                    </div>
                    <div class="col">
                                 <input placeholder="Duty Value " required name="duty_value" type="number"  tabindex="4" class="form-control" style="width:100%;">
                    </div>

                    

                     <div class="col ml-2">
                     </div>
                  </div>  
                  </br>         


                    <div   class="row">
                    <div class="col-4">
                      <label ><b> 
                       Part Details <span class="required"> *</span></b></label>
                    </div>
                    <div class="col-8">
                             <table hidden id="part_table">
                              <h3 style="color:red;" id="alert">  </h3>
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
                     </div>  
                  </br>                 


                         

                   

                        


                    <div   class="row">
                    <div class="col">
                      <label ><b> 
                       Due Date <span class="required"> *</span></b></label>
                    </div>
                    <div class="col">
                       <input required  name="due_date" type="date" id="advance_terms" tabindex="6" class="form-control" style="width:100%;">
                    </div>

                    

                     <div class="col ml-2">
                     </div>
                  </div>  
                  </br>     


                    <div class="row">
                    <div class="col">
                      <label ><b> 
                      Narration <span class="required"> *</span></b></label>
                    </div>
                    <div class="col">
                       <input  placeholder="Narration" name="narration" type="text" id="ctl00_ContentPlaceHolder1_txttaxfilename" tabindex="3" class="form-control" style="width:100%;">
                    </div>

                    

                     <div class="col ml-2">
                     </div>
                  </div>  
                  </br>     


                  <div class="row">
                    <div class="col">
                      <label ><b> 
                      Attachment <span class="required"> *</span></b></label>
                    </div>
                    <div class="col">
                     <input type="file" required name="attachment" id="ctl00_ContentPlaceHolder1_fludocument" style="width:100%;">
                    </div>
                <div class="col ml-2">
                     </div>
                  </div>  
                  </br>     

                  <input  name="order_type" type="text" id="order_type" hidden value="">


  

                                    
                                            





     <div class="form-group">
                        <input type="submit" name="submit" value="submit"  class="btn btn-primary">
                       
                    </div>
    </form>
                                    
                                    
                                
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
     var advance_shipped_value;
//  $("#mySelect").append('<option value=1>My option</option>');
    
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

                 
                      var booking_id=dat.id;
                      //if same booking id as selected
                      // alert('yes');   
                      if(booking_id==val){
                     //   console.log('BOOKINGS ID'+booking_id);
                      //    console.log('BOOKINGS VALUE'+val+declaration_type);
                             //save no_of days_for payment_days
                       var declaration_type=dat.declaration_type;
                          var order_type=dat.order_type;
                        payment_days=dat.payment_days; 
                        incoterms=dat.incoterms; 
                        shipped_value=dat.shipped_value;
                        pfi_value=dat.pfi_value;
                        shipment_type=dat.shipment_type;
                        advance_shipped_value=dat.advance_shipped_value;
                        if(advance_shipped_value==null){
                          advance_shipped_value=0;
                        }
                       
                        var temp_advance_Shipped=parseFloat(advance_shipped_value);
                        var temp_advance_paid=parseFloat(dat.advance_paid);
                        var rem_shipped=temp_advance_paid-temp_advance_Shipped;
                        advance_shipped_value=rem_shipped;
                     //    alert(advance_shipped_value);


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
                 for(x=0;x<data.length;x++){
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
                if(x==0){
               tbl.getElementsByTagName("tbody")[0].innerHTML="";
                }
                 //Add row
                  if(diff>0){  
                 tbody.append('<tr>\n\
                <td><input hidden name="partId[]" value="'+partid+'" /> <input  class="form-control" readonly value="'+partname+'" name="partName[]" type="text"/></td>\n\
                <td> '+diff+' </td><td><input class="form-control"  required name="goods_value[]" max="'+diff+'" type="number"/></td>\n\
                <td><input class="form-control"   name="other_expense_value[]"  type="number"/></td>\n\
                <td><input class="form-control"  oninput="validatesum()"  name="advance_paid_value[]" type="number"/></td> <td></td>\n\
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
                         bal=parseFloat(bal).toFixed(2);
                         document.getElementById('maxcfi').innerHTML='Max CFI : '+bal;
                          document.getElementById('maxadvance').innerHTML='Max Advance : '+advance_shipped_value;


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



                //if incoterms is those than its must to fill
                if( (incoterms=='CIF') || (incoterms=='EXB') || (incoterms=='FOB'))
                {

                    document.getElementById('cfi_other_expense').style.color = "red";
                    document.getElementById('cfi_other_expense2').style.color = "red";
                }else{
                      document.getElementById('cfi_other_expense').style.color = "black";    
                    document.getElementById('cfi_other_expense2').style.color = "black";
                }

                //declaration type check

                 if(declaration_type=='PARTIAL') {
                  
                       $(".declarationfield").attr("hidden",false);
                              $("#bank_value").attr("required",true);
                               $("#cash_value").attr("required",true);
                              
                      } 
                      else{
                          $(".declarationfield").attr("hidden",true);
                              $("#bank_value").attr("required",false);
                               $("#cash_value").attr("required",false);

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
                 delete bdata.company_id ;
                 delete bdata.pfi_no  ;
                 delete bdata.status  ;
                 delete bdata.attachment  ;
                 delete bdata.created_at  ;
                 delete bdata.updated_at  ;
                 delete bdata.created_by  ;
                 delete bdata.activated_at  ;
                 delete bdata.activated_by  ;
                 delete bdata.radio  ;



                var nHTML='';

nHTML +=`<ul class="list-group"> 
<li class="list-group-item">COMPANY NAME : - `+bdata.company_name+`</li>
<li class="list-group-item">PFI DATE : - `+bdata.pfi_date+`</li>
<li class="list-group-item">PO NUMBER : - `+bdata.po_number+`</li>
<li class="list-group-item">RFP DATE : - `+bdata.rfp_date+`</li>
<li class="list-group-item">ORDER CONFIRMATION DATE : - `+bdata.order_confirmation_date+`</li>
<li class="list-group-item">PFI DATE : - `+bdata.pfi_date+`</li>
<li class="list-group-item">ADVANCE PAYMENT DATE : - `+bdata.advance_payment_date+`</li>
<li class="list-group-item">DELIVERY DATE : - `+bdata.delivery_date+`</li>
<li class="list-group-item">PFI VALUE : - `+bdata.pfi_value+`  `+bdata.currency+` </li>
<li class="list-group-item">BANK VALUE : - `+bdata.bank_value+`</li>
<li class="list-group-item">CASH VALUE : - `+bdata.cash_value+`</li>
<li class="list-group-item">ADVANCE PAYMENT REQUIRED : - `+bdata.advance_paid+`</li>
<li class="list-group-item">ADVANCE PAID : - `+bdata.actual_advance_paid+`</li>
<li class="list-group-item">SHIPPED VALUE : - `+bdata.shipped_value+`</li>
<li class="list-group-item">DELIVERY PERIOD DAYS : - `+bdata.delivery_period_days+`</li>
<li class="list-group-item">EXPECTED DELIVERY DATE : - `+bdata.expected_delivery_date+`</li>
<li class="list-group-item">SHIPMENT TYPE : - `+bdata.shipment_type+`</li>
<li class="list-group-item">CBM : - `+bdata.cbm+`</li>
<li class="list-group-item">NW : - `+bdata.nw+`</li>
<li class="list-group-item">GW : - `+bdata.gw+`</li>
<li class="list-group-item">NO OF CONTAINER : - `+bdata.no_of_container+`</li>
<li class="list-group-item">ORDER TYPE : - `+bdata.order_type+`</li>
<li class="list-group-item">INCOTERMS : - `+bdata.incoterms+`</li>
<li class="list-group-item">SHIPMENT WAY : - `+bdata.shipment_way+`</li>
<li class="list-group-item">PAYMENT MODE : - `+bdata.payment_mode+`</li>
<li class="list-group-item">PAYMENT DAYS : - `+bdata.payment_days+`</li>
<li class="list-group-item">DECLARATION TYPE : - `+bdata.declaration_type+`</li>
<li class="list-group-item">NARRATION : - `+bdata.narration+`</li> </ul> `;


                for (var key in bdata) {
    var value = bdata[key];
    console.log(key, value);
    var k=key.replace(/_/g," ");
    k= k.toUpperCase();

  //  nHTML += '<li class="list-group-item" >' + k + ' : - '+value+'</li>';
            }



               
            
                    console.log(nHTML);
                document.getElementById("booking_info").innerHTML = '<div class="row" ><div class="col-8"><ul class="list-group">' + nHTML + '</ul> </div> </div>';
        
                 
             }







         });

//alert(val);
    });



$('#etd').change(function() {
    var date = $(this).val();
//  var result = new Date(date);
  //  result.setDate(date.getDate() + payment_days);
  //ebra
  /*
   var result = new Date(date);
  result.setDate(result.getDate() + payment_days);  
  alert(result);
  */

});





//validate sum for validating advance paid values 
function validatesum() {
//  var x = document.getElementById("myInput").value;

var sum=advance_shipped_value;
var sumpart=0;
    $("input[name='advance_paid_value[]']").each(function() {
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
     else if(sumpart>sum){
     // alert("The sum do not match");
     document.getElementById("alert").innerHTML = "The sum of Advance does not match to remaining advance of : "+sum;
     }
         

     }


     function validatesum2() {
//  var x = document.getElementById("myInput").value;

var sum=advance_shipped_value;
var sumpart=0;

sumpart=$("#advance_paid_value").val();

   
     if(sumpart==sum){
        document.getElementById("alert").innerHTML = "";

     }
     else if(sumpart>sum){
     // alert("The sum do not match");
     document.getElementById("alert").innerHTML = "The sum of Advance does not match to remaining advance of : "+sum;
     }
         

     }


          function validatesum3() {
//  var x = document.getElementById("myInput").value;
  var cash_value=parseFloat($("#cash_value").val());
     var bank_value=parseFloat($("#bank_value").val());
    var sum=bank_value+cash_value;

    if(order_type=='NORMAL'){
 alert("hello");
   var pfi_value=parseFloat($("#goods_value").val());
    if(pfi_value!=sum){
       document.getElementById("alert2").innerHTML = "The sum of Bank and Cash Value with CFI Value do not match";
    }
    else{
         document.getElementById("alert2").innerHTML = "";
     }

      }
      
    else {
    var sumpart=0;
    $("input[name='goods_value[]']").each(function() {
     //   alert(this.value);
     var a= this.value;

     if (a.length) {
      a=parseFloat(a);
      sumpart=sumpart+a;
     }
      });


    var pfi_value=parseFloat(sumpart);
    alert(pfi_value);
    if(pfi_value!=sum){
       document.getElementById("alert2").innerHTML = "The sum of Bank and Cash Value with CFI Value do not match";
    
    }
    else{
         document.getElementById("alert2").innerHTML = "";
      }


     }

      }






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

