@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header"><h4>Edit role</h4></div>
            <div class="card-body">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">{{ Session::get('message') }}</div>
                @endif
                <form method="POST" action="{{ route('roles.update', $role->id) }}">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ $role->id }}"/>
                    <table class="table table-bordered datatable">
                        <tbody>
                            <tr>
                                <th>
                                    Name
                                </th>
                                <td>
                                    <input class="form-control" name="name" value="{{ $role->name }}" type="text"/>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
            <div class="col-md-12">



                    	<input type="hidden" name="role_id" value="{{$lims_role_data->id}}" />
						<div class="table-responsive">
						    <table class="table table-bordered permission-table">
						        <thead>
						        <tr>
						            <th colspan="5" class="text-center"> {{$lims_role_data->name}} {{ ('Role Permission') }}</th>
						        </tr>
						        <tr>
						            <th rowspan="2" class="text-center">Module Name</th>
						            <th colspan="4" class="text-center">
						            	<div class="checkbox">
						            		<input type="checkbox" id="select_all">
						            		<label for="select_all">{{'Permissions'}}</label>
						            	</div>
						            </th>
						        </tr>
						        <tr>
						            <th class="text-center">{{ 'View' }}</th>
						            <th class="text-center">{{ 'add' }}</th>
						            <th class="text-center">{{ 'edit' }}</th>
						            <th class="text-center">{{ 'delete' }}</th>
						        </tr>
						        </thead>
						        <tbody>
                      <tr>
                          <th  class="text-left">
                            <div class="checkbox">
						            		<input type="checkbox" value="69" id="master-permission" name="master-permission">
						            		<label for="select_all">{{ 'Master' }}</label>
						            	 </th>
                           <th colspan="4">
                          </th>
                      </tr>
                         <tr>
                        <td>Supplier</td>
                        <td class="text-center">
                            <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
                              <div class="checkbox">
                                @if(in_array("supplier-index", $all_permission))
                                <input type="checkbox" value="1" id="supplier-index" name="supplier-index" checked />
                                @else
                                <input type="checkbox" value="1" id="supplier-index" name="supplier-index">
                                @endif
                                <label for="supplier-index"></label>
                            </div>
                          </div>
                        </td>
                        <td class="text-center">
                            <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
                              <div class="checkbox">
                                @if(in_array("supplier-add", $all_permission))
                                <input type="checkbox" value="1" id="supplier-add" name="supplier-add" checked />
                                @else
                                <input type="checkbox" value="1" id="supplier-add" name="supplier-add">
                                @endif
                                <label for="supplier-add"></label>
                            </div>
                          </div>
                        </td>
                        <td class="text-center">
                            <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                              <div class="checkbox">
                                @if(in_array("supplier-edit", $all_permission))
                                <input type="checkbox" value="1" id="supplier-edit" name="supplier-edit" checked>
                                @else
                                <input type="checkbox" value="1" id="supplier-edit" name="supplier-edit">
                                @endif
                                <label for="supplier-edit"></label>
                            </div>
                          </div>
                        </td>
                        <td class="text-center">
                            <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                              <div class="checkbox">
                                @if(in_array("supplier-delete", $all_permission))
                                <input type="checkbox" value="1" id="supplier-delete" name="supplier-delete" checked>
                                @else
                                <input type="checkbox" value="1" id="supplier-delete" name="supplier-delete">
                                @endif
                                <label for="supplier-delete"></label>
                            </div>
                          </div>
                        </td>
                    </tr>
                      <tr>
  						            <td>{{ 'Pre Booking'}}</td>
  						            <td class="text-center">
  						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
  							                <div class="checkbox">
  								                @if(in_array("prebooking-index", $all_permission))
  								                <input type="checkbox" value="1" id="prebooking-index" name="prebooking-index" checked />
  								                @else
  								                <input type="checkbox" value="1" id="prebooking-index" name="prebooking-index" />
  								                @endif
  								                <label for="prebooking-index"></label>
  							            	</div>
  						            	</div>
  						            </td>
  						            <td class="text-center">
  						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
  							                <div class="checkbox">
  								                @if(in_array("prebooking-add", $all_permission))
  								               	<input type="checkbox" value="1" id="prebooking-add" name="prebooking-add" checked>
  								                @else
  								                <input type="checkbox" value="1" id="prebooking-add" name="prebooking-add">
  								                @endif
  								                <label for="prebooking-add"></label>
  							                </div>
  							            </div>
  						            </td>
  						            <td class="text-center">
  						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
  							                <div class="checkbox">
  								                @if(in_array("prebooking-edit", $all_permission))
  								                <input type="checkbox" value="1" id="prebooking-edit" name="prebooking-edit" checked />
  								                @else
  								                <input type="checkbox" value="1" id="prebooking-edit" name="prebooking-edit" />
  								                @endif
  								                <label for="prebooking-edit"></label>
  							                </div>
  							            </div>
  						            </td>
  						            <td class="text-center">
  						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
  							                <div class="checkbox">
  								                @if(in_array("prebooking-delete", $all_permission))
  								                <input type="checkbox" value="1" id="prebooking-delete" name="prebooking-delete" checked />
  								                @else
  								                <input type="checkbox" value="1" id="prebooking-delete" name="prebooking-delete" />
  								                @endif
  								                <label for="prebooking-delete"></label>
  							                </div>
  							            </div>
  						            </td>
  						        </tr>
                      <tr>
                          <td>Shipment</td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("shipment-index", $all_permission))
                                  <input type="checkbox" value="1" id="shipment-index" name="shipment-index" checked />
                                  @else
                                  <input type="checkbox" value="1" id="shipment-index" name="shipment-index" />
                                  @endif
                                  <label for="shipment-index"></label>
                              </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("shipment-add", $all_permission))
                                  <input type="checkbox" value="1" id="shipment-add" name="shipment-add" checked>
                                  @else
                                  <input type="checkbox" value="1" id="shipment-add" name="shipment-add">
                                  @endif
                                  <label for="shipment-add"></label>
                                </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("shipment-edit", $all_permission))
                                  <input type="checkbox" value="1" id="shipment-edit" name="shipment-edit" checked />
                                  @else
                                  <input type="checkbox" value="1" id="shipment-edit" name="shipment-edit" />
                                  @endif
                                  <label for="shipment-edit"></label>
                                </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("shipment-delete", $all_permission))
                                  <input type="checkbox" value="1" id="shipment-delete" name="shipment-delete" checked />
                                  @else
                                  <input type="checkbox" value="1" id="shipment-delete" name="shipment-delete" />
                                  @endif
                                  <label for="shipment-delete"></label>
                                </div>
                            </div>
                          </td>
                      </tr>
                        <tr>
                          <td>Adjustment</td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("adjustment-index", $all_permission))
                                  <input type="checkbox" value="1" id="adjustment-index" name="adjustment-index" checked />
                                  @else
                                  <input type="checkbox" value="1" id="adjustment-index" name="adjustment-index" />
                                  @endif
                                  <label for="adjustment-index"></label>
                              </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("adjustment-add", $all_permission))
                                  <input type="checkbox" value="1" id="adjustment-add" name="adjustment-add" checked>
                                  @else
                                  <input type="checkbox" value="1" id="adjustment-add" name="adjustment-add">
                                  @endif
                                  <label for="adjustment-add"></label>
                                </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                              </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("adjustment-delete", $all_permission))
                                  <input type="checkbox" value="1" id="adjustment-delete" name="adjustment-delete" checked />
                                  @else
                                  <input type="checkbox" value="1" id="adjustment-delete" name="adjustment-delete" />
                                  @endif
                                  <label for="adjustment-delete"></label>
                                </div>
                            </div>
                          </td>
                      </tr>
                      <tr>
                          <td>{{ 'Companies'}}</td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("feetype-index", $all_permission))
                                  <input type="checkbox" value="1" id="feetype-index" name="feetype-index" checked />
                                  @else
                                  <input type="checkbox" value="1" id="feetype-index" name="feetype-index" />
                                  @endif
                                  <label for="documenttype-index"></label>
                              </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("feetype-add", $all_permission))
                                  <input type="checkbox" value="1" id="feetype-add" name="feetype-add" checked>
                                  @else
                                  <input type="checkbox" value="1" id="feetype-add" name="feetype-add">
                                  @endif
                                  <label for="feetype-add"></label>
                                </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("feetype-edit", $all_permission))
                                  <input type="checkbox" value="1" id="feetype-edit" name="feetype-edit" checked />
                                  @else
                                  <input type="checkbox" value="1" id="feetype-edit" name="feetype-edit" />
                                  @endif
                                  <label for="feetype-edit"></label>
                                </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("feetype-delete", $all_permission))
                                  <input type="checkbox" value="1" id="feetype-delete" name="feetype-delete" checked />
                                  @else
                                  <input type="checkbox" value="1" id="feetype-delete" name="feetype-delete" />
                                  @endif
                                  <label for="feetype-delete"></label>
                                </div>
                            </div>
                          </td>
                      </tr>
					  
					  <tr>
                          <td>{{ 'Currency'}}</td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("currency-index", $all_permission))
                                  <input type="checkbox" value="1" id="currency-index" name="currency-index" checked />
                                  @else
                                  <input type="checkbox" value="1" id="currency-index" name="currency-index" />
                                  @endif
                                  <label for="documenttype-index"></label>
                                </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("currency-add", $all_permission))
                                  <input type="checkbox" value="1" id="currency-add" name="currency-add" checked>
                                  @else
                                  <input type="checkbox" value="1" id="currency-add" name="currency-add">
                                  @endif
                                  <label for="currency-add"></label>
                                </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("currency-edit", $all_permission))
                                  <input type="checkbox" value="1" id="currency-edit" name="currency-edit" checked />
                                  @else
                                  <input type="checkbox" value="1" id="currency-edit" name="currency-edit" />
                                  @endif
                                  <label for="currency-edit"></label>
                                </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("currency-delete", $all_permission))
                                  <input type="checkbox" value="1" id="currency-delete" name="currency-delete" checked />
                                  @else
                                  <input type="checkbox" value="1" id="currency-delete" name="currency-delete" />
                                  @endif
                                  <label for="currency-delete"></label>
                                </div>
                            </div>
                          </td>
                      </tr>
					  
					  
                      <tr>
                          <td>{{ 'Institute'}}</td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("feetype-index", $all_permission))
                                  <input type="checkbox" value="1" id="institute-index" name="institute-index" checked />
                                  @else
                                  <input type="checkbox" value="1" id="institute-index" name="institute-index" />
                                  @endif
                                  <label for="institute-index"></label>
                              </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("institute-add", $all_permission))
                                  <input type="checkbox" value="1" id="institute-add" name="institute-add" checked>
                                  @else
                                  <input type="checkbox" value="1" id="institute-add" name="institute-add">
                                  @endif
                                  <label for="institute-add"></label>
                                </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("institute-edit", $all_permission))
                                  <input type="checkbox" value="1" id="institute-edit" name="institute-edit" checked />
                                  @else
                                  <input type="checkbox" value="1" id="institute-edit" name="institute-edit" />
                                  @endif
                                  <label for="institute-edit"></label>
                                </div>
                            </div>
                          </td>
                          <td class="text-center">
                              <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
                                <div class="checkbox">
                                  @if(in_array("institute-delete", $all_permission))
                                  <input type="checkbox" value="1" id="institute-delete" name="institute-delete" checked />
                                  @else
                                  <input type="checkbox" value="1" id="institute-delete" name="institute-delete" />
                                  @endif
                                  <label for="institute-delete"></label>
                                </div>
                            </div>
                          </td>
                      </tr>
                      <tr>
                          <th  class="text-left">
                            <div class="checkbox">
						            		<input type="checkbox" id="system-permission" name="system-permission">
						            		<label for="select_all">{{ 'System Process' }}</label>
						            	 </th>
                           <th colspan="4">
                          </th>
                      </tr>
						        <tr hidden >
						            <td>{{ 'Workplan'}}</td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("workplan-index", $all_permission))
								                <input type="checkbox" value="1" id="workplan-index" name="workplan-index" checked />
								                @else
								                <input type="checkbox" value="1" id="workplan-index" name="workplan-index" />
								                @endif
								                <label for="workplan-index"></label>
							            	</div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("workplan-add", $all_permission))
								               	<input type="checkbox" value="1" id="workplan-add" name="workplan-add" checked>
								                @else
								                <input type="checkbox" value="1" id="workplan-add" name="workplan-add">
								                @endif
								                <label for="workplan-add"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("workplan-edit", $all_permission))
								                <input type="checkbox" value="1" id="workplan-edit" name="workplan-edit" checked />
								                @else
								                <input type="checkbox" value="1" id="workplan-edit" name="workplan-edit" />
								                @endif
								                <label for="workplan-edit"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("workplan-delete", $all_permission))
								                <input type="checkbox" value="1" id="workplan-delete" name="workplan-delete" checked />
								                @else
								                <input type="checkbox" value="1" id="workplan-delete" name="workplan-delete" />
								                @endif
								                <label for="workplan-delete"></label>
							                </div>
							            </div>
						            </td>
						        </tr>

						        <!-- <tr>
						            <td>{{trans('file.Purchase')}}</td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("purchases-index", $all_permission))
								                <input type="checkbox" value="1" id="purchases-index" name="purchases-index" checked>
								                @else
								                <input type="checkbox" value="1" id="purchases-index" name="purchases-index">
								                @endif
								                <label for="purchases-index"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("purchases-add", $all_permission))
								                <input type="checkbox" value="1" id="purchases-add" name="purchases-add" checked>
								                @else
								                <input type="checkbox" value="1" id="purchases-add" name="purchases-add">
								                @endif
								                <label for="purchases-add"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("purchases-edit", $all_permission))
								                <input type="checkbox" value="1" id="purchases-edit" name="purchases-edit" checked />
								                @else
								                <input type="checkbox" value="1" id="purchases-edit" name="purchases-edit">
								                @endif
								                <label for="purchases-edit"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("purchases-delete", $all_permission))
								                <input type="checkbox" value="1" id="purchases-delete" name="purchases-delete" checked>
								                @else
								                <input type="checkbox" value="1" id="purchases-delete" name="purchases-delete">
								                @endif
								                <label for="purchases-delete"></label>
							            	</div>
						            	</div>
						            </td>
						        </tr> -->




								<!-- <tr>
						            <td>Donations</td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("donations-index", $all_permission))
								                <input type="checkbox" value="1" id="donations-index" name="donations-index" checked>
								                @else
								                <input type="checkbox" value="1" id="donations-index" name="donations-index">
								                @endif
								                <label for="donations-index"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("donations-add", $all_permission))
								                <input type="checkbox" value="1" id="donations-add" name="donations-add" checked>
								                @else
								                <input type="checkbox" value="1" id="donations-add" name="donations-add">
								                @endif
								                <label for="donations-add"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">

						            </td>
						            <td class="text-center">

						            </td>
						        </tr>  -->


						        <tr hidden >
						            <td> {{'Attendance'}} </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("attendance-index", $all_permission))
								                <input type="checkbox" value="1" id="attendance-index" name="attendance-index" checked />
								                @else
								                <input type="checkbox" value="1" id="attendance-index" name="attendance-index">
								                @endif
								                <label for="attendance-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("attendance-add", $all_permission))
								                <input type="checkbox" value="1" id="attendance-add" name="attendance-add" checked />
								                @else
								                <input type="checkbox" value="1" id="attendance-add" name="attendance-add">
								                @endif
								                <label for="attendance-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("attendance-edit", $all_permission))
								                <input type="checkbox" value="1" id="attendance-edit" name="attendance-edit" checked>
								                @else
								                <input type="checkbox" value="1" id="attendance-edit" name="attendance-edit">
								                @endif
								                <label for="attendance-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("attendance-delete", $all_permission))
								                <input type="checkbox" value="1" id="attendance-delete" name="attendance-delete" checked>
								                @else
								                <input type="checkbox" value="1" id="attendance-delete" name="attendance-delete">
								                @endif
								                <label for="attendance-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>

								<tr hidden >
						            <td>{{ 'Customer Fee' }}</td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("customerfee-index", $all_permission))
								                <input type="checkbox" value="1" id="customerfee-index" name="customerfee-index" checked />
								                @else
								                <input type="checkbox" value="1" id="customerfee-index" name="customerfee-index">
								                @endif
								                <label for="invoices-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("customerfee-add", $all_permission))
								                <input type="checkbox" value="1" id="customerfee-add" name="customerfee-add" checked />
								                @else
								                <input type="checkbox" value="1" id="customerfee-add" name="customerfee-add">
								                @endif
								                <label for="customerfee-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("customerfee-edit", $all_permission))
								                <input type="checkbox" value="1" id="customerfee-edit" name="customerfee-edit" checked>
								                @else
								                <input type="checkbox" value="1" id="customerfee-edit" name="customerfee-edit">
								                @endif
								                <label for="customerfee-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("customerfee-delete", $all_permission))
								                <input type="checkbox" value="1" id="customerfee-delete" name="customerfee-delete" checked>
								                @else
								                <input type="checkbox" value="1" id="customerfee-delete" name="customerfee-delete">
								                @endif
								                <label for="customerfee-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>

						        <!-- <tr>
						            <td>{{trans('file.Expense')}}</td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("expenses-index", $all_permission))
								                <input type="checkbox" value="1" id="expenses-index" name="expenses-index" checked />
								                @else
								                <input type="checkbox" value="1" id="expenses-index" name="expenses-index">
								                @endif
								                <label for="expenses-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("expenses-add", $all_permission))
								                <input type="checkbox" value="1" id="expenses-add" name="expenses-add" checked />
								                @else
								                <input type="checkbox" value="1" id="expenses-add" name="expenses-add">
								                @endif
								                <label for="expenses-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("expenses-edit", $all_permission))
								                <input type="checkbox" value="1" id="expenses-edit" name="expenses-edit" checked>
								                @else
								                <input type="checkbox" value="1" id="expenses-edit" name="expenses-edit">
								                @endif
								                <label for="expenses-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("expenses-delete", $all_permission))
								                <input type="checkbox" value="1" id="expenses-delete" name="expenses-delete" checked>
								                @else
								                <input type="checkbox" value="1" id="expenses-delete" name="expenses-delete">
								                @endif
								                <label for="expenses-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr> -->

						        <!-- <tr>
						            <td>{{trans('file.Quotation')}}</td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("quotes-index", $all_permission))
								                <input type="checkbox" value="1" id="quotes-index" name="quotes-index" checked>
								                @else
								                <input type="checkbox" value="1" id="quotes-index" name="quotes-index">
								                @endif
								                <label for="quotes-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("quotes-add", $all_permission))
								                <input type="checkbox" value="1" id="quotes-add" name="quotes-add" checked>
								                @else
								                <input type="checkbox" value="1" id="quotes-add" name="quotes-add">
								                @endif
								                <label for="quotes-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("quotes-edit", $all_permission))
								                <input type="checkbox" value="1" id="quotes-edit" name="quotes-edit" checked>
								                @else
								                <input type="checkbox" value="1" id="quotes-edit" name="quotes-edit">
								                @endif
								                <label for="quotes-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("quotes-delete", $all_permission))
								                <input type="checkbox" value="1" id="quotes-delete" name="quotes-delete" checked>
								                @else
								                <input type="checkbox" value="1" id="quotes-delete" name="quotes-delete">
								                @endif
								                <label for="quotes-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr> -->

						        <!-- <tr>
						            <td>{{trans('file.Transfer')}}</td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("transfers-index", $all_permission))
								                <input type="checkbox" value="1" id="transfers-index" name="transfers-index" checked>
								                @else
								                <input type="checkbox" value="1" id="transfers-index" name="transfers-index">
								                @endif
								                <label for="transfers-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("transfers-add", $all_permission))
								                <input type="checkbox" value="1" id="transfers-add" name="transfers-add" checked>
								                @else
								                <input type="checkbox" value="1" id="transfers-add" name="transfers-add">
								                @endif
								                <label for="transfers-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("transfers-edit", $all_permission))
								                <input type="checkbox" value="1" id="transfers-edit" name="transfers-edit" checked>
								                @else
								                <input type="checkbox" value="1" id="transfers-edit" name="transfers-edit">
								                @endif
								                <label for="transfers-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("transfers-delete", $all_permission))
								                <input type="checkbox" value="1" id="transfers-delete" name="transfers-delete" checked>
								                @else
								                <input type="checkbox" value="1" id="transfers-delete" name="transfers-delete">
								                @endif
								                <label for="transfers-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr> -->

						        <tr hidden >
						            <td>{{ 'Record Register' }}</td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("recordregister-index", $all_permission))
								                <input type="checkbox" value="1" id="recordregister-index" name="recordregister-index" checked>
								                @else
								                <input type="checkbox" value="1" id="recordregister-index" name="recordregister-index">
								                @endif
								                <label for="recordregister-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("recordregister-add", $all_permission))
								                <input type="checkbox" value="1" id="recordregister-add" name="recordregister-add" checked>
								                @else
								                <input type="checkbox" value="1" id="recordregister-add" name="recordregister-add">
								                @endif
								                <label for="recordregister-add"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("recordregister-edit", $all_permission))
								                <input type="checkbox" value="1" id="recordregister-edit" name="recordregister-edit" checked>
								                @else
								                <input type="checkbox" value="1" id="recordregister-edit" name="recordregister-edit">
								                @endif
								                <label for="recordregister-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("recordregister-delete", $all_permission))
								                <input type="checkbox" value="1" id="recordregister-delete" name="recordregister-delete" checked>
								                @else
								                <input type="checkbox" value="1" id="recordregister-delete" name="recordregister-delete">
								                @endif
								                <label for="recordregister-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>

								<tr>
						            <td>{{ 'Payment' }}</td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("payment-index", $all_permission))
								                <input type="checkbox" value="1" id="payment-index" name="payment-index" checked>
								                @else
								                <input type="checkbox" value="1" id="payment-index" name="payment-index">
								                @endif
								                <label for="payment-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("payment-add", $all_permission))
								                <input type="checkbox" value="1" id="payment-add" name="payment-add" checked>
								                @else
								                <input type="checkbox" value="1" id="payment-add" name="payment-add">
								                @endif
								                <label for="payment-add"></label>
							                </div>
							            </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("payment-edit", $all_permission))
								                <input type="checkbox" value="1" id="payment-edit" name="payment-edit" checked>
								                @else
								                <input type="checkbox" value="1" id="payment-edit" name="payment-edit">
								                @endif
								                <label for="payment-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("payment-delete", $all_permission))
								                <input type="checkbox" value="1" id="payment-delete" name="payment-delete" checked>
								                @else
								                <input type="checkbox" value="1" id="payment-delete" name="payment-delete">
								                @endif
								                <label for="payment-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>


						        <!-- <tr>
						            <td>{{trans('file.Purchase Return')}}</td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("purchase-return-index", $all_permission))
								                <input type="checkbox" value="1" id="purchase-return-index" name="purchase-return-index" checked>
								                @else
								                <input type="checkbox" value="1" id="purchase-return-index" name="purchase-return-index">
								                @endif
								                <label for="purchase-return-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("purchase-return-add", $all_permission))
								                <input type="checkbox" value="1" id="purchase-return-add" name="purchase-return-add" checked>
								                @else
								                <input type="checkbox" value="1" id="purchase-return-add" name="purchase-return-add">
								                @endif
								                <label for="purchase-return-add"></label>
								            </div>
						                </div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("purchase-return-edit", $all_permission))
								                <input type="checkbox" value="1" id="purchase-return-edit" name="purchase-return-edit" checked>
								                @else
								                <input type="checkbox" value="1" id="purchase-return-edit" name="purchase-return-edit">
								                @endif
								                <label for="purchase-return-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
						                	<div class="checkbox">
								                @if(in_array("purchase-return-delete", $all_permission))
								                <input type="checkbox" value="1" id="purchase-return-delete" name="purchase-return-delete" checked>
								                @else
								                <input type="checkbox" value="1" id="purchase-return-delete" name="purchase-return-delete">
								                @endif
								                <label for="purchase-return-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr> -->
						        <!-- <tr>
						            <td>{{trans('file.Employee')}}</td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("employees-index", $all_permission))
								                <input type="checkbox" value="1" id="employees-index" name="employees-index" checked>
								                @else
								                <input type="checkbox" value="1" id="employees-index" name="employees-index">
								                @endif
								                <label for="employees-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("employees-add", $all_permission))
								                <input type="checkbox" value="1" id="employees-add" name="employees-add" checked>
								                @else
								                <input type="checkbox" value="1" id="employees-add" name="employees-add">
								                @endif
								                <label for="employees-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("employees-edit", $all_permission))
								                <input type="checkbox" value="1" id="employees-edit" name="employees-edit" checked>
								                @else
								                <input type="checkbox" value="1" id="employees-edit" name="employees-edit">
								                @endif
								                <label for="employees-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("employees-delete", $all_permission))
								                <input type="checkbox" value="1" id="employees-delete" name="employees-delete" checked>
								                @else
								                <input type="checkbox" value="1" id="employees-delete" name="employees-delete">
								                @endif
								                <label for="employees-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr> -->
						        <tr>
						            <td>{{trans('file.User')}}</td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("users-index", $all_permission))
								                <input type="checkbox" value="1" id="users-index" name="users-index" checked>
								                @else
								                <input type="checkbox" value="1" id="users-index" name="users-index">
								                @endif
								                <label for="users-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("users-add", $all_permission))
								                <input type="checkbox" value="1" id="users-add" name="users-add" checked>
								                @else
								                <input type="checkbox" value="1" id="users-add" name="users-add">
								                @endif
								                <label for="users-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("users-edit", $all_permission))
								                <input type="checkbox" value="1" id="users-edit" name="users-edit" checked>
								                @else
								                <input type="checkbox" value="1" id="users-edit" name="users-edit">
								                @endif
								                <label for="users-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("users-delete", $all_permission))
								                <input type="checkbox" value="1" id="users-delete" name="users-delete" checked>
								                @else
								                <input type="checkbox" value="1" id="users-delete" name="users-delete">
								                @endif
								                <label for="users-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>
						        <tr hidden >
						            <td>{{trans('file.customer')}}</td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("customers-index", $all_permission))
								                <input type="checkbox" value="1" id="customers-index" name="customers-index" checked>
								                @else
								                <input type="checkbox" value="1" id="customers-index" name="customers-index">
								                @endif
								                <label for="customers-index"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("customers-add", $all_permission))
								                <input type="checkbox" value="1" id="customers-add" name="customers-add" checked>
								                @else
								                <input type="checkbox" value="1" id="customers-add" name="customers-add">
								                @endif
								                <label for="customers-add"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue checked" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("customers-edit", $all_permission))
								                <input type="checkbox" value="1" id="customers-edit" name="customers-edit" checked>
								                @else
								                <input type="checkbox" value="1" id="customers-edit" name="customers-edit">
								                @endif
								                <label for="customers-edit"></label>
								            </div>
						            	</div>
						            </td>
						            <td class="text-center">
						                <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false">
							                <div class="checkbox">
								                @if(in_array("customers-delete", $all_permission))
								                <input type="checkbox" value="1" id="customers-delete" name="customers-delete" checked>
								                @else
								                <input type="checkbox" value="1" id="customers-delete" name="customers-delete">
								                @endif
								                <label for="customers-delete"></label>
								            </div>
						            	</div>
						            </td>
						        </tr>
						       

						        						        <!-- <tr>
						            <td>{{trans('file.Accounting')}}</td>
						            <td class="report-permissions" colspan="5">
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("account-index", $all_permission))
							                    	<input type="checkbox" value="1" id="account-index" name="account-index" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="account-index" name="account-index">
							                    	@endif
								                    <label for="account-index" class="padding05">{{trans('file.Account')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("money-transfer", $all_permission))
							                    	<input type="checkbox" value="1" id="money-transfer" name="money-transfer" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="money-transfer" name="money-transfer">
							                    	@endif
								                    <label for="money-transfer" class="padding05">{{trans('file.Money Transfer')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("balance-sheet", $all_permission))
							                    	<input type="checkbox" value="1" id="balance-sheet" name="balance-sheet" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="balance-sheet" name="balance-sheet">
							                    	@endif
								                    <label for="balance-sheet" class="padding05">{{trans('file.Balance Sheet')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
						                    	<div class="checkbox">
							                    	@if(in_array("account-statement", $all_permission))
							                    	<input type="checkbox" value="1" id="account-statement" name="account-statement" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="account-statement" name="account-statement">
							                    	@endif
								                    <label for="account-statement" class="padding05">{{trans('file.Account Statement')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						            </td>
						        </tr> -->
						        <!-- <tr>
						            <td>HRM</td>
						            <td class="report-permissions" colspan="5">
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("department", $all_permission))
							                    	<input type="checkbox" value="1" id="department" name="department" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="department" name="department">
							                    	@endif
								                    <label for="department" class="padding05">{{trans('file.Department')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("attendance", $all_permission))
							                    	<input type="checkbox" value="1" id="attendance" name="attendance" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="attendance" name="attendance">
							                    	@endif
								                    <label for="attendance" class="padding05">{{trans('file.Attendance')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("payroll", $all_permission))
							                    	<input type="checkbox" value="1" id="payroll" name="payroll" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="payroll" name="payroll">
							                    	@endif
								                    <label for="payroll" class="padding05">{{trans('file.Payroll')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("holiday", $all_permission))
							                    	<input type="checkbox" value="1" id="holiday" name="holiday" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="holiday" name="holiday">
							                    	@endif
								                    <label for="holiday" class="padding05">{{trans('file.Holiday Approve')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						            </td>
						        </tr> -->
						        <tr hidden >
						            <td>{{trans('file.Reports')}}</td>
						            <td class="report-permissions" colspan="5">
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("profit-loss", $all_permission))
							                    	<input type="checkbox" value="1" id="profit-loss" name="profit-loss" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="profit-loss" name="profit-loss">
							                    	@endif
								                    <label for="profit-loss" class="padding05">{{trans('file.Summary Report')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("best-seller", $all_permission))
							                    	<input type="checkbox" value="1" id="best-seller" name="best-seller" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="best-seller" name="best-seller">
							                    	@endif
								                    <label for="best-seller" class="padding05">{{trans('file.Best Seller')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("daily-sale", $all_permission))
							                    	<input type="checkbox" value="1" id="daily-sale" name="daily-sale" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="daily-sale" name="daily-sale">
							                    	@endif
								                    <label for="daily-sale" class="padding05">{{trans('file.Daily Sale')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("monthly-sale", $all_permission))
							                    	<input type="checkbox" value="1" id="monthly-sale" name="monthly-sale" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="monthly-sale" name="monthly-sale">
							                    	@endif
								                    <label for="monthly-sale" class="padding05">{{trans('file.Monthly Sale')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <!-- <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("daily-purchase", $all_permission))
							                    	<input type="checkbox" value="1" id="daily-purchase" name="daily-purchase" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="daily-purchase" name="daily-purchase">
							                    	@endif
								                    <label for="daily-purchase" class="padding05">{{trans('file.Daily Purchase')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span> -->
						                <!-- <span>
						                    <div aria-checked="false" aria-disabled="false">
						                    	<div class="checkbox">
							                    	@if(in_array("monthly-purchase", $all_permission))
							                    	<input type="checkbox" value="1" id="monthly-purchase" name="monthly-purchase" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="monthly-purchase" name="monthly-purchase">
							                    	@endif
								                    <label for="monthly-purchase" class="padding05">{{trans('file.Monthly Purchase')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span> -->
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("product-report", $all_permission))
							                    	<input type="checkbox" value="1" id="product-report" name="product-report" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="product-report" name="product-report">
							                    	@endif
								                    <label for="product-report" class="padding05">{{trans('file.Product Report')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("payment-report", $all_permission))
							                    	<input type="checkbox" value="1" id="payment-report" name="payment-report" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="payment-report" name="payment-report">
							                    	@endif
								                    <label for="payment-report" class="padding05">{{trans('file.Payment Report')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <!-- <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("purchase-report", $all_permission))
							                    	<input type="checkbox" value="1" id="purchase-report" name="purchase-report" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="purchase-report" name="purchase-report">
							                    	@endif
								                    <label for="purchase-report" class="padding05"> {{trans('file.Purchase Report')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span> -->
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("sale-report", $all_permission))
							                    	<input type="checkbox" value="1" id="sale-report" name="sale-report" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="sale-report" name="sale-report">
							                    	@endif
								                    <label for="sale-report" class="padding05">{{trans('file.Sale Report')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>


										 <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("tip-report", $all_permission))
							                    	<input type="checkbox" value="1" id="tip-report" name="tip-report" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="tip-report" name="tip-report">
							                    	@endif
								                    <label for="tip-report" class="padding05">Tip Report&nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>

										 <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("donation-report", $all_permission))
							                    	<input type="checkbox" value="1" id="donation-report" name="donation-report" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="donation-report" name="donation-report">
							                    	@endif
								                    <label for="donation-report" class="padding05">Donation Report &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
						                    	<div class="checkbox">
							                    	@if(in_array("warehouse-report", $all_permission))
							                    	<input type="checkbox" value="1" id="warehouse-report" name="warehouse-report" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="warehouse-report" name="warehouse-report">
							                    	@endif
								                    <label for="warehouse-report" class="padding05">{{trans('file.Warehouse Report')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
						                    	<div class="checkbox">
							                    	@if(in_array("warehouse-stock-report", $all_permission))
							                    	<input type="checkbox" value="1" id="warehouse-stock-report" name="warehouse-stock-report" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="warehouse-stock-report" name="warehouse-stock-report">
							                    	@endif
								                    <label for="warehouse-stock-report" class="padding05">{{trans('file.Warehouse Stock Chart')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
						                    	<div class="checkbox">
							                    	@if(in_array("product-qty-alert", $all_permission))
							                    	<input type="checkbox" value="1" id="product-qty-alert" name="product-qty-alert" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="product-qty-alert" name="product-qty-alert">
							                    	@endif
													<label for="product-qty-alert" class="padding05">{{trans('file.Product Quantity Alert')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
								        </span>
								        <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("user-report", $all_permission))
							                    	<input type="checkbox" value="1" id="user-report" name="user-report" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="user-report" name="user-report">
							                    	@endif
								                    <label for="user-report" class="padding05">{{trans('file.User Report')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("customer-report", $all_permission))
							                    	<input type="checkbox" value="1" id="customer-report" name="customer-report" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="customer-report" name="customer-report">
							                    	@endif
								                    <label for="customer-report" class="padding05">{{trans('file.Customer Report')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <!-- <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("supplier-report", $all_permission))
							                    	<input type="checkbox" value="1" id="supplier-report" name="supplier-report" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="supplier-report" name="supplier-report">
							                    	@endif
								                    <label for="Supplier-report" class="padding05">{{trans('file.Supplier Report')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span> -->
						              <!--   <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("due-report", $all_permission))
							                    	<input type="checkbox" value="1" id="due-report" name="due-report" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="due-report" name="due-report">
							                    	@endif
								                    <label for="due-report" class="padding05">{{trans('file.Due Report')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span> -->
						            </td>
						        </tr>
						        <tr hidden >
						            <td>{{trans('file.settings')}}</td>
						            <td class="report-permissions" colspan="5">
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("warehouse", $all_permission))
							                    	<input type="checkbox" value="1" id="warehouse" name="warehouse" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="warehouse" name="warehouse">
							                    	@endif
								                    <label for="warehouse" class="padding05">{{trans('file.Warehouse')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("customer_group", $all_permission))
							                    	<input type="checkbox" value="1" id="customer_group" name="customer_group" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="customer_group" name="customer_group">
							                    	@endif
								                    <label for="customer_group" class="padding05">{{trans('file.Customer Group')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
								            <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("brand", $all_permission))
							                    	<input type="checkbox" value="1" id="brand" name="brand" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="brand" name="brand">
							                    	@endif
								                    <label for="brand" class="padding05">{{trans('file.Brand')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
								            <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("unit", $all_permission))
							                    	<input type="checkbox" value="1" id="unit" name="unit" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="unit" name="unit">
							                    	@endif
								                    <label for="unit" class="padding05">{{trans('file.Unit')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
								            <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("tax", $all_permission))
							                    	<input type="checkbox" value="1" id="tax" name="tax" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="tax" name="tax">
							                    	@endif
								                    <label for="tax" class="padding05">{{trans('file.Tax')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("general_setting", $all_permission))
							                    	<input type="checkbox" value="1" id="general_setting" name="general_setting" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="general_setting" name="general_setting">
							                    	@endif
								                    <label for="general_setting" class="padding05">{{trans('file.General Setting')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("mail_setting", $all_permission))
							                    	<input type="checkbox" value="1" id="mail_setting" name="mail_setting" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="mail_setting" name="mail_setting">
							                    	@endif
								                    <label for="mail_setting" class="padding05">{{trans('file.Mail Setting')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <!-- <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("sms_setting", $all_permission))
							                    	<input type="checkbox" value="1" id="sms_setting" name="sms_setting" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="sms_setting" name="sms_setting">
							                    	@endif
								                    <label for="sms_setting" class="padding05">{{trans('file.SMS Setting')}} &nbsp;&nbsp;</label>
								                </div>
								            </div> -->
						                </span>
						                <span>
						                    <!-- <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("create_sms", $all_permission))
							                    	<input type="checkbox" value="1" id="create_sms" name="create_sms" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="create_sms" name="create_sms">
							                    	@endif
								                    <label for="create_sms" class="padding05">{{trans('file.Create SMS')}} &nbsp;&nbsp;</label>
								                </div>
								            </div> -->
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("pos_setting", $all_permission))
							                    	<input type="checkbox" value="1" id="pos_setting" name="pos_setting" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="pos_setting" name="pos_setting">
							                    	@endif
								                    <label for="pos_setting" class="padding05">{{trans('file.POS Setting')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <!-- <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("hrm_setting", $all_permission))
							                    	<input type="checkbox" value="1" id="hrm_setting" name="hrm_setting" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="hrm_setting" name="hrm_setting">
							                    	@endif
								                    <label for="hrm_setting" class="padding05">{{trans('file.HRM Setting')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span> -->
						            </td>
						        </tr>
						        <tr hidden >
						            <td>{{trans('file.Miscellaneous')}}</td>
						            <td class="report-permissions" colspan="5">
						            	<span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("stock_count", $all_permission))
							                    	<input type="checkbox" value="1" id="stock_count" name="stock_count" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="stock_count" name="stock_count">
							                    	@endif
								                    <label for="stock_count" class="padding05">{{trans('file.Stock Count')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <!-- <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("adjustment", $all_permission))
							                    	<input type="checkbox" value="1" id="adjustment" name="adjustment" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="adjustment" name="adjustment">
							                    	@endif
								                    <label for="adjustment" class="padding05">{{trans('file.Adjustment')}} &nbsp;&nbsp;</label>
								                </div>
								            </div> -->
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("gift_card", $all_permission))
							                    	<input type="checkbox" value="1" id="gift_card" name="gift_card" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="gift_card" name="gift_card">
							                    	@endif
								                    <label for="gift_card" class="padding05">{{trans('file.Gift Card')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("coupon", $all_permission))
							                    	<input type="checkbox" value="1" id="coupon" name="coupon" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="coupon" name="coupon">
							                    	@endif
								                    <label for="coupon" class="padding05">{{trans('file.Coupon')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("print_barcode", $all_permission))
							                    	<input type="checkbox" value="1" id="print_barcode" name="print_barcode" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="print_barcode" name="print_barcode">
							                    	@endif
								                    <label for="print_barcode" class="padding05">{{trans('file.print_barcode')}} &nbsp;&nbsp;</label>
								                </div>
								            </div>
						                </span>
						                <span>
						                    <!-- <div aria-checked="false" aria-disabled="false">
								                <div class="checkbox">
							                    	@if(in_array("empty_database", $all_permission))
							                    	<input type="checkbox" value="1" id="empty_database" name="empty_database" checked>
							                    	@else
							                    	<input type="checkbox" value="1" id="empty_database" name="empty_database">
							                    	@endif
								                    <label for="empty_database" class="padding05">{{trans('file.Empty Database')}} &nbsp;&nbsp;</label>
								                </div>
								            </div> -->
						                </span>
						            </td>
						        </tr>
						        </tbody>
						    </table>
						</div>




            </div>
        </div>
                    <button class="btn btn-primary" type="submit">Save</button>
                    <a class="btn btn-primary" href="{{ route('roles.index') }}">Return</a>

                </form>
            </div>
          </div>


@if(session()->has('not_permitted'))
  <div class="alert alert-danger alert-dismissible text-center"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>{{ session()->get('not_permitted') }}</div>
@endif





        </div>
      </div>
    </div>
  </div>
</div>

@endsection

@section('javascript')

<script type="text/javascript">

	$("ul#setting").siblings('a').attr('aria-expanded','true');
    $("ul#setting").addClass("show");
    $("ul#setting #role-menu").addClass("active");

	$("#select_all").on( "change", function() {
	    if ($(this).is(':checked')) {
	        $("tbody input[type='checkbox']").prop('checked', true);
	    }
	    else {
	        $("tbody input[type='checkbox']").prop('checked', false);
	    }
	});
</script>
@endsection
