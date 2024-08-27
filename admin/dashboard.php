<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<?php include './admin_head.php'; ?>
<style>
.card {
 border-radius: 20px;
 background: #f5f5f5;
 position: relative;
 padding:4rem 1rem;
 border: 2px solid #c3c6ce;
 transition: 0.5s ease-out;
 overflow: visible;
}

.card-details {
 color: black;
 height: 100%;
 gap: .5em;
}

.card-button {
 transform: translate(-50%, 125%);
 width: 60%;
 border-radius: 1rem;
 border: none;
 background-color: #008bf8;
 color: #fff;
 padding: 1.5rem 2rem;
 position: absolute;
 left: 50%;
 bottom: 0;
 opacity: 0;
 transition: 0.3s ease-out;
}

.text-body {
 color: rgb(134, 134, 134);
}

/*Text*/
.text-title {
 font-size: 1.5em;
 font-weight: bold;
}

/*Hover*/
.card:hover {
 border-color: #008bf8;
 box-shadow: 0 4px 18px 0 rgba(0, 0, 0, 0.25);
}

.card:hover .card-button {
 transform: translate(-50%, 50%);
 opacity: 1;
}
</style>

<body>

<div id="container-main" class="grid grid-cols-12">
<?php include './admin_header.php'; ?>

<?php 
// Define the data array
$data = [
    [
        "query" => "SELECT * FROM `products`",
        "label" => ["product", "products"],
        "url" => "products.php",
    ],
    [
        "query" => "SELECT * FROM `messages`",
        "label" => ["new message", "new messages"],
        "url" => "messages.php",
    ]
];?>

<section class=" w-full col-span-10">

   <h1 class="heading">dashboard</h1>


   <div class="box-container grid grid-cols-2 gap-10 mx-10">

   <?php foreach ($data as $item) { 

    // Prepare and execute the query
    $stmt = $conn->prepare($item['query']);
    $stmt->execute();
    $count = $stmt->rowCount();
    ?>

    <div class="card">
        <div class="card-details flex justify-center flex-col items-center">
            <p class="text-5xl text-black font-bold"><?= $count; ?></p>
            <p class="capitalize text-3xl text-black font-bold text-center">
                <?= $count > 1 ? $item['label'][1] : $item['label'][0]; ?> 
            </p>
        </div>
        <a href="<?= $item['url']; ?>" class="card-button capitalize text-3xl text-center">see <?= $item['label'][1]; ?></a>
    </div>

    <?php
}
?>

   </div>

</section>
</div>


<script src="../js/admin_script.js"></script>
   
</body>
</html>