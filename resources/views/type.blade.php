<html>
    <head>
        <title>Types</title>
    </head>
<body>
    <form action="{{ route('store-type') }}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <label for="name">Type:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter type">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>