<?php
session_start();
include "../connection.php";
include "../functions.php";

$ordered_user = "SELECT DISTINCT mo.item_id
                                , mo.reference_id
                                , u.firstname
                                , u.lastname
                                , u.address
                                , u.phonenumber
                                , u.email
                            from `orders` mo
                            join `users` u
                            on mo.user_id = u.id
                            where mo.status = 'Delivered'";
$order_user = mysqli_query($con, $ordered_user);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="icon" type="image/x-icon" href="../images/logoparent.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <link href="/your-path-to-uicons/css/uicons-[your-style].css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            body{
                background-color: #ffe8b7;
            }
            .logo{
                width: 70px;
            }
            .nav{
                display: flex;
                align-items: center;
                justify-content: space-between;
                flex-wrap: wrap;
            }

            .nav ul li{
                display: inline-block;
                list-style: none;
                list-style-position: inside;
                margin: 10px 20px;
            }

            .nav ul li a{
                color: #4d4b34;
                text-decoration: none;
                font-size: 15px;
                font-weight: 500;
                position: relative;
            }
            .nav ul li a::after{
                content: '';
                width: 0;
                height: 1px;
                background: #b94013;
                position: absolute;
                right: 0;
                bottom: -3px;
                transition: 0.2s;
            }
            .nav ul li a:hover::after{
                width: 100%;
            }
            .profilepic{
                width: 50px;
                border-radius: 50%;
            }
            .categ{
                border: 2px solid #b94013;
                border-radius: 20%;
            }
            .categ a{
                text-decoration: none;
                color: #4d4b34;
            }
            .dropdown-toggle{
                border: 2px solid brown;
                display: inline;
                padding-right: 10px;
                padding-left: 10px;
                border-radius: 20px;
                font-weight: 700;
                background-color: #c9864f;
            }
            input[type=text]{
                border: 2px solid brown;
                display: inline;
                padding-right: 10px;
                padding-left: 10px;
                border-radius: 20px;
                font-weight: 700;
                background-color: #c9864f;
            }
        </style>
    </head>
    <body>
        <!-- NAVBAR -->
        <div class="container">
            <div class="row mt-3">
                <nav class="nav">
                    <img src="../images/logoparent.png" class="logo">
                    <ul>
                        <li><a href="index.php">DASHBOARD</a></li>
                        <li><a href="#services">ORDERS</a></li>
                        <li><a href="#services">PRODUCTS</a></li>
                        <a href="#"><img class="profilepic" src="../images/profileimg.jpg" alt="profileimg"></a>
                    </ul>
                </nav>
            </div>
            <hr style="height: 2px">
            <div class="row">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sort by
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <!-- FINISH ADMIN PAGE FUNCTIONS -->
                    </ul>
                    <input type="text" placeholder="Search" style="float:right">
                    </li>
                </ul>
            </div>
        </div>
        <!-- MANAGE ORDERS CONTENT -->
        <div class="container m-5">
            <div class="row mb-3">
                <div class="col-4"></div>
                <div class="col-4"></div>
                <div class="col-4"></div>
            </div>
            
            <?php
                while($order_info = mysqli_fetch_assoc($order_user)){
                    $reference_id = $order_info['reference_id'];
                    $item_ref = $order_info['item_id'];
                    $firstname = $order_info['firstname'];
                    $lastname = $order_info['lastname'];
                    $address = $order_info['address'];
                    $phonenumber = $order_info['phonenumber'];
                    $email = $order_info['email'];
            ?>
            <div class="row mb-3">
                <!-- COLUMN -->
                <div class="col">
                    <?php
                        echo "<small>".$reference_id."</small> " ;
                    ?>
                </div>
                <!-- COLUMN -->
                <div class="col"> 
                    <?php
                        echo "<em>".$item_ref."</em> - <a>".$firstname."</a> " . $lastname . "<br>" ;  
                    ?>
                </div>
                <!-- COLUMN -->
                <div class="col">
                    <?php
                        echo "<small>".$address."</small> " ;
                    ?>
                </div>
                <!-- COLUMN -->
                <div class="col">
                    <?php
                        echo "<small>".$phonenumber."</small> <br>" ;
                        echo "<small>".$email."</small>" ;
                    ?>
                </div>
                <!-- COLUMN -->
                <div class="col">
                    <?php
                        $sql_get_ingredient = "SELECT i.item_name 
                                                    , i.item_price 
                                                    , i.item_desc 
                                                from `orders` mo 
                                                JOIN `items` i 
                                                ON mo.item_id = i.item_id 
                                                where i.item_id = '$item_ref';";
                        $ingredient_result = mysqli_query($con,$sql_get_ingredient);

                        echo "<ul>";
                        while($ing = mysqli_fetch_assoc($ingredient_result)){
                            echo "<li>" . $ing['item_name'] . "(". $ing['item_price'] .")" . "</li>";
                        }
                        echo "</ul>";  ?>
                        <a href="update_order.php?update_order_status=D&ref_id=<?php echo $ord_ref_num;?>" class="btn btn-success btn-sm">Delivered</a>
                        <a href="update_order.php?update_order_status=X&ref_id=<?php echo $ord_ref_num;?>" class="btn btn-danger btn-sm">Cancel</a> <hr>
                        
                </div>
                <?php } ?>
            </div>
        </div>
    </body>
</html>