<?php 
try {
 
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

      if (ISSET($_POST['signup'])) {
    // Validate and sanitize input
    $firstName = filter_var(trim($_POST["first_name"]), FILTER_SANITIZE_STRING);
    $lastName = filter_var(trim($_POST["last_name"]), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $password = trim($_POST["password"]);
    $confirmPassword = trim($_POST["confirm_password"]);

    // Check for empty fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($confirmPassword)) {
        $_SESSION['error'] = "All fields are required.";
    } elseif ($password !== $confirmPassword) {
        $_SESSION['error'] = "Passwords do not match.";
    }else {
      // Check if the email already exists
      $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
      $stmt->bindParam(':email', $email);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
          $_SESSION['error'] = "Email is already registered.";
      } else {
          $name = $firstName . ' ' . $lastName;
          // Hash the password
          $hashedPassword = md5($password, PASSWORD_DEFAULT);

          // Insert data into the database
          $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
          $stmt->bindParam(':name', $name);
          $stmt->bindParam(':email', $email);
          $stmt->bindParam(':password', $hashedPassword);

          if ($stmt->execute()) {
              $_SESSION['success'] = "Registration successful.";
              //header("Location: index.php");
              exit();
          } else {
              $_SESSION['error'] = "There was an error registering your account. Please try again.";
          }
      }
    }
        
      }
      
      
     
  }
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>

<div
      class="modal signUp-modal fade"
      id="signUpModal01"
      tabindex="-1"
      aria-labelledby="signUpModal01Label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="signUpModal01Label">Sign Up</h4>
            <p>
              Already have an account?
              <button
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#logInModal01"
              >
                Log In
              </button>
            </p>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            >
              <i class="bi bi-x"></i>
            </button>
          </div>
          <div class="modal-body">
            <form  method="POST" >
            <input type="hidden" name="form_type" value="signup">

              <div class="row">
                <?= isset($_SESSION['error']) ?  $_SESSION['error']: "" ?>
              </div>
              <div class="row g-4">
                <div class="col-md-6">
                  <div class="form-inner">
                    <label>First Name*</label>
                    <input type="text" placeholder="Daniel" name="first_name"/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-inner">
                    <label>Last Name*</label>
                    <input type="text" placeholder="Last name" name="last_name" />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-inner">
                    <label>Enter your email address*</label>
                    <input type="email" placeholder="Type email" name="email"/>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-inner">
                    <label>Password*</label>
                    <input
                      id="password"
                      type="password"
                      placeholder="*** ***"
                      name="password"
                    />
                    <i class="bi bi-eye-slash" id="togglePassword"></i>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-inner">
                    <label>Confirm Password*</label>
                    <input
                      id="password2"
                      type="password"
                      placeholder="*** ***"
                      name="confirm_password"
                    />
                    <i class="bi bi-eye-slash" id="togglePassword2"></i>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-inner">
                    <button class="primary-btn2" type="submit" name="signup">
                      Sign Up Now
                    </button>
                  </div>
                </div>
              </div>
              <div class="terms-conditon">
                <p>
                  By sign up,you agree to the
                  <a href="#">‘terms & conditons’</a>
                </p>
              </div>
              <ul class="social-icon">
                <li>
                  <a href="#"
                    ><img src="assets/img/home1/icon/google.svg" alt
                  /></a>
                </li>
                <li>
                  <a href="#"
                    ><img src="assets/img/home1/icon/facebook.svg" alt
                  /></a>
                </li>
                <li>
                  <a href="#"
                    ><img src="assets/img/home1/icon/twiter.svg" alt
                  /></a>
                </li>
              </ul>
            </form>
          </div>
        </div>
      </div>
    </div>