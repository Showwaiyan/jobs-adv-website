<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="enhancements">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhancements 2</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="images/bytemefavicon.png" type="image/x-icon">
</head>

<body id="enhancement-body">
    <?php session_start();include_once('header.inc');?>

    <article class="enhancement-container" >
        <h2 id="enchancements-title">Enhancement 2</h2>
        <section class="enhancements-card-right">
            <div class="enhance-section">
                <h3>Encryption of Password in database</h3>

                <p>The provided PHP code demonstrates how an MD5 hash is generated for a string and used within an SQL query for authentication purposes. 
                The md5 function converts the input string into a 32-character hash, which is then stored or compared against a database record. <strong>In the example, the password is hashed before being included in the SQL query for login validation.</strong>
                    This approach ensures that raw passwords are not stored in plain text.
                </p>

                <h4>
                    <!-- Example : -->
                    <!-- <span><a href="index.html#index-customers">Login Page</a></span> -->
                </h4>
            </div>
            <div class="enhance-img">
                <img src="images/hash.jpeg" alt="animation-enhancement">
            </div>
        </section>

        <section class="enhancements-card-left">

            <div class="enhance-section">
                <h3>Limit the login Attempts</h3>

                <p>The code tracks user login attempts and enforces a timeout after three consecutive failures. It queries the database to retrieve the number of failed attempts (login_attempts) and the time of the last attempt (last_attempt). If the attempts exceed the limit and the last failure occurred within 60 seconds, the user is locked out and shown a message indicating how long they must wait before trying again. After the timeout expires, the failed attempts are reset to 0.</p>

                <h4>
                    <!-- Example : -->
                    <!-- <span><a href="about.html#person-cards">Login Page</a></span> -->
                </h4>
            </div>
            <div class="enhance-img">
                <img src="images/login_lastattempt.jpeg" alt="personcard-enhancement">
            </div>
            </section>

            <section class="enhancements-card-right">
            <div class="enhance-section">
                <h3>Job Posting Form</h3>

                <p>The form in the image is a Job Posting Form, divided into two sections: Job Description and Job Requirements. HR manager adds job details to a database for displaying on a job portal.
                <br>Submit Button - Sends the form data for processing, likely to a database.
                </p>
                <h4>
                    <!-- Example : -->
                    <!-- <span><a href="index.html#index-body">Navigation Bar </a> </span> -->
                </h4>
            </div>
            <div class="enhance-img">
                <img src="images/job_posting.jpeg" alt="navbar-enhancement">
            </div>
    </section>

        <section class="enhancements-card-left">
            <div class="enhance-section">
                <h3>Authentication</h3>
                <p>
                    This code is checking user has session or not. If user has logged in then it will redirect to the home page. If user does not have session then it will redirect to the login page.
                </p>
                <h4>
                    <!-- Example : -->
                    <!-- <span><a href="index.html#index-main">Homepage Logo </a> </span> -->
                </h4>
            </div>
            <div class="enhance-img">
                <img src="images/auth.png" alt="dropshadow-enhancement">
            </div>
    </section>

        <section class="enhancements-card-right">
            <div class="enhance-section">
                <h3>Function to Fetch Key Responsibilities</h3>
                <p>
                    The function retrieves the key_responsibility values from a job_requirements table for a given jrn (job reference number). It filters out NULL and empty values, then returns these responsibilities as a newline-separated string.
                </p>
                <h4>
                    <!-- Example  -->
                    <!-- <span><a href="jobs.html#requirement-its123">Job Description Page.</a></span> -->
                </h4>
            </div>
            <div class="enhance-img">
                <img src="images/column.png" alt="popup-enhancement">
            </div>
        </section>
        <section class="enhancements-card-left">
            <div class="enhance-section">
                <h3>Session Termination and Redirection to Login Page</h3>
                <p>
                    This PHP code handles user logout by destroying their session and redirecting them to the login page. It ensures that the user is logged out and cannot access restricted pages without re-authenticating.
                </p>
                <h4>
                    <!-- Example : -->
                    <!-- <span><a href="index.html#index-main">Homepage Logo </a> </span> -->
                </h4>
            </div>
            <div class="enhance-img">
                <img src="images/logout.png" alt="dropshadow-enhancement">
            </div>
    </section>
    </article>

    <?php include_once('footer.inc');?>
</body>

</html>h