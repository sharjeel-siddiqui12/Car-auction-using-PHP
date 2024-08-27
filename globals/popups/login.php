
<?php

if(ISSET($_POST['login'])){
  // Validate and sanitize input
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $password = trim($_POST["password"]);

  // Check for empty fields
  if (empty($email) || empty($password)) {
      $_SESSION['login_error'] = "All fields are required.";
  } else {
      // Check if the email exists
      $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
      $stmt->bindParam(':email', $email);
      
      $stmt->execute();
      
      if ($stmt->rowCount() > 0) {
          $user = $stmt->fetch(PDO::FETCH_ASSOC);
          // Verify the password
          if (password_verify($password, $user['password'])) {
            
              // Set session variables
              $_SESSION['user_id'] = $user['id'];
              $_SESSION['user_name'] = $user['name'];
              $_SESSION['success'] = "Login successful.";
              $_SESSION['login_error'] = "";
              header("Location: index.php");
              exit();
          } else {
              $_SESSION['login_error'] = "Invalid password.";
          }
      } else {
          $_SESSION['login_error'] = "Email not found.";
      }
  }
}

?>


<div
      class="modal signUp-modal fade"
      id="logInModal01"
      tabindex="-1"
      aria-labelledby="logInModal01Label"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="logInModal01Label">Log In</h4>
            <p>
              Don’t have any account?
              <button
                type="button"
                data-bs-toggle="modal"
                data-bs-target="#signUpModal01"
              >
                Sign Up
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
            <form  method="POST">
            <input type="hidden" name="form_type" value="login">

            <div class="row">
                <?= isset($_SESSION['login_error']) && $_SESSION['login_error'] != "" ?  $_SESSION['login_error']: "" ?>
              </div>
              <div class="row g-4">
                <div class="col-md-12">
                  <div class="form-inner">
                    <label>Enter your email address*</label>
                    <input type="email" placeholder="Type email" name="email"/>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-inner">
                    <label>Password*</label>
                    <input
                      id="password3"
                      type="password"
                      placeholder="*** ***" name="password"
                    />
                    <i class="bi bi-eye-slash" id="togglePassword3"></i>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div
                    class="form-agreement form-inner d-flex justify-content-between flex-wrap"
                  >
                    <div class="form-group">
                      <input type="checkbox" id="html" />
                      <label for="html">Remember Me</label>
                    </div>
                    <a href="#" class="forgot-pass">Forget Password?</a>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-inner">
                    <button class="primary-btn2" type="submit" name="login">Log In</button>
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