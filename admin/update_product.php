<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php.php');
}

if(isset($_POST['edit_product'])){

   $car_id = $_POST['car_id'];
   $make = $_POST['make'];
   $make = filter_var($make, FILTER_SANITIZE_STRING);
   $model = $_POST['model'];
   $model = filter_var($model, FILTER_SANITIZE_STRING);
   $doors = $_POST['doors'];
   $doors = filter_var($doors, FILTER_VALIDATE_INT);
   $colors = $_POST['colors'];
   $colors = filter_var($colors, FILTER_SANITIZE_STRING);
   $mileage = $_POST['mileage'];
   $mileage = filter_var($mileage, FILTER_SANITIZE_STRING);
   $engine_cc = $_POST['engine_cc'];
   $engine_cc = filter_var($engine_cc, FILTER_VALIDATE_INT);
   $fuel_type = $_POST['fuel_type'];
   $fuel_type = filter_var($fuel_type, FILTER_SANITIZE_STRING);
   $steering = $_POST['steering'];
   $steering = filter_var($steering, FILTER_SANITIZE_STRING);
   $seating_capacity = $_POST['seating_capacity'];
   $seating_capacity = filter_var($seating_capacity, FILTER_VALIDATE_INT);
   $num_of_cylinders = $_POST['num_of_cylinders'];
   $num_of_cylinders = filter_var($num_of_cylinders, FILTER_VALIDATE_INT);
   $transmission = $_POST['transmission'];
   $transmission = filter_var($transmission, FILTER_SANITIZE_STRING);
   $wheels = $_POST['wheels'];
   $wheels = filter_var($wheels, FILTER_VALIDATE_INT);

   $update_car = $conn->prepare("UPDATE `CarDetails` SET make = ?, model = ?, doors = ?, colors = ?, mileage = ?, engine_cc = ?, fuel_type = ?,   steering = ?, seating_capacity = ?, num_of_cylinders = ?, transmission = ?, wheels = ? WHERE id = ?");
   $update_car->execute([$make, $model, $doors, $colors, $mileage, $engine_cc, $fuel_type, $steering, $seating_capacity, $num_of_cylinders, $transmission, $wheels, $car_id]);

   $message[] = 'Car details updated successfully!';

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
    height: 25rem;
    }

    .image_container img {
      object-fit: cover;
    
      width: 100%;
      height: 25rem;
    }

    .title {
      overflow: clip;
      width: 100%;
      font-size: 3rem;
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

<section class="update-product col-span-10 w-full">

   <h1 class="heading">update product</h1>

   <?php
      $update_id = $_GET['update'];
      $select_cars = $conn->prepare("SELECT * FROM `CarDetails` WHERE id = ?");
      $select_cars->execute([$update_id]);
      if($select_cars->rowCount() > 0){
         while($fetch_car = $select_cars->fetch(PDO::FETCH_ASSOC)){ 
   ?>



<form class="space-y-6 mx-[300px]" action="#" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="car_id" value="<?= $fetch_car['id']; ?>">

    <div class="flex justify-between gap-5">
        
        <div class="w-full">
            <label for="owner" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">owner</label>
            <input id="owner" name="owner" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6" value="<?= $fetch_car['owner']; ?>">
        </div>

        
        <div class="w-full">
            <label for="engine_cc" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">engine_cc</label>
            <input id="engine_cc" name="engine_cc" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6" value="<?= $fetch_car['engine_cc']; ?>">
        </div>

       

    </div>

    <div class="flex justify-between gap-5">
        <div class="w-full">
            <label for="make" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Make</label>
            <input id="make" name="make" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6" value="<?= $fetch_car['make']; ?>">
        </div>

        <div class="w-full">
            <label for="model" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Model</label>
            <input id="model" name="model" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6" value="<?= $fetch_car['model']; ?>">
        </div>
    </div>

    <div class="flex justify-between gap-5">
       
    <div class="w-full">
            <label for="steering" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Steering</label>
            <input id="steering" name="steering" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6" value="<?= $fetch_car['steering']; ?>">
        </div>

        <div class="w-full">
            <label for="mileage" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Mileage</label>
            <input id="mileage" name="mileage" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6" value="<?= $fetch_car['mileage']; ?>">
        </div>
    </div>

    <div class="flex justify-between gap-5">
        <div class="w-full">
            <label for="doors" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Door's</label>
            <input id="doors" name="doors" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6" value="<?= $fetch_car['doors']; ?>">
        </div>

        <div class="w-full">
            <label for="colors" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Colors</label>
            <input id="colors" name="colors" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6" value="<?= $fetch_car['colors']; ?>">
        </div>
    </div>

    <div class="flex justify-between gap-5">
        <div class="w-full">
            <label for="seating_capacity" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Seating Capacity</label>
            <input id="seating_capacity" name="seating_capacity" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6" value="<?= $fetch_car['seating_capacity']; ?>">
        </div>

        <div class="w-full">
            <label for="fuel_type" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Fuel Type</label>
            <input id="fuel_type" name="fuel_type" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6" value="<?= $fetch_car['fuel_type']; ?>">
        </div>
    </div>

    <div class="flex justify-between gap-5">
        <div class="w-full">
            <label for="num_of_cylinders" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">No. of Cylinders</label>
            <input id="num_of_cylinders" name="num_of_cylinders" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6" value="<?= $fetch_car['num_of_cylinders']; ?>">
        </div>

        <div class="w-full">
            <label for="transmission" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Transmission</label>
            <input id="transmission" name="transmission" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6" value="<?= $fetch_car['transmission']; ?>">
        </div>
    </div>

    <div class="flex justify-between gap-5">
        <div class="w-full">
            <label for="wheels" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Wheels</label>
            <input id="wheels" name="wheels" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6" value="<?= $fetch_car['wheels']; ?>">
        </div>

        <div class="w-full">
            <label for="starting_bid" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Starting Bids</label>
            <input id="starting_bid" name="starting_bid" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6" value="<?= $fetch_car['starting_bid']; ?>">
        </div>
    </div>

    <div>
    <label for="exterior_images" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Exterior Images</label>
    <input id="exterior_images" name="exterior_images[]" type="file" multiple class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    <!-- Display existing exterior images -->
    <?php 
    $exterior_images = explode(',', $fetch_car['exterior_images']);?>
    <div class="flex gap-5 p-5">
    <?php
    foreach ($exterior_images as $image) { 
      $image_path = './uploads/' . trim($image);
      if (file_exists($image_path)) {
          echo '<img src="' .$image_path . '" alt="Exterior Image" class="h-32 w-64 object-cover">';
      } else {
          // Display a placeholder image
          echo '<img src="./uploads/placeholder_image.jpg" alt="Placeholder Image" class="h-32 w-64 object-cover">';
      }
    }
    ?>
    </div>
</div>

<div>
    <label for="interior_images" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Interior Images</label>
    <input id="interior_images" name="interior_images[]" type="file" multiple  class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    <!-- Display existing interior images -->
    <?php 
    $interior_images = explode(',', $fetch_car['interior_images']);?>
    <div class="flex gap-5 p-5">
    <?php
    foreach ($interior_images as $image) {
      $image_path = './uploads/' . trim($image);
        if (file_exists($image_path)) {
            echo '<img src="' .$image_path . '" alt="Exterior Image" class="h-32 w-64 object-cover">';
        } else {
            // Display a placeholder image
            echo '<img src="./uploads/placeholder_image.jpg" alt="Placeholder Image" class="h-32 w-64 object-cover">';
        }
    }
    ?>
    </div>
</div>

<div>
    <label for="video_clip" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Video Clip</label>
    <input id="video_clip" name="video_clip" type="file"  class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    <!-- Display existing video clip -->
    <?php 
    $video_clip = $fetch_car['video_clip'];
    echo '<video controls src="./uploads/' . trim($video_clip) . '"></video>';
    ?>
    
</div>

<div>
    <label for="colors_images" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Colors (Images)</label>
    <input id="colors_images" name="colors_images[]" type="file" multiple  class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    <!-- Display existing color images -->
    <?php 
    $colors_images = explode(',', $fetch_car['colors_images']);?>
    <div class="flex gap-5 p-5">
    <?php
    foreach ($colors_images as $image) {
      $image_path = './uploads/' . trim($image);
        if (file_exists($image_path)) {
            echo '<img src="' .$image_path . '" alt="Exterior Image" class="h-32 w-64 object-cover">';
        } else {
            // Display a placeholder image
            echo '<img src="./uploads/placeholder_image.jpg" alt="Placeholder Image" class="h-32 w-64 object-cover">';
        }
    }
    ?>
    </div>
</div>


    <div>
        <label for="date_time" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">DATE TIME</label>
        <input id="date_time" name="date_time" type="date" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div>

    <div>
        <button name="edit_product" type="submit" class="flex w-full justify-center rounded-md uppercase bg-indigo-600 px-3 py-7 text-3xl font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit Product</button>
    </div>
</form>



   
   <?php
         }
      }else{
         echo '<p class="empty">no car found!</p>';
      }
   ?>

</section>

</div>











<script src="../js/admin_script.js"></script>
   
</body>
</html>