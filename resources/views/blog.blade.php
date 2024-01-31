
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>tinymce.init({
        selector:'textarea',
        menubar: false,
        plugins: 'code',
        toolbar: 'bold italic code'
    });</script>
</head>
<body>

    <h1>Blog Title</h1>
    <h3>by Author</h3>
    <form method="post">

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

</body>
</html>