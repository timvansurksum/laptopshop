 
 <?php
//include("./user_check_script.php");
include("./db_conn_robin.php");
$query = "SELECT * FROM products ORDER BY id asc";
$result = mysqli_query($connection, $query);
if(mysqli_num_rows($result) > 0){
  while($row = mysqli_fetch_array($result)){

  }
}
if(isset($_POST["add_to_cart"]))
{
  if(isset($_SESSION["shopping_cart"]))

  {
    $item_array_id = array_column( $_SESSION["shopping cart"], "item_id");
    if(!in_array($_GET["id"], $item_array_id))
    {
      $count = count($_SESSION["shopping_cart"]);
      $item_array = array (
        'item_id'  => $_GET["id"],
        'naam' => $_POST["hidden_name"],
        'prijs' => $_POST["hidden_price"],
        'hoeveelheid' => $_POST["hoeveelheid"]
    );
    $_SESSION["shopping_cart"] [$count] = $item_array;
    }
  else
    {
      echo '<script>alert("item already added to the shopping cart")</script>';
      echo '<script> window.location=productpage.php"</script>';
    }
  }
  else{

        $item_array = array (
            'item_id'  => $_GET["id"],
            'naam' => $_POST["hidden_name"],
            'prijs' => $_POST["hidden_price"],
            'hoeveelheid' => $_POST["hoeveelheid"]
        );
       $_SESSION["shopping_cart"][0] = $item_array;
}}
 if(isset ($_GET["action"]))
{
  if($_GET[ "action"] == "delete"  )
  {
    foreach($_SESSION["shopping_cart"] as $keys => $values)
    {
      if($values["id"] == $_GET["id"])
      {
        unset($_SESSION["shopping_cart"][$keys]);
        echo '<script>alert("[naam] verwijderd.")</script>';
        echo '<script> window.laction="index.php"</script>';
      }
    }
  }
}

?>
 
 <body> 

 <div class="col-md-4">
<form method="post" action="index.php?action=add&id=<?php echo $row["id"] ?>">
</from> 
</div>


     <div class="container">
         <div class="row" style="margin-top: 100px">
             <div class="col-md-5">
             <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo $row["image"];?>" class="d-block w-100" alt="connect met db id">
    </div>
    <div class="carousel-item">
      <img src="<?php echo $row["image"];?>" class="d-block w-100" alt="connect met db id">
    </div>
    <div class="carousel-item">
      <img src="<?php echo $row["image"];?>" class="d-block w-100" alt="connect met db id">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

 </div>
             <div class="col-md-7">
                <p class="new-arrival text-center ">NEW</p>
                <h3 class="titel text-center"><?php echo $row["naam"];?></h3>
                <p class="text-center"><?php echo $row["beschrijving"];?></p>
                <p> </p>
                <p><b>brand:</b><?php echo $row["merk"];?></p>
                <p><b>graphicscard:</b>van database</p>
                <p><b>processor:</b>van database</p>
                <p><b>RAM-memory:</b>van database</p>
                <p><b>storage:</b>van database</p>
                <p><b>availabilty:</b><?php echo $row["hoeveelheid"];?></p>
                 <img src="./img/sterren.png/" class="sterren"> 
                  <p> </p> </div>

             <div class="col-md-5"> </div>
             <div class="col-md-4"> 
                
                <h4 class="price"> €(uitdatabase) </h4>
                <label> quantity: </label>
                <input type="number" value="1" >
                <input type="hidden" name="hidden_name" value="<?php echo $row["name"];?>"/>
                <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>" />
            </div>
            <div class="col-md-3">
            <button type="submit" class="btn btn-default cart" name="add_to_cart"> add to cart </button>


            </div>

            
             </div>

         </div>
     </div>

             <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="./js/app.js"></script>

</body>