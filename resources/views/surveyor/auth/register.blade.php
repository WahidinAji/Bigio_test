@extends('layouts.admin')
@section('title','Register Surveyor')
@section('main')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
            <form class="login100-form validate-form" accept-charset="UTF-8" role="form"
                action="{{ URL::route('surveyor.register') }}" method="POST">
                {{ csrf_field() }}
                <span class="login100-form-title p-b-33">
                    Register Surveyor
                </span>
                <fieldset>
                    <div class="form-group">
                      <input class="form-control @error('name') is-invalid @enderror" placeholder="Your name" name="name" type="text" value="{{ old('name') }}">
                      @if ($errors->has('name'))
                        <span>
                          {{ $errors->first('name') }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <input class="form-control" placeholder="Password" name="password" type="password" value="{{ old('password') }}">
                      @if ($errors->has('password'))
                        <span class="error">
                          {{ $errors->first('password') }}
                        </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <input class="form-control" placeholder="Your e-mail" name="email" type="email" value="{{ old('email') }}">
                      @if ($errors->has('email'))
                        <span>
                          {{ $errors->first('email') }}
                        </span>
                      @endif
                    </div>
                    <div class="container-login100-form-btn m-t-20">
                        <button class="login100-form-btn">
                            Submit
                        </button>
                    </div>
                    <div class="text-center">
                        <span class="txt1">
                            Have an account ?
                        </span>
                        <a href="{{ URL::route('surveyor-login') }}" class="txt2 hov1">
                            Log in here
                        </a>
                    </div>
                    {{-- <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
                    <br>
                    <p class="text-center">Have an account ?  <a href="{{URL::route('login')}}">Log in here</a></p> --}}
                  </fieldset>
            </form>
        </div>
    </div>
</div>
@endsection
