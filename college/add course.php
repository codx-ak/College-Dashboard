
<!DOCTYPE html>
                <html lang="en">
                <?php
include("connection/connect.php");
error_reporting(0);
session_start();




if(isset($_POST['submit']))          
{
	
			
		
			
		  
    if(empty($_POST['course_name'])||empty($_POST['course_duration'])||empty($_POST['course_type']))
		{	
											$error = 	'<div class="alert alert-danger alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																<strong>All fields Must be Fillup!</strong>
															</div>';
								
		}
	else
		{

												$sql = "INSERT INTO course(course_name,course_duration,course_type) VALUE('".$_POST['course_name']."','".$_POST['course_duration']."','".$_POST['course_type']."')";
												mysqli_query($db, $sql); 

			  
													$success = 	'<div class="alert alert-success alert-dismissible fade show">
																<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
																 Course Added Successfully.
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
                    <title>Add Course</title>
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
                                            <h4 class="m-b-0 text-white">Add Course</h4>
                                        </div>
                                        <div class="card-body">
                                            <form action='' method='post' enctype="multipart/form-data">
                                                <div class="form-body">

                                                    <hr>
                                                    <div class="row p-t-20">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="control-label">Course Name</label>
                                                                <input type="text" name="course_name" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group has-danger">
                                                                <label class="control-label">Duration</label>
                                                                <input type="text" name="course_duration" class="form-control form-control-danger">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group has-danger">
                                                                <label class="control-label">Course Type</label>
                                                                <input type="text" name="course_type" class="form-control form-control-danger">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                        </div>
                                        <div class="form-actions">
                                            <input type="submit" name="submit" class="btn btn-primary" value="Save">
                                            <a href="all course.php" class="btn btn-inverse">Cancel</a>
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
  