<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="blog.css">
    <title>Simple Blog</title>
</head>
<body>
    <div class="container">
        <h1>Simple Blog</h1>
        <form id="blogForm" method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name='title' required>
            
            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>
            
            <label for="image">Image URL (optional):</label>
            <input type="text" id="image" name='image'>
        
            <button type="submit" onclick='saPost()'>Save Post</button>
        </form>
        <div id="blogTitleList"></div>
    </div>

    <div class="lower-container">
        <h2>Full Blog Posts</h2>
        <div id="lowerBlogList"></div>
    </div>
    <script src="blog.js"></script>
    <?php
include 'common.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $image = $_POST["image"];
    
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Use prepared statements to insert data safely
    $sql = "INSERT INTO `blog2`(`title`, `image`) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "ss", $title, $image); // Change "sss" to "ss"
        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            echo '';
        } else {
            echo 'Error inserting data: ' . mysqli_error($conn);
        }
    } else {
        echo 'Error preparing statement: ' . mysqli_error($conn);
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo 'Invalid request method';
}
?>
</body>
</html>
