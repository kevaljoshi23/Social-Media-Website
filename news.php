<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New</title>
    <link href="news.css" rel="stylesheet">
    <style>
    </style>
</head>
<body>
    <div id="header">Latest News</div>
        <?php
            $url = "http://newsapi.org/v2/top-headlines?country=in&apiKey=431537140e8a4a5c83ebb9e9740ed66b";
            $data = json_decode(file_get_contents($url), true);
            echo "<div class='news'>";
            for($x=0; $x<=17; $x++){
                echo "<div class='inner-news'>";
                echo "<h2>", $data['articles'][$x]['title'], "</h2>";
                echo "<p>", $data['articles'][$x]['description'],"</p>";
                echo "<a href=", $data['articles'][$x]['url'], ">Read More</a>";
                echo "<div>", '<img class="images" src="', $data["articles"][$x]["urlToImage"],'">',"</div>";
                echo "</div>";
            }
            echo "</div>";
        ?>
</body>
</html>