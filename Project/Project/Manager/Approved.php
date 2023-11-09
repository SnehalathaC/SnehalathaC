<?php 
session_start();
$id = $_SESSION['Employee_ID'];
if(isset($_SESSION['Employee_ID']) && isset($_SESSION['Role']) && isset($_GET['id'])){
  include '../_db_connect.php';
  $id = $_GET['id'];
  $sql="UPDATE `billrequest` SET `Status`='Approved' WHERE S_NO = '$id'";
  $result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Request Status</title>
  <link href="Login.css" rel="stylesheet">
  <link rel="shortcut icon" type="x-icon" href="Abrao_logo.jpeg">
  <script src="https://cdn.tailwindcss.com"></script>
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
    <div class="bg-white shadow-md p-6">
      <h2 class="text-lg font-semibold mb-4">Employee Request Status</h2>
      <div class="flex items-center">
        <span class="text-green-500 mr-2">Approved</span>
        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M18.707 5.293a1 1 0 010 1.414l-9 9a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L9 13.586l8.293-8.293a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
      </div>
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