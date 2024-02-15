@extends('dashboard')
@section('main-section')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

</head>
<body>
<div class="container">
  <h2>Form</h2>
  <form action="{{ route('update-home', $user->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $user->title }}">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" placeholder="description" name="description" value="{{ $user->description }}">
    </div>

    <div class="form-group">
      <label for="author">Author</label>
      <input type="text" class="form-control" id="author" placeholder="Name" name="author" value="{{ $user->author }}">
    </div>

    <div class="form-group">
      <label for="image">Feature Image</label>
      <input type="file" class="form-control" id="image" placeholder="Image" name="image" >
      <img src="{{ asset('storage/' . $user->image) }}" alt="User Image">

    </div>

    <div class="form-group">
      <label for="tag">Tag</label>
      <select name="tag" id="tag" class="form-control">
      <option value="">Select Tag</option>

        @foreach($tags as $tag)
      <option value="{{$tag->id}}" {{ $tag->id == $post->tag_id ? 'selected' : '' }}>{{$tag->name}}</option>
        @endforeach
      </select>
      
    </div>


    <div class="form-group">
      <label for="type">Type</label>
      <select name="type" id="type">
      <option value="">Select Tag</option>

      @foreach($types as $type)
      <option value="{{$type->id}}" {{ $type->id == $post->type_id ? 'selected' : '' }}>{{$type->name}}</option>
       @endforeach
      </select>
    </div>

    <div class="form-group">
    <label for="status">Status</label>
      <select name="status">
        <option value="draft" {{ $user->status == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published"  {{ $user->status == 'published' ? 'selected' : '' }}>Published</option>
      </select>
    </div>
   
        <button>Send</button>
  </form>
</div>   
@endsection
  

  
