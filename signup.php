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
                <p>Sign Up</p>
            </div>

            <div class="row g-0">

                <div class="col-lg-4 reservation-img" style="background-image: url(assets/img/reservation.jpg);"></div>

                <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
                    <form action="signup_data.php" method="post" role="form" class="php-email-form">
                        <div class="row gy-4">
                            <div class="col-lg-8 mx-auto">
                                <input type="text" name="fname" class="form-control" id="fname" placeholder="Your First Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-8 mx-auto">
                                <input type="text" name="lname" class="form-control" id="lname" placeholder="Your Last Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-8 mx-auto">
                                <input type="text" name="phoneNumber" class="form-control" id="phoneNumber" placeholder="Your Phone Number" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-8 mx-auto">
                                <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Your Pincode" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-8 mx-auto">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                                <div class="validate"></div>
                            </div>
                            <div class="col-lg-8 mx-auto">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your booking request was sent. We will call back or send an Email to confirm your reservation. Thank you!</div>
                        </div>
                        <div class="text-center"><button type="submit">Sign Up</button></div>
                    </form>
                </div><!-- End Reservation Form -->

            </div>

        </div>
    </section><!-- End Book A Table Section -->

</body>