<form class="form-signin" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <h2 class="form-signin-heading">{{ config('admin.sign_in_view.heading') }}</h2>
    <div class="row">
        <img src="{{ config('admin.sign_in_view.logo.image') }}" class="{{ config('admin.sign_in_view.logo.class') }}" alt="{{ config('admin.sign_in_view.logo.alt') }}">
    </div>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="email" value="{{ old('email') }}" id="email" class="form-control @if(config('admin.theme')=='dark')form-control-dark @endif" placeholder="Email address" required="" autofocus="">

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="password" class="form-control @if(config('admin.theme')=='dark')form-control-dark @endif" name="password" placeholder="Password" required="">

    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif
    @if ($errors->has('password'))
        <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
    @endif

    <div class="checkbox">
        <label>
            <input type="checkbox" value="remember-me" name="remember" {{ old('remember') ? 'checked=""' : '' }}> Remember me
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <a class="btn btn-link" href="{{ route('password.request') }}">
        Forgot Your Password?
    </a>
</form>
