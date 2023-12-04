<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SLIDER</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <div class="slider">
        <div id="rgbKineticSlider" class="rgbKineticSlider"></div>
        <nav>
            <a href="#" class="main-nav prev" data-nav="previous">Prev</a>
            <a href="#" class="main-nav next" data-nav="next">Next</a>
        </nav>
    </div>

    <script src="libs/imagesLoaded.pkgd.min.js"></script>
    <script src="libs/TweenMax.min.js"></script>
    <script src="libs/pixi.min.js"></script>
    <script src="libs/pixi-filters.min.js"></script>
    <script src="libs/rgbKineticSlider.js"></script>
    <script src="js/script.js"></script>
    <div class="container">
        <h1>Simple Blog</h1>
<div class="blog-container">
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "blog";
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT `title`, `image` FROM `blog2`";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='blog-post'>";
            echo "<h2>" . $row['title'] . "</h2>";
            
            // Check if the image is present
            if (!empty($row['image'])) {
                echo "<img src='" . $row['image'] . "' alt='Blog Image'>";
            } else {
                echo "<p>Image not available</p>";
            }
            
            echo "</div>";
        }
        mysqli_free_result($result);
    } else {
        echo 'Error fetching data: ' . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
?>
    </div>
    <button><a href='http://localhost/new%20folder/index.php'>go to blogs</button>
            </tbody>
        </table>
    </div>
</body>

</html>
