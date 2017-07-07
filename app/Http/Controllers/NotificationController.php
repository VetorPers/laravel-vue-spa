<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $lists = Auth::user()->notifications;
        return view('notifications.index', compact('lists'));
    }
}
