<?php
include_once 'settings.php';

// Define an array to collect error messages
$errors = [];

// Function to sanitize and validate input
function sanitize_input($data)
{
    return htmlspecialchars(stripslashes(trim($data)));
}

// Job Reference Number validation
if (empty($_POST['jrn']) || !preg_match('/^[A-Za-z0-9]{5}$/', $_POST['jrn'])) {
    $errors[] = "Job Reference Number must be exactly 5 alphanumeric characters.";
} else {
    $jrn = sanitize_input($_POST['jrn']);
}

// First Name validation
if (empty($_POST['fname']) || !preg_match('/^[A-Za-z0-9]{1,20}$/', $_POST['fname'])) {
    $errors[] = "First Name must be 1-20 alphabetic characters.";
} else {
    $fname = sanitize_input($_POST['fname']);
}

// Last Name validation
if (empty($_POST['lname']) || !preg_match('/^[A-Za-z0-9]{1,20}$/', $_POST['lname'])) {
    $errors[] = "Last Name must be 1-20 alphabetic characters.";
} else {
    $lname = sanitize_input($_POST['lname']);
}

// Date of Birth validation
if (empty($_POST['dob'])){
    $errors[] = "Date of Birth is required or wrong format";
} else {
    $dob = sanitize_input($_POST['dob']); 
    if (!preg_match('/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/', $dob)) {
        $errors[] = "Date of Birth must be in dd/mm/yyyy format.";
    } else {
        $dobParts = explode('/', $dob);
        $dobFormatted = $dobParts[2] . '-' . $dobParts[1] . '-' . $dobParts[0]; // yyyy-mm-dd
        
        // Calculate age
        $dobDate = new DateTime($dobFormatted);
        $today = new DateTime();
        $age = $today->diff($dobDate)->y;
        
        if ($age < 18) {
            $errors[] = "You must be at least 18 years old.";
        }else if ($age > 100){
            $errors[] = "You must be less than 100 years old.";
        }else{
            $dob = $dobFormatted;
        }
    }
}

// Gender validation
if (empty($_POST['gender']) || !in_array($_POST['gender'], ['male', 'female', 'other'])) {
    $errors[] = "Please select a valid gender.";
} else {
    $gender = sanitize_input($_POST['gender']);
}

// Street Address validation
if (empty($_POST['address']) || strlen($_POST['address']) > 40) {
    $errors[] = "Street Address must not exceed 40 characters.";
} else {
    $address = sanitize_input($_POST['address']);
}

// Suburb validation
if (empty($_POST['suburb']) || strlen($_POST['suburb']) > 40) {
    $errors[] = "Suburb/Town must not exceed 40 characters.";
} else {
    $suburb = sanitize_input($_POST['suburb']);
}

// State validation
$valid_states = ['VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'];
if (empty($_POST['state']) || !in_array($_POST['state'], $valid_states)) {
    $errors[] = "Please select a valid state.";
} else {
    $state = sanitize_input($_POST['state']);
}

// Postcode validation
if (empty($_POST['postcode']) || !preg_match('/^\d{4}$/', $_POST['postcode'])) {
    $errors[] = "Postcode must be exactly 4 digits.";
} else{
    $postcode = sanitize_input($_POST['postcode']);
}

// Email validation
if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
} else {
    $email = sanitize_input($_POST['email']);
}

// Phone Number validation
if (empty($_POST['phone']) || !preg_match('/^[0-9\s]{8,12}$/', $_POST['phone'])) {
    $errors[] = "Phone Number must be 8-12 digits.";
} else {
    $phone = sanitize_input($_POST['phone']);
}

// Skills validation
$skills = isset($_POST['skills']) ? $_POST['skills'] : [];
if (empty($skills)) {
    $errors[] = "Please select at least one skill.";
} else {
    $allowed_skills = ['projectmanagement', 'design', 'python', 'reactjs', 'php/laravel', 'Django', 'otherSkills'];
    foreach ($skills as $skill) {
        if (!in_array($skill, $allowed_skills)) {
            $errors[] = "Invalid skill selected.";
            break;
        }
    }
}

// Other Skills validation (only if "Other skills..." is selected)
$otherSkillsText = "";

// Check if "Other Skills" is checked in the skills array and if the text area is filled
if (isset($skills) && in_array('otherSkills', $skills)) {
    if (empty($_POST['otherSkillsText'])) {
        // Add an error if the checkbox is selected but the text area is empty
        $errors[] = "Please describe other skills in the text area.";
    } else {
        // Sanitize and assign the other skills text
        $otherSkillsText = sanitize_input($_POST['otherSkillsText']);
    }
} else {
    // If "Other Skills" is not selected, set $otherSkillsText to an empty string
    $otherSkillsText = "";
}

// If errors exist, display them, else process the form
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
    }
} else {
    // echo "<p style='color:green;'>Application submitted successfully!</p>";
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $query = "insert into eoi (jrn, fname, lname, dob,gender, streetaddress, suburb, state, postcode, phnumber, otherskills,status) values
         ('$jrn', '$fname', '$lname', '$dob', '$gender', '$address', '$suburb', '$state', '$postcode', '$phone', '$otherSkillsText','New')";   
        $result = mysqli_query($conn, $query);
        if ($result) {
            echo "Application submitted successfully!";
            header('location: apply.php');
        } else {
             echo "Error: " . mysqli_error($conn);
        }
        $eoinumber = mysqli_insert_id($conn);
        if (isset($skills)) {
            for ($i = 0; $i < count($skills); $i++) {
                // echo count($skills). '<br>';
                $skill_query = "INSERT INTO skills(EOInumber,skill) values  ('$eoinumber','$skills[$i]')";
                echo ($skill_query);
                $skill_result = mysqli_query($conn, $skill_query);
        } 
    }
}
}




?>