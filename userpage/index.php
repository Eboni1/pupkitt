<!-- PHP is still needed to be implemented in order to connect this page to the database -->
<?php
session_start();
include "../connection.php";
include "../functions.php";

$user_info = check_login($con);

$query = "SELECT * FROM `items`";
$items = mysqli_query($con, $query);
$rows = $items -> fetch_assoc();

$puery = "SELECT * FROM `items` WHERE "
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
        <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
        
        <link rel="stylesheet" href="style.css">
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script> -->
    </head>
    <body class="">
        <h4><?php echo $user_info['username'] ?></h4>
        <div class="container">
            <!-- This is where the header and the navigation bar begins --> 
            <div class="row" style="margin-top: 10px;">
                <nav class="nav">
                    <img src="../images/logoparent.png" class="logo">
                    <ul>
                        <li><a href="#">DASHBOARD</a></li>
                        <li><a href="orders.php">ORDERS</a></li>
                        <li><a href="#services">PRODUCTS</a></li>
                        <a href="#"><img class="profilepic" src="../images/profileimg.jpg" alt="profileimg"></a> <!-- This button opens up the profile of the user --> 
                    </ul>
                </nav>
            </div>
            <hr style="height: 2px">
            <header>
                <div class="title">PRODUCT LIST</div>
                <div class="icon-cart">
                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                    </svg>
                    <span>0</span> <!-- Notification number indicating the number of items in the shopping cart -->
                </div>
            </header>
            <!-- Listing of the products for the user page -->
            <div class="Listproduct">
                <ul>
                <?php
                    if($items -> num_rows > 0){
                        foreach($rows as $row){
                            ?>
                            <li>
                                <div class="item">
                                    <img src="../images/<?php echo $row['item_image']; ?>" alt="item image">
                                    <h2><?php echo $row['item_name'] ?></h2>
                                    <div class="price">Php <?php echo $row['item_price'] ?></div>
                                    <form action="addtoCart.php" method="post">
                                        <input type="hidden" name="id" value="<?php echo $row['item_id'] ?>">
                                        <input type="submit" value="Add to Cart">
                                    </form>
                                        
                                </div>
                            </li>
                            <?php
                        }
                    }
                ?>
                </ul>
            </div>
        </div>
        <!-- Cart Tab where the items in the shopping cart are displayed and modified by the user -->
        <?php
        if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
            $cartItems = array_keys($_SESSION['cart']);

            $ids = implode(',', array_map('intval', $cartItems));

            $suery = "SELECT item_id, item_name, item_price, item_image FROM `items` WHERE item_id IN ($ids)";
            $results = mysqli_query($con, $suery);
        }
        ?>
        <div class="cartTab">
            <h1>Shopping Cart</h1>
            <div class="ListCart">
                <?php
                if(empty($_SESSION['cart'])){
                    ?> <h2>Your cart is empty.</h2><?php
                }else{
                    while($rowe = mysqli_fetch_assoc($results)){
                        $id = $rowe['item_id'];
                        $name = $rowe['item_name'];
                        $price = $rowe['item_price'];
                        $image = $rowe['item_image'];
                        $quantity = $_SESSION['cart']['$id'];
                        $totalPrice = $price * $quantity;
                        ?>
                        <div class="item">
                            <div class="image">
                                <img src="../images/<?php echo $image ?>" alt="<?php echo $image ?>">
                            </div>
                            <div class="name">
                                <?php $name ?>
                            </div>
                            <div class="totalprice">
                                <?php $price ?>
                            </div>
                            <div class="quantity">
                                <span class="minus"><</span>
                                <span><?php $quantity ?></span>
                                <span class="plus">></span>
                            </div>
                        </div>
                        <?php
                    }
                }

                ?>


                
            </div>
            <div class="btn">
                <button class="close">CLOSE</button> <!-- This button closes the cart tab -->
                <button class="checkOut">CHECK Out</button> <!-- This button takes the user to the checkout page -->
            </div>
        </div>
    </body>
    <script src="app.js"></script>
</html>