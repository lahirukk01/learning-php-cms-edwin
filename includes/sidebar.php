<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <?php 
                    
                    $query = "SELECT * FROM category";
                    $result = $conn->query($query);

                    $rows = $result->fetchAll();
                        // echo sprintf("<li><a href=\"#\">%s</a></li>", $row['cat_title']);
                
                    $numberOfRows = count($rows);    
                    $numberOfLeftRows = ceil($numberOfRows/2);

                    $leftRows = array_slice($rows, 0, $numberOfLeftRows);
                    $rightRows = array_slice($rows, $numberOfLeftRows);
                    ?>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <?php 
                                foreach($leftRows as $row) {
                                    echo "<li><a href=\"#\">{$row['cat_title']}</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                            <?php 
                                foreach($rightRows as $row) {
                                    echo "<li><a href=\"#\">{$row['cat_title']}</a></li>";
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "includes/widget.php"; ?>

            </div>