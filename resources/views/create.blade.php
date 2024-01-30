<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Form</h2>
  <form action="{{ route('store-blog') }}" method="post" enctype="multi/form-data">
    @csrf
  <div class="form-group">
      <label for="id">User_id:</label>
      <input type="id" class="form-control" id="ID" placeholder="Enter Id" name="id">
    </div>
    <div class="form-group">
      <label for="name">User_name:</label>
      <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>
    

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
