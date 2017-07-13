@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    <form class="form-horizontal"  ng-controller="loginController" ng-submit="submit()" novalidate name='myForm'>
                        <div class="form-group">
                            <div class="message text-center" style="color:red" ng-show="fail_message"><strong>Please enter valid email and password.</strong></div>
                        </div>
                        {{ csrf_field()}}
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email"  ng-model="formData.email" value="" required autofocus >
                                <span style="color:red" class="help-block" ng-show="myForm.email.$dirty && myForm.email.$invalid">
                                    <strong ng-show="myForm.email.$error.required">Email is required.</strong>
                                    <strong ng-show="myForm.email.$error.email">Invalid email address.</strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" ng-model="formData.password" name="password" required>
                                <span style="color:red" class="help-block" ng-show="myForm.password.$dirty && myForm.password.$invalid">
                                    <strong ng-show="myForm.password.$error.required">Password is required.</strong>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" ng-model="remember_me"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" ng-disabled="myForm.$invalid" />Login</button>
                                <a class="btn btn-link" href="">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
