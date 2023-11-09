<?php
session_start();
include "../_db_connect.php";
$Employee_ID = $_SESSION['Employee_ID'];
$Role = $_SESSION['Role'];
$Name = $_SESSION['Name'];
$Status = "Requested";
if(isset($_POST['Date']) && isset($_POST['Amount']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }
    
    $Date = validate($_POST['Date']);
    $Amount = validate($_POST['Amount']);
    $fileInfo = $_FILES['image'];
  
    // Get the file extension
    $extension = pathinfo($fileInfo['name'], PATHINFO_EXTENSION);

    // Check if the uploaded file is an image
    if (getimagesize($fileInfo['tmp_name'])) {
        // Read the file contents
        $fileContents = file_get_contents($fileInfo['tmp_name']);

        // Convert the file contents to base64
        $base64 ='data:image/'.$extension.';base64,'.base64_encode($fileContents);
    
    if(empty($Date)){
        header("Location: NewRequest.php?error=Date is required");
        exit();
    }
    else if(empty($Amount)){
        header("Location: NewRequest.php?error=Amount is required");
        exit();
    }
    else{
        $sql = "INSERT INTO `billrequest`(`Date`,`Name`, `Amount`, `Attachments`, `Employee_ID`,`Status`) VALUES ('$Date','$Name','$Amount','$base64','$Employee_ID','$Status')";
        $result = mysqli_query($conn,$sql);
        if($result){
            if($Role==="Employee"){
                header("Location:../Employee/Home.php");
            }
            else if($Role ==="Manager"){
                header("Location:../Manager/Manager.php");
            }
            else{
                header("Location:../Accountant/Accountant.php");
            }
            
        }
        else{
            header("Location: NewRequest?error= Invalid Details");
            exit();
        }
    }
}
}
else{
    header("Location:NewRequest.php");
    exit();
}
?>