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
                              <form action="{{ route('banker.update', $banker->id )}}" method="post">
                                @method('PUT')
                                @csrf
                                <tbody><tr>
                                           <td style="width: 50%;" valign="top">
                                        <div class="form-group">
                                            <label>
                                                Banker Name<span class="required"> *</span></label>
                                            <input name="description"  type="text"  value="{{ $banker->description}}" class="form-control" autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Banker Name</span>
                                        </div>
										
										  <div class="form-group">
                                            <label>
                                               City<span class="required"> *</span></label>
                                            <input name="city" type="text"  value="{{ $banker->city }}" class="form-control" autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Agent Name</span>
                                        </div>
										
										
										  <div class="form-group">
                                            <label>
                                                Country<span class="required"> *</span></label>
                                            <input name="country" type="text"  value="{{ $banker->country }}" class="form-control" autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Agent Name</span>
                                        </div>
										
										
										  <div class="form-group">
                                            <label>
                                                Number<span class="required"> *</span></label>
                                            <input name="mobile_no" type="text"  value="{{ $banker->mobile_no }}" class="form-control" autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Number</span>
                                        </div>
										
										  <div class="form-group">
                                            <label>
                                                Email<span class="required"> *</span></label>
                                            <input name="email" type="text"  value="{{ $banker->email }}" class="form-control" autofocus="" style="width:50%;" required>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;"> Agent Name</span>
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

