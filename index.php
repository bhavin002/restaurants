<?php
include('dbconf.php');
include('header.php');
?>


<body>

    <?php
    include('navbar.php');
    ?>
    <div class="container">
        <header>
            <div class="row">
                <div class="col-12">
                    <div>
                        <img class="img img-fluid w-100" style="height:643px;position:relative;" src="./img/font-image.jpg" alt="event-2">
                    </div>
                    <p style="position: absolute;top: 0;bottom: 0;display: flex;justify-content: center;align-items: center;left: 0;right: 0;font-size:40px;color:aliceblue;font-weight:bolder;margin-bottom:300px; " class="animate__animated animate__bounceInDown">Welcome to yummy!!</p>
                </div>
            </div>
        </header>
    </div>

    <section id="book-a-table" class="book-a-table p-4">
        <div class="container">
            <div class="section-header">
                <p>Tranding Category Of Our Restaurant</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <?php
                $query = "select * from category";
                $res = $con->query($query);
                if ($res->num_rows > 0) {
                    foreach ($res as $rec) {
                ?>
                        <div class="col-md-3 d-flex justify-content-center">
                            <div class="card" style="width: 18rem; height:18rem">
                                <img class="img img-fluid" style="width: 18rem;height:15rem;object-fit: contain;" src="<?= $rec['image'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <p class="lead"><?= $rec['name']; ?></p>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
            </div>
        </div>
    </section>

</body>


<?php
include('footer_javascript.php')
?>