<nav class="navbar navbar-expand-lg navbar-light bg-light ml-auto">
  <a class="navbar-brand" href="#">Admin - 6ème sens </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="./index.php">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_article.php">Articles</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="user_perm.php?id=1">Perm User</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="group_perm.php?id=1">Perm Group</a>
      </li>
      <?php
          if (isset($_SESSION["id"])) {
              echo '<li class="nav-item">
                <a class="nav-link" style="color:#F03434;" href="deconnexion.php">Deconnexion</a>
              </li>';
          }
          else {
              echo '<li class="nav-item">
                <a class="nav-link" style="color:#F03434;" href="connexion.php">Connexion</a>
              </li>';
          }
      ?>
    </ul>



  </div>
</nav>
