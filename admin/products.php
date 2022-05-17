<?php include 'includes/header.php';?>
<?php $_SESSION['status']=''; ?>

    <div id="wrapper">

        <!-- Navigation -->
      <?php include 'includes/nav.php'; ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                    

                    <?php 
                    if(isset($_GET['source'])) {
                        $source = $_GET['source'];
                    }else {
                        $source = '';
                    }
                    switch($source){
                        case 'add_products';
                        include 'includes/add_products.php';
                        break;

                        case 'edit_product';
                        include 'includes/edit_product.php';
                        break;


                        default:
                        include "view_all_products.php";
                        break;
                    }
                    
                    
                    ?>

                 
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
  
    <?php include 'includes/footer.php'; ?>