<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="images/bytemefavicon.png" type="image/x-icon">
</head>

<body id="apply-body">
    <?php include_once('header.inc');session_start();?>

   <article id="form-container">
        <section id="form-left">
            <section class="section-form-left">
                <img src="images/bytemelogo.png" alt="logo">
                <h2>Ready to Join Us?</h2>

                <p>We’re excited to have you apply!</p>
                <p>Fill out the form below to get started on your journey with us.</p>

                <h3>Why Apply?</h3>
                <ul>
                    <li>Be part of a dynamic and innovative community.</li>
                    <li>Unlock opportunities to grow and make an impact.</li>
                    <li>Shape your career with us!</li>
                </ul>
            </section>
        </section>
        <section id="form-right">
            <form action="processEOI.php" method="POST">
                <h2 id="applyhere">Apply Here</h2>
                <!-- Job Reference Number -->
                <section id="step1" class="apply-personal">
                    <section class="form-section">
                        <p>
                            <?php if (isset($_GET['jrn'])){
                                $jrn = $_GET['jrn'];
                                // echo "<p style='color:red;'>Job Reference Number: $jrn not found.</p>";
                            } else{
                                $jrn = "";   
                            }?>
                            <label for="jrn"> Job Reference Number: </label>
                            <input type="text" id="jrn" name="jrn" maxlength="5" pattern="[A-Za-z0-9]{5}" value="<?php echo $jrn;?>" autocomplete="off" required>
                        </p>
                        <!-- First Name -->
                        <p>
                            <label for="fn"> First Name: </label>
                            <input type="text" id="fn" name="fname" maxlength="20" pattern="{A-Za-z0-9}{1,20}" required>
                        </p>
                        <p>
                            <!-- last Name -->
                            <label for="ln">Last Name: </label>
                            <input type="text" id="ln" name="lname" maxlength="20" pattern="{A-Za-z0-9}{1,20}" required>
                        </p>
                        <!-- Date-of-birth -->

                        <p><label for="dob">Date of Birth(dd/mm/yyyy):</label>
                            <input type="text" id="dob" name="dob" pattern="(0[1-9]|[12][0-9]|3[01])/(0[1-9]|1[0-2])/\d{4}" max="2005-11-13" required>
                        </p>

                        <!-- Gender -->
                        <fieldset>
                            <legend>Gender</legend> 
                            <label for="male">
                                <input type="radio" id="male" name="gender" value="male" required> Male
                            </label>
                            <label for="female">
                                <input type="radio" id="female" name="gender" value="female" required> Female
                            </label>
                            <label for="others">
                                <input type="radio" id='others' name="gender" value="other" required> Other
                            </label>
                        </fieldset>
                    </section>
                    <section class="navigation">
                        <a href="#step2">Next</a>
                        <?php if(isset($_SESSION['error'])){
                                echo "<p style='color:red'>{$_SESSION['error']}</p>";
                                unset($_SESSION['error']);
                            }elseif(isset($_SESSION['success'])){
                                echo "<p style='color:green'>{$_SESSION['success']}</p>";
                                unset($_SESSION['success']);
                            }
                            ?>
                    </section>
                </section>

                <!-- Street Address -->
                <section id="step2" class="apply-contact">
                    <p>
                        <label for="sa">Street Address: </label>
                        <input type="text" id="sa" name="address" maxlength="40" required>
                    </p>


                    <!-- Suburb/town -->
                    <p><label for="st">Suburb/town: </label>
                        <input type="text" id="st" name="suburb" maxlength="40" required>
                    </p>

                    <!-- State -->
                    <p>
                        <label for="state">State:</label>
                        <select id="state" name="state" required>
                            <option value="VIC">VIC</option>
                            <option value="NSW">NSW</option>
                            <option value="QLD">QLD</option>
                            <option value="NT">NT</option>
                            <option value="WA">WA</option>
                            <option value="SA">SA</option>
                            <option value="TAS">TAS</option>
                            <option value="ACT">ACT</option>
                        </select>
                    </p>

                    <!-- Postcode -->
                    <p>
                        <label for="postcode">Postcode:</label>
                        <input type="text" id="postcode" name="postcode" maxlength="4" pattern="\d{4}" required>
                    </p>

                    <!-- Email Address -->
                    <p>
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" name="email" required>
                    </p>

                    <!-- Phone Number -->
                    <p>
                        <label for="phone">Phone Number:</label>
                        <input type="tel" id="phone" name="phone" maxlength="12" pattern="[0-9\s]{8,12}" required>
                    </p>
                    <section class="navigation">
                        <a href="#step1">Previous</a>
                        <a href="#step3">Next</a>
                    </section>
                </section>
                <!-- Skills -->
                <section id="step3" class="apply-skill">

                    <fieldset>
                        <legend>Skills:</legend>
                        <p><label for="pjm"><input type="checkbox" name="skills[]" value="projectmanagement" id="pjm"> Project Management</label></p>
                        <p><label for="design"><input type="checkbox" name="skills[]" value="design" id="design" > Design</label></p>
                        <p><label for="python"><input type="checkbox" name="skills[]" value="python" id="python"> Python</label></p>
                        <p><label for="react"><input type="checkbox" name="skills[]" value="reactjs" id="react" > React.js</label></p>
                        <p><label for="php"><input type="checkbox" name="skills[]" value="php/laravel" id="php"> PHP/Laravel</label></p>
                        <p><label for="django"><input type="checkbox" name="skills[]" value="Django" id="django"> Django</label></p>
                        <p><label for="otherskills"><input type="checkbox" name="skills[]" value="otherSkills" id="otherskills"> Other skills...</label></p>

                    </fieldset>


                    <!-- Other Skills (Textarea) -->
                    <p><label for="otherSkillsText">Other Skills:</label></p>
                    <textarea id="otherSkillsText" name="otherSkillsText" rows="4" cols="50"></textarea>

                    <section class="navigation">
                        <a href="#step2">Previous</a>
                    </section>
                    <!-- Submit Button -->
                    <input type="submit" value="Apply">
                </section>
            </form>
        </section>
    </article>

    <footer class="index-footer">
        <h4 class="index-footer__copy-right">&copy; All Rights Reserved. By ByteMe.</h4>
    </footer>

</body>

</html>