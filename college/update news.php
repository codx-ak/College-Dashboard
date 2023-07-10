
<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(isset($_POST['submit']))           //if upload btn is pressed
{





 	 	

if(empty($_POST['news_title'])||empty($_POST['news_date'])||empty($_POST['news_description']))
{	
                            $error = 	'<div class="alert alert-danger alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>All fields Must be Fillup!</strong>
                                            </div>';         
}
else
{
    
                                $sql = "update news set news_title='$_POST[news_title]',news_date='$_POST[news_date]',news_description='$_POST[news_description]' where news_id='$_GET[news_upd]'";
                                mysqli_query($db, $sql); 

                                    $success = 	'<div class="alert alert-success alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Record Updated!</strong>
                                            </div>';
               
    }

}

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/logo.jpg">
    <title>GASC - Hosur</title>
    <link href="css/lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    

</head>

<body class="fix-header">

 
    <div id="main-wrapper">

    <?php  include "include/header.php"?>

        <div class="page-wrapper">
        <?php include "include/flash.php" ?>
 
            <div class="container-fluid">



                <?php  echo $error;
                            echo $success; ?>




                <div class="col-lg-12">
                    <div class="card card-outline-primary">
                        <div class="card-header">
                            <h4 class="m-b-0 text-white">Update News</h4>
                        </div>
                        <div class="card-body">
                            <form action='' method='post' enctype="multipart/form-data">
                                <div class="form-body">
                                    <?php $qml ="select * from news where news_id='$_GET[news_upd]'";
                                    $rest=mysqli_query($db, $qml); 
                                    $roww=mysqli_fetch_array($rest);
                                        ?>
                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Title</label>
                                                <input type="text" name="news_title" value="<?php echo $roww['news_title'];?>" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Date</label>
                                                <input type="date"  name="news_date" value="<?php echo $roww['news_date'];?>" class="form-control form-control-danger" placeholder="">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Description </label>
                                                <input type="text" name="news_description" value="<?php echo $roww['news_description'];?>" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                        <div class="form-actions">
                            <input type="submit" name="submit" class="btn btn-primary" value="Save">
                            <a href="all news.php" class="btn btn-inverse">Cancel</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php include "include/footer.php" ?>

        </div>

    </div>

    </div>

    </div>
    
</body>

</html>