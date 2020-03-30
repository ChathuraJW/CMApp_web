<?php
    $connectionState;
    ini_set('display_errors', '0');
    $conn=mysqli_connect("localhost","root","","systemdb");
    if(mysqli_connect_error($conn)){
        $connectionState=FALSE;
    }else{
        $connectionState=TRUE;
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $nic=$_POST['nic'];
            $gender=$_POST['gender'];
            $dob=$_POST['dob'];
            $contact=$_POST['tpNo'];
            $address=$_POST['address'];
            $guardian=$_POST['guardian'];

            $sqlGetCount="SELECT COUNT(stuID) FROM student;";
            $resultSetGetCount=mysqli_query($conn,$sqlGetCount);
            $count=mysqli_fetch_assoc($resultSetGetCount)['COUNT(stuID)']+1;
            $stuID="STU".strval(str_pad($count, 3, '0', STR_PAD_LEFT));
            $sql="INSERT INTO student(stuID, name, NIC, gender, DOB, address, telNo, guardian) VALUES ('$stuID','$name','$nic','$gender','$dob','$address','$contact','$guardian')";
            // echo($sql);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Student Registration</title>
        <link rel="stylesheet" href="assert/bootstrap.min.css">
    </head>

    <body>
        <div class="container">
            <div class="row">
                <?php
                if($connectionState){
                    echo ("<div style='background-color:green;height:30px;width:250px;position: absolute;border-radius: 10px;'><h5 style='color:white;text-align: center;'>Conndection Sucessful</h5></div>");
                }else{
                    echo ("<div style='background-color:red;height:30px;width:250px;position: absolute;border-radius: 10px;'><h5 style='color:white;text-align: center;'>Conndection Faild</h5></div>");
                }
                ?>
            </div>
            <br/><br/>
            <div class="row">
                <div class="col-lg-4" style=""></div>
                <div class="col-lg-4">
                    <h1 style="color:blue;">Student Registration</h1>
                    <img src="stuRegistration.png" alt="" width="100%">
                    <form action="#" method="post" class="form-horizontal">
                        <div class="form-group">
                            <label>Full Name:</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>NIC Number:</label>
                            <input type="text" name="nic" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Gender:</label>
                            <br/>
                            <div class="radio-inline">
                                <input type="radio" name="gender" id="" value="M" class="">&nbsp;&nbsp;&nbsp;Male:
                                <input type="radio" name="gender" id="" value="F" class="">&nbsp;&nbsp;&nbsp;Female:
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Date of Birth:</label>
                            <input type="date" name="dob" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Address:</label>
                            <textarea name="address" id="address" cols="30" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Contact Number:</label>
                            <input type="text" name="tpNo" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>guardian's Name:</label>
                            <input type="text" name="guardian" id="" class="form-control">
                        </div>
                        <br/>
                        <div align="center">
                            <input type="submit" name="submit" value="Submit" class="btn btn-success">
                            <input type="reset" name="cancel" value="Cancel" class="btn btn-danger">
                        </div>
                    </form>
                </div>
                <div class="col-lg-4" style=""></div>
            </div>
            <br/><br/>
            <div class="row">
                <div class="col-lg-12" style="background-color:black;height:100px;border-radius: 10px;"><h5 style="color:white;text-align:center;"><br/><i>Class Managment System</i></h5></div>
            </div>
        </div>
        <script src="assert/bootstrap.min.js"></script>
    </body>
</html>