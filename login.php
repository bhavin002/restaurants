<?php

include('header.php');

?>

<body>
    <?php
    include('navbar.php');
    ?>

    <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
        <div class="container">

            <div class="section-header">
                <p>Login</p>
            </div>

            <div class="row g-0">

                <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);"></div>

                <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                    <form action="forms/book-a-table.php" method="post" role="form" class="php-email-form">
                        <div class="row gy-4 text-center">
                            <div class="col-lg-12 mx-auto">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-12 mx-auto">
                                <input type="password" name="name" class="form-control" id="name" placeholder="Your Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                <div class="validate"></div>
                            </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Book a Table</button></div>
                    </form>
                </div><!-- End Reservation Form -->

            </div>

        </div>
    </section><!-- End Book A Table Section -->

</body>