<?php
include('dbconf.php');
include('header.php');
?>

<body>

    <?php
    include('navbar.php');
    ?>
    <header>
        <div class="row">
            <div class="col-12">
                <img class="img img-fluid w-100" style="height:643px;" src="https://images.unsplash.com/photo-1505935428862-770b6f24f629?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8Zm9vZCUyMGJhbm5lcnxlbnwwfHwwfHx8MA%3D%3D&w=1000&q=80" alt="event-2">
            </div>
        </div>
    </header>

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