<?php 
session_start();
require_once "settings.php";
$conn = @mysqli_connect($host, $user, $pwd, $sql_db);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Position Descriptions</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="images/bytemefavicon.png" type="image/x-icon">
</head>

<body id="jobs-body">
    <?php include_once('header.inc'); ?>

    <main class="jobs-main">
        <!-- System Administrator Position Description -->
        <?php if ($conn) {
            $description = "SELECT * FROM job_description";
            $result_des = mysqli_query($conn, $description);
            if (mysqli_num_rows($result_des) > 0) {
                while ($row_des = mysqli_fetch_assoc($result_des)) {
                    $jobReferenceNumber = $row_des['JobReferenceNumber'];
                    ?>
                    <article class="job">

                        <div class="main-info-wrapper">
                            <section class="job-main-info">
                                <section class="job-basic-info">
                                    <h2><?php echo ($row_des['JobTitle']) ?></h2>
                                    <h3>Position Reference: <em><?php echo ($row_des['JobReferenceNumber']) ?></em></h3>
                                    <p><strong>Company:</strong> <?php echo ($row_des['company']) ?></p>
                                    <p><strong>Salary Range:</strong> <?php echo ($row_des['salary']) ?></p>
                                    <p><strong>Reports To:</strong> <?php echo ($row_des['report_to']) ?></p>
                                </section>

                                <div class="job-btn-wrapper">
                                    <a href="#pos-overview-<?php echo $row_des['JobReferenceNumber'];?>" class="job-info-btn">Overview</a>
                                    <a href="#requirement-<?php echo $row_des['JobReferenceNumber'];?>" class="job-info-btn">Requirement</a>
                                    <a href="apply.php?jrn=<?php echo $row_des['JobReferenceNumber']; ?>" id="job-apply-btn">Apply
                                        Now</a>
                                </div>
                            </section>
                        </div>


                        <section class="position-overview" id="pos-overview-<?php echo $row_des['JobReferenceNumber'];?>">
                            <a href="#" class="info-close-btn">&times;</a>
                            <h3>Position Overview</h3>
                            <p><?php echo ($row_des['JobDescription']) ?></p>

                            <hr>

                            <h3>Key Responsibilities</h3>
                            <ul>
                                <?php
                                $requirements ="SELECT key_responsibility FROM job_requirements 
                                                WHERE key_responsibility IS NOT NULL
                                                AND key_responsibility <> ''
                                                AND jrn='" . mysqli_real_escape_string($conn, $jobReferenceNumber) . "'";
                                $result_req = mysqli_query($conn, $requirements);
                                while ($row_req = mysqli_fetch_assoc($result_req)) { ?>
                                    <li><?php echo ($row_req['key_responsibility']) ?></li>
                                <?php } ?>
                                <!-- <li>Manage and monitor all installed systems and infrastructure.</li>
                    <li>Install, configure, test, and maintain operating systems, application software, and system management tools.</li>
                    <li>Ensure security through access controls, backups, and firewalls.</li>
                    <li>Troubleshoot hardware and software issues as they arise.</li>
                    <li>Monitor system performance and ensure reliability and availability.</li>
                    <li>Perform regular backup operations and implement appropriate processes for data protection and disaster recovery.</li> -->
                            </ul>

                        </section>

                        <section class="requirement" id="requirement-<?php echo $row_des['JobReferenceNumber'];?>">
                            <a href="#" class="info-close-btn">&times;</a>
                            <h3>Required Qualifications, Skills, and Knowledge</h3>
                            <br>
                            <h4>Essential</h4>

                            <ol>
                                <?php
                                $essentails ="SELECT essentials FROM job_requirements
                                             WHERE essentials IS NOT NULL
                                             AND essentials <> ''
                                             AND jrn='" . mysqli_real_escape_string($conn, $jobReferenceNumber) . "'";
                                $result_ess = mysqli_query($conn, $essentails);
                                while ($row_ess = mysqli_fetch_assoc($result_ess)) { ?>
                                    <li><?php echo ($row_ess['essentials']) ?></li>
                                <?php } ?>
                                <!-- <li>At least 3 years of experience in system administration.</li>
                    <li>Proficiency in Linux and Windows server environments.</li>
                    <li>Experience with virtualization (e.g., VMware or Hyper-V).</li>
                    <li>Strong understanding of network infrastructure and security.</li> -->
                            </ol>
                            <br>
                            <h4>Preferable</h4>
                            <ul>
                                <?php
                                $preferables = "SELECT preferable FROM job_requirements
                                                WHERE preferable IS NOT NULL
                                                AND preferable <> ''
                                                AND jrn='" . mysqli_real_escape_string($conn, $jobReferenceNumber) . "'";
                                $result_pre = mysqli_query($conn, $preferables);
                                while ($row_pre = mysqli_fetch_assoc($result_pre)) { ?>
                                    <li><?php echo ($row_pre['preferable']) ?></li>
                                <?php } ?>
                                <!-- <li>Experience with cloud platforms (AWS, Azure).</li>
                    <li>Certifications such as LFCSA, RHCSA, CompTIA, MCSE, or AWS Certified Solutions Architect.</li>
                    <li>Knowledge of scripting and programming languages such as Bash,Python, C#.</li> -->
                            </ul>

                        </section>
                    </article>
                <?php }
            }
        } else {
            echo "<p>Unable to connect to the database.</p>";
        } ?>
        <!-- DevOps Engineer Position Description -->
        <!-- <article class="job">
           
            <div class="main-info-wrapper">
                <section class="job-main-info">
                    <section class="job-basic-info">
                        <h2>DevOps Engineer</h2>
                        <h3>Position Reference: <em>DO456</em></h3>
                        <p><strong>Company:</strong> Byte Me Sdn Bhd.</p>
                        <p><strong>Salary Range:</strong> RM 9000 - RM 12000</p>
                        <p><strong>Reports To:</strong> Head of Engineering</p>
                    </section>

                    <div class="job-btn-wrapper">
                        <a href="#pos-overview-do456" class="job-info-btn">Overview</a>
                        <a href="#requirement-do456" class="job-info-btn">Requirement</a> 
                        <a href="apply.html" id="job-apply-btn">Apply Now</a>
                    </div>
               </section>
            </div>


            <section class="position-overview" id="pos-overview-do456">
                <a href="#" class="info-close-btn">&times;</a>
                <h3>Position Overview</h3>
                <p>The DevOps Engineer will work closely with software developers, system operators, and other IT staff to oversee code releases and deployments, ensuring automation and continuous integration within the organization’s infrastructure.</p>
                <hr>

                <h3>Key Responsibilities</h3>
                <ul>
                    <li>Implement and maintain CI/CD pipelines for code deployment.</li>
                    <li>Automate infrastructure provisioning and scaling using tools like Terraform.</li>
                    <li>Monitor system performance and security, applying patches and updates as necessary.</li>
                    <li>Collaborate with software development teams to streamline development processes.</li>
                    <li>Deploy, monitor, and troubleshoot containerized applications using Docker and Kubernetes.</li>
                </ul>

           </section>

            <section class="requirement" id="requirement-do456">
                <a href="#" class="info-close-btn">&times;</a>
                <h3>Required Qualifications, Skills, and Knowledge</h3>
                <br>
                <h4>Essential</h4>
                <ol>
                    <li>Bachelor’s degree in Computer Science, IT, or a related field.</li>
                    <li>5+ years of experience in a DevOps or related role.</li>
                    <li>Strong experience with cloud services (AWS, GCP, or Azure).</li>
                    <li>Proficiency with CI/CD tools such as Jenkins, GitLab, or CircleCI.</li>
                    <li>Experience with containerization (Docker) and orchestration (Kubernetes).</li>
                </ol>
 
                <br> 
                <h4>Preferable</h4>
                    <ul> 
                        <li>Knowledge of Infrastructure as Code (IaC) tools such as Terraform or CloudFormation.</li>
                        <li>Experience with monitoring tools (Prometheus, Grafana).</li>
                        <li>Familiarity with scripting and programming languages like Python, Ruby, or Shell.</li>
                    </ul>           
            </section>
       </article> -->

        <!-- Software Engineer Position Description -->
        <!-- <article class="job">
           
            <div class="main-info-wrapper">
                <section class="job-main-info">
                    <section class="job-basic-info">
                        <h2>Software Engineer</h2>
                        <h3>Position Reference: <em>SE405</em></h3>
                        <p><strong>Company:</strong> Byte Me Sdn Bhd.</p>
                        <p><strong>Salary Range:</strong> RM 7000 - RM 9000</p>
                        <p><strong>Reports To:</strong> Senior Software Architect</p>
                    </section>

                    <div class="job-btn-wrapper">
                        <a href="#pos-overview-se789" class="job-info-btn">Overview</a>
                        <a href="#requirement-se789" class="job-info-btn">Requirement</a> 
                        <a href="apply.html" id="job-apply-btn">Apply Now</a>
                    </div>
                </section>
            </div>


            <section class="position-overview" id="pos-overview-se789">
                <a href="#" class="info-close-btn">&times;</a>
                <h3>Position Overview</h3>
                <p>The Software Engineer will be responsible for designing, developing, and maintaining software systems to meet the needs of the company and its clients. The role involves working closely with cross-functional teams to ensure high-quality deliverables.</p>
                <hr>

                <h3>Key Responsibilities</h3>
                <ul>
                    <li>Develop, test, and maintain software applications based on user requirements.</li>
                    <li>Collaborate with other team members to ensure seamless integration of new features.</li>
                    <li>Write clean, scalable, and efficient code.</li>
                    <li>Troubleshoot and debug software issues.</li>
                    <li>Follow best practices for version control and software development lifecycles.</li>
                </ul>
            </section>

            <section class="requirement" id="requirement-se789">
                <a href="#" class="info-close-btn">&times;</a>
                <h3>Required Qualifications, Skills, and Knowledge</h3>
                <br>
                <h4>Essential</h4>
                <ol>
                    <li>Bachelor’s degree in Computer Science, Engineering, or related field.</li>
                    <li>Proficiency in at least one programming language (e.g., Java, Python, C++).</li>
                    <li>3+ years of experience in software development.</li>
                    <li>Strong understanding of software development methodologies (Agile, Scrum).</li>
                    <li>Strong communication and teamwork abilities.</li>
                </ol>

                <br> 
                <h4>Preferable</h4>
                <ul> 
                    <li>Master’s degree in a related field.</li>
                    <li>Experience with cloud platforms (AWS, Azure).</li>
                    <li>Knowledge of DevOps practices.</li>
                    <li>Familiarity with containerization tools like Docker and Kubernetes.</li>
                </ul>           
            </section>
        </article> -->

        <!-- Web Developer Position Description -->
        <!-- <article class="job">
   
            <div class="main-info-wrapper">
                <section class="job-main-info">
                    <section class="job-basic-info">
                        <h2>Web Developer</h2>
                        <h3>Position Reference: <em>WD123</em></h3>
                        <p><strong>Company:</strong> Byte Me Sdn Bhd.</p>
                        <p><strong>Salary Range:</strong> RM 6000 - RM 8500</p>
                        <p><strong>Reports To:</strong> Senior Web Architect</p>
                  </section>
        
                    <div class="job-btn-wrapper">
                        <a href="#pos-overview-wd123" class="job-info-btn">Overview</a>
                        <a href="#requirement-wd123" class="job-info-btn">Requirement</a> 
                        <a href="apply.html" id="job-apply-btn">Apply Now</a>
                    </div>
               </section>
            </div>
        
            <section class="position-overview" id="pos-overview-wd123">
                <a href="#" class="info-close-btn">&times;</a>
                <h3>Position Overview</h3>
                <p>The Web Developer will be responsible for designing, coding, and modifying websites, 
                    from layout to function and according to client specifications. 
                    The role involves working closely with design and development teams to create visually appealing, 
                    user-friendly, and responsive web applications.</p>
                <hr>
        
                <h3>Key Responsibilities</h3>
                <ul>
                    <li>Design and develop web applications based on project requirements.</li>
                    <li>Collaborate with designers to create clean and intuitive user interfaces.</li>
                    <li>Write efficient, scalable, and well-documented code.</li>
                    <li>Optimize applications for maximum speed and scalability.</li>
                    <li>Troubleshoot, debug, and maintain web applications.</li>
                    <li>Ensure that web applications follow industry best practices and security standards.</li>
                </ul>
        
           </section>
        
            <section class="requirement" id="requirement-wd123">
                <a href="#" class="info-close-btn">&times;</a>
                <h3>Required Qualifications, Skills, and Knowledge</h3>
                <br>
                <h4>Essential</h4>
                <ol>
                    <li>Bachelor’s degree in Computer Science, Web Development, or related field.</li>
                    <li>Proficiency in front-end technologies (HTML, CSS, JavaScript).</li>
                    <li>Experience with back-end languages (PHP, Node.js, Python, etc.).</li>
                    <li>2+ years of experience in web development.</li>
                    <li>Strong understanding of responsive web design principles.</li>
                    <li>Experience with version control (e.g., Git).</li>
                </ol>
        
                <br> 
                <h4>Preferable</h4>
                    <ul> 
                        <li>Experience with front-end frameworks (e.g., React, Angular, Vue).</li>
                        <li>Knowledge of databases (MySQL, MongoDB, etc.).</li>
                        <li>Familiarity with CMS platforms like WordPress or Drupal.</li>
                        <li>Understanding of SEO principles.</li>
                    </ul>           
            </section>
        </article> -->

        <!-- UI/UX Position Description -->
        <!-- <article class="job">
   
            <div class="main-info-wrapper">
                <section class="job-main-info">
                    <section class="job-basic-info">
                        <h2>UI/UX Designer</h2>
                        <h3>Position Reference: <em>UX301</em></h3>
                        <p><strong>Company:</strong> Byte Me Sdn Bhd.</p>
                        <p><strong>Salary Range:</strong> RM 6000 - RM 8500</p>
                        <p><strong>Reports To:</strong> Senior Product Manager</p>
                  </section>
        
                    <div class="job-btn-wrapper">
                        <a href="#pos-overview-ux301" class="job-info-btn">Overview</a>
                        <a href="#requirement-ux301" class="job-info-btn">Requirement</a> 
                        <a href="apply.html" id="job-apply-btn">Apply Now</a>
                    </div>
               </section>
            </div>
        
            <section class="position-overview" id="pos-overview-ux301">
                <a href="#" class="info-close-btn">&times;</a>
                <h3>Position Overview</h3>
                <p>The UI/UX Designer will be responsible for creating and improving the user experience and 
                    interface for web and mobile applications. The role involves understanding user needs,
                     conducting research, and working closely with developers and product teams to design visually 
                     appealing and user-friendly interfaces.</p>
                <hr>
        
                <h3>Key Responsibilities</h3>
                <ul>
                    <li>Conduct user research and evaluate user feedback to inform design decisions.</li>
                    <li>Create wireframes, storyboards, user flows, and prototypes.</li>
                    <li>Design intuitive and visually appealing user interfaces for web and mobile platforms.</li>
                    <li>Collaborate with cross-functional teams including developers and product managers.</li>
                    <li>Maintain design consistency and ensure the implementation of UI/UX best practices.</li>
                    <li>Test designs and iterate based on user feedback and analytics.</li>
                </ul>
        
           </section>
        
            <section class="requirement" id="requirement-ux301">
                <a href="#" class="info-close-btn">&times;</a>
                <h3>Required Qualifications, Skills, and Knowledge</h3>
                <br>
                <h4>Essential</h4>
                <ol>
                    <li>Bachelor’s degree in Graphic Design, Human-Computer Interaction, or related field.</li>
                    <li>Proficiency in design and prototyping tools (e.g., Adobe XD, Figma, Sketch).</li>
                    <li>2+ years of experience in UI/UX design for web and mobile applications.</li>
                    <li>Strong portfolio demonstrating design work.</li>
                    <li>Strong understanding of user-centered design principles.</li>
                </ol>
        
                <br> 
                <h4>Preferable</h4>
                    <ul> 
                        <li>Experience with HTML/CSS/JavaScript to communicate with developers effectively.</li>
                        <li>Familiarity with front-end frameworks like Bootstrap.</li>
                        <li>Experience conducting usability testing.</li>
                        <li>Knowledge of design systems and branding guidelines.</li>
                    </ul>           
            </section>
        </article> -->


        <!-- Database Administrator Position Description -->
        <!-- <article class="job">
   
            <div class="main-info-wrapper">
                <section class="job-main-info">
                    <section class="job-basic-info">
                        <h2>Database Administrator</h2>
                        <h3>Position Reference: <em>DB501</em></h3>
                        <p><strong>Company:</strong> Byte Me Sdn Bhd.</p>
                        <p><strong>Salary Range:</strong> RM 8000 - RM 10000</p>
                        <p><strong>Reports To:</strong> IT Infrastructure Manager</p>
                  </section>
        
                    <div class="job-btn-wrapper">
                        <a href="#pos-overview-dba501" class="job-info-btn">Overview</a>
                        <a href="#requirement-dba501" class="job-info-btn">Requirement</a> 
                        <a href="apply.html" id="job-apply-btn">Apply Now</a>
                    </div>
               </section>
            </div>
        
            <section class="position-overview" id="pos-overview-dba501">
                <a href="#" class="info-close-btn">&times;</a>
                <h3>Position Overview</h3>
                <p>The Database Administrator (DBA) will be responsible for the installation, 
                    configuration, management, and maintenance of databases. 
                    The role includes performance tuning, backup and recovery, and ensuring database security and availability.
                     The DBA will work closely with system administrators and development teams to support enterprise applications.</p>
                <hr>
        
                <h3>Key Responsibilities</h3>
                <ul>
                    <li>Install, configure, and upgrade databases and related tools.</li>
                    <li>Monitor database performance and optimize queries for efficiency.</li>
                    <li>Implement backup, restore, and disaster recovery strategies.</li>
                    <li>Ensure database security and compliance with internal and external policies.</li>
                    <li>Troubleshoot database issues and work with the development team to resolve them.</li>
                    <li>Manage database capacity planning and scaling as per company growth.</li>
                    <li>Maintain comprehensive documentation of database processes.</li>
                </ul>
        
           </section>
        
            <section class="requirement" id="requirement-dba501">
                <a href="#" class="info-close-btn">&times;</a>
                <h3>Required Qualifications, Skills, and Knowledge</h3>
                <br>
                <h4>Essential</h4>
                <ol>
                    <li>Bachelor’s degree in Computer Science, Information Systems, or related field.</li>
                    <li>Proficiency in Database Administration (11g, 12c, 19c).</li>
                    <li>3+ years of experience as an DBA in a production environment.</li>
                    <li>Strong understanding of database performance tuning and optimization techniques.</li>
                    <li>Experience with RAC, RMAN, Data Guard, and ASM.</li>
                    <li>Excellent problem-solving and analytical skills.</li>
                </ol>
        
                <br> 
                <h4>Preferable</h4>
                    <ul> 
                        <li>Certified Professional (OCP) certification.</li>
                        <li>Experience with cloud platforms such as AWS or Azure.</li>
                        <li>Familiarity with PL/SQL scripting and database automation.</li>
                        <li>Experience with other database systems (e.g., MySQL, PostgreSQL) is a plus.</li>
                    </ul>           
            </section>
        </article> -->

        <!-- IT Support Position Description -->
        <!-- <article class="job">
   
            <div class="main-info-wrapper">
                <section class="job-main-info">
                    <section class="job-basic-info">
                        <h2>IT Support</h2>
                        <h3>Position Reference: <em>TS123</em></h3>
                        <p><strong>Company:</strong> Byte Me Sdn Bhd.</p>
                        <p><strong>Salary Range:</strong> RM 4000 - RM 6000</p>
                        <p><strong>Reports To:</strong> IT Support Manager</p>
                  </section>
        
                    <div class="job-btn-wrapper">
                        <a href="#pos-overview-its123" class="job-info-btn">Overview</a>
                        <a href="#requirement-its123" class="job-info-btn">Requirement</a> 
                        <a href="apply.html" id="job-apply-btn">Apply Now</a>
                    </div>
               </section>
            </div>
        
            <section class="position-overview" id="pos-overview-its123">
                <a href="#" class="info-close-btn">&times;</a>
                <h3>Position Overview</h3>
                <p>The IT Support role is responsible for providing technical support to end-users, troubleshooting hardware and software issues, and maintaining network infrastructure. The role requires ensuring smooth IT operations for the organization, collaborating with the IT team to resolve technical issues efficiently.</p>
                <hr>
        
                <h3>Key Responsibilities</h3>
                <ul>
                    <li>Provide first-level support for hardware and software issues.</li>
                    <li>Set up and configure computer systems and networks.</li>
                    <li>Troubleshoot system, network, and peripheral issues.</li>
                    <li>Install and maintain software and hardware components.</li>
                    <li>Manage user access, permissions, and IT-related security.</li>
                    <li>Document technical processes and resolutions for future reference.</li>
                </ul>
        
           </section>
        
            <section class="requirement" id="requirement-its123">
                <a href="#" class="info-close-btn">&times;</a>
                <h3>Required Qualifications, Skills, and Knowledge</h3>
                <br>
                <h4>Essential</h4>
                <ol>
                    <li>Bachelor’s degree in Information Technology, Computer Science, or related field.</li>
                    <li>Experience with troubleshooting hardware and software issues.</li>
                    <li>Familiarity with Windows and Linux operating systems.</li>
                    <li>Strong knowledge of networking fundamentals (TCP/IP, LAN, WAN).</li>
                    <li>Excellent communication and customer service skills.</li>
                </ol>
        
                <br> 
                <h4>Preferable</h4>
                    <ul> 
                        <li>Certifications such as CompTIA A+, Microsoft Certified IT Professional (MCITP).</li>
                        <li>Experience with virtualization technologies (VMware, Hyper-V).</li>
                        <li>Familiarity with ITIL practices.</li>
                    </ul>           
            </section>
        </article> -->

    </main>

    <!-- Aside for additional job hunting tips -->
    <aside id="job-hunting-tips">
        <section class="job-hunting-description">
            <h3>Job Hunting Tips</h3>
            <p>Looking for a job in IT? Make sure to:</p>
            <ul>
                <li>Tailor your resume to the job description.</li>
                <li>Stay updated with the latest industry trends and technologies.</li>
                <li>Build a portfolio showcasing your projects and skills.</li>
                <li>Network with professionals in the industry.</li>
            </ul>
        </section>
    </aside>

    <!-- Company detail and address -->
    <?php include_once('footer.inc'); ?>

</body>

</html>