<?php

namespace Jameron\Admin\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function showAdminDashboard()
    {
        return view('admin::admin.dash');
    }
}
