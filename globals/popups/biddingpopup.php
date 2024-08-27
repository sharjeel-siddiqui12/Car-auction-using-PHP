<?php
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}


$carName = isset($_GET['car_name']) ? sanitize_input($_GET['car_name']) : ""; // Assuming the car name is provided in the URL as a GET parameter

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    if (isset($_POST['bidding'])) {
      unset($_SESSION['message']);
        // Retrieve form data
        $email = sanitize_input($_POST['email']);
        $bidAmount = sanitize_input($_POST['bidAmount']);
        $bidDateTime = date('Y-m-d H:i:s'); // Get current date and time
       
       
        // Validate form data
        if (empty($email) || empty($bidAmount) || empty($carName)) {
            $_SESSION["message"] = "All fields are required.";
            
        } else {
            try {
                // Database connection (assuming you have already created a PDO connection in $conn)
                // Retrieve user ID from Users table
                $stmt = $conn->prepare("SELECT id FROM Users WHERE email = ?");
                $stmt->bindParam(1, $email);
                $stmt->execute();
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                
                if (empty($user['id'])) {
                    $_SESSION["message"] = "User not found.";
                } else {
                    $userId = $user['id'];

                    // Retrieve car ID from Cars table
                    $stmt = $conn->prepare("SELECT id, starting_bid FROM cardetails WHERE make = ?");
                    $stmt->bindParam(1, $carName);
                    $stmt->execute();
                    $car = $stmt->fetch(PDO::FETCH_ASSOC);

                    if (empty($car['id']) && empty($car['starting_bid'])) {
                        $_SESSION["message"] = "Car not found.";
                    } else {
                        $carId = $car['id'];
                        $minBidAmount = $car['starting_bid'];

                        // Check if the entered bid amount is greater than the current highest bid
                        if ($bidAmount <= $minBidAmount) {
                            $_SESSION["message"] = "Your bid amount must be greater than the starting bid of $minBidAmount.";
                            
                        } else {
                            // Prepare and bind SQL statement to insert bid
                            $stmt = $conn->prepare("INSERT INTO Bids (car_id, user_id, bid_amount, bid_datetime) VALUES (?, ?, ?, ?)");
                            $stmt->bindParam(1, $carId);
                            $stmt->bindParam(2, $userId);
                            $stmt->bindParam(3, $bidAmount);
                            $stmt->bindParam(4, $bidDateTime);

                            // Execute SQL statement
                            if ($stmt->execute() === TRUE) {
                                $_SESSION["message"] = "Bid placed successfully!";
                            } else {
                                $_SESSION["message"] = "Error: " . $stmt->errorInfo()[2];
                            }
                            $stmt->closeCursor();
                        }
                    }
                }
            } catch (PDOException $e) {
                $_SESSION["message"] = "Connection failed: " . $e->getMessage();
                
            }
        }
    }
}
?>



