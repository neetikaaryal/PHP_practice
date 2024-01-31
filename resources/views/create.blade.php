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
  <form action="{{ route('store-blog') }}" method="post" enctype="multi/form-data">
    @csrf
  <div class="form-group">
      <label for="title">Title</label>
      <input type="text" class="form-control" id="title" placeholder="Title" name="title">
    </div>
    <!-- .........body -->
    <div class="form-group">
      <label for="body">Body</label>

      <!-- <input type="text" class="form-control" id="body" placeholder="Enter blog" name="body">
      <form method="post"> -->
    <div>
        <textarea name="content"></textarea>
    </div>

    <div>
        <button>Send</button>
    </div>

    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

    <div><?= $purifier->purify($_POST['content']) ?></div>

    <?php endif; ?>
    <!-- /bodyend -->
    
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
    

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body>
</html>
