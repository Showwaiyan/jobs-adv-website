<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Byte Me</title>
    <link rel="shortcut icon" href="images/bytemefavicon.png" type="image/x-icon">
    <link rel="stylesheet"  type="text/css" href="styles/style.css">

    <!-- Font import -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body id="index-body">
  <?php 
  session_start();
  require_once('header.inc'); ?>
   <!-- Comapany logo and description Visual -->
   <main id="index-main">
        <img class="logo" src="images/bytemelogo.png" alt="company-logo">
        <h2>Innovating Tomorrow, Today</h2>  
        <p>At ByteMe, we harness the power of cutting-edge technology to deliver intelligent, seamless solutions that drive your business forward. From AI-powered platforms to digital transformation, we create technology that empowers innovation, efficiency, and success.</p> 
   </main>

   <!-- company services short section -->

   <article class="index-services">
    <h2>What we do</h2>
    <section class="services">
        <div id="software">
            <div class="computer-image"></div>
            <h3>Software Development</h3>
            <p>Our team of expert developers is dedicated to creating high-quality software solutions for businesses of all sizes. 
                Whether you're a startup looking to build your first app or an enterprise, 
                we've got you covered.Boost efficiency with tailored software solutions designed to meet your specific needs.</p>
            <a href="#" class="service-button">Learn More</a>
        </div>
        <div id="ai">
            <div class="ai-image"></div>
            <h3>AI Integration</h3>
            <p>Artificial intelligence is revolutionizing the way we do business. 
                Our team of AI experts can help you harness the power of machine learning 
                and deep learning to drive innovation and transform your organization.
                Enhance decision-making with actionable insights derived from advanced AI and ML technologies.</p>
            <a href="#" class="service-button">Consult With Us</a>
        </div>
        <div id="cloud">
            <div class="cloud-image"></div>
            <h3>Cloud Services</h3>
            <p>Cloud computing is the future of IT infrastructure. 
                Our team of cloud experts can help you migrate your applications and data to the cloud, 
                enabling you to scale your business and reduce costs.
                Optimize performance and reduce costs with scalable cloud infrastructure tailored for your business.</p>
            <a href="#" class="service-button">Discover Now</a>
        </div>  
    </section>

  </article>
  <!-- Company customers sections -->
   <article class="index-customers" id="index-customers">
        <h2>Our Customers</h2>
        <section class="customers">
            <img src="images/ibm.png" alt="ibm">
            <img src="images/hsbc.png" alt="hsbc">
            <img src="images/maybank.png" alt="maybank">
            <img src="images/umobile.png" alt="umobile">
            <img src="images/nvidia.png" alt="nvidia">
            <img src="images/amazon.png" alt="amazon">
            <img src="images/ebay.png" alt="ebay">

            <img src="images/ibm.png" alt="ibm">
            <img src="images/hsbc.png" alt="hsbc">
            <img src="images/maybank.png" alt="maybank">
            <img src="images/umobile.png" alt="umobile">
            <img src="images/nvidia.png" alt="nvidia">
            <img src="images/amazon.png" alt="amazon">
            <img src="images/ebay.png" alt="ebay">
        </section>
   </article>
   <!-- company about section -->
   <article class="index-about-us">
        <section class="about-us-description">
            <h2 class="about-us">About Us</h2>
                
                <p>
                    At ByteMe, we are passionate about driving innovation and transforming the digital landscape. 
                    Founded with the mission to create cutting-edge solutions for the evolving needs of businesses and consumers, 
                    we specialize in providing high-quality software development, AI integration, and custom technology services.

                <p>
                    Our team of highly skilled engineers, designers, 
                    and developers is dedicated to solving complex problems with innovative technologies.
                    Whether you're a startup looking to build your first app or a large enterprise seeking to enhance your digital infrastructure,
                    ByteMe is your partner for all things tech.
                </p>
                <a href="about.html" class="service-button" id="about-learn-more">Learn More</a>
        </section>
        <a href="https://www.youtube.com/watch?v=L5NAQ_HtADA" target="blank" class="about-us-image" alt="youtube thumbnail">
            <img src="https://img.youtube.com/vi/L5NAQ_HtADA/hqdefault.jpg
                " alt="youtube thuumbnail">
        </a>
   </article>


   <!-- Testomonial Section -->
    <article class="index-testimonial">
        <h2>Testimonials</h2>
        <section class="testimonial">
            
            <div class="testimonial-card">
                <div class="testimonial-card-image">
                    <img src="images/ibm-ceo.jpg" alt="ceo of ibm">
                </div>
                <div class="testimonial-card-description">
                    <p class="description">We are happy to confirm that
                    we were one of the first customers of Byte Me and 
                    we still continue to remain their customer. 
                    This shows the quality of Byte Me service and support. 
                    </p>
                    <div class="name-and-position">
                        <p class="name">Arvind Krishna</p>
                        <p class="position">CEO of IBM</p> 
                    </div>
                </div>
           </div>

            <div class="testimonial-card">
                <div class="testimonial-card-image">
                    <img src="images/may-ceo.jpg" alt="ceo of maybank">
                </div>
                <div class="testimonial-card-description">
                    <p class="description">We are very happy with Byte Me, 
                    their flexible service and very comfortable. 
                    We are really happy of Byte Me services.Their innovative tech solutions 
                    helped streamline our operations, saving us both time and money.
                    </p>
                    <div class="name-and-position">
                        <p class="name">Khairussaleh Ramli</p>
                        <p class="position">CEO of Maybank</p>  
                    </div>
               </div>
           </div>

            <div class="testimonial-card">
                <div class="testimonial-card-image">
                    <img src="images/nvidia-ceo.jpg" alt="ceo of nvidia" class="testimonial-card-image">
                    
               </div>
               <div class="testimonial-card-description">
                    <p class="description">We are working with Byte Me since last 2 to 3 years. 
                    Their response and their timing of services are good fast 
                    and their engineers are good qualified. 
                    Specially we are getting good response from their technical teams as well as 
                    their procurement and contact center support.
                    </p>
                    <div class="name-and-position">
                        <p class="name">Jensen Huang</p>
                        <p class="position">CEO of Nvidia</p>  
                    </div>
              </div>
           </div>
        </section>
    </article>

   <!-- Company detail and address -->
    <<?php include_once('footer.inc');?>
</body>
</html>
