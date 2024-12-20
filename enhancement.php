<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="enhancements">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enhancements</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="shortcut icon" href="images/bytemefavicon.png" type="image/x-icon">
</head>

<body id="enhancement-body">
    <?php include_once('header.inc');?>

    <article class="enhancement-container" >
        <h2 id="enchancements-title">Enhancements</h2>
        <section class="enhancements-card-right">
            <div class="enhance-section">
                <h3>Picture Slideshow</h3>

                <p>We've integrated a captivating picture slideshow to enhance visual engagement on our website.
                    <br>Utilizing the <strong>@keyframes CSS animation rule</strong>, the slideshow gracefully transitions
                    between images, showcasing each one with a fade-in effect over a 15-second interval. This captivating
                    feature repeats indefinitely, ensuring visitors are consistently engaged with our content.
                </p>

                <h4>
                    Example :
                    <span><a href="index.html#index-customers">Our Customers</a></span>
                </h4>
            </div>
            <div class="enhance-img">
                <img src="images/animate.png" alt="animation-enhancement">
            </div>
        </section>

        <section class="enhancements-card-left">

            <div class="enhance-section">
                <h3>Responsive Layout</h3>

                <p>In our website, we used <strong> "Flexbox"</strong> which is a layout model in CSS that allows for more efficient and predictable arrangements of items within a container. 
                    It is designed to provide a more straightforward way to align and distribute space among items in a container, 
                    even when their size is unknown or dynamic.</p>

                <h4>
                    Example :
                    <span><a href="about.html#person-cards">About Us</a></span>
                </h4>
            </div>
            <div class="enhance-img">
                <img src="images/person.png" alt="personcard-enhancement">
            </div>
            </section>

            <section class="enhancements-card-right">
            <div class="enhance-section">
                <h3>Enhanced Navigation with Hover Effect</h3>

                <p>We've enhanced our website's navigation by adding hover effects to key menus in the header. When users
                    hover over these menus, they're highlighted with a white bar under menus, making navigation more
                    intuitive.This effect is achieved using <strong>CSS hover styles</strong>, creating a smooth
                    transition and enhancing the user's browsing experience.
                </p>
                <h4>
                    Example :
                    <span><a href="index.html#index-body">Navigation Bar </a> </span>
                </h4>
            </div>
            <div class="enhance-img">
                <img src="images/navbar.png" alt="navbar-enhancement">
            </div>
    </section>

        <section class="enhancements-card-left">
            <div class="enhance-section">
                <h3>Graphical Effects</h3>
                <p>
                    We have also used drop-shadow filter in our website.
                    Using <strong>filter: drop-shadow() </strong>provides a powerful and flexible way to apply shadows to elements, with additional benefits like combining other graphical effects.
                </p>
                <h4>
                    Example :
                    <span><a href="index.html#index-main">Homepage Logo </a> </span>
                </h4>
            </div>
            <div class="enhance-img">
                <img src="images/dropshadow.png" alt="dropshadow-enhancement">
            </div>
    </section>

        <section class="enhancements-card-right">
            <div class="enhance-section">
                <h3>Positioning</h3>
                <p>
                For Popup Positioning, we used popup and positioning properties for Centering a Popup in our Job Description Page.
                It enhances the visual appearance of the popup but do not affect its position. We also apply <strong>grid</strong> which will ensure that our grid items are laid out in a responsive grid, with each item occupying a flexible width and a fixed height, 
                while maintaining consistent spacing between items.
                </p>
                <h4>
                    Example 
                    <span><a href="jobs.html#requirement-its123">Job Description Page.</a></span>
                </h4>
            </div>
            <div class="enhance-img">
                <img src="images/popup.png" alt="popup-enhancement">
            </div>
        </section>
    </article>

    <?php include_once('footer.inc');?>
</body>

</html>