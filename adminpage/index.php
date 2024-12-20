<?php
session_start();
include "../connection.php";
include "../functions.php";

$user_info = check_login($con);

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
            .box{
                background-color: #ffeee3;
                box-shadow: brown;
                border-radius: 50px;
                padding: 2rem;
                border: solid;
                overflow-x: hidden;
            }
            .image{
                width: 250px;
                border-radius: 10%;
                padding-bottom: 10px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row"><?php echo $user_info['username']; ?></div>
            <div class="row mt-3">
                <nav class="nav">
                    <img src="../images/logoparent.png" class="logo">
                    <ul>
                        <li><a href="#">DASHBOARD</a></li>
                        <li><a href="orders.php">ORDERS</a></li>
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
        <div class="container">
            <div class="row">
                <div class="col" style="text-align: center;">   
                    <h2>Popular Products</h2>

                </div>
            </div>
            <div class="row">
                <?php
                    $query = "SELECT * FROM `items`";
                    $items = mysqli_query($con,$query);
                    if($items->num_rows > 0){
                        while($row = $items->fetch_assoc()){
                            $item_id = $row['item_id'];
                            
                            $puery = "SELECT * FROM `items` WHERE item_id = '$item_id'";
                            $count_review = mysqli_query($con, $puery);
                            $count = $count_review->num_rows;

                            ?>
                                <div class="col m-2 box" style="text-align: center">
                                    <img src="../images/<?= $row['image']; ?>" alt="" class="image">
                                    <h3 class="title"><?= $row['item_name']; ?></h3>
                                    <p class="total-reviews"><i class="fas fa-star"></i> <span><?= $count; ?></span></p>
                                    <a href="view_post.php?get_id=<?= $post_id; ?>" class="inline-btn">view post</a>
                                </div>
                            <?php
                        }
                    }else{
                        echo '<p class="empty">no posts added yet!</p>';
                    }
                ?>
            </div>
        </div>
    </body>
</html>