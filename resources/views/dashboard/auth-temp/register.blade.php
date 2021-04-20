
@extends('dashboard.base')

@section('content')

          <div class="container-fluid">
            <div class="fade-in">
              <div class="row">

              <div class="container">
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
        <div class="col-md-12">
          <div class="card">
            <div class="card-body p-4">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h1>{{ __('Register') }}</h1>
                    <p class="text-muted">Register Employee</p>
                    <div class="row form-group">

                      <div class="col-md-4">
                          <input class="form-control" type="text" placeholder="{{ __('Name') }}" name="name" value="{{ old('name') }}" required autofocus>
                      </div>
                      <div class="col-md-4">
                          <input class="form-control" type="text" placeholder="{{ 'Age' }}" name="age" value="{{ old('age') }}" required>
                      </div>

                      <div class="col-md-4">
                          <input class="form-control date" type="text" placeholder="{{ __('Date of Birth') }}" name="dob" value="{{ old('dob') }}" required>
                      </div>

                    </div>

                    <div class="row form-group">
                      <div class="col-md-4">
                          <input class="form-control" type="text" placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required>
                      </div>
                      <div class="col-md-4">
                          <input class="form-control" type="text" placeholder="{{  'Address'  }}" name="address" value="{{ old('address') }}" required>
                      </div>

                      <div class="col-md-4">
                          <input class="form-control" type="text" placeholder="{{ 'Mobile' }}" name="tel" value="{{ old('tel') }}" required>
                      </div>

                    </div>

                    <div class="row form-group">
                      <div class="col-md-4">
                          <input class="form-control" type="text" placeholder="{{  'NIDA' }}" name="nida" value="{{ old('nida') }}" required>
                      </div>
                      <div class="col-md-4">
                          <input class="form-control" type="text" placeholder="{{  'TIN Number'  }}" name="tinno" value="{{ old('tinno') }}" required>
                      </div>
                    </div>



                    <div class="row form-group">
                      <div class="col-md-4">
                          <input class="form-control" type="number" placeholder="{{  'Join Year eg: 1 or 2  ..' }}" name="joinyear" value="{{ old('joinyear') }}" min="1" required>
                      </div>
                      <div class="col-md-4">
                          <input class="form-control date" type="text" placeholder="{{  'Date Joined'  }}" name="datejoin" value="{{ old('datejoin') }}" required>
                      </div>
                      <div class="col-md-4">
                        <select class="form-control select2" name="role" id="role">
                                @php
                                  $roles = \DB::table('roles')->get();
                                @endphp
                                @foreach($roles as $role)
                                  <option value="{{ $role->id }}" > {{ $role->name }} </option>
                                @endforeach
                        </select>
                      </div>
                    </div>


                    <div class="row form-group">
                      <div class="col-md-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <svg class="c-icon">
                                  <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                                </svg>
                              </span>
                            </div>
                            <input class="form-control" type="password" placeholder="{{ __('Password') }}" name="password" required>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                                <svg class="c-icon">
                                  <use xlink:href="assets/icons/coreui/free-symbol-defs.svg#cui-lock-locked"></use>
                                </svg>
                              </span>
                            </div>
                            <input class="form-control" type="password" placeholder="{{ __('Confirm Password') }}" name="password_confirmation" required>
                        </div>
                      </div>
                    </div>

                    <button class="btn btn-block btn-success" type="submit">{{ __('Register') }}</button>
                </form>
            </div>

          </div>
        </div>
      </div>
    </div>
              </div>
            </div>
          </div>

@endsection

@section('javascript')

    <script src="{{ asset('js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/main.js') }}" defer></script>
@endsection
