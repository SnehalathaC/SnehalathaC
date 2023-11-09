<?php
session_start();
$id = $_SESSION['Employee_ID'];
if(isset($_SESSION['Employee_ID']) && isset($_SESSION['Role'])){ 
  include "../_db_connect.php";
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "SELECT * FROM `billrequest` WHERE S_NO = '$id'";
    $result = mysqli_query($conn,$sql);
    ?>
<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accountant's Approval Page</title> <link href="Login.css" rel="stylesheet">
    <link rel="shortcut icon" type="x-icon" href="Abrao_logo.jpeg">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.17/dist/tailwind.min.css" rel="stylesheet">
    <style>
      @import url('https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900');
.container1{
    position: relative;
    width: 100%;
    display: flex;
    justify-content:center;
    align-items: center;
    transition: 0.5s;
    padding: 20px;
}
.container1 .content{
    position: relative;
    max-width: 800px;
}
.cl{
    position: relative;
    padding: 5px 20px;
    display: inline-block;
    text-decoration: none;
    color:#fff;
    background: #111;
}
#popup{
    position:fixed;
    top : 40%;
    left: 50%;
    transform: translate(-50%,-50%);
    width: 600px;
    padding: 50px;
    box-shadow: 0 5px 30px rgba(0,0,0,.30);
    background:#fff;
    visibility: hidden;
    opacity: 0;
    transition: 0.5s;
}
#popup.active{
    top:50%;
    visibility: visible;
    opacity: 1;
    transition: 0.5s;
}
</style>
  </head>
  <body>
    <header class="text-gray-600 body-font">
      <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
          <img alt="abrao_logo" data-src="https://abraogroup.com/wp-content/uploads/2020/09/logo.svg" class="main-logo lazyloaded" src="https://abraogroup.com/wp-content/uploads/2020/09/logo.svg" style="display: block;">
        </a>
        <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
          <a href="Accountant.php" class="mr-5 hover:text-gray-900">Home</a>
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
      <h2 class="text-lg font-semibold mb-4">Pending Expense Bills</h2>
      <table class="min-w-full">
        <thead>
          <tr class="bg-gray-100">
            <th class="py-2 px-4 border-b">Employee</th>
            <th class="py-2 px-4 border-b">Bank Details</th>
            <th class="py-2 px-4 border-b">Amount</th>
            <th class="py-2 px-4 border-b">Attachements</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php 
      while($row = mysqli_fetch_assoc($result)) {
        echo '<td class="py-2 px-4 text-center border-b">'.$row["Name"].'</td>';
        echo '<td class="py-2 px-4 text-center border-b">Bank ABC, Account No. XXXX-XXXX-XXXX</td>';
        echo '<td class="py-2 px-4 text-center border-b">'.$row["Amount"].'</td>';
        ?>
      <td class="py-2 px-4 text-center border-b">
        <div class="container1" id="blur">
          <div class="content">
            <a href="#" class="cl" onclick="toggle()">View Bill</a>
          </div>
        </div>
        <div id="popup">
        <img src="<?php echo $row["Attachments"]; ?>">
          <a href="#" class = "cl" onclick="toggle()">Close</a>
        </div>
      </td>
      <?php
      }
    }
    ?>
      </tr>
      <!-- Add more rows for additional expense bills -->
    </tbody>
  </table>
</div>
</div>
<br>
<?php
    echo '<div class="flex justify-center"><a onclick="window.location=\'Reimbursed.php?id=' . $id . '\';">'; ?>
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" type="button" onclick="markAsReimbursed(this)">Reimburse</button>
    <span class="ml-2 hidden" id="reimbursedText">Reimbursed</span>
  </div>
  <br>
  <form>
    <div class="flex justify-center"><a href="Accountant.php">
      <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="button">Cancel</button></a>
    </div>
  </form>
  
  <script>
    function toggle(){
            var blur = document.getElementById('blur');
            blur.classList.toggle('active');
            var popup = document.getElementById('popup');
            popup.classList.toggle('active');
        }
        </script>
</body>

</html>
<?php
}
else{
  header("Location:../index.php");
  exit();
}
?>  