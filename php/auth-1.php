<?php 
    session_start();

    if(isset($_POST['Logout'])) {
        clearUser();
        exit;
    } else {
        if (isset($_SESSION['Username']) && isset($_SESSION['Password'])) {
            $result = ValidateAccount($_SESSION['Username'],$_SESSION['Password'],$Connection);
            if ($result[0]){
                $row = $result[1];
                echo '<script>';
                echo 'var Address = ' . $row['Address'] . ';';
                echo 'var Name = ' . $row['Name'] . ';';
                echo '</script>';
                $_SESSION['Address'] = $row['Address'];
                $_SESSION['Name'] = $row['Name'];

                setUser($_SESSION['Username'],$_SESSION['Password']);
            } else {
                header('Location: ../index.php');
                exit;
            }
        } else {
            header('Location: ../index.php');
            exit;
        }
    }

    

    function setUser($Username,$Password) {
        $_SESSION['Username'] = $Username;
        $_SESSION['Password'] = $Password;
    }

    function clearUser() {
        session_unset();
        session_destroy();
        header('Location: ../index.php');
        exit;
    }

   