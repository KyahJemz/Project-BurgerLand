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
    <title>Transactions - Burger Land</title>
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
    <section class="transactions">
        <h1>Transactions History</h1>
        <div class="transactions-container">
        <?php
            $result = GetMyTransactions($_SESSION['Username'], $Connection);
            if ($result[0]) {
                while ($row = $result[1]->fetch_assoc()) {
            ?>
                    <div class="transactions-item">
                        <h3>Transaction ID: <?php echo $row['TransactionId']; ?></h3>
                        <p>Items: <?php echo $row['TransactionItems']; ?></p>
                        <p>Price: <?php echo $row['TransactionAmount']; ?></p>
                        <p>Timestamp: <?php echo $row['TransactionTimestamp']; ?></p>
                    </div>
            <?php
                }
            } else {
            ?>
                <div class="transactions-item">
                    <h3>No recent transactons...</h3>
                </div>
            <?php
            }
            ?>
        </div>
    </section>
    <script type="module" src="../scripts/main.js"></script>
</body>
</html>
