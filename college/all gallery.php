
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

    <div id="main-wrapper">

    <?php  include "include/header.php"?>
   
        <div class="page-wrapper">
        <?php include "include/flash.php" ?>
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">


                        <div class="col-lg-12">
                            <div class="card card-outline-primary">
                                <div class="card-header">
                                    <h4 class="m-b-0 text-white">All Events</h4>
                                </div>
                                <div class="btn btn-primary m-t-20 col-md-2 ml-5">
                                    <a href="add gallery.php"style="color:white;">Add Events</a>
                                </div>

                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>S.No</th>
                                                <th>Name</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                $sql="SELECT * FROM gallery order by gallery_id desc";
                                $query=mysqli_query($db,$sql);
                                
                                    if(!mysqli_num_rows($query) > 0 )
                                        {
                                            echo '<td colspan="11"><center>No Events</center></td>';
                                        }
                                    else
                                        {				
                                                    while($rows=mysqli_fetch_array($query))
                                                        {
                                                                $mql="select * from gallery where gallery_id='".$rows['gallery_id']."'";
                                                                $newquery=mysqli_query($db,$mql);
                                                                $fetch=mysqli_fetch_array($newquery);
                                                                
                                                                
                                                                    echo '<tr><td>'.$fetch['gallery_id'].'</td>
                                                                    
                                                                                <td>'.$rows['gallery_name'].'</td>
                                                                                
                                                                                
                                                                                
                                                                                     <td><a href="delete gallery.php?gallery_del='.$rows['gallery_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
                                                                                     
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
