<?php 
    include '../php/config.php';
    include '../php/database.php';
    include '../php/auth-1.php';

    $result = GetAllItems($Connection);
    if ($result[0]) {
        $items = json_encode($result[1]->fetch_all(MYSQLI_ASSOC));
        echo '<script>';
        echo 'var items = ' . $items . ';';
        echo '</script>';
    }
    if (isset($_POST['order-now-btn'])) {
        $result = UploadTransaction($_POST['username'], $_POST['name'], $_POST['address'], $_POST['contact'], $_POST['amount'], $_POST['items'], $Connection);
        if ($result[0]) {
            echo '<script>';
            echo 'alert("Transaction Complete");';
            echo 'localStorage.clear();';
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Transaction Failed");';
            echo '</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo.png" type="image/x-icon">
    <title>Cart - Burger Land</title>
    <link rel="stylesheet" href="../styles/style.css">

    <style>

header {
            background-color: rgba(165, 42, 42); 
        }

.cart-summary {
    margin-top: 20px;
    background-color: #f7f7f7;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.cart-summary h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.personal-info label {
    font-size: 16px;
    display: block;
    margin-bottom: 5px;
}

.personal-info input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 16px;
}

.cart-total {
    font-size: 18px;
    margin-top: 20px;
}

.total-price {
    color: #ff7f00;
}

.checkout-button {
    background-color: #e74c3c;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}
body {
            padding-bottom: 5px;
        }

    </style>
</head>
<body>
<?php include '../styles/header.php' ?>

    <section class="cart">
        <h1>My Cart</h1>
        <div class="cart-summary">
            <h2>Cart Summary</h2>
            <form action="" method="POST">
                <div class="personal-info">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $_SESSION['Name']; ?>" required>

                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="<?php echo $_SESSION['Address']; ?>" required>

                    <label for="contact">Contact Number:</label>
                    <input type="text" id="contact" name="contact" required>
                </div>

                <input required type="hidden" id="items" name="items">
                <input required type="hidden" id="amount" name="amount">
                <input required type="hidden" id="username" name="username" value="<?php echo $_SESSION['Username']; ?>" >

                <div class="cart-total">
                    <p>Total: ₱<span class="total-price">0.00</span></p>
                </div>

                <button name="order-now-btn" class="checkout-button order-now-btn" type="submit">Checkout</button>
            </form>
        </div>

        <div class="cart-container">


        </div>

    </section>
    <script type="module" src="../scripts/main.js"></script>
</body>
</html>
