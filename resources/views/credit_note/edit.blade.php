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
                      <span class="card-title">{{ 'Edit Clearing Agent' }} {{ 'Edit' }}</span>
                  
                    </div>
                    <div class="card-body">
                   
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                              <form action="{{ route('credit_note.update', $credit_note->id )}}" method="post">
                                @method('PUT')
                                @csrf
                                <tbody><tr>
                                           <td style="width: 50%;" valign="top">
                                        <div class="form-group">
                                            <label>
                                                PFI Number<span class="required"> *</span></label>
                                            <input readonly name="description"  type="text"  value="{{ $credit_note->booking->pfi_no}}" class="form-control" autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> PFI Number</span>
                                        </div>
										
										  <div class="form-group">
                                            <label>
                                               Currency<span class="required"> *</span></label>
                                            <input readonly name="currency" type="text"  value="{{ $credit_note->currency }}" class="form-control" autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Currency</span>
                                        </div>
										
										 <div class="form-group">
                                            <label>
                                                Type<span class="required"> *</span></label>
                                            <input readonly name="type" type="number"  value="{{ $credit_note->amount }}" class="form-control" autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Amount</span>
                                        </div>
										
										  <div class="form-group">
                                            <label>
                                                Amount<span class="required"> *</span></label>
                                            <input name="amount" type="number"  value="{{ $credit_note->amount }}" class="form-control" autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Amount</span>
                                        </div>
										
										
										
										
                                        <input type="submit"  value="Save" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$btnsave&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ctl00_ContentPlaceHolder1_btnsave" class="btn btn-primary">
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
@endsection

