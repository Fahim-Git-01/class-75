<?php
include("connection/connect.php"); 
session_start();
$user_id = $_SESSION['user_id'];


$query = "SELECT f_name, l_name FROM users WHERE u_id = $user_id";
$result = $db->query($query);
$user = $result->fetch_assoc();

if ($user) {
    $client_name = $user['f_name'] . ' ' . $user['l_name'];
} else {
    $client_name = 'Guest'; 
}


$cartItems = $_SESSION["cart_item"];


$totalOrderPrice = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Invoice</title>
    <style>
        .invoice-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            background-color: #f9f9f9;
        }
        .invoice-header, .invoice-footer {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .btn {
            background-color: #007bff;
            padding: 10px 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="site-wrapper">
<header id="header" class="header-scroll top-header headrom">
            <nav class="navbar navbar-dark">
                <div class="container">
                    <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">&#9776;</button>
                    <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="images/food-mania-logo.png" alt=""> </a>
                    <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                        <ul class="nav navbar-nav">
                            <li class="nav-item"> <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurants <span class="sr-only"></span></a> </li>
                            
							<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Login</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Signup</a> </li>';
							}
						else
							{
									
									
										echo  '<li class="nav-item"><a href="your_orders.php" class="nav-link active">Your Orders</a> </li>';
									echo  '<li class="nav-item"><a href="logout.php" class="nav-link active">Logout</a> </li>';
							}

						?>
							 
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="page-wrapper">
<div class="invoice-container">
    <div class="invoice-header">
        <h1>Invoice</h1>
    </div>
    <div class="invoice-details">
    <p><strong>Client Name:</strong> <?= $client_name; ?></p>
    
    <h3>Order Items:</h3>
    <?php foreach ($cartItems as $item): ?>
        <div class="item-details">
            <p><strong>Title:</strong> <?= $item['title']; ?></p>
            <p><strong>Price per Unit:</strong> ৳<?= number_format($item['price'], 2); ?></p>
            <p><strong>Quantity:</strong> <?= $item['quantity']; ?></p>
            <p><strong>Total Price:</strong> ৳<?= number_format($item['price'] * $item['quantity'], 2); ?></p>
        </div>
        <?php 
        // Calculate total order price
        $totalOrderPrice += $item['price'] * $item['quantity']; 
        ?>
    <?php endforeach; ?>

    <h3><strong>Total Order Price:</strong> ৳<?= number_format($totalOrderPrice, 2); ?></h3>
</div>
    <div class="invoice-footer">
        <a href="generate_invoice_pdf.php" class="btn">Download PDF</a>
    </div>
</div>
</div>
<footer class="footer">
                    <div class="row bottom-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 payment-options color-gray">
                                    <h5>Payment Options</h5>
                                    <ul>
                                        <li>
                                            <a href="#"> <img src="images/paypal.png" alt="Paypal"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/mastercard.png" alt="Mastercard"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/maestro.png" alt="Maestro"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/stripe.png" alt="Stripe"> </a>
                                        </li>
                                        <li>
                                            <a href="#"> <img src="images/bitcoin.png" alt="Bitcoin"> </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-xs-12 col-sm-4 address color-gray">
                                    <h5>Address</h5>
                                    <p>213, Raheja Chambers, Free Press Journal Road, Nariman Point, Mumbai, Maharashtra 400021, India</p>
                                    <h5>Phone: +91 8093424562</a></h5> </div>
                                <div class="col-xs-12 col-sm-5 additional-info color-gray">
                                    <h5>Addition informations</h5>
                                   <p>Join thousands of other restaurants who benefit from having partnered with us.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
</div>
</body>
</html>
