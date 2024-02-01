<html>
<head>
    <title>Tag</title>
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
</body>
</html>
