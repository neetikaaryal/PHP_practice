<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class ApiController extends Controller
{
    function getData(){
        return Posts::all();
    }
}
