<?php
//include("./user_check_script.php");
include("./db_conn_robin.php");
$query = "SELECT * FROM products ORDER BY id asc";
$result = mysqli_query($connection, $query);
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_array($result)){

  }
}

?>

 <div class="col-md-4">
<form method="post" action="index.php?action=add&id=<?php echo $row["id"] ?>">
</from> 
</div>

<body>


<div class="container-fluid">
  <div class="row col-12">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo $row["image"];?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo $row["image"];?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="<?php echo $row["image"];?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  </div>
</div>

<article class="row">       
        <section class="col-12 col-sm-3 col-md-3">
            <img src="./img/products/1A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>
        <section class="col-3 col-sm-9 col-md-3">
            <img src="./img/products/2A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>
        <section class="col-9 col-sm-6 col-md-3">
            <img src="./img/products/3A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>
        <section class="col-9 col-sm-6 col-md-3">
            <img src="./img/products/4A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>



</div>
</div>

</body>