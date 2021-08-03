@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
            <div class="fade-in">
              <div class="row">
              <div class="col-sm-12 d-flex justify-content-between">
                <h3>  ALERTS REPORT </h3>
                <div class="header-tool">
                <button  type="submit" class="btn btn-primary btn-sm" value="View All"><i class="cil-hamburger-menu">View All</i></button>
                </div>
              </div>
                
              </div>
              <!-- /.row-->
              <div class="row">
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-center">
                    <div class="card-body">
                        <div class="text-value-md d-block my-2"> BOOKING ALERT </div>
                        <div class="alert-itmem d-flex flex-column justify-content-center align-items-center">
                          <div class="text-value-md text-muted">
                            Total 
                          </div>
                          <div class="text-lg display-4">
                              {{ $bookingalert}}
                          </div>
                        </div>              
                    </div>
                    <div class="card-footer px-3 py-2">
                      <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#">
                        <span class="small font-weight-bold">View More</span>
                        <i class="c-icon cil-chevron-right"></i>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                  <div class="card text-center">
                    <div class="card-body">
                        <div class="text-value-md d-block my-2"> CUSTOM DECLARATION </div>
                        <div class="alert-itmem d-flex flex-column justify-content-center align-items-center">
                          <div class="text-value-md text-muted">
                            Total 
                          </div>
                          <div class="text-lg display-4">
                              {{ $customdeclarationalert}}
                          </div>
                        </div>
                                       
                    </div>
                    <div class="card-footer px-3 py-2">
                      <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('customdeclaration-report') }}">
                        <span class="small font-weight-bold">View More</span>
                        <i class="c-icon cil-chevron-right"></i>
                      </a>
                    </div>
                  </div>
                </div>
                

                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-center">
                      <div class="card-body">
                          <div class="text-value-md d-block my-2"> ORG B/L RCVD  </div>
                          <div class="alert-itmem d-flex flex-column justify-content-center align-items-center">
                            <div class="text-value-md text-muted">
                              Total 
                            </div>
                            <div class="text-lg display-4">
                                {{ $OrgBillOfLeadingRCVD}}
                            </div>
                          </div>
                                        
                      </div>
                      <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#">
                          <span class="small font-weight-bold">View More</span>
                          <i class="c-icon cil-chevron-right"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                   
                
                
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                    <div class="card text-center">
                      <div class="card-body">
                          <div class="text-value-md d-block my-2"> INFO TO STORES  </div>
                          <div class="alert-itmem d-flex flex-column justify-content-center align-items-center">
                            <div class="text-value-md text-muted">
                              Total 
                            </div>
                            <div class="text-lg display-4">
                                {{ $OrgBillOfLeadingRCVD}}
                            </div>
                          </div>
                                        
                      </div>
                      <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#">
                          <span class="small font-weight-bold">View More</span>
                          <i class="c-icon cil-chevron-right"></i>
                        </a>
                      </div>
                    </div>
                </div>
               
                <!-- /.col-->
              </div>
              <!-- /.row-->
              <div class="row">
                <div class="col-sm-6 col-lg-3">
                  <div class="card text-center">
                      <div class="card-body">
                          <div class="text-value-md d-block my-2"> ALERT FOR DUTY PAYMENT  </div>
                          <div class="alert-itmem d-flex flex-column justify-content-center align-items-center">
                            <div class="text-value-md text-muted">
                              Total 
                            </div>
                            <div class="text-lg display-4">
                                {{ $OrgBillOfLeadingRCVD}}
                            </div>
                          </div>
                                        
                      </div>
                      <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="#">
                          <span class="small font-weight-bold">View More</span>
                          <i class="c-icon cil-chevron-right"></i>
                        </a>
                      </div>
                    </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card ">
                    <div class="card-body">
                      <div class="text-value-md">ALERT FOR DUTY PAYMENT</div>
                      <div>Widget title</div>
                      <div class="progress progress-white progress-xs my-2">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><small class="text-muted">Widget helper text</small>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                <div class="col-sm-6 col-lg-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="text-value-md">ALERT FOR GOODS RCVD</div>
                      <div>Widget title</div>
                      <div class="progress progress-white progress-xs my-2">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><small class="text-muted">Widget helper text</small>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
                ALERT FOR DUTY PAYMENT
                <div class="col-sm-6 col-lg-3">
                  <div class="card">
                    <div class="card-body">
                      <div class="text-value-md">CLEARING BILL</div>
                      <div>Widget title</div>
                      <div class="progress progress-white progress-xs my-2">
                        <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                      </div><small class="text-muted">Widget helper text</small>
                    </div>
                  </div>
                </div>
                <!-- /.col-->
              </div>
               
              
            </div>
          </div>

@endsection

@section('javascript')
    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/widgets.js') }}"></script>
@endsection
