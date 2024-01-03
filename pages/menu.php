<?php 
    include '../php/config.php';
    include '../php/database.php';
    include '../php/auth-1.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/logo.png" type="image/x-icon">
    <title>Menu - Burger Land</title>
    <link rel="stylesheet" href="../styles/style.css">

    <style>
        header {
            background-color: rgba(165, 42, 42); 
        }
        
        body {
            padding-bottom: 5px;
        }

    </style>
</head>
<body>
<?php include '../styles/header.php' ?>
    <section class="menu">
        <h1>Our Delicious Menu</h1>
        <div class="menu-container">
        <?php
            $result = GetAllItems($Connection);
            if ($result[0]) {
                while ($row = $result[1]->fetch_assoc()) {
            ?>
                    <div class="menu-item" data-itemid="<?php echo $row['ItemId']; ?>">
                        <img class="image" src="../images/uploads/<?php echo $row['ItemImage']; ?>" alt="<?php echo $row['ItemName']; ?>">
                        <h3><?php echo $row['ItemName']; ?></h3>
                        <p class="price">₱<?php echo number_format($row['ItemPrice'], 2); ?></p>
                        <p class="description"><?php echo $row['ItemDescription']; ?></p>
                        <p class="category"><?php echo $row['ItemCategory']; ?></p>
                        <button class="add-to-cart-btn">Add To Cart</button>
                    </div>
            <?php
                }
            } else {
            ?>
                <div class="menu-item">
                    <p>Sorry, no menu items are available at the moment.</p>
                </div>
            <?php
            }
        ?>


            

        </div>
    </section>
    <script type="module" src="../scripts/main.js"></script>
</body>
</html>
