@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Clearing Agent' }}</span>
                      @if(in_array("clearingagent-add", $all_permission))
                      <a href="{{route('clearingagent.create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a>
                      @endif
                    </div>
                    <div class="card-body p-0">

                        <table class="table table-responsive-sm table-striped datatable">
                        <thead>
                          <tr>
                            <td>ID</td>
                            <th>Name</th>
                            <th>Action</th>

                          </tr>
                        </thead>
                        <tbody>

                            @foreach($clearingagents as $clearingagent)
                            <tr>
                              <td>{{$clearingagent->id }}</td>
                              <td>{{$clearingagent->name }}</td>
                              <td class="d-flex flex-row">
                                @if(in_array("clearingagent-edit", $all_permission))
                                <a href="{{ url('/currency/' . $clearingagent->id . '/edit') }}" class="btn  btn-primary btn-sm">Edit</a>
                                @endif
                                @if(in_array("clearingagent-delete", $all_permission))
                                  <form action="{{ route('clearingagent.destroy', $clearingagent->id  ) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item'); ">
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
