<div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password" class="form-control">
</div>
<div class="form-group">
    <label for="confirm">Confirm Password</label>
    <input type="password" name="password_confirmation" id="confirm" class="form-control">
</div>
<p class="button-group">
    <button type="submit" class="btn btn-primary">{{ $submitButtonText }}</button>
	<a href="{{ url('admin') }}" class="btn-alt">Cancel</a>
</p>
