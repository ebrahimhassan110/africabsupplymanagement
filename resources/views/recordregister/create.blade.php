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
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Edit Record Register' }}</span>

                    </div>
                    <div class="card-body p-2">

                    <form action="{{ route('Recordregister.store') }}" method="post">
                    @csrf
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody><tr>
                                    <td style="width: 50%;" valign="top">
                                        <div class="form-group">
                                            <label>
                                                Customer<span class="required"> *</span></label>
                                                <select  class="form-control select2" name="customerId" data-placeholder="select customer" required>
                                                    <option></option>
                                                    @foreach($customers as $customer)
                                                        <option value="{{$customer->customerId}}">{{ $customer->name }}</option>
                                                    @endforeach
                                                </select>
                                            <span id="ctl00_ContentPlaceHolder1_rfvfname" style="color:Red;display:none;">Customer</span>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Office<span class="required"> *</span></label>
                                            <input name="office" type="text" id="office" tabindex="3" class="form-control" style="width:90%;">
                                            <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator1" style="color:Red;display:none;">Office</span>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Document Type<span class="required"> *</span></label>
                                                <select  class="form-control select2" name="doctypeId" data-placeholder="select document type" required>
                                                    <option></option>
                                                    @foreach($documenttypes as $documenttype)
                                                        <option value="{{ $documenttype->doctypeId }}">{{ $documenttype->doctypeName }}</option>
                                                    @endforeach
                                                </select>
                                            <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator5" style="color:Red;display:none;">Document Type</span>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Document</label>
                                            <input type="file" name="attachment" id="ctl00_ContentPlaceHolder1_fludocument" style="width:50%;">
                                        </div>
                                        <input type="submit" name="ctl00$ContentPlaceHolder1$btnsave" value="Save" onclick="javascript:WebForm_DoPostBackWithOptions(new WebForm_PostBackOptions(&quot;ctl00$ContentPlaceHolder1$btnsave&quot;, &quot;&quot;, true, &quot;&quot;, &quot;&quot;, false, false))" id="ctl00_ContentPlaceHolder1_btnsave" tabindex="8" class="btn btn-primary">
                                        <input type="submit" name="ctl00$ContentPlaceHolder1$btncancel" value="Cancel" id="ctl00_ContentPlaceHolder1_btncancel" tabindex="9" class="btn btn-primary">


                                    </td>
                                    <td style="width: 50%;" valign="top">
                                        <div class="form-group">
                                            <label>
                                                Date<span class="required"> *</span></label>
                                            <input name="ctl00$ContentPlaceHolder1$txtdate" type="text" value="{{ date('d/m/Y') }}" id="ctl00_ContentPlaceHolder1_txtdate" class="form-control" readonly/>
                                            <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator3" class="star" style="color:Red;display:none;">Date</span>

                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Employee<span class="required"> *</span></label>
                                                <select  class="form-control select2" name="employeeId" data-placeholder="select employee" required>
                                                    <option></option>
                                                    @foreach($employees as $employee)
                                                        <option value="{{$employee->id}}">{{ $employee->name }} | {{ '('.$employee->email.')' }}</option>
                                                    @endforeach
                                                </select>

                                            <span id="ctl00_ContentPlaceHolder1_RequiredFieldValidator2" style="color:Red;display:none;">Employee</span>
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Status<span class="required"> *</span>
                                            </label>
                                             

                                            <select  class="form-control select2" name="status" data-placeholder="choose status" required>
                                                <option></option>
                                                @foreach($status as $stats)
                                                    <option value="{{$stats->id}}">{{ $stats->description }} </option>
                                                @endforeach
                                            </select>
                                            <!-- <table id="ctl00_ContentPlaceHolder1_rdolststatus" border="0">
                                            	<tbody>
                                                <tr>
                                            		      <td>
                                                        <input id="status" type="radio" name="status" value="Dispatched" checked="checked">
                                                        <label>Dispatched</label>
                                                      </td>
                                                      <td>
                                                        <input  type="radio" name="status" value="Received">
                                                        <label>Received</label>
                                                      </td>
                                            	   </tr>
                                              </tbody>
                                            </table> -->
                                        </div>
                                        <div class="form-group">
                                            <label>
                                                Comment</label>
                                            <textarea name="remark" rows="2"   class="form-control" style="width:90%;"></textarea>
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

@endsection
