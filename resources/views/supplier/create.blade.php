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
                        <li><i class="fa fa-bars"></i>Supplier Information</li>
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

         <form enctype="multipart/form-data"  action="{{ route('supplier.store') }}" method="post">
                    @csrf


                                    <table id="ctl00_ContentPlaceHolder1_tblmain" cellpadding="0" cellspacing="0" border="0" width="100%">
        <tbody><tr>
            <td style="width: 50%;" valign="top">
			
												 <div  class="form-group ltd">
                                                    <label>
                                                       Supplier Name<span class="required"> *</span></label>
                                                     <input required name="supplier_name"  type="text" id="" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Supplier Name</span>
                                                </div>
												
                                                 <div  class="form-group ltd">
                                                    <label>
                                                       Supplier Code<span class="required"> *</span></label>
                                                     <input required name="supplier_code"  type="text" id="" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Supplier Name</span>
                                                </div>
												
												
												
                                                <div class="form-group">
                                                    <label>
                                                        Company<span class="required"> *</span></label>
                                                    <select required name="company_name" id="ctl00_ContentPlaceHolder1_ddlbusinesstype" tabindex="1" class="form-control" style="width:50%;">
             <option value="0">- Select -</option>
                  @foreach($company as $cmp)    
                                <option value="{{$cmp->name}}">{{ $cmp->name }} </option>
                     @endforeach

            </select>
               <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator24" style="color:Red;display:none;">Business Type</span>
												</div>
												
												
												
											 <div  id="parttable" >
											 <h3> Add Contact Informations <span><button type="button" id="addsupplier">Add  </button></span></h3> 
									<table id="tablepart">
								<thead>
								<tr>
								  <th scope="col">Position</th>
								  <th scope="col">Name</th>
								  <th scope="col">Number</th>
								  <th scope="col">Email</th>
								
								</tr>
							  </thead>
							  
							  <tbody>
								<tr>
								  <td scope="row"><input class="form-control"  value="Director" type="text" name="position[]" /></td>
								  <td><input class="form-control"  type="text" name="name[]" /></td>
								  <td><input class="form-control"  type="number" name="number[]" /></td>
								  <td><input class="form-control"  type="email" name="email[]" /></td>
								 
								</tr>
								<tr>
								<td scope="row"><input class="form-control"  value="Manager" type="text" name="position[]" /></td>
								  <td><input class="form-control"  type="text" name="name[]" /></td>
								  <td><input class="form-control"  type="number" name="number[]" /></td>
								  <td><input class="form-control"  type="email" name="email[]" /></td>
								  
								</tr>
								</tbody>
									</table>		
									</div>
							</br>
							</br>

											<div  class="form-group ltd">
                                                    <label>
                                                       Address</label>
                                                     <input  name="address"  type="text" id="" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Address</span>
                                                </div>
												
												<div  class="form-group ltd">
                                                    <label>
                                                       City</label>
                                                     <input  name="city"  type="text" id="" tabindex="1" class="form-control inltd" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">City</span>
                                                </div>
					
                                                
                                            </td>
            <td style="width: 50%;" valign="top">
                                                <div class="form-group">
                                                    <label>
                                                        District</label>
                                                    <input  name="district" type="text" id="contactperson" tabindex="2" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_rfvusername" style="color:Red;display:none;">District</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Country<span class="required">*</span></label>
                                                    <input required name="country" type="text" maxlength="250" id="taxpayername" tabindex="4" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator25" style="color:Red;display:none;">Country</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>
                                                        Bank Details<span class="required"> *</span></label>
                                                    <textarea rows="4" cols="50"  required name="bank_detail" type="text"  tabindex="4" class="form-control" style="width:50%;"> 

                                                    </textarea>
                                                     <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator25" style="color:Red;display:none;">Bank Details</span>
                                                </div>
                                                <div class="form-group">
                                                    <label>Advance Terms</label>
                                                    <input  name="advance_terms" type="text" id="advance_terms" tabindex="6" class="form-control" style="width:50%;">
                                                
													<span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator4" style="color:Red;display:none;">Vrn No</span>
                                                </div>
                                                  <div class="form-group">
                                                    <label>
                                                        Payment Terms</label>
                                                    <input  name="payment_terms" type="text" id="ctl00_ContentPlaceHolder1_txttaxfilename" tabindex="3" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator26" style="color:Red;display:none;">Payment Terms</span>
                                                </div>
                                               
											   
											                        <div class="form-group">
                                                    <label>
                                                        Credit Days</label>
                                                    <input  name="credit_days" type="number" id="ctl00_ContentPlaceHolder1_txttaxfilename" tabindex="3" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator26" style="color:Red;display:none;">Credit Days</span>
                                                </div>

                                                <div class="form-group">
                                                    <label>
                                                      Attachment</label>
                                                    <input  name="attachment" type="file" id="ctl00_ContentPlaceHolder1_txttaxfilename" tabindex="3" class="form-control" style="width:50%;">
                                                    <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator26" style="color:Red;display:none;">Attachment</span>
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



var tbody = $('#tablepart').children('tbody');
     
     //Then if no tbody just select your table 
     var table = tbody.length ? tbody : $('#myTable');
     
     
     $('#addsupplier').click(function(){
     //Add row
     tbody.append('<tr>\n\
    <td><input class="form-control"  name="position[]" type="text"/></td>\n\
    <td><input class="form-control"  name="name[]" type="text"/></td>\n\
    <td><input class="form-control" name="number[]" type="number"/></td> \n\
	<td><input class="form-control" name="email[]" type="email"/></td> \n\
    </tr>');
     })


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

