<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if (!isset($admin_id)) {
    header('location:login.php.php');
};

if (isset($_POST['add_product'])) {

    $make = $_POST['make'];
    $make = filter_var($make, FILTER_SANITIZE_STRING);

    $model = $_POST['model'];
    $model = filter_var($model, FILTER_SANITIZE_STRING);

    $year_month = $_POST['year_month'];
    $year_month = filter_var($year_month, FILTER_SANITIZE_STRING);

    $doors = $_POST['doors'];
    $doors = filter_var($doors, FILTER_SANITIZE_NUMBER_INT);

    $colors = $_POST['colors'];
    $colors = filter_var($colors, FILTER_SANITIZE_STRING);

    $mileage = $_POST['mileage'];
    $mileage = filter_var($mileage, FILTER_SANITIZE_STRING);

    // $engine_cc = $_POST['engine_cc'];
    // $engine_cc = filter_var($engine_cc, FILTER_SANITIZE_NUMBER_INT);

    $fuel_type = $_POST['fuel_type'];
    $fuel_type = filter_var($fuel_type, FILTER_SANITIZE_STRING);

    // $condition = $_POST['carcondition'];
    // $condition = filter_var($condition, FILTER_SANITIZE_STRING);

    // $key_features = $_POST['key_features'];
    // $key_features = filter_var($key_features, FILTER_SANITIZE_STRING);

    // $repair_status = $_POST['repair_status'];
    // $repair_status = filter_var($repair_status, FILTER_SANITIZE_STRING);

    $steering = $_POST['steering'];
    $steering = filter_var($steering, FILTER_SANITIZE_STRING);

    $seating_capacity = $_POST['seating_capacity'];
    $seating_capacity = filter_var($seating_capacity, FILTER_SANITIZE_NUMBER_INT);

    // $fuel_type_secondary = $_POST['fuel_type_secondary'];
    // $fuel_type_secondary = filter_var($fuel_type_secondary, FILTER_SANITIZE_STRING);

    $num_of_cylinders = $_POST['num_of_cylinders'];
    $num_of_cylinders = filter_var($num_of_cylinders, FILTER_SANITIZE_NUMBER_INT);

    $transmission = $_POST['transmission'];
    $transmission = filter_var($transmission, FILTER_SANITIZE_STRING);

    $wheels = $_POST['wheels'];
    $wheels = filter_var($wheels, FILTER_SANITIZE_NUMBER_INT);

    $starting_bid = $_POST['starting_bid'];
    $starting_bid = filter_var($starting_bid, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

    // $auction_end_datetime = $_POST['auction_end_datetime']; // Assuming this value is coming from somewhere in your form, otherwise, you need to set it accordingly.

    $image = $_FILES['exterior_images']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_tmp_name = $_FILES['exterior_images']['tmp_name'];
    $image_folder = './uploads/' . $image;

    $insert_car = $conn->prepare("INSERT INTO CarDetails 
    (make, model, caryear, doors, colors, mileage, fuel_type, 
      steering, seating_capacity, 
    num_of_cylinders, transmission, wheels, exterior_images, 
    interior_images, video_clip, colors_images, starting_bid) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?)");

    $insert_car->execute([
        $make, $model, $year_month, $doors, $colors, $mileage, $fuel_type,
         $steering, $seating_capacity,
         $num_of_cylinders, $transmission, $wheels,
        $image_folder, // Assuming these are file paths
        $image_folder,
        $image_folder,
        $image_folder,
        $starting_bid,
    ]);

    if ($insert_car) {
        move_uploaded_file($image_tmp_name[2], $image_folder);
        $message[] = 'New car details added!';
    } else {
        $message[] = 'Error adding car details.';
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include './admin_head.php'; ?>
<body>

<div id="container-main" class="grid grid-cols-12">
      <?php include './admin_header.php'; ?>
      <section class="flex justify-center flex-col gap-10  col-span-10 w-full my-10">

      <h2 class="text-center text-5xl uppercase font-bold leading-9 tracking-tight text-gray-900">Add Products</h2>

<form class="space-y-6 mx-[300px]" action="#" method="POST" enctype="multipart/form-data">
    
      <div class="flex justify-between gap-5">
         <div class="w-full">
            <label for="make" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Make</label>
            <input id="make" name="make" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
         </div>

         <div class="w-full">
            <label for="model" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Model</label>
            <input id="model" name="model" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
         </div>
      </div>

      <div class="flex justify-between gap-5">
         <div class="w-full">
            <label for="year_month" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Year/Month</label>
            <input id="year_month" name="year_month" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
         </div>

         <div class="w-full">
            <label for="mileage" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Mileage</label>
            <input id="mileage" name="mileage" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
         </div>
      </div>

   <div class="flex justify-between gap-5">
    <div class="w-full">
        <label for="doors" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Door's</label>
        <input id="doors" name="doors" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div>

    <div class="w-full">
        <label for="colors" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Colors</label>
        <input id="colors" name="colors" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div>
   </div>

   <div class="flex justify-between gap-5">
    <div class="w-full">
        <label for="repair" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Repair</label>
        <input id="repair" name="repair" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div>

    <div class="w-full">
        <label for="steering" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Steering</label>
        <input id="steering" name="steering" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div>
    </div>


    <div class="flex justify-between gap-5">
    <div class="w-full">
        <label for="seating_capacity" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Seating Capacity</label>
        <input id="seating_capacity" name="seating_capacity" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div>

    <div class="w-full">
        <label for="fuel_type" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Fuel Type</label>
        <input id="fuel_type" name="fuel_type" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div>
    </div>

    <div class="flex justify-between gap-5">
    <div class="w-full">
        <label for="num_of_cylinders" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">No. of Cylinders</label>
        <input id="num_of_cylinders" name="num_of_cylinders" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div>

    <div class="w-full">
        <label for="transmission" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Transmission</label>
        <input id="transmission" name="transmission" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div>
    </div>

    <div class="flex justify-between gap-5">
    <div class="w-full">
        <label for="wheels" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Wheels</label>
        <input id="wheels" name="wheels" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div>
    <div class="w-full">
        <label for="starting_bid" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Starting Bids</label>
        <input id="starting_bid" name="starting_bid" type="text" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div>
    </div>

    <div>
        <label for="exterior_images" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Exterior Images</label>
        <input id="exterior_images" name="exterior_images[]" type="file" multiple required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div>

    <!-- <div>
        <label for="interior_images" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Interior Images</label>
        <input id="interior_images" name="interior_images[]" type="file" multiple required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div> -->

    <!-- <div>
        <label for="video_clip" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Video Clip</label>
        <input id="video_clip" name="video_clip" type="file" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div> -->

    <!-- <div>
        <label for="colors_images" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">Colors (Images)</label>
        <input id="colors_images" name="colors_images[]" type="file" multiple required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div> -->

   

    <div>
        <label for="date_time" class="block text-3xl font-medium leading-6 text-gray-900 capitalize">DATE TIME</label>
        <input id="date_time" name="date_time" type="date" required class="p-3 block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-3xl sm:leading-6">
    </div>

    <div>
        <button name="add_product" type="submit" class="flex w-full justify-center rounded-md uppercase bg-indigo-600 px-3 py-7 text-3xl font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Add Product</button>
    </div>
</form>



      </section>
</div>

<script src="../js/admin_script.js"></script>
   
</body>
</html>