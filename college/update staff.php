
<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(isset($_POST['submit']))           //if upload btn is pressed
{





 	 	

if(empty($_POST['st_name'])||empty($_POST['st_dep'])||empty($_POST['st_designation'])||empty($_POST['st_education'])||empty($_POST['st_experience']))
{	
                            $error = 	'<div class="alert alert-danger alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>All fields Must be Fillup!</strong>
                                            </div>';
                    

                
}
else
{

$fname = $_FILES['file']['name'];
                $temp = $_FILES['file']['tmp_name'];
                $fsize = $_FILES['file']['size'];
                $extension = explode('.',$fname);
                $extension = strtolower(end($extension));  
                $fnew = uniqid().'.'.$extension;

                $store = "images/Staff/".basename($fnew);                     

    if($extension == 'jpg'||$extension == 'png'||$extension == 'gif' )
    {        
                    if($fsize>=1000000)
                        {


                                $error = 	'<div class="alert alert-danger alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Max Image Size is 1024kb!</strong> Try different Image.
                                            </div>';

                        }

                    else
                        {
                                
                                
                                
                                 
                                $sql = "update staff set st_name='$_POST[st_name]',st_education='$_POST[st_education]',st_experience='$_POST[st_experience]',st_dep='$_POST[st_dep]',st_designation='$_POST[st_designation]',st_image='$fnew' where staff_id='$_GET[staff_upd]'";
                                mysqli_query($db, $sql); 
                                move_uploaded_file($temp, $store);

                                    $success = 	'<div class="alert alert-success alert-dismissible fade show">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <strong>Record Updated!</strong>
                                            </div>';


                        }
    }
                  


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
                            <h4 class="m-b-0 text-white">Update Staff</h4>
                        </div>
                        <div class="card-body">
                            <form action='' method='post' enctype="multipart/form-data">
                                <div class="form-body">
                                    <?php $qml ="select * from staff where staff_id='$_GET[staff_upd]'";
                                    $rest=mysqli_query($db, $qml); 
                                    $roww=mysqli_fetch_array($rest);
                                        ?>
                                    <hr>
                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Name</label>
                                                <input type="text" name="st_name" value="<?php echo $roww['st_name'];?>" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Qualification</label>
                                                <input type="text" name="st_education" value="<?php echo $roww['st_education'];?>" class="form-control form-control-danger" placeholder="">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row p-t-20">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Experience </label>
                                                <input type="text" name="st_experience" value="<?php echo $roww['st_experience'];?>" class="form-control" placeholder="">
                                            </div>
                                        </div>

                                        
                                        <div class="col-md-6">
                                            <div class="form-group has-danger">
                                                <label class="control-label">Profile</label>
                                                <input type="file" name="file" id="lastName" class="form-control form-control-danger" placeholder="12n">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Designation </label>
                                                <input type="text" name="st_designation" value="<?php echo $roww['st_designation'];?>" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="control-label">Department </label>
                                                <input type="text" name="st_dep" value="<?php echo $roww['st_dep'];?>" class="form-control" placeholder="">
                                            </div>
                                        </div>

</div>
                        <div class="form-actions">
                            <input type="submit" name="submit" class="btn btn-primary" value="Save">
                            <a href="all staff.php" class="btn btn-inverse">Cancel</a>
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