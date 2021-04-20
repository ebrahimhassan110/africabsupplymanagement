@extends('dashboard.base')

@section('content')


<div class="container-fluid">
  <div class="fade-in">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-flex flex-row justify-content-between">
              <h4>Menu roles</h4>

                    <a class="btn btn-primary" href="{{ route('roles.create') }}">Add new role</a>

            </div>

            <div class="card-body">


                <table class="table table-striped table-bordered datatable">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Hierarchy</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th></th>




                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role)
                            <tr>
                                <td>
                                    {{ $role->name }}
                                </td>
                                <td>
                                    {{ $role->hierarchy }}
                                </td>
                                <td>
                                    {{ $role->created_at }}
                                </td>
                                <td>
                                    {{ $role->updated_at }}
                                </td>
                                <td class="d-flex flex-row">
                                     
                                    <a href="{{ route('roles.edit', $role->id ) }}" class="btn btn-primary btn-sm">Edit</a>


                                <form action="{{ route('roles.destroy', $role->id ) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
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
</div>

@endsection

@section('javascript')

@endsection
