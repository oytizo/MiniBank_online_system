<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Frontend\accountModel;

class backendController extends Controller
{
    public function index()
    {
        $account = accountModel::all();
        return view('backend.userinfo', compact('account'));
    }
}
