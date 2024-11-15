<?php 
function show_result($result){
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){ 
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
                    <td>". $row['otherskills']."</td>
                    <td>". $row['Status']."</td>  
                </tr>";
    }
    }else{
        echo "<td>No records found</td>";
    }
}

function show_jobs($result){
    
}
?>