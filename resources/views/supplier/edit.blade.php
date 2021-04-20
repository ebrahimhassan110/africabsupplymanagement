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
                        <li><i class="fa fa-bars"></i>Customer Edit</li>
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

                                <form action="{{ route('customer.update', $customer['0']->customerId )}}" method="post">
                                @method('PUT')
                                    @csrf
                                    <table id="ctl00_ContentPlaceHolder1_tblmain" cellpadding="0" cellspacing="0" border="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td style="width: 50%;" valign="top">
                                                <div class="form-group">
                                                    <label>
                                                        Business Type<span class="required"> *</span></label>
                                                    <select required name="businesstype" id="ctl00_ContentPlaceHolder1_ddlbusinesstype" tabindex="1" class="form-control" style="width:50%;">
                                                        <option <?php if($customer['0']->businesstype=='Select') echo "selected='selected'";  ?> value="">- Select -</option>
                                                        <option  <?php if($customer['0']->businesstype=='Limited') echo "selected='selected'";  ?> value="Limited">Limited</option>
                                                        <option  <?php if($customer['0']->businesstype=='NGO') echo "selected='selected'";  ?> value="NGO">NGO</option>
                                                        <option  <?php if($customer['0']->businesstype=='Partnership') echo "selected='selected'";  ?> value="Partnership">Partnership</option>
                                                        <option  <?php if($customer['0']->businesstype=='Sole Proprietor') echo "selected='selected'";  ?> value="Sole Proprietor">Sole Proprietor</option>
                                                    </select>
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator24" style="color:Red;display:none;">Business Type</span>
                                                </div>

                                                @if($customer['0']->businesstype=='Limited')
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

                                                 @endif
                                                <div class="form-group">
                                                    <label>
                                                        Trading Name<span class="required"> *</span></label>
                                                    <input value="{{ $customer['0']->name}}" required name="name" type="text" id="" tabindex="1" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Trading Name</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Mobile No<span class="required"> *</span></label>
                                                    <input  value="{{ $customer['0']->tel}}" required name="contactno" type="text" id="ctl00_ContentPlaceHolder1_txtmobno" tabindex="3" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator1" style="color:Red;display:none;">Mobile No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Email<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->email}}" required name="email" type="email" id="ctl00_ContentPlaceHolder1_txtemail" tabindex="5" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator2" style="color:Red;display:none;">Email</span>
                                                    <span id="ctl00_ContentPlaceHolder1_RegularExpressionValidator1" style="color:Red;display:none;">* enter correct email address</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Tax File Name<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->taxfilename}}" required name="taxfilename" type="text" id="ctl00_ContentPlaceHolder1_txttaxfilename" tabindex="3" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator26" style="color:Red;display:none;">Tax File Name</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Partner Incharge<span class="required"> *</span></label>
                                                    <select required name="partnerincharge" id="ctl00_ContentPlaceHolder1_ddlpartnerincharge" tabindex="7" class="form-control" style="width:50%;">
                <option value="0">- Select -</option>
                  @foreach($partners as $partner)
                                <option <?php if($customer['0']->partnerincharge==$partner->id) echo "selected='selected'";  ?> value="{{$partner->id}}">{{ $partner->name }} | {{ '('.$partner->email.')' }}</option>
                     @endforeach

            </select>
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator5" style="color:Red;display:none;">Partner Incharge</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                        Staff Incharge<span class="required"> *</span></label>
                                                    <select required name="staffincharge" id="ctl00_ContentPlaceHolder1_ddlstaffincharge" tabindex="9" class="form-control" style="width:50%;">
                @foreach($staffs as $staff)
                                <option <?php if($customer['0']->partnerincharge==$staff->id) echo "selected='selected'";  ?>  value="{{$staff->id}}">{{ $staff->name }} | {{ '('.$staff->email.')' }}</option>
                     @endforeach

            </select>
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator6" style="color:Red;display:none;">Staff Incharge</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Year End<span class="required"> *</span></label>
                                                    <select required name="yearend" id="ctl00_ContentPlaceHolder1_ddlyearend" tabindex="11" class="form-control" style="width:50%;">
                <option selected="selected" value="0">- Select -</option>
                <option <?php if($customer['0']->yearend=="31 March") echo "selected='selected'";  ?>   value="31 March">31 March</option>
                <option <?php if($customer['0']->yearend=="30 June") echo "selected='selected'";  ?>   value="30 June">30 June</option>
                <option <?php if($customer['0']->yearend=="31 December") echo "selected='selected'";  ?>  value="31 December">31 December</option>

            </select>
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator7" style="color:Red;display:none;">Year End</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Type<span class="required"> *</span></label>
                                                    <table id="ctl00_ContentPlaceHolder1_chklsttype" border="0">
                <tbody><tr>


                    <td><input  <?php   if (strpos(($customer['0']->type), 'Monthly') !== false) { echo "checked"; } ?>  id="ctl00_ContentPlaceHolder1_chklsttype_0" type="checkbox"  value="Monthly" name="type[]"><label for="ctl00_ContentPlaceHolder1_chklsttype_0">Monthly</label></td><td><input  <?php   if (strpos(($customer['0']->type), 'Accounting') !== false) { echo "checked"; } ?> value="Accounting" id="ctl00_ContentPlaceHolder1_chklsttype_1" type="checkbox" name="type[]"><label for="ctl00_ContentPlaceHolder1_chklsttype_1">Accounting</label></td><td><input <?php   if (strpos(($customer['0']->type), 'Audit') !== false) { echo "checked"; } ?>  value="Audit"  id="ctl00_ContentPlaceHolder1_chklsttype_2" type="checkbox" name="type[]"><label for="ctl00_ContentPlaceHolder1_chklsttype_2">Audit</label></td><td><input
                        <?php   if (strpos(($customer['0']->type), 'Others') !== false) { echo "checked"; } ?>  value="Others" id="ctl00_ContentPlaceHolder1_chklsttype_3" type="checkbox"  name="type[]"><label for="ctl00_ContentPlaceHolder1_chklsttype_3">Others</label></td>
                </tr>
            </tbody></table>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Whatsapp No<span class="required"> *</span></label>
                                                    <input required value="{{$customer['0']->whatsappno}}" name="whatsappno" type="text" id="ctl00_ContentPlaceHolder1_txtwhatsappno" tabindex="15" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator9" style="color:Red;display:none;">Whatsapp No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        PO Box<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->pobox}}" required name="pobox" type="text" id="ctl00_ContentPlaceHolder1_txtpobox" tabindex="17" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator10" style="color:Red;display:none;">PO Box</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Street<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->street}}"  required name="street" type="text" id="ctl00_ContentPlaceHolder1_txtstreet" tabindex="19" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator11" style="color:Red;display:none;">Street</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Plot No<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->plotNo}}"  required name="plotNo" type="text" id="ctl00_ContentPlaceHolder1_txtplotNo" tabindex="21" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator12" style="color:Red;display:none;">Plot No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Block No<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->blockNo}}"  required name="blockNo" type="text" id="ctl00_ContentPlaceHolder1_txtblockNo" tabindex="23" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator13" style="color:Red;display:none;">Block No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Address<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->address}}"  required name="address" type="text" id="ctl00_ContentPlaceHolder1_txtaddress" tabindex="25" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" style="color:Red;display:none;">Address</span>
                                                </div>


                                            </td>
            <td style="width: 50%;" valign="top">
                                                <div class="form-group">
                                                    <label>
                                                        Contact Person<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->contactperson}}"  required name="contactperson" type="text" id="contactperson" tabindex="2" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvusername" style="color:Red;display:none;">Contact Person</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Tax Payer Name <span class="required">*</span></label>
                                                    <input value="{{$customer['0']->taxpayername}}"  required name="taxpayername" type="text" maxlength="250" id="taxpayername" tabindex="4" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator25" style="color:Red;display:none;">Tax Payer Name</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Tin No<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->tinno}}"  required name="tinno" type="text" maxlength="9" id="tinno" tabindex="4" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RegularExpressionValidator2" style="color:Red;visibility:hidden;">Please enter numbers only</span>
                                                    <span id="ctl00_ContentPlaceHolder1_rfvpassword" style="color:Red;display:none;">Tin No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Vrn No<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->vrnno}}"  required name="vrnno" type="text" maxlength="9" id="vrnno" tabindex="6" class="form-control" onkeyup="this.value=this.value.toUpperCase()" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator4" style="color:Red;display:none;">Vrn No</span>
                                                </div>
                                                <!--
                                                <div class="form-group">
                                                    <label>
                                                        Brela Certificate No<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->brelacertificateno}}"  required name="brelacertificateno" type="text" id="brelacertificateno" tabindex="8" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator14" style="color:Red;display:none;">Brela Certificate No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Registration Date<span class="required"> *</span></label>
                                                    <input required value="{{$customer['0']->registrationdate}}"  name="registrationdate" type="date" id="ctl00_ContentPlaceHolder1_txtregistrationdate" tabindex="10" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator15" class="star" style="color:Red;display:none;">Registration Date</span>

                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Nssf Employer No<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->nssfemployerno}}" required name="nssfemployerno" type="text" id="ctl00_ContentPlaceHolder1_txtnssfemployerno" tabindex="12" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator16" style="color:Red;display:none;">First Name</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Nssf Control No<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->nssfcontrolno}}" required name="nssfcontrolno" type="text" id="ctl00_ContentPlaceHolder1_txtnssfcontrolno" tabindex="14" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator17" style="color:Red;display:none;">Nssf Control No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Wcf No<span class="required"> *</span></label>
                                                    <input  value="{{$customer['0']->wcfno}}"   required name="wcfno" type="text" id="ctl00_ContentPlaceHolder1_txtwcfno" tabindex="16" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator18" style="color:Red;display:none;">Wcf No</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Efin<span class="required"> *</span></label>
                                                    <input  value="{{$customer['0']->efin}}"  required name="efin" type="text" id="ctl00_ContentPlaceHolder1_txtefin" tabindex="18" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator19" style="color:Red;display:none;">Efin</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Efin Password<span class="required"> *</span></label>
                                                    <input  value="{{$customer['0']->password}}"  required name="password" type="text" id="ctl00_ContentPlaceHolder1_txtpassword" tabindex="20" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator20" style="color:Red;display:none;">Password</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Efin Online Password<span class="required"> *</span></label>
                                                    <input  value="{{$customer['0']->efinonlinepwd}}"   required name="efinonlinepwd" type="text" id="ctl00_ContentPlaceHolder1_txtefinonlinepwd" tabindex="20" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator8" style="color:Red;display:none;">Efin Online Password</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Online Payment Password<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->onlinepaypassword}}" required name="onlinepaypassword" type="text" id="ctl00_ContentPlaceHolder1_txtonlinepaypassword" tabindex="22" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator21" style="color:Red;display:none;">Online Pay Password</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Tax Audit Last Finalize Year<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->taxauditlastfinalizedate}}"   required name="taxauditlastfinalizedate" type="date" id="ctl00_ContentPlaceHolder1_txttaxauditlastfinalizedate" tabindex="24" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator22" class="star" style="color:Red;display:none;">Tax Audit Last Finalize Year</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Business License Expiry Date<span class="required"> *</span></label>
                                                    <input value="{{$customer['0']->businesslicenseexpirydate}}"  required name="businesslicenseexpirydate" type="date" id="ctl00_ContentPlaceHolder1_txtbleddate" tabindex="26" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator23" class="star" style="color:Red;display:none;">Business License Expiry Date</span>

                                                </div>
                                            -->
                                                <div class="form-group">
                                                    <label>
                                                        Termination Service Date</label>
                                                    <input value="{{$customer['0']->terminationdate}}"  name="terminationdate" type="date" id="ctl00_ContentPlaceHolder1_txtterminationdate" tabindex="27" class="form-control" style="width:50%;">

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
    <td> {{$i->institute_name}}  </td>
       
            <td>  <input name="institute[{{$i->institute_id}}][name]" value="{{$i->institute_name}}" type="hidden" ><input name="institute[{{$i->institute_id}}][no]" value="{{$i->institute_no}}" type="text" placeholder="Institute No" class="form-control" style="width:50%;">  </td>
                <td>  <input name="institute[{{$i->institute_id}}][control_no]"  value="{{$i->institute_control_no}}" placeholder="Institute Control No" type="text"  placeholder="Institute Control No" class="form-control" style="width:50%;">   </td>
                    <td> <input name="institute[{{$i->institute_id}}][institute_password]" value="{{$i->institute_password}}" placeholder="Institute Password" type="text" placeholder="Institute Password"  class="form-control" style="width:50%;"> </td>
                       <td>  <input name="institute[{{$i->institute_id}}][password]" value="{{$i->institute_online_password}}" type="text" placeholder="Institute Online Password"  class="form-control" style="width:50%;">  </td> 
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

@endsection
