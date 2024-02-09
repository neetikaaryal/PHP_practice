<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Posts;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    function getData(){
        return Posts::all();
    }
}