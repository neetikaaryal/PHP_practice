<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostRequest;
use App\Models\Posts;
use App\Models\Type;
use App\Models\Tag;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{

    public function store(StorePostRequest $request)
    {
        try {
  
          $user = new Posts;
          $user->title = $request->title;
          $user->description = $request->description;
          $user->author = $request->author;
          // $user->image = $request->image;
          $user->tag = $request->tag;
          $user->type = $request->type;
          $user->status = $request->status;
        
        if($request->hasFile('image')) {
          
          // $image = $request->file('image');
          
          $fileName = time() . '.'. $request->file('image')->extension();
          $request->file('image')->storeAs('public', $fileName);
          $user->image = $fileName;
          
        }
       
        $user->save();
        return redirect('home')
        ->with('success','Post created successfully.');
      
        } catch (\Exception $e) {
          return redirect('home')
          ->with('error','Post creation failed.');
        }
        // return redirect('/');
    }
    
    public function home()
    {
       $user = Posts::with('types','tags')->get();
     
       $tags = Tag::all();
       $types = Type::all();
        return view('home', compact('user', 'tags', 'types'));
    }

    public function update(Request $request, $id)
    {
      $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'author' => 'required',
        // 'image' => 'required',
        'tag' => 'required',
        'type' => 'required',
        'status' => 'required',
      ]);
      
      Posts::where('id', $id)->update($validated);
      return redirect('home')
          ->with('success', 'Post updated successfully');
    }

    public function edit($id)
    {
      $user = Posts::find($id);
      $tags = Tag::all(); // Retrieve all tags from the database
      $types = Type::all();
      return view('edit_home', ['user' => $user,'tags' => $tags,'types' => $types]);
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
      $post = Posts::find($id);
      return view('posts.show', compact('post'));
    }
    

    public function blog()
   {
    return view('blog');
   }
  
   
   public function changeStatus($id)
   {
    $post = Posts::find($id);
    $post->status = $post->status == 'draft' ? 'published' : 'draft';
    $post->save();
    return back()->with('status', 'Status has been changed');
    }

    }


