@extends('base1')
@section('content')
<div class="container">

    @if (session('message'))
        <div class="alert alert-success">{{session('message')}} </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">{{session('error')}} </div>
    @endif
    <div class="login-box">
        <h2>Login?</h2>
        <form action="{{'/log'}}" method="POST">
            {{csrf_field()}}
          <div class="user-box">
            <input type="email" name="email"  id="email" class="form-control" placeholder="Email">
            @error('email')
                <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
          <div class="user-box mt-3">
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">

            @error('password')
            <p class="text-danger">{{$message}}</p>
        @enderror
          </div>
          <div class="flex-grow-1 mt-5">
            <a href="{{'/register'}}" class="text-white">Create an account?</a>
            <button class="btn btn-primary text-light float-end" type="submit">
                Submit
              </button>
          </div>

        </form>
      </div>
</div>
@endsection

<style>
    html {
  height: 100%;
}
body {
  background-size: cover;
  background-image:url('{{asset('/images/bg1.jpg')}}');
}

.login-box {
  position: absolute;
  top: 50%;
  left: 50%;
  width: 400px;
  padding: 40px;
  transform: translate(-50%, -50%);
  background-image:url('{{asset('/images/bg.jpg')}}');
  box-sizing: border-box;
  box-shadow: 0 15px 25px rgba(0,0,0,.6);
  border-radius: 10px;
}

.login-box h2 {
  margin: 0 0 30px;
  padding: 0;
  color: #fff;
  text-align: center;
}

.login-box .user-box {
  position: relative;
}

.login-box .user-box label {
  position: absolute;
  top:0;
  left: 0;
  padding: 10px 0;
  font-size: 16px;
  color: #fff;
  pointer-events: none;
  transition: .5s;
}
</style>
