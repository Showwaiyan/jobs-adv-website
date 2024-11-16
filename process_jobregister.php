<?php 
error_reporting(E_ALL); // Report all types of errors
ini_set('display_errors', 1);
include_once 'settings.php';
session_start();
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
    if (isset($_POST['editDone'])) {
    
    $jrn = sanitize_input($_POST['jrn']);
    $jname = sanitize_input($_POST['jn']);
    $jtype = sanitize_input($_POST['jt']);
    $loc = sanitize_input($_POST['loc']);
    $salary = sanitize_input($_POST['salary']);
    $company = sanitize_input($_POST['company']);
    $report = sanitize_input($_POST['report']);

    $key_res = $_POST['key_res'];
    $essentials = $_POST['essentials'];
    $preferable = $_POST['preferable'];
    $description = sanitize_input($_POST['des']);

    $res_array = split_lines($key_res);
    $ess_array = split_lines($essentials);
    $pref_array = split_lines($preferable);

    $sql = "UPDATE job_description
            SET JobReferenceNumber = '$jrn',
                JobTitle = '$jname',
                location = '$loc',
                salary = '$salary',
                company = '$company',
                report_to = '$report', 
                JobDescription = '$description' 
            WHERE JobReferenceNumber = '$jrn'";
    $result = mysqli_query($conn, $sql);
    echo $sql;
    if($result){
        $sql = "DELETE FROM job_requirements WHERE jrn = '$jrn'";
        $result = mysqli_query($conn, $sql);
            foreach($res_array as $res){
                if($res == ""){
                    continue;
                }
                $sql = "INSERT INTO job_requirements(jrn,key_responsibility) VALUE ('$jrn','$res')";
                $result = mysqli_query($conn, $sql);
                echo $sql."<br>";
            }
            foreach($ess_array as $ess){
                if($ess == ""){
                    continue;
                }
                $sql = "INSERT INTO job_requirements(jrn,essentials) VALUE ('$jrn','$ess')";
                $result = mysqli_query($conn, $sql);
                echo $sql."<br>";
            }
            foreach($pref_array as $pref){
                if($pref == ""){
                    continue;
                }
                $sql = "INSERT INTO job_requirements(jrn,preferable) VALUE ('$jrn','$pref')";
                $result = mysqli_query($conn, $sql);
                echo $sql."<br>";
            }
        }else{
            $_SESSION['message'] = "Error updating record: " . mysqli_error($conn);
            header("Location: manage.php");
        }
        $_SESSION['message'] = "Update Successfully"; ;
        header("Location: manage.php");
    }
    else{
        echo "Invalid request";
    }
    }


function sanitize_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

function split_lines($data)
{   
    $line = explode("\n", $data);
    $line_array = array_map('trim', $line);
    return $line_array;
}
?>