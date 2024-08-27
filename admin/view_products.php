<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};


if(isset($_GET['delete'])){

   $delete_id = $_GET['delete'];
   $delete_product_image = $conn->prepare("SELECT * FROM `CarDetails` WHERE id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   // Assuming you have an image column in your CarDetails table
   unlink('./uploads/'.$fetch_delete_image['image']);
   $delete_product = $conn->prepare("DELETE FROM `CarDetails` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   header('location:view_products.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<?php include './admin_head.php'; ?>
<style>
      .card {
      --bg-card: #e4e4e4;
      --primary: #6d28d9;
      --primary-800: #4c1d95;
      --primary-shadow: #2e1065;
      --light: #d9d9d9;
      --zinc-800: #18181b;
      --bg-linear: linear-gradient(0deg, var(--primary) 50%, var(--light) 125%);

      position: relative;

      display: flex;
      flex-direction: column;
      gap: 0.75rem;

      padding: 1rem;
      background-color: var(--bg-card);

      border-radius: 1rem;
    }

    .image_container {
      cursor: pointer;
      position: relative;
      z-index: 5;
  height: 11rem;
    }

    .image_container img {
      object-fit: cover;
    
      width: 100%;
      height: 11rem;
    }

    .title {
      overflow: clip;
      width: 100%;
      font-size: 2rem;
      font-weight: 600;
      color:black;
      text-transform: capitalize;
      text-wrap: nowrap;
      text-overflow: ellipsis;
    }

    .size {
      font-size: 1.75rem;
      color: black;
    }

    .list-size {
      display: flex;
      align-items: center;
      gap: 0.25rem;
      margin-top: 0.25rem;
    }

    .list-size .item-list {
      list-style: none;
    }

    .list-size .item-list-button {
      cursor: pointer;

      padding: 0.5rem;
      background-color: var(--zinc-800);

      font-size: 1.75rem;
      color: var(--light);

      border: 2px solid var(--zinc-800);
      border-radius: 0.25rem;

      transition: all 0.3s ease-in-out;
    }

    .item-list-button:hover {
      border: 2px solid var(--light);
    }
    .item-list-button:focus {
      background-color: var(--primary);

      border: 2px solid var(--primary-shadow);

      box-shadow: inset 0px 1px 4px var(--primary-shadow);
    }

    .action {
      display: flex;
      align-items: center;
      gap: 1rem;
    }

    .price {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--light);
    }

    .cart-button {
      cursor: pointer;

      display: flex;
      justify-content: center;
      align-items: center;
      gap: 0.25rem;

      padding: 1rem 1.5rem;
      width: 100%;
      background-image: var(--bg-linear);

      font-size: 1.75rem;
      font-weight: 500;
      color: var(--light);
      text-wrap: nowrap;

      border: 2px solid hsla(262, 83%, 58%, 0.5);
      border-radius: 0.5rem;
      box-shadow: inset 0 0 0.25rem 1px var(--light);
    }

    .cart-button .cart-icon {
      width: 2rem;
    }

    </style>
<body>

<div id="container-main" class="grid grid-cols-12">
    <?php include './admin_header.php'; ?>

    <section class="show-products  col-span-10 flex items-center justify-center flex-col gap-10">

    <h1 class="heading">Cars added</h1>

    <div class="grid grid-cols-4 px-10 gap-10">

    <?php
      $select_products = $conn->prepare("SELECT * FROM `CarDetails`");
      $select_products->execute();
      if($select_products->rowCount() > 0){
          while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
    ?>
      <div class="card">
       <?php
$exterior_images = explode(',', $fetch_products['exterior_images']);
?>
<div class="image_container">
       <img src="./uploads/<?= $exterior_images[0] ?>" alt="Exterior Image">
   
</div>
        <div class="title">
          <span><?= $fetch_products['make'] . ' ' . $fetch_products['model']; ?></span>
        </div>
        <!-- Assuming you have other details like Mileage, Engine, Fuel Type, etc. -->
        <p id="desc" class="text-2xl text-black">
    Mileage: <?= $fetch_products['mileage']; ?><br>
    Engine: <?= $fetch_products['engine_cc']; ?><br>
    Fuel Type: <?= $fetch_products['fuel_type']; ?><br>
    Condition: <?= $fetch_products['carcondition']; ?><br>
    Key Features: <?= $fetch_products['key_features']; ?><br>
    Make: <?= $fetch_products['make']; ?><br>
    Model: <?= $fetch_products['model']; ?><br>
    Year/Month: <?= $fetch_products['caryear']; ?><br>
    Doors: <?= $fetch_products['doors']; ?><br>
    Colors: <?= $fetch_products['colors']; ?><br>
    Repairs: <?= $fetch_products['repair_status']; ?><br>
    Steering: <?= $fetch_products['steering']; ?><br>
    Seating Capacity: <?= $fetch_products['seating_capacity']; ?><br>
    Fuel Type: <?= $fetch_products['fuel_type_secondary']; ?><br>
    Number of Cylinders: <?= $fetch_products['num_of_cylinders']; ?><br>
    Transmission: <?= $fetch_products['transmission']; ?><br>
    Wheels: <?= $fetch_products['wheels']; ?><br>
</p>


        <div class="flex-btn">
            <a href="update_product.php?update=<?= $fetch_products['id']; ?>" class="option-btn">update</a>
            <a href="view_products.php?delete=<?= $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this product?');">delete</a>
        </div>
      </div>
   
    <?php
          }
      }else{
          echo '<p class="empty">no cars added yet!</p>';
      }
    ?>
 </div>
   
    </section>
</div>


<script src="../js/admin_script.js"></script>
   
</body>
</html>
