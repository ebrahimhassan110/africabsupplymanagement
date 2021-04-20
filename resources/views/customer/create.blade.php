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
                        <li><i class="fa fa-bars"></i>Customer Information</li>
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

         <form action="{{ route('customer.store') }}" method="post">
                    @csrf


                                    <table id="ctl00_ContentPlaceHolder1_tblmain" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody><tr>
            <td style="width: 50%;" valign="top">
                                                <div class="form-group">
                                                    <label>
                                                        Business Type<span class="required"> *</span></label>
                                                    <select required name="businesstype" id="ctl00_ContentPlaceHolder1_ddlbusinesstype" tabindex="1" class="form-control" style="width:50%;">
                <option selected="selected" value="">- Select -</option>
                <option value="Limited">Limited</option>
                <option value="NGO">NGO</option>
                <option value="Partnership">Partnership</option>
                <option value="Sole Proprietor">Sole Proprietor</option>

            </select>
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator24" style="color:Red;display:none;">Business Type</span>
                                                </div>



                                                 <div hidden class="form-group ltd">
                                                    <label>
                                                       ShareHolder Name<span class="required"> *</span></label>
                                                     <input required name="shareholder_name" disabled="disabled"  type="text" id="" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">ShareHolder Name</span>
                                                </div>

                                                 <div hidden class="form-group ltd">
                                                    <label>
                                                       Director Name<span class="required"> *</span></label>
                                                     <input required name="director_name" disabled="disabled"  type="text" id="" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">ShareHolder Name</span>
                                                </div>

                                               


                                            <div hidden class="form-group ptr">
                                                    <label>
                                                        Name of Partner<span class="required"> *</span></label>
                                                     <input required name="partner_name" disabled="disabled"  type="text" id="" tabindex="1" class="form-control inptr" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Partner Name</span>
                                                </div>

                                              <div hidden class="form-group trs">
                                                    <label>
                                                        Name of Trustee<span class="required"> *</span></label>
                                                     <input required name="trustee_name" disabled="disabled"  type="text" id="" tabindex="1" class="form-control intrs" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Trustee Name</span>
                                                </div>

                                            <div hidden class="form-group nida">
                                                    <label>
                                                        Nida Number<span class="required"> *</span></label>
                                                     <input required name="nida" disabled="disabled"  type="text" id="" tabindex="1" class="form-control innida" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">ShareHolder Name</span>
                                            </div>

                                                <div class="form-group">
                                                    <label>
                                                        Trading Name<span class="required"> *</span></label>
                                                    <input required name="name" type="text" id="" tabindex="1" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Trading Name</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Mobile No<span class="required"> *</span></label>
                                                    <input pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==12) return false;"  required name="contactno" type="number" id="ctl00_ContentPlaceHolder1_txtmobno" tabindex="3" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator1" style="color:Red;display:none;">Mobile No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Email<span class="required"> *</span></label>
                                                    <input  required name="email" type="email" id="ctl00_ContentPlaceHolder1_txtemail" tabindex="5" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator2" style="color:Red;display:none;">Email</span>
                                                    <span id="ctl00_ContentPlaceHolder1_RegularExpressionValidator1" style="color:Red;display:none;">* enter correct email address</span>
                                                </div>
                                              
                                                <div class="form-group">
                                                    <label>
                                                        Type<span class="required"> *</span></label>
                                                    <table id="ctl00_ContentPlaceHolder1_chklsttype" border="0">
                <tbody><tr>
                    <td><input  id="ctl00_ContentPlaceHolder1_chklsttype_0" type="checkbox" required="required" value="Monthly" name="type[]"><label for="ctl00_ContentPlaceHolder1_chklsttype_0">Monthly</label></td><td><input  required="required"value="Accounting" id="ctl00_ContentPlaceHolder1_chklsttype_1" type="checkbox" name="type[]"><label for="ctl00_ContentPlaceHolder1_chklsttype_1">Accounting</label></td><td><input value="Audit" required="required" id="ctl00_ContentPlaceHolder1_chklsttype_2" type="checkbox" name="type[]"><label for="ctl00_ContentPlaceHolder1_chklsttype_2">Audit</label></td><td><input  required="required" value="Others" id="ctl00_ContentPlaceHolder1_chklsttype_3" type="checkbox"  name="type[]"><label for="ctl00_ContentPlaceHolder1_chklsttype_3">Others</label></td>
                </tr>
            </tbody></table>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Whatsapp No<span class="required"> *</span></label>
                                                    <input required pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==13) return false;"  name="whatsappno" type="number" id="ctl00_ContentPlaceHolder1_txtwhatsappno" tabindex="15" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator9" style="color:Red;display:none;">Whatsapp No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        PO Box<span class="required"> *</span></label>
                                                    <input required name="pobox" type="text" id="ctl00_ContentPlaceHolder1_txtpobox" tabindex="17" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator10" style="color:Red;display:none;">PO Box</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Street<span class="required"> *</span></label>
                                                    <input required name="street" type="text" id="ctl00_ContentPlaceHolder1_txtstreet" tabindex="19" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator11" style="color:Red;display:none;">Street</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Plot No<span class="required"> *</span></label>
                                                    <input required name="plotNo" type="text" id="ctl00_ContentPlaceHolder1_txtplotNo" tabindex="21" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator12" style="color:Red;display:none;">Plot No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Block No<span class="required"> *</span></label>
                                                    <input required name="blockNo" type="text" id="ctl00_ContentPlaceHolder1_txtblockNo" tabindex="23" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator13" style="color:Red;display:none;">Block No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Address<span class="required"> *</span></label>
                                                    <input required name="address" type="text" id="ctl00_ContentPlaceHolder1_txtaddress" tabindex="25" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" style="color:Red;display:none;">Address</span>
                                                </div>
                                              
                                                
                                            </td>
            <td style="width: 50%;" valign="top">
                                                <div class="form-group">
                                                    <label>
                                                        Contact Person<span class="required"> *</span></label>
                                                    <input required name="contactperson" type="text" id="contactperson" tabindex="2" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvusername" style="color:Red;display:none;">Contact Person</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Tax Payer Name <span class="required">*</span></label>
                                                    <input required name="taxpayername" type="text" maxlength="250" id="taxpayername" tabindex="4" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator25" style="color:Red;display:none;">Tax Payer Name</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Tin No<span class="required"> *</span></label>
                                                    <input required name="tinno" type="text" maxlength="9" id="tinno" tabindex="4" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RegularExpressionValidator2" style="color:Red;visibility:hidden;">Please enter numbers only</span>
                                                    <span id="ctl00_ContentPlaceHolder1_rfvpassword" style="color:Red;display:none;">Tin No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>VRN No<span class="required"> *</span></label>
                                                    <input required name="vrnno" type="text" maxlength="9" id="vrnno" tabindex="6" class="form-control" onkeyup="this.value=this.value.toUpperCase()" style="width:50%;">
                                                
													<span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator4" style="color:Red;display:none;">Vrn No</span>
                                                </div>
                                                  <div class="form-group">
                                                    <label>
                                                        Tax File Name<span class="required"> *</span></label>
                                                    <input required name="taxfilename" type="text" id="ctl00_ContentPlaceHolder1_txttaxfilename" tabindex="3" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator26" style="color:Red;display:none;">Tax File Name</span>
                                                </div>
                                               
                                                <div class="form-group">
                                                    <label>
                                                        Year End<span class="required"> *</span></label>
                                                    <select required name="yearend" id="ctl00_ContentPlaceHolder1_ddlyearend" tabindex="11" class="form-control" style="width:50%;">
                <option selected="selected" value="0">- Select -</option>
                <option value="31 March">31 March</option>
                <option value="30 June">30 June</option>
                <option value="31 December">31 December</option>

            </select>
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator7" style="color:Red;display:none;">Year End</span>
                                                </div>
                                                 <div class="form-group">
                                                    <label>
                                                        Partner Incharge<span class="required"> *</span></label>
                                                    <select required name="partnerincharge" id="ctl00_ContentPlaceHolder1_ddlpartnerincharge" tabindex="7" class="form-control" style="width:50%;">
                <option value="0">- Select -</option>
                  @foreach($partners as $partner)    
                                <option value="{{$partner->id}}">{{ $partner->name }} | {{ '('.$partner->email.')' }}</option>
                     @endforeach

            </select>
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator5" style="color:Red;display:none;">Partner Incharge</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Staff Incharge<span class="required"> *</span></label>
                                                    <select required name="staffincharge" id="ctl00_ContentPlaceHolder1_ddlstaffincharge" tabindex="9" class="form-control" style="width:50%;">
                @foreach($staffs as $staff)    
                                <option value="{{$staff->id}}"> {{ $staff->name }} | {{ '('.$staff->email.')' }}</option>
                     @endforeach

            </select>
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator6" style="color:Red;display:none;">Staff Incharge</span>
                                                </div>
												<!--
                                                <div class="form-group">
                                                    <label>
                                                        Brela Certificate No<span class="required"> *</span></label>
                                                    <input required name="brelacertificateno" type="text" id="brelacertificateno" tabindex="8" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator14" style="color:Red;display:none;">Brela Certificate No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Registration Date<span class="required"> *</span></label>
                                                    <input required name="registrationdate" type="date" id="ctl00_ContentPlaceHolder1_txtregistrationdate" tabindex="10" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator15" class="star" style="color:Red;display:none;">Registration Date</span>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Nssf Employer No<span class="required"> *</span></label>
                                                    <input required name="nssfemployerno" type="text" id="ctl00_ContentPlaceHolder1_txtnssfemployerno" tabindex="12" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator16" style="color:Red;display:none;">First Name</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Nssf Control No<span class="required"> *</span></label>
                                                    <input required name="nssfcontrolno" type="text" id="ctl00_ContentPlaceHolder1_txtnssfcontrolno" tabindex="14" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator17" style="color:Red;display:none;">Nssf Control No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Wcf No<span class="required"> *</span></label>
                                                    <input required name="wcfno" type="text" id="ctl00_ContentPlaceHolder1_txtwcfno" tabindex="16" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator18" style="color:Red;display:none;">Wcf No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Efin<span class="required"> *</span></label>
                                                    <input required name="efin" type="text" id="ctl00_ContentPlaceHolder1_txtefin" tabindex="18" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator19" style="color:Red;display:none;">Efin</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Efin Password<span class="required"> *</span></label>
                                                    <input required name="password" type="text" id="ctl00_ContentPlaceHolder1_txtpassword" tabindex="20" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator20" style="color:Red;display:none;">Password</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Efin Online Password<span class="required"> *</span></label>
                                                    <input required name="efinonlinepwd" type="text" id="ctl00_ContentPlaceHolder1_txtefinonlinepwd" tabindex="20" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator8" style="color:Red;display:none;">Efin Online Password</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Online Payment Password<span class="required"> *</span></label>
                                                    <input required name="onlinepaypassword" type="text" id="ctl00_ContentPlaceHolder1_txtonlinepaypassword" tabindex="22" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator21" style="color:Red;display:none;">Online Pay Password</span>
                                                </div>
												-->
                                                <div class="form-group">
                                                    <label>
                                                        Tax Audit Last Finalize Year<span class="required"> *</span></label>
                                                    <input required name="taxauditlastfinalizedate" type="date" id="ctl00_ContentPlaceHolder1_txttaxauditlastfinalizedate" tabindex="24" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator22" class="star" style="color:Red;display:none;">Tax Audit Last Finalize Year</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Business License Expiry Date<span class="required"> *</span></label>
                                                    <input required name="businesslicenseexpirydate" type="date" id="ctl00_ContentPlaceHolder1_txtbleddate" tabindex="26" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator23" class="star" style="color:Red;display:none;">Business License Expiry Date</span>
                                                    
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Termination Service Date</label>
                                                    <input name="terminationdate" type="date" id="ctl00_ContentPlaceHolder1_txtterminationdate" tabindex="27" class="form-control" style="width:50%;">
                                                    
                                                </div>
                                            </td>
        </tr>

