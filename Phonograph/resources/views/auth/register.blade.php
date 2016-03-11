@extends('app')

@section('content')

<!-- ******Signup Section****** -->
<section class="signup-section access-section section">
    <div class="container">
        <div class="row">
            <div class="form-box col-md-8 col-sm-12 col-xs-12 col-md-offset-2 col-sm-offset-0 xs-offset-0">
                <div class="form-box-inner">
                    <h2 class="title text-center">Sign up now</h2>
                    <p class="intro text-center">¡It only takes 3 minutes or less!</p>
										@if (count($errors) > 0)
											<div class="alert alert-danger">
												<strong>Whoops!</strong> There were some problems with your input.<br><br>
												<ul>
													@foreach ($errors->all() as $error)
														<li>{{ $error }}</li>
													@endforeach
												</ul>
											</div>
										@endif
                    <div class="row">
                        <div class="form-container col-md-5 col-sm-12 col-xs-12">
														<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
																<input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group email">
                                    <label class="sr-only" for="signup-email">Your email</label>
																		<input id="signup-email" type="email" class="form-control login-email" name="email" value="{{ old('email') }}" placeholder="Email">
                                </div><!--//form-group-->

                                <div class="form-group email">
																		<label class="sr-only">Username</label>
																		<input type="text" class="form-control login-email" name="username" value="{{ old('username') }}" placeholder="Username">
																</div><!--//form-group-->

                                <div class="form-group password">
                                    <label class="sr-only" for="signup-password">Your password</label>
																		<input id="signup-password" type="password" class="form-control login-password" name="password" placeholder="Password">
                                </div><!--//form-group-->

																<div class="form-group password">
																		<input type="password" class="form-control" name="password_confirmation" placeholder="Password confirmation">
																</div>

                                <button type="submit" class="btn btn-block btn-cta-primary">Sign up</button>
                                <p class="note">By signing up, you agree to our terms of services and privacy policy.</p>
                                <p class="lead">Already have an account? <a class="login-link" id="login-link" href="{{ url('auth/login') }}">Log in</a></p>
                            </form>
                        </div><!--//form-container-->
                        <div class="social-btns col-md-5 col-sm-12 col-xs-12 col-md-offset-1 col-sm-offset-0 col-sm-offset-0">
                            <div class="divider"><span>Or</span></div>
                            <ul class="list-unstyled social-login">
                                <li><button class="twitter-btn btn" type="button"><i class="fa fa-twitter"></i>Sign up with Twitter</button></li>
                                <li><button class="facebook-btn btn" type="button"><i class="fa fa-facebook"></i>Sign up with Facebook</button></li>
                                <li><button class="github-btn btn" type="button"><i class="fa fa-github-alt"></i>Sign up with Github</button></li>
                                <li><button class="google-btn btn" type="button"><i class="fa fa-google-plus"></i>Sign up with Google</button></li>
                            </ul>
                            <p class="note">Don't worry, we won't post anything without your permission.</p>
                        </div><!--//social-login-->
                    </div><!--//row-->
                </div><!--//form-box-inner-->
            </div><!--//form-box-->
        </div><!--//row-->
    </div><!--//container-->
</section><!--//signup-section-->
</div><!--//upper-wrapper-->
@endsection
