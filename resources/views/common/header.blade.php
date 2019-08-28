
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">My Application</a>
    </div>
    <ul class="nav navbar-nav">
    	<li><span style="font-size:30px;cursor:pointer; color:#fff;" class="openNav">&#9776;</span></li>
      <li class="active"><a href="/">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
      <li><a href="/about">About</a></li>
      <li><a href="/services">Services</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <?php 
      if (Session::has('email'))
      {
    ?>

      <li><a href="/logout"><span class="glyphicon glyphicon-user"></span> Log Out</a></li> 
   
    <?php    
      }
      else{
    ?>   

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="/c/signup"> <span class="glyphicon glyphicon-user"></span> Client Sign Up</a></li>
              <li><a href="/u/signup"> <span class="glyphicon glyphicon-user"></span> User Sign Up</a></li>
          </ul>
      </li>

      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="/c/login"> <span class="glyphicon glyphicon-log-in"></span> Client Login</a></li>
              <li><a href="/u/login"> <span class="glyphicon glyphicon-log-in"></span> User Login</a></li>
          </ul>
      </li>

  <?php }  ?>


    </ul>
  </div>
</nav>
  