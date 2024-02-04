
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script>tinymce.init({
        selector:'textarea',
        menubar: false,
        plugins: 'code',
        toolbar: 'bold italic code'
    });</script>
</head>
<body>
<div class="container">
  <h2>Form</h2>
  <form action="{{ route('store-blog') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" placeholder="Title" name="title">
    </div>

    <div class="form-group">
      <label for="description">Description</label>
      <input type="text" class="form-control" id="description" placeholder="description" name="description">
    </div>

    <div class="form-group">
      <label for="author">Author</label>
      <input type="text" class="form-control" id="author" placeholder="Name" name="author">
    </div>

    <div class="form-group">
      <label for="image">Feature Image</label>
      <input type="file" class="form-control" id="image" placeholder="Image" name="image" >
    </div>

    <div class="form-group">
      <label for="tag">Tag</label>
      <select name="tag" id="tag">
    
      <option value="blog">Blog</option>
      <option value="offer">Offer</option>
      <option value="news">News</option>
      
      </select>
      
    </div>


    <div class="form-group">
      <label for="type">Type</label>
      <select name="type" id="type">
    
      <option value="blog">Blog</option>
      <option value="offer">Offer</option>
      <option value="news">News</option>
       
      </select>
    </div>

    <div class="form-group">
    <label for="status">Status</label>
      <select name="status">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
      </select>
    </div>
    <!-- .........body -->
    <!-- <div class="form-group">
      <label for="body">Body</label>

       <input type="text" class="form-control" id="body" placeholder="Enter blog" name="body">
      <form method="post"> -->
    <!-- <div>
        <textarea name="content"></textarea>
    </div> --> 
        <button>Send</button>

  </div>   

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

    <div><?= $purifier->purify($_POST['content']) ?></div>

    <?php endif; ?>
    <!-- /bodyend -->
  

  <!-- file upload -->
<!-- <div class="mb-3">
  <label for="formFile" class="form-label">Upload File:</label>
  <input class="form-control" type="file" id="formFile">
  <button type="submit" class="btn btn-default">Upload</button>
</div> -->
  </form>

  <!-- blog list -->
    <h2>Blog List</h2>
    <!-- <div > 
    <a href="/create">
        <button type="button" class="btn btn-primary" >Create</button>
    </a>         -->

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
        <td>{{$value->tag}}</td>
        <td>{{$value->type}}</td>
        <td>{{$value->status}}</td>
        <td><a href="{{route('delete-home' ,$value->id)}}"><button type="button" class="btn btn-danger" >Delete</button></a>   </td>
        <td><a href="{{route('edit-home' ,$value->id)}}"><button type="button" class="btn btn-default" >Edit</button></a>   </td> 
      </tr>
      @endforeach
    </tbody>
  </table>

</body>
</html>
