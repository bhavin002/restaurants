<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="index.php" class="logo d-flex align-items-center me-auto me-lg-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <h1>Yummy<span>.</span></h1>
            <!-- <img src="assets/img/logo.png" alt=""> -->
        </a>
        
        <nav id="navbar" class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="menu.php">Menu</a></li>
                <?php
                    session_start();
                    if(isset($_SESSION['is_admin'])){
                        if($_SESSION['is_admin']=='1'){
                        ?>
                            <li class="dropdown"><a href="#"><span>Admin Panel</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                            <ul>
                                <!-- <li><a href="#">Drop Down 1</a></li>
                                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                                    <ul>
                                        <li><a href="#">Deep Drop Down 1</a></li>
                                        <li><a href="#">Deep Drop Down 2</a></li>
                                        <li><a href="#">Deep Drop Down 3</a></li>
                                        <li><a href="#">Deep Drop Down 4</a></li>
                                        <li><a href="#">Deep Drop Down 5</a></li>
                                    </ul>
                                </li> -->
                                <li><a href="category.php">Category</a></li>
                            </ul>
                        </li>
                        <?php
                        }
                    }
                ?>
            </ul>
        </nav><!-- .navbar -->

        <a class="btn-book-a-table" href="login.php">Login</a>
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header><!-- End Header -->