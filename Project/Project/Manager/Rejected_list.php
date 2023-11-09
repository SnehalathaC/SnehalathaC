<?php 
session_start();
$id = $_SESSION['Employee_ID'];
if(isset($_SESSION['Employee_ID']) && isset($_SESSION['Role'])){
?>
<!DOCTYPE html>
<html>
<head>
  <title>Manager Page</title>
  <link href="Login.css" rel="stylesheet">
  <link rel="shortcut icon" type="x-icon" href="Abrao_logo.jpeg">
  <script src="https://cdn.tailwindcss.com"></script>
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

  <div class="container mx-auto mt-8">
    <table class="w-full bg-white border border-gray-200">
      <thead>
        <tr>
          <th class="py-4 px-6 bg-gray-100 font-semibold">S.No</th>
          <th class="py-4 px-6 bg-gray-100 font-semibold">Id</th>
          <th class="py-4 px-6 bg-gray-100 font-semibold">Name</th>
          <th class="py-4 px-6 bg-gray-100 font-semibold">Status</th>
        </tr>
      </thead>
      <tbody >
        <!-- Populate this section with dynamic data from the backend -->
        <tr onclick="openMail('1')" class="cursor-pointer hover:bg-gray-50">
          <td class="py-4 px-6 border-b border-gray-200 text-center">1</td>
          <td class="py-4 px-6 border-b border-gray-200 text-center">F1</td>
          <td class="py-4 px-6 border-b border-gray-200 text-center">Pavan</td>
          <td class="py-4 px-6 border-b border-gray-200 text-center">Rejected</td>
        </tr>
        <tr onclick="openMail('2')" class="cursor-pointer hover:bg-gray-50">
          <td class="py-4 px-6 border-b border-gray-200 text-center">2</td>
          <td class="py-4 px-6 border-b border-gray-200 text-center">F5</td>
          <td class="py-4 px-6 border-b border-gray-200 text-center">Kumar</td>
          <td class="py-4 px-6 border-b border-gray-200 text-center">Rejected</td>
        </tr>
        <tr onclick="openMail('3')" class="cursor-pointer hover:bg-gray-50">
          <td class="py-4 px-6 border-b border-gray-200 text-center">3</td>
          <td class="py-4 px-6 border-b border-gray-200 text-center">F4</td>
          <td class="py-4 px-6 border-b border-gray-200 text-center">Eswar</td>
          <td class="py-4 px-6 border-b border-gray-200 text-center">Rejected</td>
        </tr>
      </tbody>
    </table>
  </div>

  <script>
    function openMail(mailId) {
      var messageMap = {
        '1': 'Date:23-01-2003\nAmount:3000/-rs',
        '2': 'Great service! Keep it up.',
        '3': 'Hello This is Pavan Kumar'
      };

      var message = messageMap[mailId];

      if (message) {
        // Redirect the user to the message details page with the message as a query parameter
        window.location.href = 'Rejected.php?message=' + encodeURIComponent(message);
      } else {
        alert('Message not found for the given ID: ' + mailId);
      }
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