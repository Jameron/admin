<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-6">
            <div class="card @if(config('admin.theme')=='dark')card-dark @endif text-center" style="margin-top: 10rem;">
                <h4 class="card-header">
                    Reset Password
                </h4>
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text"></p>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="text-left" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email">E-Mail Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">
                                Send Password Reset Link
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
