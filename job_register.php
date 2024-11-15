<?php 
    error_reporting(E_ALL); // Report all types of errors
    ini_set('display_errors', 1);
    include_once 'settings.php';
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    if(!$conn){
        echo "Database connection failure";
    }else{
        if(isset($_POST['jobregister'])){
            $jrn = sanitize_input($_POST['jrn']);
            $jtitle = sanitize_input($_POST['jn']);
            $jtype = sanitize_input($_POST['jt']);
            $loc = sanitize_input($_POST['loc']);
            $salary = sanitize_input($_POST['salary']);
            $company = sanitize_input($_POST['company']);
            $report = sanitize_input($_POST['report']);
            $key_res = sanitize_input($_POST['key_res']);
            $essentials = $_POST['essentials'];
            $preferable = $_POST['preferable'];
            $description = $_POST['des'];

            $res_array = split_lines($key_res);
            $ess_array = split_lines($essentials);
            $pref_array = split_lines($preferable);
            // print_r($res_array);


            $sql = "INSERT INTO job_description(JobReferenceNumber, JobTitle, JobDescription, JobType, Location, salary,company, report_to)
                    VALUES ('$jrn', '$jtitle', '$description', '$jtype', '$loc', '$salary', '$company', '$report')";
            $result = @mysqli_query($conn, $sql);
            echo $sql;

            if($result){
                foreach($res_array as $res){
                    if($res == ""){
                        continue;
                    }
                    $sql = "INSERT INTO job_requirements (jrn, key_responsibility)
                        VALUES ('$jrn', '$res')";
                    $result = mysqli_query($conn, $sql);
                }
                foreach($ess_array as $ess){
                    if($ess == ""){
                        continue;
                    }
                    $sql = "INSERT INTO job_requirements (jrn, essentials)
                        VALUES ('$jrn','$ess')";
                    $result = mysqli_query($conn, $sql);
                }
                foreach($pref_array as $pref){
                    if($pref == ""){
                        continue;
                    }
                    $sql = "INSERT INTO job_requirements (jrn, preferable)
                        VALUES ('$jrn', '$pref')";
                    $result = mysqli_query($conn, $sql);
                }
            }else{
                echo $sql;
                echo "Job registration failed";
            }
        }else{
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