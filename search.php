<?php
include "includes/db.php";
include "includes/header.php";

// print_r($_POST);

if (!($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['search'] != '')) {
    header("Location: http://cms_edwin/");
}

$search = strtolower(htmlspecialchars($_POST['search']));
// print_r($search);
?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <?php 
                $query = "SELECT * FROM post WHERE LOWER(post_tags) LIKE LOWER('%$search%')";
                $stmt = $conn->prepare($query);
                // print_r($search);
                // $stmt->bindValue(1, $search, PDO::PARAM_STR);
                $stmt->execute();
                // print_r($stmt->fetchAll());

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // print_r($row);
                ?> 
                <!-- Blog Post -->
                <h2>
                    <a href="#"><?php echo $row['post_title'] ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $row['author'] ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $row['post_date'] ?> at 10:00 PM</p>
                <hr>
                <img class="img-responsive" src="./images/<?php echo $row['image'];?>" alt="">
                <hr>
                <p><?php echo substr($row['content'], 0, 150); ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                <?php
                }
                ?>
                

                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

<?php 
include "includes/footer.php"
?>