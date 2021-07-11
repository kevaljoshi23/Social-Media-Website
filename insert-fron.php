<html>
    <head>
        <link rel="stylesheet" href="../static/styles/index.css" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    </head>
    <body>
        <div class="back-img"></div>
        <div class="form-input">
            <h2>Fill in the details</h2>
            <hr class="style-six">
            <form action="..\public\insert-back.php" method="post" enctype="multipart/form-data">
                <input type="text" name="imgname" id="imgname" placeholder="Name">
                <input type="file" name="img" id="img">
                <input type="text" name="imgabout" id="imgabout" placeholder="description">
                <button type="submit" class="btn btn-primary" value="Insert">Submit</button>
            </form>
        </div>
    </body>
</html>