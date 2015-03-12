<?php
    session_start();
    $target_dir = "uploads/";
    $target_file = $target_dir .sha1($_SESSION['userid']). basename($_FILES["fileToUpload"]["name"]);
    $fail = 1;
    $doctype = pathinfo($target_file,PATHINFO_EXTENSION);
    // var_dump($doctype);
    // var_dump($target_file);
    // var_dump($_FILES);
    // exit;
 // Check file size
    if ($_FILES["fileToUpload"]["size"] > 100000) {
        $_SESSION['uperror'] =  "Sorry, your file is too large.";
        $fail = 0;
    }
    if ($fail == 1){
        if($doctype != "xml" && $doctype != "txt" && $doctype != "pdf") {
            $_SESSION['uperror'] = "Your file is not in a valid format.";
            $fail = 0;
        }
    }
    if ($fail){
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to MySQL server.'. mysqli_error($connection));
                $userid = $_SESSION['userid'];
                $date = date('Y-m-d H:i:s');
                $query = "SELECT group_id FROM groups WHERE student_1 = '$userid' OR student_2 = '$userid' OR student_3 = '$userid'";
                $result = mysqli_query($connection, $query) or die('Error' . mysqli_error($connection));
                $myrow = mysqli_fetch_assoc($result);
                $gid = $myrow['group_id'];
                $query = "SELECT * FROM REPORTS WHERE group_id = '$gid'";
                $result = mysqli_query($connection, $query);
                if(mysqli_num_rows($result)== 0){
                    $query = "SELECT MAX(report_id) AS maxid FROM REPORTS";
                    $result = mysqli_fetch_assoc(mysqli_query($connection, $query));
                    if (is_null($result['maxid']))
                        $nrid = 0;
                    else $nrid = $result['maxid']+1;
                    $query = "INSERT INTO REPORTS (report_id,group_id,xml_file,last_modified) VALUES ('$nrid','$gid','$target_file','$date');";
                }
                else{
                    $query = "UPDATE REPORTS SET 
                    xml_file = '$target_file',
                    last_modified = '$date'
                    WHERE group_id = '$gid'";
                }
                $result = mysqli_query($connection, $query) or die('Error' . mysqli_error($connection));
            $_SESSION['uperror'] = "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        }
        else{
            $_SESSION['uperror'] = "An unknown error occured.";
        }
    }
        header('Location: StudentPortol/upload_assignment.php');
?>