{{-- Modal open --}}
<!-- Modal -->
     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="tabs">
           <!-- Nav tabs -->
           <ul class="nav nav-tabs login" role="tablist">
             <li role="presentation" class="active"><a href="#login" aria-controls="home" role="tab" data-toggle="tab">Login</a></li>
             <li role="presentation"><a href="#register" aria-controls="profile" role="tab" data-toggle="tab">Register</a></li>
           </ul>

           <!-- Tab panes -->
           <div class="tab-content">
             <div role="tabpanel" class="tab-pane fade in active" id="login">

               <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                   {{ csrf_field() }}

                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                       <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                       <div class="col-md-6">
                           <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                           @if ($errors->has('email'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('email') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>

                   <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                       <label for="password" class="col-md-4 control-label">Password</label>

                       <div class="col-md-6">
                           <input id="password" type="password" class="form-control" name="password" required>

                           @if ($errors->has('password'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('password') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>

                   <div class="form-group">
                       <div class="col-md-6 col-md-offset-4">
                           <div class="checkbox">
                               <label>
                                   <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}}> Remember Me
                               </label>
                           </div>
                       </div>
                   </div>

                   <div class="form-group">
                       <div class="col-md-8 col-md-offset-4">
                           <button type="submit" class="btn btn-primary">
                               Login
                           </button>

                           <a class="btn btn-link" href="{{ url('/password/reset') }}">
                               Forgot Your Password?
                           </a>
                       </div>
                   </div>
               </form>






             </div>
             <div role="tabpanel" class="tab-pane fade" id="register">

               <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                   {{ csrf_field() }}

                   <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                       <label for="name" class="col-md-4 control-label">Name</label>

                       <div class="col-md-6">
                           <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                           @if ($errors->has('name'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('name') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>

                   <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                       <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                       <div class="col-md-6">
                           <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                           @if ($errors->has('email'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('email') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>

                   <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                       <label for="password" class="col-md-4 control-label">Password</label>

                       <div class="col-md-6">
                           <input id="password" type="password" class="form-control" name="password" required>

                           @if ($errors->has('password'))
                               <span class="help-block">
                                   <strong>{{ $errors->first('password') }}</strong>
                               </span>
                           @endif
                       </div>
                   </div>

                   <div class="form-group">
                       <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                       <div class="col-md-6">
                           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                       </div>
                   </div>

                   <div class="form-group">
                       <div class="col-md-6 col-md-offset-4">
                           <button type="submit" class="btn btn-primary">
                               Register
                           </button>
                       </div>
                   </div>
               </form>


             </div>
           </div>
         </div>
         {{-- <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       </div> --}}
         </div>
       </div>
     </div>
     <!-- modal close button -->