<div
   class="modal adSearch-modal fade"
   id="bidsModal01"
   tabindex="-1"
   aria-hidden="true"
   >
   <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
         <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
            >
         <i class="bi bi-x"></i>
         </button>
         <div class="modal-body">
            <form  method="post">
               <input name="form_type" value="bidding" disabled type="hidden"/>
               <h4 class="main-title">Now, Your Bidding Time</h4>
               <div class="row">
                  <div class="row mb-2">
                     <div class="col-md-6 mb-5">
                        <div class="form-inner">
                           <label>Car Name</label>
                           <input type="text" name="carId" value="<?= $carName ?>" disabled/>
                        </div>
                     </div>
                     <div class="col-md-6 mb-5">
                        <div class="form-inner">
                           <label>Your Bidding Amount*</label>
                           <input type="text" name="bidAmount" placeholder="Amounts" />
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 mb-5">
                        <div class="form-inner">
                           <label>Email Address*</label>
                           <input type="email" name="email" placeholder="Enter your email address" />
                        </div>
                     </div>
                  </div>
               </div>
               <div class="apply-btn pt-30">
                  <button class="primary-btn3" type="submit" name="bidding">
                     <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        viewBox="0 0 16 16"
                        >
                        <path
                           d="M12.3195 5.44834C12.4414 5.32646 12.6395 5.32646 12.7613 5.44834C12.8835 5.57053 12.8835 5.76834 12.7613 5.89021C12.6395 6.0124 12.4413 6.0124 12.3195 5.89021C12.1973 5.76834 12.1973 5.57053 12.3195 5.44834ZM8.08753 13.9912C7.94975 13.8046 7.87528 13.5798 7.87528 13.3434C7.87528 12.7403 8.36591 12.2497 8.969 12.2497H14.2813C14.5736 12.2497 14.8483 12.3634 15.0547 12.5699C15.2613 12.7764 15.375 13.0511 15.375 13.3434C15.3752 13.5764 15.3006 13.8034 15.1621 13.9909C15.6597 14.2525 16 14.7744 16 15.3745V15.687C16 15.8596 15.8601 15.9995 15.6875 15.9995H7.56281C7.39025 15.9995 7.25031 15.8596 7.25031 15.687V15.3745C7.25031 14.7747 7.59031 14.253 8.08753 13.9912ZM14.6128 13.0118C14.5694 12.9681 14.5177 12.9335 14.4608 12.91C14.4039 12.8864 14.3429 12.8744 14.2813 12.8746H8.969C8.71053 12.8746 8.50028 13.0849 8.50028 13.3433C8.50028 13.4686 8.54903 13.5863 8.63753 13.6748C8.68097 13.7185 8.73263 13.7531 8.78954 13.7767C8.84644 13.8002 8.90745 13.8122 8.96903 13.8121H14.2813C14.5398 13.8121 14.75 13.6018 14.75 13.3433C14.75 13.2181 14.7013 13.1003 14.6128 13.0118ZM15.375 15.3745C15.375 14.8576 14.9545 14.4371 14.4376 14.4371H8.81275C8.29584 14.4371 7.87528 14.8576 7.87528 15.3745H15.375Z"
                           />
                        <path
                           d="M0.290648 13.1288C0.396773 12.9644 0.523397 12.8189 0.667054 12.6966L2.12721 11.423C2.13878 11.4056 2.15207 11.3894 2.16687 11.3746C2.19155 11.35 2.22017 11.3297 2.25155 11.3146L3.13458 10.5445L7.22177 6.97912C7.05446 6.80422 6.96233 6.5755 6.96233 6.33228C6.96233 6.08172 7.05987 5.84625 7.23715 5.669C7.31241 5.59379 7.40005 5.53209 7.49624 5.48659L7.11812 5.10847C7.01276 5.13657 6.90419 5.15084 6.79515 5.15094C6.47512 5.15091 6.15505 5.02909 5.91143 4.78547C5.67524 4.54931 5.54518 4.23541 5.54518 3.90156C5.54518 3.56772 5.67524 3.25381 5.9114 3.01766L8.5629 0.366219C8.79905 0.130062 9.11299 0 9.44693 0C9.78071 0 10.0946 0.130062 10.3307 0.366219C10.6571 0.692594 10.7645 1.156 10.6537 1.57294L14.4263 5.34556C14.5319 5.31746 14.6406 5.30322 14.7499 5.30322C15.0839 5.30322 15.3976 5.43319 15.6336 5.66912C16.121 6.1565 16.121 6.94953 15.6336 7.43694L12.9821 10.0884C12.7384 10.3321 12.4183 10.454 12.0982 10.454C11.7781 10.454 11.458 10.3321 11.2143 10.0884C10.8879 9.76203 10.7805 9.29865 10.8913 8.88172L10.514 8.50434C10.468 8.60027 10.406 8.68767 10.3306 8.76281C10.1536 8.93987 9.91818 9.03741 9.66768 9.03741C9.42471 9.03741 9.19608 8.94544 9.02093 8.77831L4.66762 13.78C4.65562 13.7987 4.64162 13.8166 4.62524 13.833C4.61965 13.8386 4.61371 13.8437 4.6078 13.8487L3.31059 15.3392C3.27796 15.3776 3.24376 15.4148 3.20809 15.4504C2.8518 15.8066 2.38121 15.9999 1.88715 15.9999C1.80005 15.9999 1.71215 15.9939 1.62412 15.9817C1.03571 15.9002 0.52718 15.5482 0.228992 15.0158C-0.0976639 14.4323 -0.0733509 13.6914 0.290648 13.1288ZM9.88871 0.808156C9.83083 0.749934 9.76198 0.703768 9.68615 0.672329C9.61031 0.64089 9.52899 0.624804 9.4469 0.625C9.36476 0.624779 9.28339 0.640853 9.2075 0.672292C9.13162 0.703731 9.06272 0.74991 9.0048 0.808156L6.3533 3.45962C6.29507 3.51753 6.24891 3.5864 6.21747 3.66227C6.18604 3.73813 6.16996 3.81948 6.17018 3.90159C6.16996 3.98371 6.18604 4.06506 6.21748 4.14093C6.24892 4.21679 6.29509 4.28567 6.35333 4.34356C6.59693 4.58722 6.99337 4.58722 7.23696 4.34356L9.88855 1.69197L9.88871 1.69181C10.1324 1.44819 10.1324 1.05178 9.88871 0.808156ZM11.6562 9.6465C11.8999 9.89019 12.2965 9.89022 12.5402 9.6465L15.1917 6.99503C15.4354 6.75131 15.4354 6.35481 15.1917 6.11106C15.0738 5.99316 14.9169 5.92822 14.7499 5.92822C14.5829 5.92822 14.4261 5.99312 14.3082 6.11094L11.6563 8.76287C11.4126 9.00647 11.4126 9.4029 11.6562 9.6465ZM10.3406 7.44712L11.2143 8.32094L13.8661 5.66919L10.3307 2.13372L7.67896 4.78547L8.55433 5.66087C8.55718 5.66356 8.55996 5.66619 8.56296 5.66916L10.3298 7.436C10.3334 7.43959 10.337 7.44334 10.3406 7.44712ZM9.22474 8.09903L9.22658 8.10087L9.44665 8.32094C9.47562 8.35005 9.51007 8.37312 9.54801 8.38883C9.58596 8.40453 9.62664 8.41256 9.66771 8.41244C9.70877 8.41256 9.74946 8.40453 9.7874 8.38882C9.82534 8.37311 9.85978 8.35002 9.88874 8.3209C9.91789 8.29192 9.94099 8.25745 9.95672 8.21948C9.97245 8.1815 9.98048 8.14079 9.98037 8.09969C9.98037 8.01787 9.94915 7.94091 9.89249 7.88284L8.11746 6.10781C7.9958 5.9895 7.79912 5.99097 7.6789 6.11106C7.64976 6.14005 7.62666 6.17452 7.61094 6.2125C7.59522 6.25047 7.58718 6.29118 7.5873 6.33228C7.58717 6.37334 7.5952 6.41401 7.61093 6.45194C7.62666 6.48986 7.64977 6.52428 7.67893 6.55319L7.89771 6.77197C7.89921 6.77344 7.9007 6.77493 7.90218 6.77644L9.22474 8.09903ZM8.57762 8.33575L7.6643 7.42244L3.79737 10.7954L5.20843 12.2065L8.57762 8.33575ZM4.79715 12.6791L3.3253 11.2072L2.85321 11.619L4.38587 13.1517L4.79715 12.6791ZM0.774273 14.7105C0.97596 15.0706 1.31693 15.3082 1.70977 15.3626C2.10171 15.4169 2.4868 15.2878 2.76624 15.0085C2.7901 14.9846 2.81294 14.9598 2.83471 14.9341L2.83774 14.9305L3.97462 13.6242L2.38115 12.0307L1.07646 13.1687L1.07346 13.1713C0.975804 13.2544 0.889148 13.3541 0.815617 13.468C0.579304 13.8332 0.562741 14.3326 0.774273 14.7105Z"
                           />
                        <path
                           d="M10.1099 3.2385C10.232 3.11646 10.4298 3.11646 10.5518 3.2385L11.8777 4.56437C11.9997 4.6864 11.9997 4.88428 11.8777 5.00628C11.8487 5.03534 11.8143 5.05839 11.7764 5.0741C11.7384 5.0898 11.6978 5.09786 11.6567 5.09781C11.6157 5.09786 11.5751 5.08979 11.5371 5.07409C11.4992 5.05838 11.4648 5.03533 11.4358 5.00628L10.1099 3.6804C9.98787 3.5584 9.98787 3.36056 10.1099 3.2385Z"
                           />
                     </svg>
                     Place Bids
                  </button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
