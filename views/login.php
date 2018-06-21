<?php include(__DIR__."/../template/header.php"); 

?>



<div class="text-center login-container">

	

    <form class="form-signin" method="POST" action="index.php">

      <h1 class="h3 mb-3 font-weight-normal">Effettua il Login</h1>
      <label for="inputEmail" class="sr-only">Email</label>
      <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus name="email">

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control  mt-3" placeholder="Password" required name="password">

      <span class="msg-error"><?php if (isset($_GET['error'])) {
      	echo $userController::$messageError;
      } ?></span>
      
      <button class="btn btn-lg btn-primary btn-block mt-5" type="submit" name="form-login">Sign in</button>
     
    </form>
  </div>







<?php include(__DIR__."/../template/footer.php"); ?>