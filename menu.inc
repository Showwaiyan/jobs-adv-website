<?php 
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav>
            <ul class="navbar-list">
                <li class="navbar-list__item <?php echo ($current_page == 'index.php') ? 'active' : '';?>">
                    <a href="index.php" class="navbar-list__link ">
                        Home
                    </a>
                </li>

                <li class="navbar-list__item  <?php echo ($current_page == 'jobs.php') ? 'active' : '';?>">
                    <a href="jobs.php" class="navbar-list__link">
                        Jobs
                    </a>
                </li>

                <li class="navbar-list__item  <?php echo ($current_page == 'apply.php') ? 'active' : '';?>">
                    <a href="apply.php" class="navbar-list__link">
                        Apply
                    </a>
                </li>

                <li class="navbar-list__item  <?php echo ($current_page == 'about.php') ? 'active' : '';?>">
                    <a href="about.php" class="navbar-list__link">
                        About
                    </a>
                </li>

                <li class="navbar-list__item  <?php echo ($current_page == 'enhancement.php') ? 'active' : '';?>">
                    <a href="enhancement.php" class="navbar-list__link">
                        Enhancement
                    </a>
                </li>

                <li class="navbar-list__item  <?php echo ($current_page == 'login.php') ? 'active' : '';?>">
                    <a href="login.php" class="navbar-list__link">
                        Login
                    </a>
                </li>
            </ul> 
        </nav>