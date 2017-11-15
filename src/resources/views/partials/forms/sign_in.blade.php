<form class="form-signin" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="">

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="sr-only">E-Mail Address</label>
        <input type="email" id="email" class="form-control" placeholder="Email address" name="email" value="{{ old('email') }}" required="" autofocus="">
    </div>

    @if ($errors->has('email'))
        <span class="help-block">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
    @endif

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="password" class="form-control" name="password" placeholder="Password" required="">

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
