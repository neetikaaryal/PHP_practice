@section('main-section')
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script>tinymce.init({
        selector:'textarea',
        menubar: false,
        plugins: 'code',
        toolbar: 'bold italic code'
    });</script> -->

<!-- text-editor -->
  <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>

</head>
@extends('dashboard')

<body>
<div class="container">
  <h2 style="color:white">Form</h2>
  <form action="{{ route('store-blog') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" placeholder="Title" name="title"  >
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror          
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" placeholder="Description" name="description" value="{{ old('title') }}"></textarea>
      @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="author">Author</label>
      <input type="text" class="form-control" id="author" placeholder="Name" name="author" value="{{old('author')}}">
      @error('author')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="image">Feature Image</label>
      <input type="file" class="form-control" id="image" placeholder="Image" name="image" >
      @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
      <label for="tag">Tag</label>
      <select name="tag" id="tag" class="form-control">
      <option value="">Select Tag</option>

        @foreach($tags as $tag)
        <option value="{{$tag->id}}">{{$tag->name}}</option>
        @endforeach
      </select>
      @error('tag')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>


    <div class="form-group">
      <label for="type">Type</label>
      <select name="type" id="type">
      <option value="">Select Tag</option>

      @foreach($types as $type)
      <option value="{{$type->id}}">{{$type->name}}</option>
       @endforeach
      </select>
      @error('type')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    </div>

    <div class="form-group">
    <label for="status">Status</label>
      <select name="status">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
      </select>
      @error('status')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
    
    </div>
    <!-- .........body -->
    <!-- <div class="form-group">
      <label for="body">Body</label>

       <input type="text" class="form-control" id="body" placeholder="Enter blog" name="body">
      <form method="post"> -->
    <!-- <div>
        <textarea name="content"></textarea>
    </div> --> 
        <button class="btn btn-primary" >Send</button>

  </div>   

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

    <div><?= $purifier->purify($_POST['content']) ?></div>

    <?php endif; ?>
 
  </form>
<script>
  ClassicEditor
      .create( document.querySelector( '#description' ) )
      .catch( error => {
          console.error( error );
      } );
</script>
  <!-- blog list -->
    <h2>Blog List</h2>
   

    <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Description</th>
        <th>Author</th>
        <th>Featured image</th>
        <th>Tag</th>
        <th>Type</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
     
      @foreach($user as $value)
      
      <tr>
        <td>{{$value->title}}</td>
        <td>{{$value->description}}</td>
        <td>{{$value->author}}</td>
        <td><img src="{{ asset('storage/' . $value->image) }}" alt="User Image"></td>
        @foreach($value->tags as $tag)
        <td>{{$tag->name}}</td> 
        @endforeach
        <td>{{$value->types->name}}</td>
        <td><a href="{{ route('changeStatus', $value->id) }}" class="btn btn-default">{{ $value->status }}</a></td>
        <td><a href="{{route('delete-home' ,$value->id)}}"><button type="button" class="btn btn-danger"  >Delete</button></a>   </td>
        <td><a href="{{route('edit-home' ,$value->id)}}"><button type="button" class="btn btn-primary" >Edit</button></a>   </td> 
      </tr> 

      @endforeach 
    </tbody>
  </table>

</body>
</html>
@endsection

@if(session('status'))
    <script>
        alert('{{ session('status') }}');
    </script>
@endif

@if(session('success'))
  <script>
      alert('{{ session('success') }}');
  </script> 
@endif   

@if(session('error'))
  <script>
      alert('{{ session('error') }}');
  </script> 
@endif

