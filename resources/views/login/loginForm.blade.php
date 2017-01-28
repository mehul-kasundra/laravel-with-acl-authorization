@extends('login.layout')

@section('content')
    <div class="col-sm-10 col-sm-push-1 col-md-4 col-md-push-4 col-lg-4 col-lg-push-4 m-t-3">
        <!-- <h2 class="text-primary center m-a-2">
            <i class="material-icons md-36">control_point</i> <span class="icon-text">{{ AppHelper::getConfigValue('COMPANY_NAME') }}</span>
        </h2> -->
        <div class="card-group">
            <div class="card">
               <div class="card-header bg-white p-a-1">
                    <div class="row">
                        <div class="col-xs-9">
                            <h4 class="text-primary">
                                <button type="button" class="btn btn-primary-outline btn-circle">
                                    <i class="material-icons">lock</i>
                                </button>
                                <span class="icon-text">{{ AppHelper::getConfigValue('COMPANY_NAME') }}</span>
                            </h4>
                        </div>
                        <!-- <div class="col-xs-3 text-xs-right">
                            <i class="material-icons md-48 text-muted-light">lock</i>
                        </div> -->
                    </div>
                </div>
                <div class="card-block bg-light">
                    

                    @include('login.error.error')

                    <form class="form-horizontal" role="form" method="POST" action="{{route('admin.login')}}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email Address" autofocus required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <!-- <a href="#" class="pull-xs-right">
                                <small>Forgot?</small>
                            </a> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-6">
                                <div class="form-check">
                                  <!-- <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="">
                                    Remember me
                                  </label> -->
                                  <label class="c-input c-checkbox">
                                      <input type="checkbox">
                                      <span class="c-indicator"></span> <span class="text-muted">Remember me</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-block" value="Sign in!">
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <div class="card hidden-xs-up">
            <div class="card-header bg-white m-b-1">
                <h1 class="card-title center">SIGN UP</h1>
            </div>
            <div class="card-block">
                <!-- <h4 class="center m-b-2">SIGN UP</h4> -->
                <div class="form-design1">
                    <form>
                        <div class="form-group row">
                          <div class="col-xs-12">
                            <div class="gender">
                                <div class="row">
                                    <div class="col-xs-6 center border-right">
                                        <label class="custom-control custom-radio">
                                          <input id="radio1" name="radio" type="radio" class="custom-control-input">
                                          <span class="custom-control-indicator"></span>
                                          <span class="custom-control-description">Male</span>
                                        </label>
                                        <i class="fa fa-mars" aria-hidden="true"></i>
                                      </div>
                                      <div class="col-xs-6 center">
                                            <label class="custom-control custom-radio">
                                              <input id="radio2" name="radio" type="radio" class="custom-control-input">
                                              <span class="custom-control-indicator"></span>
                                              <span class="custom-control-description">Female</span>
                                            </label>
                                            <i class="fa fa-venus" aria-hidden="true"></i>
                                      </div>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                            <label class="input">
                                <i class="icon-prepend fa fa-user" aria-hidden="true"></i>
                                <input type="first name" class="form-control pos-rel" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="input">
                                <i class="icon-prepend fa fa-user" aria-hidden="true"></i>
                                <input type="last name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="input">
                                <i class="icon-prepend fa fa-user" aria-hidden="true"></i>
                                <input type="middle name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Middle Name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="input">
                                <i class="icon-prepend fa fa-user" aria-hidden="true"></i>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="User Name">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="input">
                                <i class="icon-prepend fa fa-envelope" aria-hidden="true"></i>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="input">
                                <i class="icon-prepend fa fa-lock" aria-hidden="true"></i>
                                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="input">
                                <i class="icon-prepend fa fa-lock" aria-hidden="true"></i>
                                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Confirm Password">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="input">
                                <i class="icon-prepend fa fa-map-marker" aria-hidden="true"></i>
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Location">
                            </label>
                        </div>
                        <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-indicator"></span>
                                <span class="custom-control-description">
                                    Accept the<span class="text-primary"> Terms & Conditions.</span>
                                </span>
                            </label>
                        </div>
                        
                        <button type="button" class="btn btn-primary btn-block">Register</button>
                        
                        <div class="already-acc">
                             Already have an account? 
                             <a href="#" class="font-italic">Login here</a>
                            <div class="or">
                                OR
                            </div>
                        </div>
                        <div class="social-login">
                            <div class="input-group m-b-1">
                                <div class="input-group-addon addon-facebook">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </div>
                                  <a class="btn btn-block btn-facebook" href="#" role="button">Sign in with Facebook</a>
                            </div>
                            <div class="input-group">
                                <div class="input-group-addon addon-twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </div>
                                  <a class="btn btn-block btn-twitter" href="#" role="button">Sign in with Twitter</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>

        <div class="card hidden-xs-up">
            <div class="card-header bg-white m-b-1">
                <h1 class="card-title center">SIGN IN</h1>
            </div>
            <div class="card-block">
                <!-- <h4 class="center m-b-2">SIGN UP</h4> -->
                <div class="form-design1">
                    <form>
                        
                        <div class="form-group">
                            <label class="input">
                                <i class="icon-prepend fa fa-envelope" aria-hidden="true"></i>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email Address">
                            </label>
                        </div>
                        <div class="form-group m-b-1">
                            <label class="input">
                                <i class="icon-prepend fa fa-lock" aria-hidden="true"></i>
                                <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password">
                            </label>
                        </div>
                        
                        
                        <button type="button" class="btn btn-primary btn-block">LOG IN</button>
                        
                        <div class="already-acc">
                              Don't have an account?
                             <a href="#" class="font-italic">Create new account</a>
                            <div class="or">
                                OR
                            </div>
                        </div>
                        <div class="social-login">
                            <div class="input-group m-b-1">
                                <div class="input-group-addon addon-facebook">
                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                </div>
                                  <a class="btn btn-block btn-facebook" href="#" role="button">Sign in with Facebook</a>
                            </div>
                            <div class="input-group">
                                <div class="input-group-addon addon-twitter">
                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                </div>
                                  <a class="btn btn-block btn-twitter" href="#" role="button">Sign in with Twitter</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>  
        </div>
    </div>
@endsection
