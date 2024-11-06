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
        <div class="container">
            <div class="row" style="margin-top: 10px;">
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
            <header>
                <div class="title">PRODUCT LIST</div>
                <div class="icon-cart">
                    <svg  xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                    </svg>
                    <span>0</span>
                </div>
            </header>
            <div class="Listproduct">
                <div class="item">
                    <img src="../images/Topbreed.png" alt="test">
                    <h2>PRODUCT NAME</h2>
                    <div class="price">Php 300.00</div>
                    <button class="addCart">Add to Cart</button>
                </div>
            </div>
            <div class="cartTab">
                <h1>Shopping Cart</h1>
                <div class="ListCart">
                    <div class="item">
                        <div class="image">
                            <img src="../images/Pedigree2.jpg" alt="test">
                        </div>
                        <div class="name">
                            NAME
                        </div>
                        <div class="totalprice">
                            Php 300.00
                        </div>
                        <div class="quantity">
                            <span class="minus"><</span>
                            <span>1</span>
                            <span class="plus">></span>
                        </div>
                    </div>
                </div>
                <div class="btn">
                    <button class="close">CLOSE</button>
                    <button class="checkOut">CHECK Out</button>
                </div>
            </div>
        </div>
    </body>
    <script src="app.js"></script>
</html>