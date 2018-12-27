<?
    session_start();

    if(isset($_SESSION['logged_in'])) {
        unset($_SESSION['logged_in']);
    }
    
    if(isset($_SESSION['logged_in_user_first'])) { 
        unset($_SESSION['logged_in_user_first']); 
    } 
     
    if(isset($_SESSION['logged_in_user_last'])) { 
        unset($_SESSION['logged_in_user_last']); 
    }
    
    header("Location: login.php");
?>