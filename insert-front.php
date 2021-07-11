<?php
    session_start();
    include 'db.php';
?>
<html>
    <head>
    </head>
    <body>
        <div class="back-img"></div>
        <div class="form-input">
            <h2>Fill in the details</h2>
            <hr class="style-six">
            <form action="insert-back.php" method="post" enctype="multipart/form-data">
                <input type="file" name="img" id="img">
                <input type="text" name="imgabout" id="imgabout" placeholder="description">
                <button type="submit" class="btn btn-primary" value="Insert">Submit</button>
            </form>
        </div>
    </body>
</html>