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
        
        <!-- Display Blog Posts in a Table -->
        <table border="1">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "blog";
                    $conn = mysqli_connect($servername, $username, $password, $database);
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                $sql = "SELECT `title`, `image` FROM `blog`";
                $result = mysqli_query($conn, $sql);

                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row['title'] . "</td>";
                        echo "<td><img src='" . $row['image'] . "' alt='Blog Image' style='max-width: 100px; max-height: 100px;'></td>";
                        echo "</tr>";
                    }
                    mysqli_free_result($result);
                } else {
                    echo 'Error fetching data: ' . mysqli_error($conn);
                }

                // Close the connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <button><a href='http://localhost/new%20folder/blog.php'>go to blogs</button>
            </tbody>
        </table>
    </div>
</body>

</html>