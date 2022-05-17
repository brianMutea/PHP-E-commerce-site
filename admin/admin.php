<?php include 'includes/header.php'?>

    <div id="wrapper">

        <!-- Navigation -->
      <?php include 'includes/nav.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome Admin
                            
                            
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->


                       
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">


                    <?php 

                    $query = "SELECT * FROM products"; 
                    $select_all_products = mysqli_query($connection, $query);
                    $product_counts = mysqli_num_rows($select_all_products);
                    
                    echo "<div class='huge'>{$product_counts}</div>"
                    
                    ?>

                        <div>Products</div>
                    </div>
                </div>
            </div>
            <a href="products.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'>23</div>
                      <div>Reviews</div>
                    </div>
                </div>
            </div>
            <a href="javascript:void(0)">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php 

                        $query = "SELECT * FROM users"; 
                        $select_all_users = mysqli_query($connection, $query);
                        $user_counts = mysqli_num_rows($select_all_users);

                        echo "<div class='huge'>{$user_counts}</div>"

                        ?>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="users.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">

                    <?php 

                        $query = "SELECT * FROM product_categories"; 
                        $select_all_categories = mysqli_query($connection, $query);
                        $category_counts = mysqli_num_rows($select_all_categories);

                        echo "<div class='huge'>{$category_counts}</div>"

                        ?>
                     
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
                <!-- /.row -->




<div class="row">
<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Count'],
        //   <?php 
        //   $element_text = ['Products', 'Categories','Users'];
        //   $element_count = [$product_counts, $category_counts,$user_counts];
          
        // //   for($i = 0; i < 3; $i++){
        // //       echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}], ";
        // //   }          
          
          
          
        //   ?>


          ['Products', 1000]
          
        ]);

        var options = {
          chart: {
            title: '',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

<div id="columnchart_material" style="width: auto; height: 500px;"></div>
</div>














            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include 'includes/footer.php'; ?>