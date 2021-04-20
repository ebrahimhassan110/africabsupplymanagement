@extends('dashboard.base')

@section('content')

        <div class="container-fluid">
          <div class="animated fadeIn">
          @if(count($errors))
                  <div class="form-group">
                      <div class="alert alert-danger">
                          <ul>
                              @foreach($errors->all() as $error)
                                  <li>{{$error}}</li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
              @endif
            <div class="row">
              <div class="col-sm-6 col-md-12 col-lg-12 col-xl-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                      <i class="fa fa-align-justify"> {{ __('Edit') }} {{ $user->name }}</i>
                      <span>
                      <form method="POST" action="{{ route('users.update',$user->id) }}">
                            @csrf
                            @method('PUT')
                        <input type="submit" class="btn btn-primary" name="reset_password" value="reset password">
                      </form>
                      </span>
                    </div>
                    <div class="card-body">

                      <form method="POST" action="{{ route('update_employee') }}">
                            @csrf
                            @method('PUT')
                        <h1>{{ 'Edit' }}</h1>
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <p class="text-muted">Edit Employee</p>
                        <div class="row form-group">

                          <div class="col-md-4">
                              <label>Name</label>
                              <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name" value="{{ $user->name }}" required autofocus>
                          </div>
                          <div class="col-md-4">
                              <label>Age</label>
                              <input class="form-control" type="text" placeholder="{{ 'Age' }}" name="age" value="{{ $user->age }}" required>
                          </div>

                          <div class="col-md-4">
                              <label>Date Of Birth</label>
                              <input class="form-control date" type="text" placeholder="{{ __('Date of Birth') }}" name="dob" value="{{ $user->dob }}" required>
                          </div>







                        </div>

                        <div class="row form-group">
                          <div class="col-md-4">
                              <label>Email Address</label>
                              <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ $user->email }}" required>
                          </div>
                          <div class="col-md-4">
                              <label>Address</label>
                              <input class="form-control" type="text" placeholder="{{  'Address'  }}" name="address" value="{{ $user->address }}" required>
                          </div>

                          <div class="col-md-4">
                              <label>Mobile</label>
                              <input class="form-control" type="text" placeholder="{{ 'Mobile' }}" name="tel" value="{{ $user->tel }}" required>
                          </div>

                        </div>

                        <div class="row form-group">
                          <div class="col-md-4">
                              <label>Nida</label>
                              <input class="form-control" type="text" placeholder="{{  'NIDA' }}" name="nida" value="{{ $user->nida }}" required>
                          </div>
                          <div class="col-md-4">
                              <label>TIN Number</label>
                              <input class="form-control" type="text" placeholder="{{  'TIN Number'  }}" name="tinno" value="{{ $user->tinno }}" required>
                          </div>
                        </div>
                        <div class="row form-group">
                          <div class="col-md-4">
                            <label>Join Year </label>
                              <input class="form-control" type="number" placeholder="{{  'Join Year eg: 1 or 2  ..' }}" name="joinyear" value="{{ $user->joinyear }}" min="1" required>
                          </div>
                          <div class="col-md-4">
                              <label> Date Joined </label>
                              <input class="form-control date" type="text" placeholder="{{  'Date Joined'  }}" name="datejoin" value="{{ $user->datejoin }}" required>
                          </div>
                          <div class="col-md-4">
                            <label>Role</label>
                            <select class="form-control select2" name="parent" id="parent">
                                    @php
                                      $roles = \DB::table('roles')->get();
                                    @endphp
                                    @foreach($roles as $role)
                                      <option value="{{ $role->name }}" > {{ $role->name }} </option>
                                    @endforeach
                            </select>
                          </div>
                        </div>
                        <button class="btn btn-block btn-success" type="submit">{{ __('Save') }}</button>
                        <a href="{{ route('users.index') }}" class="btn btn-block btn-primary">{{ __('Return') }}</a>
                    </form>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>

@endsection

@section('javascript')

@endsection
