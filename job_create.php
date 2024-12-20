<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Register</title>
    <link rel="stylesheet" href="styles/style.css">
<link rel="shortcut icon" href="images/bytemefavicon.png" type="image/x-icon">
</head>
<body id="job-create-body">
<?php 
session_start();
include_once 'header.inc';?>
    <h1>Job Registeration</h1>
    <main id="job-create-main">
        <?php
        if(isset($_SESSION['error'])){
            echo "<p style='color:red'>{$_SESSION['error']}</p>";
            unset($_SESSION['error']);
        }elseif(isset($_SESSION['success'])){
            echo "<p style='color:green'>{$_SESSION['success']}</p>";
            unset($_SESSION['success']);
        }        
        ?>
        <form method="POST" action="job_register.php">
            <fieldset class="job-description">
                <legend>Job Info</legend>
                <p>
                    <label for="jrn"> Job Reference Number: </label>
                    <input type="text" id="jrn" name="jrn" maxlength="5" pattern="[A-Za-z0-9]{5}" required>
                </p>

                <p>
                    <label for="jn">Job Title: </label>  
                    <input type="text" id="jn" name="jn" maxlength="45" required>
                </p>

                <p>
                    <label for="jt">Job Type: </label>
                    <select name="jt" id="jt" required>
                        <option value="">Select Job Type</option>
                        <option value="FullTime">Full Time</option>
                        <option value="PartTime">Part Time</option>
                        <option value="Intern">Intern</option>
                    </select>
                </p>

                <p>
                    <label for="loc">Location: </label>
                    <input type="text" id="loc" name="loc" maxlength="45" required>
                </p>

                <p>
                    <label for="salary">Salary: </label>
                    <input type="text" name="salary" id="salary">
                </p>

                <p>
                    <label for="company">Company: </label>
                    <input type="text" name="company" id="company" required>
                </p>

                <p>
                    <label for="report">Report To: </label>
                    <input type="text" name="report" id="report" required>
                </p>
            </fieldset>

            <fieldset class="job-requirement">
                <legend>Job Requirement</legend>
                <p>
                    <label for="des">Job Description</label>
                    <textarea name="des" id="des" cols="30" rows="10" required></textarea>
                </p>

                <p>
                    <label for="key_res">Key Responsibility</label>
                    <textarea name="key_res" id="key_res" cols="30" rows="10" placeholder="Enter the points line by line." required></textarea>
                </p>

                <p>
                    <label for="essentials">Essentials</label>
                    <textarea name="essentials" id="essentials" cols="30" rows="10" placeholder="Enter the points line by line." required></textarea>
                </p>

                <p>
                    <label for="preferable">Preferable</label>
                    <textarea name="preferable" id="preferable" cols="30" rows="10" placeholder="Enter the points line by line."></textarea>
                </p>
            </fieldset>

            <button type="submit" name="jobregister">Submit</button>
        </form>
    </main>
</body>
</html>
