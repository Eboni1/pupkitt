<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
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
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row mt-3">
                <nav class="nav">
                    <img src="../images/logoparent.png" class="logo">
                    <ul>
                        <li><a href="#">DASHBOARD</a></li>
                        <li><a href="#services">ORDERS</a></li>
                        <li><a href="#services">PRODUCTS</a></li>
                        <a href="#"><img class="profilepic" src="../images/profileimg.jpg" alt="profileimg"></a>
                    </ul>
                </nav>
            </div>
            <hr style="height: 2px">
            <div class="row">
                <h5 class="categ"><a href="#">Dog food</a></h5>
                <h5 class="categ"><a href="#">Accessory</a></h5>
                <h5 class="categ"><a href="#">Shampoo</a></h5>
            </div>
        </div>
        
    </body>
</html>