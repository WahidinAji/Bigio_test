@extends('layouts.admin')
@section('title','Login Admin')
@section('main')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
            <form class="login100-form validate-form" accept-charset="UTF-8" role="form"
                action="{{ URL::route('super.postlogin') }}" method="POST">
                {{ csrf_field() }}
                <span class="login100-form-title p-b-33">
                    Login Admin
                </span>
                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    @if($errors->has('email'))
                        <span class="error">
                            {{ $errors->first('email') }}
                        </span>
                    @endif
                </div>

                <div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    @if($errors->has('password'))
                        <span class="error">
                            {{ $errors->first('password') }}
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
                        Create an account?
                    </span>
                    <a href="#" class="txt2 hov1">
                        Sign up
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
