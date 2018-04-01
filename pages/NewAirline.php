<?php include '../pages/templates/head.html'; ?>

<?php  if(!isset($_SESSION))
{
    session_start();
} ;

?>

<body>
<div id="wrapper">
    <?php

    include '../pages/templates/headermenu.html';
    include '../pages/templates/sidemenu.html';
    include '../pages/templates/footer.html';
    ?>

    <div id="page-wrapper">

        <?php

        if(!isset($_SESSION['loggedIn']))   // Checking whether the session is already there or not if
            // true then header redirect it to the home page directly
        {
            echo '<script type="text/javascript"> window.open("../index.php","_self");</script>';            //  On Successful Login redirects to home.php
            exit();
            /* Redirect browser */

        }
        else
        {
            if($_SESSION['loggedIn']==false)
            {
                echo '<script type="text/javascript"> window.open("../index.php","_self");</script>';            //  On Successful Login redirects to home.php
                exit();
            }
        }

        ?>
        <div class="col-lg-12">
            <h1 class="page-header">Add new Airline</h1>

        </div>
        <form role="form" method="post"  action="../Apis/insert_Airlines.php">
            <div class="col-lg-12" >
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Airline Info
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class="col-xs-4">
                                    <label>Name</label>
                                    <input id="name" name="Name" class="form-control">
                                </div>
                                <div class="col-xs-3">
                                    <label>Cell No.</label>
                                    <input id="cellNo" name="Cell_No" class="form-control" placeholder="Enter text">
                                </div>

                            </div>
                            <!-- /.col-lg-6 (nested) -->
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>

                <button type="submit" name="insert_contacts_data" value="insert_contacts_data" class="btn btn-default btn-primary">SUBMIT</button>
                <button type="reset" onclick="reset()" class="btn btn-default btn-primary">RESET</button>
            </div>
        </form>

    </div
</div>



</body>
</html>
