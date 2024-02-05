@extends('dashboard')
@section('main-section')
<html>
    <head>
    <meta charset="utf-8">
       
        <title>Types</title>
        <link rel="stylesheet" href="{{asset('mystyle.css')}}" />
    
    </head>


<body>
    <form action="{{ route('update-type', $type->id) }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <label for="name">Type:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter type" value="{{ $type->name }}">
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>
@endsection