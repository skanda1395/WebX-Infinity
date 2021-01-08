<?php
    require_once "./db_connect.php";

    $page = 6 * (int) $_GET["page"];

    // $query = "SELECT * FROM blogs WHERE id =" $page . " LIMITk 6";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $blogs = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<?php foreach ($blogs as $i => $blog): ?>
    <?php $path = "./blog_images/blog_" . rand(1, 5) . ".jpg"; ?>
    <div class="col s12 m6">
        <div class="card hoverable small">
        <div class="card-image">
            <img src=<?php echo $path ?> alt="blog_image_1">
            <span class="card-title"><?php echo $blog["title"] ?></span>
        </div>
        <div class="card-content">
            <p><?php echo $blog["content"] ?></p>
        </div>
        <div class="card-action">
            <a href="#">Read More</a>
        </div>
        </div>
    </div>
<?php  endforeach; ?>