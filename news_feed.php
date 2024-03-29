<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>News Feed</title>
  <meta property="og:image" content="//image.prntscr.com/image/93970e70e1f045e1aff76e05469008d8.png" />
<meta property="og:image:secure_url" content="//image.prntscr.com/image/93970e70e1f045e1aff76e05469008d8.png" />
<meta property="og:image:type" content="image/jpeg" />
<meta property="og:image:width" content="400" />
<meta property="og:image:height" content="300" /><link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css'><link rel="stylesheet" href="./news_feed.css">

</head>
<body>
<!-- partial:index.partial.html -->
<?php

  include_once "connection.php";
  session_start();
  if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit();
  }
?>
<div>
  <?php include_once "navbar.php"; ?>
</div>


<div class="shell">
  <div class="container">
 

    
    <div class="row">
    <?php
    $sql = "SELECT * FROM desg INNER JOIN sector ON desg.d_id=sector.d_id";
    $result = mysqli_query($conn,$sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
?>
      <div class="col-md-3">
        <div class="wsk-cp-product">
          <div class="wsk-cp-img">
            <img src="<?php echo $row['d_pic']; ?>" alt="Product" class="img-responsive" />
          </div>
          <div class="wsk-cp-text">
            <div class="category">
              <button class="btn1"><a class="btn1" href="requirement.php?s_id=<?php echo $row['s_id']; ?>">Apply</a></button>
            </div>
            <div class="title-product">
              <h3><?php echo $row['d_name']; ?></h3>
            </div>
            <div class="description-prod">
              <p><?php echo $row['s_name']; ?></p>
            </div>
          </div>
        </div>
      </div> 
      <?php } 
			} ?>
    </div>
    
      
      
    </div>
  </div>
</div>
<!-- partial -->
  
</body>
</html>
