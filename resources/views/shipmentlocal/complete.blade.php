
                                  <?php
                            //    $shipment_parts = \DB::table("shipment_part")->where("shipment_id",$shipment->id)->get();
                         ?>

                                  <div class="row">
                   <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                     <div class="card">
                      <div class="card-header d-flex flex-row justify-content-between">
                       <span class="card-title">{{ 'Complete Shipment ID: - '.$shipment_id}} </span>
                      
                     
                    </div>
                    <div class="card-body">
                   
                          
                              <form action="{{ route('shipmentlocal-complete-post', $shipment_id )}}" method="post"  >
                                @method('POST')
                                @csrf
                              
                         <div class="row">
                        <div class="col">
                          <label><b> 
                                    BL Number<span class="required"> *</span> </b></label> 
                        </div>
                        <div class="col">
                       <select required name="bl_no" id="bl_no" tabindex="1" class="form-control select2" style="width:100%;">
                                                 <option value="">- Select -</option>
                                                      @foreach($shipments as $shp)    
                                                                    <option value="{{$shp->id}}">{{ $shp->bl_no }} - {{ $shp->cfi_no }} </option>
                                                         @endforeach

                                                                </select>
                                </div>

             <div class="col ml-2">
             </div>
          </div>            
            </br>        


  


                <input type="submit" name="ctl00$ContentPlaceHolder1$btnsave" value="Complete" class="btn btn-primary">
                                         
                                        
                                  
                          </form>
                         
                      
                    </div>
                </div>
              </div>
            
        