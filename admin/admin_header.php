
<?php
   if(isset($message)){
      foreach($message as $message){
         echo '
         <div class=" col-span-12 bg-white w-full p-5 flex justify-center items-center gap-5 ">
            <span class="text-3xl uppercase">'.$message.'</span>
            <i class="fas fa-times text-red-800 text-4xl cursor-pointer" onclick="this.parentElement.remove();"></i>
         </div>
         ';
      }
   }
?>
<header class=" col-span-2   bg-white  h-full flex flex-col px-0 py-10 min-h-screen">
<?php
            $select_profile = $conn->prepare("SELECT * FROM `admins` WHERE id = ?");
            $select_profile->execute([$admin_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>


   <div id="top" class="flex justify-center w-full py-10 gap-10 flex-col items-center">
      <a href="./dashboard.php"  class="w-full text-center  text-6xl flex items-center justify-center m-0 px-10"><img src="../assets/img/logo.svg" alt=""></a>
      <p class="text-4xl font-bold text-blue-900 uppercase">Welcome <?= $fetch_profile['name']; ?>!</p>
      </div>
      <nav class="navbar flex flex-col  divide-y-4 divide-blue-60 w-full">
      
         <a href="./dashboard.php" class="w-full text-center uppercase font-bold text-blue-900 text-3xl py-10 flex items-center justify-center m-0 ">home</a>
         <a href="./products.php" class="w-full text-center  uppercase font-bold text-blue-900 text-3xl py-10 flex items-center  justify-center m-0">Add product</a>
         <a href="./view_products.php" class="w-full text-center  uppercase font-bold text-blue-900 text-3xl py-10 flex items-center  justify-center m-0">view products</a>
         <a href="./messages.php" class="w-full text-center  uppercase font-bold text-blue-900 text-3xl py-10 flex items-center  justify-center m-0">messages</a>
   
      </nav>


      <div class="profile p-6">
       
        
      <?php if(!isset($fetch_profile['name'])):  ?>

          <a href="./register_admin.php" class="option-btn">register</a>
          <a href="./login.php.php" class="option-btn">login</a>
      <?php endif;?>
           
         
         <a href="./admin_logout.php" class="delete-btn" onclick="return confirm('logout from the website?');">logout</a> 
      </div>

</header>

