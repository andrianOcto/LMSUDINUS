@extends('layouts.app')
<link href="../template/assets/pages/css/login.min.css" rel="stylesheet" type="text/css" />
</head>
<body class=" login">
@section('content')
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="../template/assets/pages/img/logo-big.png" alt="" /> </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" method="POST" action="{{ url('/login') }}">
        {{ csrf_field() }}
        <h3 class="form-title font-green">Sign In</h3>
        <div class="alert alert-danger display-hide">
            <button class="close"button>
            <span> Enter any username and password. </span>
        </div>
        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" id="username" value="{{ old('username') }}"/>
            @if ($errors->has('username'))
                <span class="help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
            @endif
          </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password" id="password"/> </div>
            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        <div class="form-actions">
            <input type="submit" class="btn green uppercase"></input>
        </div>
    </form>
    <!-- END LOGIN FORM -->
</div>
@endsection
