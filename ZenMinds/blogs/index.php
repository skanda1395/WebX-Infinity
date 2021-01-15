<?php

  require_once "./db_connect.php";

  $page = $_GET["page"] ?? 1;
  $x = (6 * $page) - 5; 
  $keyword = $_GET["search"] ?? "";

  if ($keyword) {
    $statement = $pdo->prepare("SELECT * FROM blogs WHERE title like :keyword");
    $statement->bindValue(":keyword", "%$keyword%");
  } 
  else {
    $statement = $pdo->prepare("SELECT * FROM blogs WHERE id>=$x LIMIT 6");
  }

  $statement->execute();
  $blogs = $statement->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   <!--Import Google Icon Font-->
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   <!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <title>Blogs</title>
  <style>
    .element {
      display: block;
      width: 150px;
      overflow: hidden;
      word-wrap: break-word;
      text-overflow: ellipsis;
      max-height: 17px;
      line-height: 17px;
    }

    .pagination {
      margin: 25px 0;
    }

    .remove {
      display: none;
    }

    .view-toggle {
      margin-bottom: 10px;
    }

    #box-view, #table-view {
      transition: display 1s;
    } 

    #search-container {
      margin-bottom: 0;
    }

  </style>
</head>
<body>
  
  <main class="container">
    <h1 class="red-text">All Blogs</h1>

      <form action="" method="GET" class="row valign-wrapper" id="search-container">
        <div class="input-field col s10 offset-m2">
          <i class="material-icons prefix">search</i>
          <input type="text" name="search" class="validate" value="<?php echo $keyword; ?>">
          <label for="search">Search Blogs...</label>
        </div>
        <div class="input-field col s2">
          <button class="btn-small waves-effect waves-light" type="submit">
            <i class="material-icons">send</i>
          </button>
        </div>
      </form>

    <div class="row" id="box-view">
      <?php foreach ($blogs as $i => $blog): ?>
        <?php $path = "./blog_images/blog_" . rand(1, 7) . ".jpg"; ?>
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
    </div>

    <div id="pagination"></div>

  </main>

   <!-- Compiled and minified JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
   <script src="./materialize-pagination.js"></script>
   <script>
      const view = $("#view");

      $('#pagination').materializePagination({
        align: 'center',
        lastPage:  5,
        firstPage:  1,
        urlParameter: 'page',
        useUrlParameter: true,
        onClickCallback: function(requestedPage){
          console.log('Requested page is '+ requestedPage);
          // send an AJAX request
          let xmlhttp = new XMLHttpRequest();
          xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                $("#box-view").html(this.responseText);
            }
          }
          xmlhttp.open("GET", `getblogs.php?page=${requestedPage}`);
          xmlhttp.send();
        }
      }); 
   </script>
</body>
</html>