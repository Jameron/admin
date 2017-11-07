<?php

namespace Jameron\Admin\Http\Controllers\Admin;

use Auth;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Jameron\Regulator\Http\Requests\UserPasswordRequest;

class SettingsController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('admin::admin.settings', compact('user'));
    }

    public function update(UserPasswordRequest $request)
    {
        $user = User::findOrFail(Auth::user()->id);
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()
            ->back()
            ->with('success_message', 'Saved');
    }
}
