<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class HomeController extends Controller
{
    public function blog()
    {
        return view('home');
    }
 
    public function store(Request $request)
    {
        
        // $user = new Posts;
        // $user->title = $request->id;
        // $user->body = $request->name;
        // $user->email = $request->email;

        $request->validate([
            'title' => 'required',
            'body' => 'required',
          ]);
          Post::create($request->all());

       // $user->save();
        return redirect('create')
        ->with('success','Post created successfully.');
        // return redirect('/');
    }

}
