<?php #include_once "auth.php";
#require_once "settings.php";
#require_once 'process.php';
#$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>

    <link rel="stylesheet" href="styles/style.css">
</head>
<body id="manage-body">
    <?php require_once('header.inc');?>
    <main id="manage-main">
        <?php $selectedAction = isset($_POST['action']) ? $_POST['action'] : '';?> 
        <section class="manage-eoi">
            <h1>Manage EOI</h1>
            <form action="manage.php" method="POST" id="eoi-filter">
                <div class="section-select">
                    <label for="action-select">Select Action: </label>
                    <select name="action" id="action-select" required>
                        <option value="">Select Action</option>
                        <option value="list_all" <?php if ($selectedAction == 'list_all') echo 'selected' ?>>List All EOIs</option>
                        <option value="list_position" <?php if ($selectedAction == 'list_position') echo 'selected' ?>>List EOIs by Job Reference</option>
                        <option value="list_applicant" <?php if ($selectedAction == 'list_applicant') echo 'selected' ?>>List EOIs by Applicant Name</option>
                        <option value="delete_position" <?php if ($selectedAction == 'delete_position') echo 'selected' ?>>Delete EOIs by Job Reference</option>
                        <option value="change_status" <?php if ($selectedAction == 'change_status') echo 'selected' ?>>Change Status of EOIs</option>
                        <option value="edit_job" <?php if ($selectedAction == 'edit_job') echo 'selected' ?>>Edit Job Position</option>
                    </select>
                </div>
                <button type="submit" name="itemSelected">Select Action</button>
            </form>

    <!-- Display specific form based on selected action -->
        <?php if($selectedAction=='list_all'){?>
            <form action="manage.php" method="POST">
                <h2>List All EOIs</h2>
                <input type="hidden" name="action" value="list_all">
                <button type="submit" name="listAll">List All</button>
            </form>
        <?php }elseif ($selectedAction == 'list_position') { ?>
            <form action="manage.php" method="POST">
                <h2>List EOIs by Job Reference</h2>
                <input type="hidden" name="action" value="list_position">
                <label for="job_reference">Job Reference Number:</label>
                <input type="text" id="job_reference" name="job_reference" placeholder="Enter Reference Number" required>
                <button type="submit" name="position">Submit</button>
            </form>

        <?php } elseif ($selectedAction == 'list_applicant') { ?>
            <form action="manage.php" method="POST">
                <h2>List EOIs by Applicant Name</h2>
                <input type="hidden" name="action" value="list_applicant">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" placeholder="Enter First Name">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" placeholder="Enter Last Name">
                <button type="submit" name="applicantName">Submit</button>
            </form>
          
        <?php } elseif ($selectedAction == 'delete_position') { ?>
            <form action="manage.php" method="POST">
                <h2>Delete EOIs by Job Reference</h2>
                <input type="hidden" name="action" value="delete_position">
                <label for="job_reference">Job Reference Number:</label>
                <input type="text" id="job_reference" name="job_reference" placeholder="Enter Reference Number" required>
                <button type="submit" name="deleteJrn">Delete</button>
            </form>
        <?php } elseif ($selectedAction == 'change_status') { ?>
            <form action="manage.php" method="POST">
                <h2>Change Status of an EOI</h2>
                <input type="hidden" name="action" value="change_status">
                <label for="eoi_id">EOI ID:</label>
                <input type="text" id="eoi_id" name="eoi_id" placeholder="Enter EOINumber" required>
                <label for="status">New Status:</label>
                <select name="status" id="status">
                    <option value="New">New</option>
                    <option value="Current">Current</option>
                    <option value="Final">Final</option>
                </select>
                <button type="submit" name="statueChange">Change Status</button>
            </form>
        <?php } elseif ($selectedAction == 'edit_job') {?>
            <form action="manage.php" method="POST">
                <h2>Edit Details by Reference Number</h2>
                <input type="hidden" name="action" value="edit_job">
                <label for="edit_job">Job Reference Number:</label>
                <input type="text" id="edit_job" name="edit_job" placeholder="Enter Reference Number" required>
                <button type="submit" name="editJob">Edit</button>
            </form> 
        <?php }?>
        </section> 

        <section class="display-eoi">
        <table>

                <?php if($conn){ ?>
                <?php if($selectedAction != 'edit_job') {?>
                <tr>
                    <th>EOInumber</th>
                    <th>Job Reference Number</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>D-o-b</th>
                    <th>Gender</th>
                    <th>Street Address</th>
                    <th>Suburb</th>
                    <th>State</th>
                    <th>Postcode</th>
                    <th>Phone</th>
                    <th>Skills</th>
                    <th>Other Skills</th>
                    <th>Status</th>
                </tr>
                <?php } else {?>


                    <!-- Job Table Header Goes Here -->


                <?php } if(isset($_POST['listAll']) || isset($_POST['itemSelected'])){
                        $sql = "SELECT * FROM eoi";
                    }elseif(isset($_POST['position'])){
                        $job_reference = $_POST['job_reference'];
                        $sql = "SELECT * FROM eoi WHERE JRN = '$job_reference'";
                    }elseif(isset($_POST['applicantName'])){
                        $first_name = $_POST['first_name'];
                        $last_name = $_POST['last_name'];
                        $sql = "SELECT * FROM eoi WHERE fname = '$first_name' AND lname = '$last_name'";
                    }elseif(isset($_POST['deleteJrn'])){
                        $job_reference = $_POST['job_reference'];
                        $sql = "DELETE FROM eoi WHERE JRN = '$job_reference'";
                        $result = mysqli_query($conn, $sql);
                        $all = "SELECT * FROM eoi";
                        $all_list = mysqli_query($conn, $all);
                        show_result($all_list,$conn);
                        exit();
                    }elseif(isset($_POST['statueChange'])){
                        $eoi_id = $_POST['eoi_id'];
                        $status = $_POST['status'];
                        $sql = "UPDATE eoi SET Status = '$status' WHERE EOInumber = '$eoi_id'";
                        $result = mysqli_query($conn, $sql);
                        $all = "SELECT * FROM eoi";
                        $all_list = mysqli_query($conn, $all);
                        show_result($all_list,$conn);
                        exit();
                    }
                    elseif(isset($_POST['editJob'])) { 
                        $jobDes = []; ?>
                        <form action="" method="POST">
                        <fieldset class="job-description">
                            <legend>Job Discription</legend>
                            <p>
                                <label for="jrn"> Job Reference Number: </label>
                                <input type="text" id="jrn" name="jrn" maxlength="5" pattern="[A-Za-z0-9]{5}" value="<?php $jobDes['JobReferenceNumber'] ?>" required>
                            </p>

                            <p>
                                <label for="jn">Job Title: </label>  
                                <input type="text" id="jn" name="jn" maxlength="45" value="<?php $jobDes['JobTitle'] ?>" required>
                            </p>

                            <p>
                                <label for="jt">Job Type: </label>
                                <select name="jt" id="jt">
                                    <option value="">Select Job Type</option>
                                    <option value="ft" <?php if($jobDes['JobType'] == 'ft') echo 'selected' ?>>Full Time</option>
                                    <option value="pt"<?php if($jobDes['JobType'] == 'pt') echo 'selected' ?>>Part Time</option>
                                    <option value="it"<?php if($jobDes['JobType'] == 'it') echo 'selected' ?>>Intern</option>
                                </select>
                            </p>

                            <p>
                                <label for="loc">Location: </label>
                                <input type="text" id="loc" name="loc" maxlength="45" value="<?php $jobDes['Location'] ?>" required>
                            </p>

                            <p>
                                <label for="salary">Salary: </label>
                                <input type="text" name="salary" id="salary" value="<?php $jobDes['salary'] ?>">
                            </p>

                            <p>
                                <label for="company">Company: </label>
                                <input type="text" name="company" id="company" value="<?php $jobDes['company'] ?>" required>
                            </p>

                            <p>
                                <label for="reprot">Report To: </label>
                                <input type="text" name="report" id="report" value="<?php $jobDes['report_to'] ?>" required>
                            </p>
                        </fieldset>

                        < class="job-requirement">
                            <?php $jobReq = []; ?>   
                            <legend>Job Requirement</legend>
                            <p>
                                <label for="key_res">Key Responsibility</label>
                                <textarea name="key_res" id="key_res" cols="30" rows="10" value="<?php $jobReq['key_responsibility'] ?>" required></textarea>
                            </p>

                            <p>
                                <label for="essentials">Essentials</label>
                                <textarea name="essentials" id="essentials" cols="30" rows="10" value="<?php $jobReq['essentials'] ?>" required></textarea>
                            </p>

                            <p>
                                <label for="preferable">Preferable</label>
                                <textarea name="preferable" id="preferable" cols="30" rows="10" value="<?php $jobReq['preferable'] ?>" ></textarea>
                            </p>
                        </fieldset>

                        <button type="submit" name="editDone">Submit</button>
                    </form>
                    <?php } $result = mysqli_query($conn, $sql);
                    show_result($result,$conn);
                    ?>
                <?php }else { ?>
                    <p>Error</p>
                <?php } ?>
            </table>
        </section>
    </main>
   
</body>
</html>