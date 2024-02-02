<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
 

class HomeController extends Controller
{
    // public function blog()
    // {
    //     return view('home');
    // }
 
    public function store(Request $request)
    {
       // $request->validate([
        //     'title' => 'required',
        //     'body' => 'required',
        //   ]);
        //   Post::create($request->all());
  
        $user = new Posts;
        $user->title = $request->title;
        $user->description = $request->description;
        $user->author = $request->author;
        $user->image = $request->image;
        $user->tag = $request->tag;
        $user->type = $request->type;
        $user->status = $request->status;
     
        $user->save();

        $request->file('image')->store('public');

        return redirect('home')
        ->with('success','Post created successfully.');
        // return redirect('/');
    }
    
    public function home()
    {
        $user = Posts::all();
        return view('home', compact('user'));
    }

    public function update(Request $request, $id)
    {
      $request->validate([
        'title' => 'required',
        'body' => 'required',
      ]);
      $user = Posts::find($id);
      $user->update($request->all());
      return redirect()->route('home')
        ->with('success', 'Post updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
      $user = Posts::find($id);

      $user->delete();
      return redirect()->back()
        ->with('success', 'Post deleted successfully');
    }
    // routes functions
    // /**
    //  * Show the form for creating a new post.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //   return view('posts.create');
    // }
 
    public function show($id)
    {
      $post = Post::find($id);
      return view('posts.show', compact('post'));
    }
    
    public function edit($id)
    {
      $user = Posts::find($id);
      return view('home', compact('user'));
    }
    public function blog()
{
    return view('blog');
}

}


