
                                   @php

                                 
                                if($type="Booking"){
                                $payments = \DB::table("payments")->where("booking_no",$id)->get();

                                }    
                                else{
                                $payments = \DB::table("payments")->where("shipment_id",$id)->get();
                              }
                                
                            @endphp

                            <table class="table" >
                                                                            <thead>
                                                                        
                                                                                <th>  Date </th>
                                                                                <th>  Type </th>
                                                                                 <th> Amount </th>
                                                                                  <th> Currency </th>
                                                                                     <th> Cash </th>
                                                                                        <th> Bank </th>
                                                                                 <th> Banker </th>
                                                                                
                                                                            </thead>
                                                                            <tbody>
                                                                              <?php  $cashsum=0; $banksum=0;?>
                                                                                @foreach($payments as $p)
                                                                                    <tr class="sorting_asc" align="left" valign="top">

                                                                                   
                                                                        <td>{{ date('d/m/Y',strtotime($p->created_at)) }}</td>
                                                                         <td>{{ $p->payment_type}}</td>
                                                                          <td > {{ number_format($p->amount,2) }} </td>
                                                                          <td>{{ $p->currency}}</td>
                                                                           <td > {{ number_format($p->cash_value,2) }} </td>
                                                                            <td > {{ number_format($p->bank_value,2) }} </td>
                                                                            
                                                                                          <td>{{ $p->banker}}</td>
                                                                        <?php  $cashsum=$p->cash_value+$cashsum;  
                                                                        $banksum=$p->bank_value+$banksum;
                                                                        ?>                     
                                                                                    </tr>
                        
                                                                                @endforeach

                                                                                <tr>
                                                                                <td> </td>    
                                                                                 <td> </td>    
                                                                                  <td> </td>    
                                                                                   <td> TOTAL</td>    
                                                                                    <td> {{ number_format($cashsum,2) }}</td>    
                                                                                     <td>{{ number_format($banksum,2) }}</td>    
                                                                                      <td> </td>    
                                                                                </tr>
                                                                            </tbody>
                                                                                    
                                                                        </table>