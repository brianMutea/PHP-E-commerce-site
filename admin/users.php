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
                        case 'add_user';
                        include 'includes/add_user.php';
                        break;

                        case 'edit_user';
                        include 'includes/edit_user.php';
                        break;


                        default:
                        include "view_all_users.php";
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