<?php
session_start();
include "_db_connect.php";
if(isset($_POST['username']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }

    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);

    if(empty($uname)){
        header("Location: index.php?error=User Name is required");
        exit();
    }
    else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }
    else{
        $sql = "SELECT * from login where Employee_ID = '$uname' AND Password = '$pass'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)===1){ 
            $row = mysqli_fetch_assoc($result);
            if($row['Employee_ID']===$uname && $row['Password']===$pass){
                $_SESSION['Employee_ID'] = $row['Employee_ID'];
                $_SESSION['Role'] = $row['Role'];
                $_SESSION['Name'] = $row['Name'];
                if($row['Role']==="Employee"){
                    header("Location:Employee/Home.php");
                    exit();
                }
                else if($row['Role']==="Manager"){
                    header("Location:Manager/Manager.php");
                    exit();
                }
                else if($row['Role']==="Accountant"){
                    header("Location:Accountant/Accountant.php");
                }
            }
            else{
                header("Location: index.php?error=Incorrect User Name or Password");
                exit();
            }
        }
        else{
            header("Location: index.php?error=Incorrect User Name or Password");
            exit();
        }
    }
}
else{
    header("Location:index.php?");
    exit();
}

?>