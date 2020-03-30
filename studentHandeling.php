<?php
    $conn=mysqli_connect("localhost","root","","systemdb");
    if(mysqli_connect_error($conn)){
        die ("connection fail");
    }else{
        if($_GET['function']=='stuData'){
            $sqlStu="select * from student;";
            $resultSetStu=mysqli_query($conn,$sqlStu);

            while($row=mysqli_fetch_assoc($resultSetStu)){
               $dbDataStu[]=$row;
            }
            echo json_encode ($dbDataStu);
        }else if($_GET['function']=='locData'){
            $sqlLoc="select * from class;";
            $resultSetLoc=mysqli_query($conn,$sqlLoc);

            while($row=mysqli_fetch_assoc($resultSetLoc)){
                $dbDataLoc[]=$row;
            }
            echo json_encode ($dbDataLoc);


        }else if($_GET['function']=='regMark'){
            $stuName=$_GET['studentName'];
            $classLocation=$_GET['classLocation'];
            //for get stuID
            $studentID=getStudentID($stuName,$conn);
            //for get classID
            $classID=getClassID($classLocation,$conn);
            $arr['stuID']="$studentID";
            $arr['classID']="$classID";
            // $rvp1='"stuID":"$studentID"';
            // $rvp2='"classID":"$classID"';
            // $retunVari="[{'$rvp1','$rvp2'}]";
            echo json_encode($arr);
        }
    }

    function getStudentID($studentName,$connection){
        $sql="SELECT stuID FROM student WHERE name='$studentName' LIMIT 1";
        $resultSet=mysqli_query($connection,$sql);
        $row=mysqli_fetch_assoc($resultSet);
        return $row['stuID'];
    }
    function getClassID($className,$connection){
        $sql="SELECT classID FROM class WHERE className='$className' LIMIT 1";
        $resultSet=mysqli_query($connection,$sql);
        $row=mysqli_fetch_assoc($resultSet);
        return $row['classID'];
    }
?>