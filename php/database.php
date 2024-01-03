<?php 
    function CreateAccount($Name, $Address, $Username, $Password, $ConfirmPassword, $Connection){
        if(!(empty($Name) || empty($Address) || empty($Username) || empty($Password) || empty($ConfirmPassword))){
            if ($Password === $ConfirmPassword) {
                if (!(IsUsernameExist($Username, $Connection))){
                    $sql = "INSERT INTO tblaccounts (Name, Address, Username, Password) 
                    VALUES ('$Name', '$Address', '$Username','$Password')";
                    if ($Connection->query($sql) === TRUE) {
                        return [True,'Account created!'];
                    } else {
                        return [False,'Error: '.$Connection->error];
                    }
                } else {
                    return [False,'Username taken!'];
                }   
            } else {
                return [False,'Passwords does not match!'];
            }
        } else {
            return [False,'Empty parameters!'];
        }
    }

    function ValidateAccount($Username, $Password, $Connection){
        if(!(empty($Username) || empty($Password))){
            $sql = "SELECT * FROM tblaccounts WHERE Username = '$Username'";
            $result = $Connection->query($sql);
            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                if($row['Password'] === $Password) {
                    return [True,$row];
                } else {
                    return [False,'Wrong password!'];
                }
            } else {
                return [False,'Username does not exist!'];
            }
        } else {
            return [False,'Empty parameters!'];
        }
    }

    function IsUsernameExist($Username, $Connection){
        if(!(empty($Username))){
            $sql = "SELECT * FROM tblaccounts WHERE Username = '$Username'";
            $result = $Connection->query($sql);
            if ($result->num_rows == 1) {
                return True;
            } else {
                return False;
            }
        } else {
            return False;
        }
    }

    function GetAllItems($Connection){
        $sql = "SELECT * FROM tblitems";
        $result = $Connection->query($sql);
        if ($result->num_rows > 0) {
            return [True,$result];
        } else {
            return [False];
        }
    }

    function GetSoloItem($Connection){
        $sql = "SELECT * FROM tblitems WHERE ItemCategory = 'Burgers' ORDER BY RAND() LIMIT 1";
        $result = $Connection->query($sql);
        if ($result->num_rows > 0) {
            return [True, $result];
        } else {
            return [False];
        }
    }

    function UploadTransaction($TransactionAccount, $TransactionName, $TransactionAddress, $TransactionTell, $TransactionAmount, $TransactionItems, $Connection) {
        if (empty($TransactionAccount) || empty($TransactionName) || empty($TransactionAddress) || empty($TransactionTell) || empty($TransactionAmount) || empty($TransactionItems)) {
            return [false, 'Error: One or more parameters are empty.'];
        }
        $sql = "INSERT INTO tbltransactions (TransactionAccount, TransactionName, TransactionAddress, TransactionTell, TransactionAmount, TransactionItems) 
                VALUES ('$TransactionAccount','$TransactionName', '$TransactionAddress', '$TransactionTell', '$TransactionAmount', '$TransactionItems')";
        if ($Connection->query($sql) === TRUE) {
            return [true, 'Transaction uploaded successfully!'];
        } else {
            return [false, 'Error: ' . $Connection->error];
        }
    }

    function GetMyTransactions($TransactionAccount,$Connection) {
        $sql = "SELECT * FROM tbltransactions WHERE TransactionAccount = '$TransactionAccount'";
        $result = $Connection->query($sql);
        if ($result->num_rows > 0) {
            return [True,$result];
        } else {
            return [False];
        }
    }
