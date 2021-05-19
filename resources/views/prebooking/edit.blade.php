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
                      <span class="card-title">{{ 'Pre Booking Edit' }}</span>
                  
                    </div>
                    <div class="card-body">
                   
                              <form id="form"   action="{{route('prebooking.update',$prebooking->id)}}" method="post">
                  <table cellpadding="0" cellspacing="0" border="0" width="100%">
                           @method('PUT')
                                @csrf
                                <tbody><tr>
                                    <td style="width: 50%;" valign="top">
                                        <div class="form-group">
                                            <label>
                                               Supplier<span class="required"> *</span></label>
                                              <select required name="supplier_id" id="ctl00_ContentPlaceHolder1_ddlbusinesstype" tabindex="1" class="form-control" style="width:50%;">
                      <option value="0">- Select -</option>
                      @foreach($suppliers as $spl)  

                         @php
                         $selected = 0;
                          if(  isset($prebooking->supplier_id) AND  $prebooking->supplier_id ==$spl->id)
                            $selected = "selected";
                            @endphp

                      <option {{ $selected}} value="{{$spl->id}}">{{ $spl->supplier_code }} </option>
                        @endforeach

                        </select>    </div>
                    
                    
                     <div class="form-group">
                                            <label>
                                              Company<span class="required"> *</span></label>
                                          <select required name="company_name" id="ctl00_ContentPlaceHolder1_ddlbusinesstype" tabindex="1" class="form-control" style="width:50%;">
                <option value="0">- Select -</option>
                @foreach($companies as $cmp)    

                  @php
                         $selected = 0;
                          if(  isset($prebooking->company_name) AND  $prebooking->company_name == $cmp->name)
                            $selected = "selected";
                            @endphp
                                <option  {{ $selected}} value="{{$cmp->name}}">{{ $cmp->name }} </option>
                  @endforeach

                  </select>  
                  </div>
                    
                    
                     <div class="form-group">
                                            <label>
                                               PFI No<span class="required"> *</span></label>
                                            <input value="{{$prebooking->pfi_no}}" name="pfi_no" type="text"  class="form-control"  autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">PFI Number</span>
                                        </div>

                                         <div class="form-group">
                                            <label>
                                              Currency<span class="required"> *</span></label>
                                          <select required name="currency" id="ctl00_ContentPlaceHolder1_ddlbusinesstype" tabindex="1" class="form-control" style="width:50%;">
                <option value="0">- Select -</option>
                @foreach($currency as $cmp)    
                   @php
                         $selected = 0;
                          if(  isset($prebooking->currency) AND  $prebooking->currency == $cmp->name)
                            $selected = "selected";
                    @endphp

                                <option {{ $selected}} value="{{$cmp->name}}" >{{ $cmp->name }} </option>
                  @endforeach

                  </select>  
                                        </div>
                    
                    
                     <div class="form-group">
                                            <label>
                                                Request For Proposal Date<span class="required"> *</span></label>
                                            <input value="{{$prebooking->rfp_date}}" name="rfp_date" id="rfp_date" type="date"  class="form-control"  autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Request For Proposal Date</span>
                                        </div>
                    
                     <div class="form-group">
                                            <label>
                                                Order Confirmation Date<span class="required"> *</span></label>
                                            <input value="{{$prebooking->order_confirmation_date}}" name="order_confirmation_date" type="date" id="order_confirmation_date"  class="form-control"  autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Order Confirmation Date</span>
                                        </div>

                                         <div class="form-group">
                                            <label>
                                              Advance Payment Date</label>
                                            <input value="{{$prebooking->advance_payment_date}}" name="advance_payment_date"  id="advance_payment_date"  type="date"   class="form-control"  autofocus="" style="width:50%;" >
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Advance Payment Date</span>
                                        </div>
                    
                    
                     <div class="form-group">
                                            <label>
                                               Delivery Period/Days<span class="required"> *</span></label>
                                            <input value="{{$prebooking->delivery_period_days}}" name="delivery_period_days" id="delivery_period_days" type="number"  class="form-control"  autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Delivery Period/Days</span>
                                        </div>
                    
                    
                   
                     
                
                     <div class="form-group">
                                            <label>
                                               Delivery Date<span class="required"> *</span></label>
                                            <input value="{{$prebooking->delivery_date}}" name="delivery_date" type="date" id="delivery_date" class="form-control"  autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Delivery Date</span>
                                        </div>
                    
                    
                    
                    
                    
                     <div class="form-group">
                                            <label>
                                               PFI Value<span class="required"> *</span></label>
                                            <input value="{{$prebooking->pfi_value}}" name="pfi_value" id="pfi_value" type="text"  class="form-control"  autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">PFI Value</span>
                                        </div>
                    
                     <div class="form-group">
                                            <label>
                                               Advance Payment Value<span class="required"> *</span></label>
                                            <input  value="{{$prebooking->advance_paid}}"  name="advance_paid" type="text"  class="form-control"  autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Advance Payment Value</span>
                                        </div>
                    
                    
                    
                     <div hidden  class="form-group">
                                            <label>
                                               Expected Delivery Date<span class="required"> *</span></label>
                                            <input value="{{$prebooking->expected_delivery_date}}"  name="expected_delivery_date" type="date"  class="form-control"  autofocus="" style="width:50%;" >
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Expected Delivery Date</span>
                                        </div>
                    
                    
                    
                    
                    
                    
                    
                                        <input type="submit" name="submit" value="Save"  class="btn btn-primary">
                                        <input type="submit" name="cancel" value="Cancel" id="ctl00_ContentPlaceHolder1_btncancel" class="btn btn-primary">
                                        
                                    </td>
                  
                  
                     <td style="width: 50%;" valign="top" >
                     
                      <div class="form-group">
                                            <label>
                                               Shipment Type<span class="required"> *</span></label>
                                          
                      <select   required name="shipment_type" id="ctl00_ContentPlaceHolder1_ddlbusinesstype" tabindex="1" class="form-control" style="width:50%;">
                      <option <?php if($prebooking->shipment_type=='FCL') echo "selected"; ?> value="FCL" >FCL</option>
                      <option <?php if($prebooking->shipment_type=='LCL') echo "selected"; ?> value="LCL" >LCL</option>
                      <option <?php if($prebooking->shipment_type=='Local') echo "selected"; ?> value="Local" >Local</option>
                      
                        </select>   
                     </div>
                    
                     <div class="form-group">
                                            <label>
                                               CBM</label>
                                            <input value="{{$prebooking->cbm}}" name="cbm" type="text"  class="form-control"  autofocus="" style="width:50%;" >
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> CBM</span>
                                        </div>
                    
                    
                     <div class="form-group">
                                            <label>
                                               Net weight</label>
                                            <input value="{{$prebooking->nw}}" name="nw" type="text"  class="form-control"  autofocus="" style="width:50%;" >
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> NW</span>
                                        </div>
                    
                     <div class="form-group">
                                            <label>
                                               Gross weight</label>
                                            <input value="{{$prebooking->gw}}" name="gw" type="text"  class="form-control"  autofocus="" style="width:50%;" >
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Gross weight</span>
                                        </div>
                    <div class="form-group">
                                            <label>
                                               No of Container</label>
                                            <input value="{{$prebooking->no_of_container}}" name="no_of_container" type="text"  class="form-control"  autofocus="" style="width:50%;" >
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> No of Container</span>
                                        </div>
                    
                     <div class="form-group">
                                            <label>
                                               Order Type<span class="required"> *</span></label>
                                          
                      <input type="text" value="{{$prebooking->order_type}}" readonly  name="order_type" id="order_type" tabindex="1" class="form-control" style="width:50%;" />
                     
                     </div>
                     <?php if($prebooking->order_type=='BLANKET'){ ?>
                     <div  id="parttable" >
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

                   @foreach($prebooking_parts as $ii)
                <tr>
                  <th scope="row">
                    <input class="form-control" hidden  type="text"  value="{{$ii->id}}" name="partId[]" />
                    <input class="form-control"  type="text"  value="{{$ii->name}}" name="partName[]" /></th>
                  <td><input class="form-control"  type="text" value="{{$ii->value}}"  oninput="validatesum()" name="partValue[]" /></td>
                  <td><input class="form-control"  type="date" value="{{$ii->date}}" name="partDate[]" /></td>
                  <td> <button type="button" id="addpart">Add  </button></td>
                  
                </tr>
                @endforeach
               
                </tbody>
                  </table>    
                  </div>
                <?php   } ?>
                    
                      <div class="form-group">
                                            <label>
                                               INCOTERMS<span class="required"> *</span></label>
                                          
                      <select required name="incoterms" id="ctl00_ContentPlaceHolder1_ddlbusinesstype" tabindex="1" class="form-control" style="width:50%;">
                      <option value="EXW" >EXW</option>
                      <option value="FOB" >FOB</option>
                      <option value="CIF" >CIF</option>
                      <option value="CFR" >CFR</option>
                      <option value="DDP" >DDP</option>
                      </select>   
                     </div>
                     
                     <div class="form-group">
                                            <label>

                                               SHIPMENT WAY<span class="required"> *</span></label>
                                          
                      <select required name="shipment_way" id="ctl00_ContentPlaceHolder1_ddlbusinesstype" tabindex="1" class="form-control" style="width:50%;">
                      <option value="SEA" >SEA</option>
                      <option value="AIR" >AIR</option>
                      <option value="AIR-DTD" >AIR</option>
                      <option value="LAND" >LAND</option>
                      <option value="LAND-DTD" >LAND-DTD</option>
                      
                      </select>   
                     </div>
                     
                     <div class="form-group">
                                            <label>

                                              PAYMENT MODE<span class="required"> *</span></label>
                                          
                      <select required name="payment_mode" id="payment_mode" tabindex="1" class="form-control" style="width:50%;">
                      <option value="OA" >OA</option>
                      <option value="LC" >LC</option>
                      <option value="AVZ" >AVZ</option>
                      <option value="CAD" >CAD</option>
                      <option value="Before-DLVRT" >Before-DLVRT</option>
                      <option value="AG/BL" >AG/BL</option>
                      
                      </select>   
                     </div>
                     
                      <div id="payment_days" class="form-group">
                                            <label>
                                              Payment Days</label>
                                            <input  name="payment_days" id="payment_days" type="text"  class="form-control"  autofocus="" style="width:50%;" >
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Payment Days</span>
                                        </div>
                    
                    <div  class="form-group">
                                            <label>
                                              Declaration Type</label>
                        
                         <select required name="declaration_type" id="declaration_type" tabindex="1" class="form-control" style="width:50%;">
                      <option value="FULL" >FULL</option>
                      <option value="PARTIAL" >PARTIAL</option>
                      
                      </select>   
                                              </div>
                    
                  
                        
                        
                          <div   hidden class="form-group bank_value">
                            <h3 style="color:red" id="alert2" ></h3>  
                                            <label>
                                              Bank Value</label>
                                            <input  name="bank_value" id="bank_value" type="text" oninput="validatesumpartial()"  class="form-control partialvalues"  autofocus="" style="width:50%;" >
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Bank Value</span>
                      </div>
                     
                         <div   hidden class="form-group cash_value">
                                            <label  >
                                              Cash Value</label>
                                            <input   name="cash_value" id="cash_value" type="text"  oninput="validatesumpartial()" class="form-control partialvalues"  autofocus="" style="width:50%;" >
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Cash Value</span>
                      </div>
                      
                      <div class="form-group">
                                            <label>
                                             Narration</label>
                                            <input name="narration" type="text"  class="form-control"  autofocus="" style="width:50%;" >
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Narration</span>
                      </div>


                     
                      
                      </td>
                    </tr>
                  </tbody>
                </table>
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
     // alert("The sum do not match");
     document.getElementById("alert").innerHTML = "The sum of Parts and PFI Value do not match";
     }
         

     }

  
  
    
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
    //  alert(order_confirmation_date);
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

