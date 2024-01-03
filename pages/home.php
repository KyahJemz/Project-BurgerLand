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
    <title>Welcome to Burger Land</title>
    <link rel="stylesheet" href="../styles/style.css">

<style>

    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
        height: 100vh;
        gap: 20px;
        padding-top: 50px;
        padding-bottom: 50px;
    }

    .banner {
        width: 100%;
        color: #fff;
        text-align: center;
        padding: 20px 0;
    }

    .banner h1 {
        font-size: 36px;
        margin-bottom: 10px;
        text-shadow: 0px 0px 50px black;
    }

    .banner p {
        font-size: 18px;
        text-shadow: 0px 0px 50px black;
    }

    .menu-suggestion h2 {
        color: white;
        font-size: 24px;
        margin-bottom: 10px;
        text-shadow: 0px 0px 50px black;
    }

    .menu-suggestion img {
        width: 125px;
        height: auto;
        margin: 10px 0;
        border-radius: 5px;
        text-shadow: 0px 0px 50px black;
    }

    .menu-suggestion p {
        font-size: 18px;
        color: white;
        text-shadow: 0px 0px 50px black;
    }
</style>

</head>
<body>
    <?php include '../styles/header.php' ?>

    <section class="banner">
        <h1>Welcome to Burger Land</h1>
        <p>Your Destination for Delicious Burgers</p>
    </section>

    <section class="menu-suggestion">
        <?php
        $result = GetSoloItem($Connection);
        if ($result[0]) {
            $row = $result[1]->fetch_assoc();
        ?>
            <h2>Today's Suggestion</h2>
            <p><?php echo $row['ItemDescription']; ?></p>
            <img src="../images/uploads/<?php echo $row['ItemImage']; ?>" alt="<?php echo $row['ItemName']; ?>">
            <p>Price: ₱<?php echo number_format($row['ItemPrice'], 2); ?></p>
            <p>Enjoy this delicious <?php echo $row['ItemName']; ?> at our burger store today!</p>
        <?php
        } else {
            echo "<p>Sorry, no suggestion is available at the moment.</p>";
        }
        ?>
    </section>

    <?php include '../styles/footer.php' ?>

    <script type="module" src="../scripts/main.js"></script>
</body>
</html>