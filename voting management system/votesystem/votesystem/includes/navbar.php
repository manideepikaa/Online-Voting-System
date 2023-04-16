<header class="main-header" style="background-color:#00274e ">
  <nav class="navbar navbar-static-top" style="background-color:#00274e ">
    <div class="container" style="background-color:#00274e ">
      <div class="navbar-header" style="background-color:#00274e ">
        <a href="#" class="navbar-brand" style="background-color:#00274e ;color:white ; font-size: 22px; font-family:Times  "><b>Online<b> Voting</b> System</a>
        <button type="button" class="navbar-toggle collapsed"style="background-color:#00274e " data-toggle="collapse" data-target="#navbar-collapse">
          <i class="fa fa-bars"></i>
        </button>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
        <ul class="nav navbar-nav">
          <?php
            if(isset($_SESSION['student'])){
              echo "
                <li><a href='index.php'>HOME</a></li>
                <li><a href='transaction.php'>TRANSACTION</a></li>
              ";
            } 
          ?>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu"  >
        <ul class="nav navbar-nav"  >
          <li class="user user-menu" >
            <a href="">
              
              <span class="hidden-xs"  style="color:white ; font-size: 22px; font-family:Times  "><?php  echo $_SESSION['details']['firstname'].' '.$_SESSION['details']['lastname']; ?></span>
            </a>
          </li>
          <li><a href="logout.php"> <b style="color:white ; font-size: 22px;> <i class=fa fa-sign-out"> </b></i> <b style="color:white ; font-size: 22px; font-family:Times  " > Logout </b></a></li>  
        </ul>
      </div>
      <!-- /.navbar-custom-menu -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>