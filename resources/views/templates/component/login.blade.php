@php
  $isRegister = old('form_type') === 'register' || $errors->has('name') || $errors->has('password_confirmation');
@endphp

<div class="modal video-modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        Sign In & Sign Up
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
      </div>
      <section>
        <div class="modal-body">
          <div class="w3_login_module">
            <div class="module form-module">
              <div class="toggle"><i class="fa fa-times fa-pencil"></i>
              <div class="tooltip">Click Me</div>
              </div>
              <div class="form">
                <h3>Login to your account</h3>
                @if ($errors->any() && !$isRegister)
                  <div class="alert alert-danger" style="margin-bottom: 15px; padding: 10px; font-size: 13px;">
                    <ul style="margin: 0; padding-left: 15px;">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <form action="{{ route('login.post') }}" method="post">
                  @csrf
                  <input type="hidden" name="form_type" value="login">
                  <input type="email" name="email" placeholder="Email Address" value="{{ !$isRegister ? old('email') : '' }}" required="">
                  <input type="password" name="password" placeholder="Password" required="">
                  <div style="margin-bottom: 15px; text-align: left;">
                    <label style="font-weight: normal; cursor: pointer; font-size: 13px; color: #555;">
                      <input type="checkbox" name="remember" value="1" {{ old('remember') ? 'checked' : '' }} style="width: auto; display: inline-block; margin-right: 5px; vertical-align: middle;"> Remember Me
                    </label>
                  </div>
                  <input type="submit" value="Login">
                </form>
              </div>
              <div class="form">
                <h3>Create an account</h3>
                @if ($errors->any() && $isRegister)
                  <div class="alert alert-danger" style="margin-bottom: 15px; padding: 10px; font-size: 13px;">
                    <ul style="margin: 0; padding-left: 15px;">
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif
                <form action="{{ route('register.post') }}" method="post">
                  @csrf
                  <input type="hidden" name="form_type" value="register">
                  <input type="text" name="name" placeholder="Name" value="{{ $isRegister ? old('name') : '' }}" required="">
                  <input type="email" name="email" placeholder="Email Address" value="{{ $isRegister ? old('email') : '' }}" required="">
                  <input type="password" name="password" placeholder="Password" required="">
                  <input type="password" name="password_confirmation" placeholder="Confirm Password" required="">
                  <input type="submit" value="Register">
                </form>
              </div>
              <div class="cta"><a href="#">Forgot your password?</a></div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('.toggle').click(function(){
      // Switches the Icon
      $(this).children('i').toggleClass('fa-pencil');
      // Switches the forms  
      $('.form').animate({
        height: "toggle",
        'padding-top': 'toggle',
        'padding-bottom': 'toggle',
        opacity: "toggle"
      }, "slow");
    });

    @if ($errors->any() || session('open_login_modal'))
      $('#myModal').modal('show');
      @if ($isRegister)
        $('.module.form-module .form').toggle();
        $('.toggle').children('i').toggleClass('fa-pencil');
      @endif
    @endif
  });
</script>
