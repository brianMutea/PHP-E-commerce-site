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
                            Create/View Categories
                            
                            
                        </h1>

                        <div class="col-xs-6">
                        <?php insertCategories(); ?>
                          
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="category_name">Category Title</label>
                                    <input class="form-control" type="text" name="category_name">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" Value="Add Category">
                                </div>
                            </form>

                            <?php 

                            if(isset($_GET['edit'])) {
                                $fetched_category_id = $_GET['edit'];
                                include "includes/update_categories.php"; 

                            }
                            
                            ?>

                            
                        </div> <!--Add Category Form -->

                        <div class="col-xs-6">
                        
     

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                        <th colspan="2">Operations</th>
                                    </tr>
                                </thead>
                                <tbody>

           
            <!-- Query All Categories -->
            <?php queryAllCategories(); ?>            
            <?php deleteCategory();?> 
              
                                 
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include 'includes/footer.php'; ?>