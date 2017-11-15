<div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control @if(config('admin.theme')=='dark')form-control-dark @endif">
</div>
<div class="form-group">
    <label for="confirm">Confirm Password</label>
    <input type="password" name="password_confirmation" id="confirm" class="form-control @if(config('admin.theme')=='dark')form-control-dark @endif">
</div>
<p class="button-group">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
	<a href="{{ url('admin') }}" class="btn-alt">Cancel</a>
</p>
