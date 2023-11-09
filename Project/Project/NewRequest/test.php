<?php
    session_start();
    if($_SESSION['Role']==="Manager"){
        header("Location:../Manager/Manager.php");
    }
    else if($_SESSION['Role']==="Employee"){
        header("Location:../Employee/Home.php");
    }
    else{
        header("Location:../Accountant/Accountant.php");
    }
?>