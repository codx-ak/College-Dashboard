
<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();

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

<body class="fix-header fix-sidebar">

<?php  include "include/header.php"?>
   

    <div id="main-wrapper">

    

        <div class="page-wrapper">
        <?php include "include/flash.php" ?>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">


                        <div class="col-lg-12">
                            <div class="card card-outline-primary">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">All Feedback</h4>
                                </div>


                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                $sql="SELECT * FROM contact order by contact_id desc";
                                $query=mysqli_query($db,$sql);
                                
                                    if(!mysqli_num_rows($query) > 0 )
                                        {
                                            echo '<td colspan="11"><center>No Feedback</center></td>';
                                        }
                                    else
                                        {				
                                                    while($rows=mysqli_fetch_array($query))
                                                        {
                                                                $mql="select * from contact where contact_id='".$rows['contact_id']."'";
                                                                $newquery=mysqli_query($db,$mql);
                                                                $fetch=mysqli_fetch_array($newquery);
                                                                
                                                                
                                                                    echo '<tr><td>'.$fetch['contact_id'].'</td>
                                                                    
                                                                                <td>'.$rows['contact_name'].'</td>
                                                                                <td>'.$rows['contact_email'].'</td>
                                                                                <td>'.$rows['contact_message'].'</td>
                                                                                
                                                                                     <td><a href="delete feedback.php?feedback_del='.$rows['contact_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
                                                                                     
                                                                                    </td></tr>';
                                                                     
                                                                        
                                                                        
                                                        }	
                                        }
                                
                            
                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>

    </div>

    </div>


    </div>
    
</body>

</html>
