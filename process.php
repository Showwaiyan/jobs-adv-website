<?php 


function show_result($result){
    
    $query = "SELECT * FROM skills WHERE EOInumber = '" . 12 . "'";
    $result_skill = mysqli_query($conn, $query);
    echo $query;
   
}
function show_skill($eoinumber) {
    require_once('settings.php');
    $skills =[];
    $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
    $output = "";
    // Check the connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{

    // Prepare and execute the query
            $query = "SELECT * FROM skills WHERE EOInumber = '" . $eoinumber . "'";
            $result_skill = mysqli_query($conn, $query);
            echo $query;
            if ($result_skill) {
                
            while ($row = mysqli_fetch_assoc($result_skill)) {
                for($i = 0; $i < mysqli_num_rows($result_skill); $i++) {
                    $column_name = "Skill".($i+1);
                    $skills[] = $row[$column_name];
                    //
                    // Display skills as an unordered list
                    if (!empty($skills)) {
                        foreach ($skills as $skill) {
                            $output .= "<li>" . $skill . "</li>";
                        }
                        
                    }
                }
            }
    } else {
        $output = "No skills found";
    }
}
    // Close the connection
    mysqli_close($conn);
    return $output;
}
?>