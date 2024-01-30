
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
    <h2>Blog List</h2>
    <div > 
    <a href="/create">
        <button type="button" class="btn btn-primary" >Create</button>
    </a>        

    <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Body</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach($user as $value)
      <tr>
        <td>{{$value->title}}</td>
        <td>{{$value->body}}</td>
        <td>{{$value->email}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

</body>
</html>
