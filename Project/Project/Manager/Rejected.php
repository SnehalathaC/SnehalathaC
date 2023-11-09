<?php 
session_start();
$id = $_SESSION['Employee_ID'];
if(isset($_SESSION['Employee_ID']) && isset($_SESSION['Role']) && isset($_GET['id'])){
  include '../_db_connect.php';
  $id = $_GET['id'];
  $sql="UPDATE `billrequest` SET `Status`='Rejected' WHERE S_NO = '$id'";
  $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="Login.css" rel="stylesheet">
  <link rel="shortcut icon" type="x-icon" href="Abrao_logo.jpeg">
  <title>Employee Request Status</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
</head>

<body>
    <header class="text-gray-600 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
          <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
            <img alt="abrao_logo" data-src="https://abraogroup.com/wp-content/uploads/2020/09/logo.svg" class="main-logo lazyloaded" src="https://abraogroup.com/wp-content/uploads/2020/09/logo.svg" style="display: block;">
          </a>
          <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
            <a href="Manager.php" class="mr-5 hover:text-gray-900">Home</a>  
            <a href="../NewRequest/NewRequest.php" class="mr-5 hover:text-gray-900">New Request</a>
          </nav>
          <form action = "../Logout.php">
          <button class="inline-flex items-center bg-gray-100 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded text-base mt-4 md:mt-0">Logout
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-1" viewBox="0 0 24 24">
              <path d="M5 12h14M12 5l7 7-7 7"></path>
            </svg>
          </button>
          </form>
        </div>
      </header>
  <div class="max-w-5xl mx-auto mt-8">
    <h1 class="text-2xl font-bold">Employee Request Status</h1>
    <br>
    <div class="bg-gray-50 shadow-md p-6">
        <h2 class="text-lg font-semibold mb-4">Request Status: Rejected</h2>
        <p class="text-gray-600">Reason for Rejection: <span class="font-bold">Insufficient supporting documents</span></p>
    </div>
  </div>
</body>

</html>
<?php
}
else{
    header("Location:../index.php");
    exit();
}
?>