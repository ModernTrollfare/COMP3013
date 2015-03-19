<?php
    session_start();
    $target_dir = "uploads/";
    $target_file = $target_dir .sha1($_SESSION['userid']). basename($_FILES["fileToUpload"]["name"]);
    $fail = 1;
    $doctype = pathinfo($target_file,PATHINFO_EXTENSION);

    $docmode = 2; // 0 for xml; 1 for txt // added by tins

    if ($doctype == "xml")  // added by tins
        $docmode = 0; // added by tins
    if ($doctype == "txt") // added by tins
        $docmode = 1; // added by tins

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
        if($doctype != "xml" && $doctype != "txt") {
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

                if ($docmode == 0) { // added by tins
                    $xml = simplexml_load_file($target_file); // added by tins

                    // var_dump($target_file);
                    // print("\n");
                    $title = (string)$xml->title; // added by tins
                    $content = (string)$xml->content; // added by tins
                    // var_dump((string)$title);
                    // exit;
                    if(empty($title) || empty($content)){
                        $_SESSION['uperror'] = "Either your XML is not in the correct format, or your title or content is empty. Please check.";
                        
        header('Location: StudentPortol/upload_assignment.php');
                        exit;
                    }
                } // added by tins
                else{
                    $handle = fopen($target_file, "r");
                    $contents = fread($handle, filesize($target_file));
                    fclose($handle);
                }
                if(mysqli_num_rows($result)== 0){
                    $query = "SELECT MAX(report_id) AS maxid FROM REPORTS";
                    $result = mysqli_fetch_assoc(mysqli_query($connection, $query));
                    if (is_null($result['maxid']))
                        $nrid = 0;
                    else $nrid = $result['maxid']+1;
                    // var_dump($target_file);

                    // print("\n");
                    // exit;
                    if ($docmode == 1) // added by tins
                        $query = "INSERT INTO REPORTS (report_id,group_id,text,last_modified) VALUES ('$nrid','$gid','$contents','$date');";
                    if ($docmode == 0) // added by tins
                        $query = "INSERT INTO REPORTS (report_id, group_id, xml_file, last_modified, xml_title, xml_content) VALUES ('$nrid', '$gid', '$target_file', '$date', '$title', '$content');"; // added by tins
                    // var_dump($query);
                    // exit;
                }
                else{

                    // var_dump($target_file);

                    // print("\n");
                    // exit;
                    if ($docmode == 1) // added by tins
                        $query = "UPDATE REPORTS SET text = '$contents', last_modified = '$date', xml_file =NULL WHERE group_id = '$gid'";
                    if ($docmode == 0) // added by tins
                        $query = "UPDATE REPORTS SET xml_file = '$target_file' , last_modified = '$date' , xml_title = '$title' , xml_content = '$content', text = NULL WHERE group_id = '$gid'"; // added by tins
                    // var_dump($query);
                    // exit;
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