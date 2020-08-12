<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
    if(!empty($_SESSION["shopping_cart"])) {
        foreach($_SESSION["shopping_cart"] as $key => $value) {
        if($_POST["prod_id"] == $key){
        unset($_SESSION["shopping_cart"][$key]);
        $status = "<div class='box' style='color:red;'>
        Product is removed from your cart!</div>";
        }
        if(empty($_SESSION["shopping_cart"])){
        unset($_SESSION["shopping_cart"]);}
        } 
    }
}
 
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['prod_id'] === $_POST["prod_id"]){
        $value['quantity'] = $_POST["quantity"];
         // Stop the loop after we've found the product
    }
}
   
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Goodie | Ecommerce Website Design</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>


<body>

    <div class="header">
        <div class="container">
            <div class="logo">
                <img src="images/pngtree-shopping-bag-icon.jpg">
            </div>
            <div class="navbar">
                <a href="index.php">Home</a>
                <a href="about.html">About Us</a>
                <a href="products.html">Products</a>
                <a href="cart.php">Cart<i class="fa fa-shopping-bag"></i></a>
            </div>
        </div>
    </div>

    <section class="categories">
        <div class="container">
            <span class="title">Goodie</span>
            <a href="all.html" class="category-item">All</a>
            <a href="backpacks.html" class="category-item">Backpacks</a>
            <a href="clutch.html" class="category-item">Clutch bags</a>
            <a href="holdalls.html" class="category-item">Holdalls and weekend bags</a>
            <a href="laptop.html" class="category-item">Laptop bags</a>
            <a href="shoulder.html" class="category-item">Shoulder bags</a>
        </div>
    </section>

    <div class="section-header container">
            Cart
        </div>




<div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?> 
    <table class="table">
        <tbody>
        <tr>
        <td></td>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Unit Price</th>
        <th>Items Total</th>
    </tr> 
<?php 
foreach ($_SESSION["shopping_cart"] as $product){
?>
    <tr>
    <td>
    <img src='./images/products/<?php echo $product['image']; ?>' width="100" height="90" />
    </td>
    <td>
        <?php echo $product["pname"]; ?><br />
        <form method='post' action=''>
            <input type='hidden' name='prod_id' value="<?php echo $product["prod_id"]; ?>" />
            <input type='hidden' name='action' value="remove" />
            <button type='submit' class='remove'>Remove Item</button>
        </form>
    </td>
    <td><?php echo "$".$product["price"]; ?></td>
    <td><?php echo "$".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "$".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table> 
  <?php
}else{
 echo "<h3>Your cart is empty!</h3>";
 }
?>
</div>
 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>

</html>