<table style="width:100%">
  <tr>
    <th>Institute Name</th>
      <th>Institute No</th>
        <th>Institute Control No/if any</th>
          <th>Institute Password</th>
            <th>Institute Control Password</th>
    
  </tr>

@foreach($institutes as $i)
<tr>
    <td> {{$i->instituteName}}  </td>
       
            <td>  <input name="institute[{{$i->instituteId}}][name]" value="{{$i->instituteName}}" type="hidden" ><input name="institute[{{$i->instituteId}}][no]" type="text" placeholder="Institute No" class="form-control" style="width:50%;">  </td>
                <td>  <input name="institute[{{$i->instituteId}}][control_no]" placeholder="Institute Control No" type="text"  placeholder="Institute Control No" class="form-control" style="width:50%;">   </td>
                    <td> <input name="institute[{{$i->instituteId}}][institute_password]" placeholder="Institute Password" type="text" placeholder="Institute Password"  class="form-control" style="width:50%;"> </td>
                       <td>  <input name="institute[{{$i->instituteId}}][password]" type="text" placeholder="Institute Control Password"  class="form-control" style="width:50%;">  </td> 
</tr>
</br>
@endforeach

</table>



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
    
    $("#ctl00_ContentPlaceHolder1_ddlbusinesstype").change(function () {
        var val = $(this).val(); //get the value
        if(val=='Limited'){

$('.ltd').removeAttr('hidden');
 $('.inltd').prop("disabled", false); 
 $('.nida').removeAttr('hidden');
 $('.innida').prop("disabled", false); 

$(".ptr").attr("hidden",true);
 $('.inptr').prop("disabled", true); 
        }

        else if(val=='Partnership'){

$(".ltd").attr("hidden",true);
 $('.inltd').prop("disabled", true); 

  $(".trs").attr("hidden",true);
 $('.intrs').prop("disabled", true); 



 $('.ptr').removeAttr('hidden');
 $('.inptr').prop("disabled", false); 


 $('.nida').removeAttr('hidden');
 $('.innida').prop("disabled", false); 
        }

         else if(val=='NGO'){

$(".ltd").attr("hidden",true);
 $('.inltd').prop("disabled", true); 

 $(".nida").attr("hidden",true);
 $('.innida').prop("disabled", true); 

 $(".ptr").attr("hidden",true);
 $('.inptr').prop("disabled", true); 


 $('.trs').removeAttr('hidden');
 $('.intrs').prop("disabled", false); 
        }
           else if(val=='Sole Proprietor'){

$(".ltd").attr("hidden",true);
 $('.inltd').prop("disabled", true); 

 $(".nida").attr("hidden",true);
 $('.innida').prop("disabled", true); 

 $(".ptr").attr("hidden",true);
 $('.inptr').prop("disabled", true); 

 $(".trs").attr("hidden",true);
 $('.intrs').prop("disabled", true); 


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

