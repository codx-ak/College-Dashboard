
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
                                    <h4 class="m-b-0 text-white">All Staff</h4>
                                </div>
                                <div class="btn btn-primary m-t-20 col-md-2 ml-5">
                                    <a href="add staff.php"style="color:white;">Add Staff</a>
                                </div>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Name</th>
                                                <th>Department</th>
                                                <th>Qualification</th>
                                                <th>Designation</th>
                                                <th>Experience</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                $sql="SELECT * FROM staff order by staff_id desc";
                                $query=mysqli_query($db,$sql);
                                
                                    if(!mysqli_num_rows($query) > 0 )
                                        {
                                            echo '<td colspan="11"><center>No Staff</center></td>';
                                        }
                                    else
                                        {				
                                                    while($rows=mysqli_fetch_array($query))
                                                        {
                                                                $mql="select * from staff where staff_id='".$rows['staff_id']."'";
                                                                $newquery=mysqli_query($db,$mql);
                                                                $fetch=mysqli_fetch_array($newquery);
                                                                
                                                                
                                                                    echo '<tr><td>'.$fetch['st_name'].'</td>
                                                                    
                                                                                <td>'.$rows['st_dep'].'</td>
                                                                                <td>'.$rows['st_education'].'</td>
                                                                                <td>'.$rows['st_designation'].'</td>
                                                                                <td>'.$rows['st_experience'].'</td>
                                                                                
                                                                                     <td><a href="delete staff.php?staff_del='.$rows['staff_id'].'" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a> 
                                                                                     <a href="update staff.php?staff_upd='.$rows['staff_id'].'" class="btn btn-info btn-flat btn-addon btn-sm m-b-10 m-l-5"><i class="fa fa-edit"></i></a>
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
