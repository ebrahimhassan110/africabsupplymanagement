
                                  <?php
                            //    $shipment_parts = \DB::table("shipment_part")->where("shipment_id",$shipment->id)->get();
                         ?>

                                  <div class="row">
                   <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                     <div class="card">
                      <div class="card-header d-flex flex-row justify-content-between">
                       <span class="card-title">{{ 'Process Shipment: - '.$shipment_id}} </span>
                      
                     
                    </div>
                    <div class="card-body">
                   
                          
                              <form enctype="multipart/form-data"  action="{{ route('shipment-process-post', $shipment_id )}}" method="post"  >
                                @method('POST')
                                @csrf
                              
                         <div class="row">
                        <div class="col">
                          <label><b> 
                                   Description<span class="required"> *</span> </b></label> 
                        </div>
                        <div class="col">
                       <input required name="description" id="description" tabindex="1" class="form-control" style="width:100%;"/>
                                               
                                </div>


                            <div class="col">
                          <label><b> 
                                   File No<span class="required"> *</span> </b></label> 
                        </div>
                        <div class="col">
                       <input required name="file_no" id="file_no" tabindex="1" class="form-control" style="width:100%;"/>
                                               
                                </div>


                         </div>


                          </br>
                           </br>

                      <div class="row">

                             <div class="col">
                          <label><b> 
                                   Attachment<span class="required"> *</span> </b></label> 
                        </div>
                        <div class="col">
                     <input required name="attachment" type="file" placeholder="Attachment" id="ctl00_ContentPlaceHolder1_txttaxfilename" tabindex="3" class="form-control" style="width:100%;">
                                               
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
            
        