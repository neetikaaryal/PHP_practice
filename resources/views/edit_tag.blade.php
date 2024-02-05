@extends('dashboard')
@section('main-section')
<html>
    <head>
    <meta charset="utf-8">
       
        <title>Tags</title>
        <link rel="stylesheet" href="{{asset('mystyle.css')}}" />
    
    </head>


<body>
    <form action="{{ route('update-tag', $tag->id) }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <label for="name">Tag:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter tag" value="{{ $tag->name }}">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
@endsection