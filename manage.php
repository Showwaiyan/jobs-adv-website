<?php include_once "auth.php";?>
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
                    </select>
                </div>
                <button type="submit">Select Action</button>
            </form>

    <!-- Display specific form based on selected action -->
        <?php if ($selectedAction == 'list_position') { ?>
            <form action="process.php" method="POST">
                <h2>List EOIs by Job Reference</h2>
                <input type="hidden" name="action" value="list_position">
                <label for="job_reference">Job Reference Number:</label>
                <input type="text" id="job_reference" name="job_reference" placeholder="Enter Reference Number" required>
                <button type="submit">Submit</button>
            </form>

        <?php } elseif ($selectedAction == 'list_applicant') { ?>
            <form action="process.php" method="POST">
                <h2>List EOIs by Applicant Name</h2>
                <input type="hidden" name="action" value="list_applicant">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" placeholder="Enter First Name">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" placeholder="Enter Last Name">
                <button type="submit">Submit</button>
            </form>

        <?php } elseif ($selectedAction == 'delete_position') { ?>
            <form action="process.php" method="POST">
                <h2>Delete EOIs by Job Reference</h2>
                <input type="hidden" name="action" value="delete_position">
                <label for="job_reference">Job Reference Number:</label>
                <input type="text" id="job_reference" name="job_reference" placeholder="Enter Reference Number" required>
                <button type="submit">Delete</button>
            </form>

        <?php } elseif ($selectedAction == 'change_status') { ?>
            <form action="process.php" method="POST">
                <h2>Change Status of an EOI</h2>
                <input type="hidden" name="action" value="change_status">
                <label for="eoi_id">EOI ID:</label>
                <input type="text" id="eoi_id" name="eoi_id" placeholder="Enter Job Reference" required>
                <label for="status">New Status:</label>
                <select name="status" id="status">
                    <option value="new">New</option>
                    <option value="current">Current</option>
                    <option value="final">Final</option>
                </select>
                <button type="submit">Change Status</button>
            </form>

        <?php } ?>
        
        </section> 

        <section class="display-eoi">

        </section>
    </main>
   
</body>
</html>