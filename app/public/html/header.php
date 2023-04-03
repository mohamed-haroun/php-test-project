<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/fontawesome.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/main.css">

    <?php if(lcfirst($parameters['page_name']) == 'home'):?>
    <link rel="stylesheet" href="../css/home.css">
    <?php elseif(lcfirst($parameters['page_name']) == 'login'):?>
        <link rel="stylesheet" href="../css/login.css">
    <?php elseif(lcfirst($parameters['page_name']) == 'services'):?>
        <link rel="stylesheet" href="../css/services.css">
    <?php elseif(lcfirst($parameters['page_name']) == 'contact Us'):?>
        <link rel="stylesheet" href="../css/contact.css">
    <?php elseif(lcfirst($parameters['page_name']) == 'products'):?>
        <link rel="stylesheet" href="../css/products.css">
    <?php elseif(lcfirst($parameters['page_name']) == 'register'):?>
        <link rel="stylesheet" href="../css/register.css">
    <?php endif;?>

    <title>Trade - <?php echo ucfirst($parameters['page_name']);?></title>
</head>

<body>
    <!--    creating the header section of the application-->
    <header>
        <section class="container">
            <section class="logo">
                <h1>Trade</h1>
            </section>
            <i class="fa-solid fa-bars-staggered bars"></i>
            <nav>
                <ul>
                    <li><a href="/"
                           class="<?php echo lcfirst($parameters['page_name']) == 'home' ? 'active' : null;?>">Home</a></li>
                    <li><a href="/services"
                           class="<?php echo lcfirst($parameters['page_name']) == 'services' ? 'active' : null;?>">Services</a></li>
                    <li><a href="/products"
                           class="<?php echo lcfirst($parameters['page_name']) == 'products' ? 'active' : null;?>">Products</a></li>
                    <li><a href="/login"
                           class="<?php echo lcfirst($parameters['page_name']) == 'login' ? 'active' : null;?>">Login</a></li>
                    <li><a href="/contact"
                           class="<?php echo lcfirst($parameters['page_name']) == 'contact Us' ? 'active' : null;?>">Contact Us</a></li>
                </ul>
            </nav>
            <section class="search">
                <form action="/products" id="form">
                    <input type="text" name="product" id="search" required>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass" id="search"></i></button>
                </form>
            </section>
        </section>
    </header>
    <!--  End the header section of the application-->