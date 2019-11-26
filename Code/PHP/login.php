<?php
session_start();
include("../templates/login_header.php");
include("../templates/footer.php"); 
?>
<!DOCTYPE html>
<html>
<body>
<div class="container"> <!-- Start Container -->
      <div class="row text-white"> <!-- Start Row One -->
          <div class="col-12 col-sm-6 offset-sm-3 text-center">
              <h1 class="display-4">ACME Movie Search Login</h1>
              <div class="info-form">
                  <form action="loginconnect.php" method="post" class="form-inlin justify-content-center">
					<p></p>
                    <p>
                      <input type="text" name="email" placeholder="Email Address">
                    </p>
                    <p>
                      <input type="password" name="password" placeholder="Password">
                    </p>
                    <button class="button" type="submit">Login</button>
                  </form>
                  <p></p>
              </div>
          </div>
      </div> <!-- End Row One -->
      <p></p>


  <!-- Script-->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php
session_destroy();
?>