<?php

//benodigde gegevens voor mysql server
include("./db_conn_robin.php");
$query = "SELECT * FROM products ORDER BY id asc";
$result = mysqli_query($connection, $query);
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_array($result)){

  }
}

?>








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
        <article class="row">       
        <section class="col-12 col-sm-3 col-md-3">
            <img src="./img/products/5A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>
        <section class="col-3 col-sm-9 col-md-3">
            <img src="./img/products/6A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>
        <section class="col-9 col-sm-6 col-md-3">
            <img src="./img/products/7A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>
        <section class="col-9 col-sm-6 col-md-3">
            <img src="./img/products/8A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>
        <article class="row">       
        <section class="col-12 col-sm-3 col-md-3">
            <img src="./img/products/9A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>
        <section class="col-3 col-sm-9 col-md-3">
            <img src="./img/products/10A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>
        <section class="col-9 col-sm-6 col-md-3">
            <img src="./img/products/11A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>
        <section class="col-9 col-sm-6 col-md-3">
            <img src="./img/products/12A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>
        <article class="row">       
        <section class="col-12 col-sm-3 col-md-3">
            <img src="./img/products/13A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>
        <section class="col-3 col-sm-9 col-md-3">
            <img src="./img/products/14A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>
        <section class="col-9 col-sm-6 col-md-3">
            <img src="./img/products/15A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>
        <section class="col-9 col-sm-6 col-md-3">
            <img src="./img/products/16A.jpg" alt="">
            <h4><?php echo $row["naam"];?></h4>
            <p><?php echo $row["beschrijving"];?></p>
        </section>