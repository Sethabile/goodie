<?php
session_start();
include('db.php');
$status="";

if (isset($_POST['prod_id']) && $_POST['prod_id']!=""){
$prod_id = $_POST['prod_id'];
$result = mysqli_query(
$con,
"SELECT * FROM `products` WHERE `prod_id`='$prod_id'"
);
$row = mysqli_fetch_assoc($result);
$pname = $row['pname'];
$price = $row['price'];
$image = $row['image'];
 
$cartArray = array(
 $prod_id=>array(
    'image'=>$image,
    'pname'=>$pname,
    'price'=>$price,
    'quantity'=>1));



if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($prod_id,$array_keys)) {
 $status = "<div class='box' style='color:red;'>
 Product is already added to your cart!</div>"; 
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
 }
 
 }
}
?>


<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>

<?php
}
?>

 
<div style="clear:both;"></div>
 
<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div> 

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
                <a href="index.html">Home</a>
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

    <section class="featured">
        <img src="images/banner.jpg">
    </section>

    <div class="section-header container">
            Featured products
        </div>


    <?php
    $result = mysqli_query($con,"SELECT * FROM `products`");
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='product_wrapper'>
            <form method='post' action=''>
            <input type='hidden' name='prod_id' value=".$row['prod_id']." />
            <div class='image'><img src= './images/products/".$row['image']."' /></div>
            <div class='pname'>".$row['pname']."</div>
            <div class='price'>$".$row['price']."</div>
            <input type='submit' name= 'add to cart' class='button' value= 'Add to Cart'/>
            
            </form>
            </div>";
        }
    mysqli_close($con); ?>
    

    <div class= "footer">
        GOODIE &copy;. Built with ❤️
    </div>

    <!--
    <div class="catalogue">
        <div class="section-header container">
            Featured products
        </div>
        <div class="container">
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images.jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Alex tote</div>
                        <div class="product-price">R320.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>

                </div>
            </div>





            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (1).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Polly tote</div>
                        <div class="product-price">R950.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (2).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Blake clutch</div>
                        <div class="product-price">R800.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (3).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Vintage clutch</div>
                        <div class="product-price">R400.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (4).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Asymmetric sling</div>
                        <div class="product-price">R350.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (5).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Hollywood clutch</div>
                        <div class="product-price">R600.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (6).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Fringe clutch</div>
                        <div class="product-price">R350.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (7).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Alexa backpack</div>
                        <div class="product-price">R390.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (8).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Miami tote</div>
                        <div class="product-price">R500.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (9).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Paris backpack</div>
                        <div class="product-price">R640.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (10).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Bali duffle</div>
                        <div class="product-price">R680.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (11).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">McKenzie clutch</div>
                        <div class="product-price">R590.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (12).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Future sling</div>
                        <div class="product-price">R710.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (13).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Royale clutch</div>
                        <div class="product-price">R650.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (14).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Bills clutch</div>
                        <div class="product-price">R680.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (15).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Rich tote</div>
                        <div class="product-price">R870.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (16).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Formal laptop bag</div>
                        <div class="product-price">R900.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (17).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">CEO laptop bag</div>
                        <div class="product-price">R890.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (18).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Nana tote</div>
                        <div class="product-price">R800.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
            <div class="product-container">
                <div class="product-item">
                    <div class="product-image"><img src="./images/products/images (19).jpeg" /></div>
                    <div class="product-details">
                        <div class="product-name">Senorita laptop bag</div>
                        <div class="product-price">R680.00</div>
                        <button type= "button" class= "button">Add to cart</button>
                    </div>
                </div>
            </div>
            
        </div>
    </div>-->

    
</body>

</html>