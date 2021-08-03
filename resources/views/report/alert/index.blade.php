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
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{route('originalbilloflading-report')}}">
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
                                {{ $infoToStories}}
                            </div>
                          </div>
                                        
                      </div>
                      <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('infotostore') }}">
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
                                {{ $dutyPayment}}
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
                          <div class="text-value-md d-block my-2"> ALERT FOR GOODS RCVD </div>
                          <div class="alert-itmem d-flex flex-column justify-content-center align-items-center">
                            <div class="text-value-md text-muted">
                              Total 
                            </div>
                            <div class="text-lg display-4">
                                {{ $goodsRCVD}}
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
                          <div class="text-value-md d-block my-2"> CLEARING BILL</div>
                          <div class="alert-itmem d-flex flex-column justify-content-center align-items-center">
                            <div class="text-value-md text-muted">
                              Total 
                            </div>
                            <div class="text-lg display-4">
                                {{ $clearingBillCount}}
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
                          <div class="text-value-md d-block my-2"> ALERT FOR COSTING </div>
                          <div class="alert-itmem d-flex flex-column justify-content-center align-items-center">
                            <div class="text-value-md text-muted">
                              Total 
                            </div>
                            <div class="text-lg display-4">
                                {{ $costingCount}}
                            </div>
                          </div>
                                        
                      </div>
                      <div class="card-footer px-3 py-2">
                        <a class="btn-block text-muted d-flex justify-content-between align-items-center" href="{{ route('addinfotostoreattachement') }}">
                          <span class="small font-weight-bold">View More</span>
                          <i class="c-icon cil-chevron-right"></i>
                        </a>
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
