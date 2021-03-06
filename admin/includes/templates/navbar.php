<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="../admin/dashboard.php"><?php echo lang('HOME'); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="categories.php"><?php echo lang('CATEGORIES'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="items.php"><?php echo lang('Items'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="members.php"><?php echo lang('Members'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><?php echo lang('Statistics'); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#"><?php echo lang('Logs'); ?></a>
        </li>
        <li class="nav-item dropdown" style="margin-left:45rem;">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo $_SESSION['username']; ?>
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="members.php?do=Edit&user_id=<?php echo $_SESSION['user_id'] ?>"><?php echo lang('Edit Profile'); ?></a></li>
            <li><a class="dropdown-item" href="#"><?php echo lang('Settings'); ?></a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="logout.php"><?php echo lang('Log out'); ?></a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>