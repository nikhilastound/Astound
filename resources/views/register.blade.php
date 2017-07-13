@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{ route('login')}}" > Register</a></div>
                <div class="panel-body">
                    <form class="form-horizontal" ng-controller="registerController" name="myForm" novalidate ng-submit="submit()">
                        {{ csrf_field()}}

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" ng-model="formData.name" value="" required autofocus>
								<span style="color:red" class="help-block" ng-show="myForm.name.$dirty && myForm.name.$invalid">
									<strong ng-show="myForm.name.$error.required">Name is required</strong>
								</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" ng-model="formData.email" value="" required>
								<span style="color:red" class="help-block" ng-show="myForm.email.$dirty && myForm.email.$invalid">
									<strong ng-show="myForm.email.$error.required">Name is required</strong>
									<strong ng-show="myForm.email.$error.email">Enter valid email</strong>
								</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password"  class="form-control" name="password" ng-model="formData.password" required>
								<span style="color:red" class="help-block" ng-show="myForm.password.$dirty && myForm.password.$invalid">
									<strong ng-show="myForm.password.$error.required">Password is required</strong>
								</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" compare-to="formData.password" ng-model="formData.password_confirmation" name="password_confirmation" required>
								<span style="color:red" class="help-block" ng-show="myForm.password_confirmation.$dirty && myForm.password_confirmation.$invalid">
									<strong style="color:red" ng-show="myForm.password_confirmation.$error.compareTo">Confirm password not match<br/></strong>
									<strong ng-show="myForm.password_confirmation.$error.required">Password is required</strong>
								</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" ng-disabled="myForm.$invalid">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
