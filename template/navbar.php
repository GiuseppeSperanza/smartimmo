 <nav class="navbar navbar-inverse navbar-fixed-top navbar-dark bg-dark">
        <div class="container">
          <a class="navbar-brand" href="/">Smart Immo</a>
          <ul class="nav nav-pills">
            <?php if (!(isset($_SESSION['name']))) {
              echo 
              '<li class="nav-item">
                <a class="nav-link" href="/login">Login</a>
              </li>';
            }else {
               echo 
                "<li class='nav-item'>
                    <a class='nav-link' href='/nuovo/annuncio'>
                       <i class='fas fa-plus'></i> Nuovo
                    </a>
                 </li>
                <li class='nav-item logout-link'>
                    <a class='nav-link' href='/index.php'  data-toggle='modal' data-target='#logoutModal'>
                       <i class='fas fa-sign-out-alt'></i> Logout
                    </a>
                 </li>
                <form id='logout-form' action='index.php' method='POST' style='display: none;' >
                   <input type='hidden' name='logout-form'>
                </form>";
            }
            ?>
          </ul>
        </div>
    </nav>
