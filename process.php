<?php 
function show_result($result,$conn){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){ 
            $eoi = $row['EOInumber'];
        echo "<tr>
                    <td>". $row['EOInumber']."</td>
                    <td>". $row['JRN']."</td>
                    <td>". $row['fname']."</td>
                    <td>". $row['lname']."</td>
                    <td>". $row['dob']."</td>
                    <td>". $row['gender']."</td>
                    <td>". $row['streetaddress']."</td>
                    <td>". $row['suburb']."</td>
                    <td>". $row['state']."</td>
                    <td>". $row['postcode']."</td>
                    <td>". $row['phnumber']."</td>
                    <td><ol style='list-style-type: none;'>". show_skills($eoi,$conn)."</ol></td>
                    <td>". $row['otherskills']."</td>
                    <td>". $row['Status']."</td>  
                </tr>";
    }
    }else{
        echo "<td>No records found</td>";
    }
}

function show_skills($eoinumber,$conn){
    $output = '';
    $query = "SELECT * FROM skills where EOInumber = '$eoinumber'";
    $result = mysqli_query($conn, $query);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){ 
        $output .= "<li>". $row['Skill']."</li>";
        }
    }
    return $output;
}

function show_jobs($result,$conn){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){ 
            $jrn = $row['JobReferenceNumber'];
            $res = show_responsibility($jrn,$conn);
            $ess = show_essentials($jrn,$conn);
            $pref = show_preferable($jrn,$conn);
        echo "
                <tr>
                    <td>". $row['JobReferenceNumber']."</td>
                    <td>". $row['JobTitle']."</td>
                    <td style='overflow-y:auto'>". $row['JobDescription']."</td>
                    <td>". $row['JobType']."</td>
                    <td>". $row['Location']."</td>
                    <td>". $row['salary']."</td>
                    <td>". $row['company']."</td>
                    <td>". $row['report_to']."</td>
                    <td>" . $res . "</td>
                    <td>". $ess . "</td>
                    <td>". $pref . "</td>
                </tr>";
    }
    }else{
        echo "<td>No records found</td>";
    }
}

function show_responsibility($jrn,$conn){
    $output =[];
    $sql = "SELECT key_responsibility FROM job_requirements 
                                    WHERE key_responsibility IS NOT NULL
                                    AND key_responsibility <> ''
                                    AND jrn= '$jrn'";
                        // echo $respon ."<br>";;
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){ 
            $output[] = $row['key_responsibility'];
        }
}
return implode("\n", $output);
}
function show_essentials($jrn,$conn){
    $output =[];
    $sql = "SELECT essentials FROM job_requirements 
                                    WHERE essentials IS NOT NULL
                                    AND essentials <> ''
                                    AND jrn= '$jrn'";
                        // echo $respon ."<br>";;
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){ 
            $output[] = $row['essentials'];
        }
}
return implode("\n", $output);
}
function show_preferable($jrn, $conn){
    $output =[];
    $sql = "SELECT preferable FROM job_requirements 
                                    WHERE preferable IS NOT NULL
                                    AND preferable <> ''
                                    AND jrn= '$jrn'";
                        // echo $respon ."<br>";;
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){ 
            $output[] = $row['preferable'];
        }
}
return implode("\n", $output);
}
?>