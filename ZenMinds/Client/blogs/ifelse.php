<?php if ($view==false) 
    {
    ?>
    <?php foreach($i_blog as $blog): {?>
        <table class="responsive-table striped">
    <thead>
        <th>ID</th>
        <th>Title</th>
        <th>Content</th>
        <th>Genre</th>
        <th>Created At</th>
    </thead>
    <tbody>
        
        <tr>
            <td><?php echo $blog["id"]; ?></td>
            <td><?php echo $blog["title"]; ?></td>
            <td class="element"><?php echo $blog["content"]; ?></td>
            <td><?php echo $blog["genre"]; ?></td>
            <td><?php echo $blog["created_date"]; ?></td>
        </tr>
        
    </tbody>
</table>
<?php } endforeach; ?>
<?php } else{ ?>
    <?php foreach($i_blog as $blog): {?>
    <div class="col s12 m6">
    <div class="card hoverable small">
        <div class="card-image">
            <img src="./blog_images/blog_1.jpg" alt="blog_image_1">
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
<?php } endforeach; ?>
<?php }  ?>