<?php 
session_start();
$id = $_SESSION['Employee_ID'];
if(isset($_SESSION['Employee_ID']) && isset($_SESSION['Role'])){
?>
<?php
  include "../_db_connect.php";
  $sql = "SELECT * FROM `billrequest` WHERE Status='Approved' OR Status='Requested' OR Status='Rejected' ORDER BY S_NO desc";
  $result = mysqli_query($conn,$sql);
  $i = 0;
  if($result)
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Manager Page</title>
    
    <link rel="shortcut icon" type="x-icon" href="data:image/jpeg;base64,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">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assets/index-cdf0da12.css">
  </head>
  <body>
    <header class="text-gray-600 body-font">
      <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
          <img alt="abrao_logo" data-src="https://abraogroup.com/wp-content/uploads/2020/09/logo.svg" style = "caret-color: transparent" class="main-logo lazyloaded" src="https://abraogroup.com/wp-content/uploads/2020/09/logo.svg" style="display: block;">
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
    
  <div class="container mx-auto mt-8">
    <table class="w-full bg-white border border-gray-200">
      <thead>
        <tr style = "caret-color: transparent">
          <th class="py-4 px-6 bg-gray-100 font-semibold">S.No</th>
          <th class="py-4 px-6 bg-gray-100 font-semibold">Id</th>
          <th class="py-4 px-6 bg-gray-100 font-semibold">Name</th>
          <th class="py-4 px-6 bg-gray-100 font-semibold">Amount</th>
          <th class="py-4 px-6 bg-gray-100 font-semibold">Status</th>
        </tr>
      </thead>
      <tbody >
        <!-- Populate this section with dynamic data from the backend -->
        <?php 
        while($row=mysqli_fetch_assoc($result)){
          $i+=1;
          $rowID = $row["S_NO"];
          echo '<tr id="' . $rowID . '" style = "caret-color: transparent" class="cursor-pointer hover:bg-gray-50" onclick="window.location=\'Request_form.php?id=' . $rowID . '\';">';
          echo '<td class="py-4 px-6 border-b border-gray-200 text-center">'.$i.'</td>';
          echo '<td class="py-4 px-6 border-b border-gray-200 text-center">'.$row["Employee_ID"].'</td>';
          echo '<td class="py-4 px-6 border-b border-gray-200 text-center">'.$row["Name"].'</td>';
          echo '<td class="py-4 px-6 border-b border-gray-200 text-center">'.$row["Amount"].'</td>';
          echo '<td class="py-4 px-6 border-b border-gray-200 text-center">'.$row["Status"].'</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>
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