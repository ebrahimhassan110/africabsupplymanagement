@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'CreditNote' }}</span>
                      @if(in_array("credit_note-add", $all_permission))
                      <a href="{{route('credit_note.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a>
                      @endif
                    </div>
                    <div class="card-body p-0">

                        <table class="table table-responsive-sm table-striped datatable">
                        <thead>
                          <tr>
                            <td>ID</td>
                            <th>PFI Number</th>
                            <th>Type</th>
							 <th>Amount</th>
							  <th>Currency</th>
							   <th>Created By</th>
							    <th>Date</th>
								  <th>Action</th>
                          
						  </tr>
                        </thead>
                        <tbody>

                            @foreach($credit_notes as $banker)
                            <tr>
                              <td>{{$banker->id }}</td>
								<td>{{$banker->booking->pfi_no }}</td>
								    <td>{{$banker->type }}</td>
									  <td>{{$banker->amount }}</td>
									   <td>{{$banker->currency }}</td>
									    <td>{{$banker->createdby->name }}</td>
										<td>{{$banker->created_at }}</td>
                              <td class="d-flex flex-row">
                                @if(in_array("credit_note-edit", $all_permission))
                                <a href="{{ url('/credit_note/' . $banker->id . '/edit') }}" class="btn  btn-primary btn-sm">Edit</a>
                                @endif
                                @if(in_array("credit_note-delete", $all_permission))
                                  <form action="{{ route('credit_note.destroy', $banker->id  ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item'); ">
                                      @method('DELETE')
                                      @csrf
                                      <button class="btn btn-danger btn-sm">Delete</button>
                                  </form>
                                @endif
                              </td>
                            </tr>
                            @endforeach
                        </tbody>
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
