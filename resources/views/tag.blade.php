<html>
<head>
    <title>Tag</title>
    <link rel="stylesheet" href="{{asset('mystyle.css')}}" />
</head>
<body>
<form action="{{ route('store-tag') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="tag">Tag:</label>
        <input type="text" class="form-control" id="tag" name="name" placeholder="Enter tag">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<h2>Tag-list</h2>
<div class="container">
    <table class="table">
    <thead>
      <tr>
        <th>Tag</th>
      </tr>
    </thead>
    <tbody>
       @foreach($tags as $tag)
      <tr>
        <td>{{$tag->name}}</td>
        <td><a href="{{route('delete-tag' ,$tag->id)}}"><button type="button" class="btn btn-danger" >Delete</button></a>   </td>
        <td><a href="{{route('edit-tag' ,$tag->id)}}"><button type="button" class="btn btn-default" >Edit</button></a>   </td>
      </tr>
     @endforeach  
    </tbody>
  </table>
</div>
</body>
</html>
