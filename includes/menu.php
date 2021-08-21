<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Klientų valdymo sistema</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="klientai.php">Klientai<span class="sr-only">(current)</span></a>
      </li> -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Klientai
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="klientai.php">Klientai</a>
          <a class="dropdown-item" href="imones.php">Įmonės</a>
        </div>
      </li>      
      <li class="nav-item">
        <a class="nav-link" href="naujasklientas.php">Naujas klientas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="naujaimone.php">Nauja įmonė</a>
      </li>

    </ul>
    <form class="form-inline my-2 my-lg-0" action="klientai.php" method="get">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Įveskite klientą" aria-label="Search Client">
      <button class="btn btn-primary my-2 my-sm-0" type="submit" name="search_button">Kliento paieška</button>
    </form>
   
    <form class="form-inline my-2 my-lg-0" action="imones.php" method="get">
      <input class="form-control mr-sm-2" name="search" type="search" placeholder="Įveskite įmonę" aria-label="Search Client">
      <button class="btn btn-primary my-2 my-sm-0" type="submit" name="search_button">Įmonės paieška</button>
    </form>
  </div>
</nav>