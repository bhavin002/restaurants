<?php
include('header.php');
?>

<body>
    <?php
    include('navbar.php');
    include('dbconf.php');
    if (!isset($_SESSION)) {
        session_start();
    }
    ?>
    <section id="book-a-table" class="book-a-table">
        <div class="container">
            <div class="section-header">
                <p>Orders</p>
            </div>
        </div>
    </section>
</body>

<?php
include('footer_javascript.php');
?>