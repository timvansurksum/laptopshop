<?php

?>

<div style="clear:both"></div>
<br />
<h3> Winkelwagen</h3>
<div class="table-responsive">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">naam</th>
      <th scope="col">prijs</th>
      <th scope="col">hoeveelheid</th>
      <th scope="col">totaal</th>
    </tr>
  </thead>
<?php
if(!empty($_SESSION["shopping_cart"]))
{
    $total = 0;
    foreach($_SESSION[ "shopping_cart"] as $keys => $values)
    {
        ?>
        <tr>
            <td><?php echo $values[ "naam"]; ?></td>
            <td><?php echo $values[ "prijs"]; ?></td>
            <td><?php echo $values[ "hoeveelheid"]; ?></td>
            <td><?php echo $values[ "totaal"]; ?></td>
            <td><?php echo number_format ($values[ "hoeveelheid"] *     $values[ "item_price"], 2); ?></td>
            <td> <a href="index.php?action=delete&id=<?php echo $values["item_id"];?>"><span class="text-danger">Remove</span></a></td>
        <tr>
            <?php
             $total = $total +  ($values["hoeveelheid"] * $values[ "prijs"]);
    }
}
?>
<tr>
    <td colspan="3" align="right">Totaal:</td>
    <td align="right"> €<?php echo number_format( $total , 2); ?></td>; 
</tr>
</table>
</div>  