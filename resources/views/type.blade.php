<html>
    <head>
    <meta charset="utf-8">
       
        <title>Types</title>
        <link rel="stylesheet" href="{{asset('mystyle.css')}}" />
        <!-- <style>
            table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
            }
        </style> -->
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
<br>
<h2>Type-list</h2>
<div class="container">
    <table class="table">
    <thead>
      <tr>
        <th>Type</th>
      </tr>
    </thead>
    <tbody>
       @foreach($types as $type)
      <tr>
        <td>{{$type->name}}</td>
      </tr>
     @endforeach  
    </tbody>
  </table>
</div>
</body>
</html>