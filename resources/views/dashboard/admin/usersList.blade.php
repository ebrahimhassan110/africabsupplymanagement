@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between">
                      <span class="card-title">{{ 'Employees' }}</span>
                      <a href="{{route('register')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add </a>
                    </div>
                    <div class="card-body p-0">
                   	 
                        <table class="table table-responsive-sm table-striped">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th> Contact No </th>
                            <th> Tin  </th>
                            <th>E-mail</th>
                            <th>Roles</th>
                         
                            <th>Action</th>
                             
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $user)
                            <tr>
                              <td>{{ $user->name }}</td>
                              <td>{{ $user->tel }}</td>
                              <td>{{ $user->tinno }}</td>
                              <td>{{ $user->email }}</td>
                              <td>{{ $user->menuroles }}</td>
                             
                              <td class="d-flex flex-row">
                                 
                              
                               
                                <a href="{{ url('/users/' . $user->id . '/edit') }}" class="btn  btn-primary btn-sm">Edit</a>
                            
                                @if( $you->id !== $user->id )
                                <form action="{{ route('users.destroy', $user->id ) }}" method="POST">
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
@if(Session::get('error'))
      <script>
        $(document).ready(function(){
          showToastr('danger',"{{ session('error') }}");
        });
      </script>
@endif
@endsection

