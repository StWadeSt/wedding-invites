<?php
require('dbConn.php');
require('component.php');
// require('loadGuest.php');

// getRsvps();

if (isset($_POST['btnSubmit'])) {
    $rsvp = '';
    $rsvp = stripslashes($_POST['rsvpCode']);
    $rsvp = trim($rsvp);
    $rsvp = mysqli_real_escape_string($conn, $rsvp);

    $attending = stripslashes($_POST['attendingOption']);
    $attending = trim($attending);
    $attending = mysqli_real_escape_string($conn, $attending);

    $food = stripslashes($_POST['foodOption']);
    $food = trim($food);
    $food = mysqli_real_escape_string($conn, $food);

    $music = $_POST['music-request'];
    $music = mysqli_real_escape_string($conn, $music);

    if (!empty($rsvp)) {
    } else {
        header("Location: error.php");
    }

    $query = "SELECT attending FROM `guests` WHERE `rsvpCode` = '$rsvp';";

    $result = mysqli_query($conn, $query) or die(); //executing the sql statement
    $rows = mysqli_num_rows($result); //checking whether there are any users with matching information and how many there are

    if ($rows > 0) // if theres one record found with mathing information 
    {
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row['attending']) {
                header("Location: alreadyConfirmed.php"); // Redirect user 
            } else {
                pushToDB($rsvp, $attending, $food, $music);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>R & C Wedding site</title>

    <link rel="stylesheet" href="./styles.css">

    <script src="https://kit.fontawesome.com/e0e70a3cc1.js" crossorigin="anonymous"></script>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Cameron & Robin</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#gallery-section">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#coutdown-section">Countdown</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#location">Venue Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#bridal-party">Bridal Party</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#faq">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#rsvp-section">RSVP</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Landing Area -->
    <section class="landing-area">
        <div class="slide active one">
            <div class="container">
                <div class="row align-items-center">
                    <div class="home-content">
                        <p>We are Getting Married</p>
                        <h1>Robin & Cameron</h1>
                        <span>10 Dec 2022</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide two">
            <div class="container">
                <div class="row align-items-center">
                    <div class="home-content">
                        <p>We are Getting Married</p>
                        <h1>Robin & Cameron</h1>
                        <span>10 Dec 2022</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide three">
            <div class="container">
                <div class="row align-items-center">
                    <div class="home-content">
                        <p>We are Getting Married</p>
                        <h1>Robin & Cameron</h1>
                        <span>10 Dec 2022</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Photo gallery -->
    <div id="gallery-section" style="margin-bottom: 20px;"></div>
    <section class="gallery-section">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Gallery</h2>
                </div>
            </div>
            <div class="images-row">
                <!--gallery item start  -->
                <div class="gallery-item-inner tall">
                    <img class="img-thumbnail" src="./images/newPhotos/slide/image6.jpeg" data-large="./images/newPhotos/slide/image6.jpeg" alt="image" />
                </div>
                <!--gallery item start  -->
                <div class="gallery-item-inner wide">
                    <img class="img-thumbnail" src="./images/newPhotos/slide/image9.jpeg" data-large="./images/newPhotos/slide/image9.jpeg" alt="image" />
                </div>
                <!-- gallery item end -->
                <!-- gallery item start  -->
                <div class="gallery-item-inner tall">
                    <img class="img-thumbnail" src="./images/newPhotos/slide/image7.jpeg" data-large="./images/newPhotos/slide/image7.jpeg" alt="image" />
                </div>
                <!-- gallery item end  -->
                <!-- gallery item start  -->
                <div class="gallery-item-inner big">
                    <img class="img-thumbnail" src="./images/newPhotos/slide/image2.jpeg" data-large="./images/newPhotos/slide/image2.jpeg" alt="image" />
                </div>
                <!-- gallery item end -->
                <!-- gallery item start -->
                <div class="gallery-item-inner  tall">
                    <img class="img-thumbnail " src="./images/newPhotos/slide/image1.jpeg" data-large="./images/newPhotos/slide/image1.jpeg" alt="image" />
                </div>
                <!-- gallery item end -->
                <!--gallery item start  -->
                <div class="gallery-item-inner wide">
                    <img class="img-thumbnail" src="./images/newPhotos/slide/image4.jpeg" data-large="./images/newPhotos/slide/image4.jpeg" alt="image" />
                </div>
                <!-- gallery item end  -->
                <!--gallery item start  -->
                <div class="gallery-item-inner tall">
                    <img class="img-thumbnail" src="./images/newPhotos/image1.jpeg" data-large="./images/newPhotos/slide/image4.jpeg" alt="image" />
                </div>
                <!-- gallery item end  -->
            </div>
        </div>
    </section>

    <!-- Wedding count down -->
    <div class="coutdown-container" id="coutdown-section">
        <div class="box">
            <div class="section-title">
                <h2>Countdown to Our Wedding</h2>
            </div>
            <div class="countdown">
                <div>
                    <div class="day count">
                        <span id="day">NA</span>
                        <h4>Days</h4>
                    </div>
                    <div class="hour count">
                        <span id="hour">NA</span>
                        <h4>Hours</h4>
                    </div>
                </div>
                <div>
                    <div class="minute count">
                        <span id="minute">NA</span>
                        <h4>Minutes</h4>
                    </div>
                    <div class="second count">
                        <span id="second">NA</span>
                        <h4>Seconds</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Gallery popup section -->
    <div class="gallery-popup">
        <div class="gp-container">
            <div class="gp-counter"></div>
            <div class="gp-close">&times;</div>
            <img src="./images/gallery/large-images/image5.jpg" alt="gallery image" class="gp-img">
            <div class="gp-controls">
                <div class="prev">
                    <i class="fa-solid fa-angle-left"></i>
                </div>
                <div class="next">
                    <i class="fa-solid fa-angle-right"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Bridal Party -->
    <div id="bridal-party" style="margin-bottom: 20px;"></div>
    <section class="people-section">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>Bridal Party</h2>
                </div>
            </div>
            <div class="row">
                <div class="filter-people">
                    <a href="javascript:void(0);" data-target="groomsmen" class="filter-btn active">Groomsmen</a>
                    <a href="javascript:void(0);" data-target="bridesmaids" class="filter-btn">Bridesmaids</a>
                </div>
            </div>
            <!-- Groomsmen -->
            <div class="row justify-content-center">
                <div class="people-item bestman" data-category="groomsmen">
                    <div class="people-item-inner">
                        <img src="./images/Bridal Party/guys/Dylan.jpeg" alt="groomsmen">
                        <div class="people-item-title">
                            <h4>Dylan <span>Best man</span></h4>
                        </div>
                        <div class="people-item-message">
                            <p>"Ek wens julle twee oneindige geluk, liefde en rykdom. Julle twee maak mekaar net beter en julle is perfek vir mekaar. Ek waardeer julle baie en ek is baie lief vir julle❤️"~ <span> Dylan</span></p>
                        </div>
                    </div>
                </div>
                <div class="people-item" data-category="groomsmen">
                    <div class="people-item-inner">
                        <img src="./images/Bridal Party/guys/Stuart.jpg" alt="groomsmen">
                        <div class="people-item-title">
                            <h4>Stuart <span>Groomsmen</span></h4>
                        </div>
                        <div class="people-item-message">
                            <p>
                                "Cammy and Robin, you are turning the page in the book that is your life. May this chapter be the best one yet. I wish you all the love, prosperity, and joy." ~ <span>from Stuart</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="people-item" data-category="groomsmen">
                    <div class="people-item-inner">
                        <img src="./images/Bridal Party/guys/Brett.jpeg" alt="groomsmen">
                        <div class="people-item-title">
                            <h4>Brett <span>Groomsmen</span></h4>
                        </div>
                        <div class="people-item-message">
                            <p>
                                "Cammy and Robin slide into a new adventure in life. All the best for the two of you and may God keep you guys together for many years" ~ <span>from Brett</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="people-item" data-category="groomsmen">
                    <div class="people-item-inner">
                        <img src="./images/Bridal Party/guys/Devin.jpeg" alt="groomsmen">
                        <div class="people-item-title">
                            <h4>Devin <span>Groomsmen</span></h4>
                        </div>
                        <div class="people-item-message">
                            <p>
                                "Wishing you happiness, good health, love, joy in abundance & long prosperous lives. All the best" ~ <span>from Devin</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Bridesmaids -->
            <div class="row justify-content-center">
                <div class="people-item bestman" data-category="bridesmaids">
                    <div class="people-item-inner">
                        <img src="./images/Bridal Party/girls/Nadine.jpeg" alt="bridesmaid">
                        <div class="people-item-title">
                            <h4>Nadine <span>Maid of honor</span></h4>
                        </div>
                        <div class="people-item-message">
                            <p>
                                "Wishing you a marriage that brings you joy and love for a lifetime. May God shower all his most beautiful and richest blessings over both of you. So much love." ~ <span>from Nadine</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="people-item" data-category="bridesmaids">
                    <div class="people-item-inner">
                        <img src="./images/Bridal Party/girls/Katelyn.jpeg" alt="bridesmaid">
                        <div class="people-item-title">
                            <h4>Caitlin <span>Bridesmaid</span></h4>
                        </div>
                        <div class="people-item-message">
                            <p>
                                "Blessings to the best couple ever! May your love grow stronger, your commitment deepen, and your joy increase from this day forward❤️" ~ <span>from Caitlin</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="people-item" data-category="bridesmaids">
                    <div class="people-item-inner">
                        <img src="./images/Bridal Party/girls/Jenica.jpeg" alt="bridesmaid">
                        <div class="people-item-title">
                            <h4>Jenica <span>Bridesmaid</span></h4>
                        </div>
                        <div class="people-item-message">
                            <p>
                                "Congratulations Robin and Cameron! Wishing you a lifetime of love and happiness as you enter a new chapter. I love you dearly and I am so proud of the couple you've grown into❤️" ~ <span>from Jenica</span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="people-item" data-category="bridesmaids">
                    <div class="people-item-inner">
                        <img src="./images/Bridal Party/girls/Jenna.jpeg" alt="bridesmaid">
                        <div class="people-item-title">
                            <h4>Jennah <span>Bridesmaid</span></h4>
                        </div>
                        <div class="people-item-message">
                            <p>
                                "Here's to a long and happy marriage🥂 Wishing you all the love and happiness. Best wishes on this wonderful journey as you begin your new life together ❤️" ~ <span>from Jennah</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Venue Info -->
    <div id="location" style="margin-bottom: 20px;"></div>
    <div class="container location-container">
        <div class="row">
            <div class="section-title">
                <h2>Venue Details</h2>
            </div>
        </div>
        <div class="location-content">
            <div class="row">
                <div class="">
                    <div class="venue-logo">
                        <img src="./images/Venue-logo.png" alt="logo">
                    </div>
                    <div class="venue-description">
                        <p>A quaint forest in the heart of the Cape Winelands, best describes our exclusive wedding venue
                            with its boundless scenic options, lush lawns, mountain views and beautiful dam. <br> <br>
                            Here, the sun sets through the trees of our forest, providing the most romantic golden evening glow. <br> <br>
                            Our elegant rustic Barn, with its cozy garden courtyard, filled with the fragrance of mint, jasmine and roses,
                            is perfect for any reception <br><br>

                            Here you can dance the night away under bistro lights and African stars,
                            while open fire baskets create a warm atmosphere for friends and loved ones to connect.</p>
                    </div>
                </div>
                <div class="venue-images">
                    <img loading="lazy" src="./images/venue-image.PNG" alt="photo of venue">
                    <img loading="lazy" src="./images/venue-image2.jpeg" alt="photo of venue">
                    <img loading="lazy" src="./images/venue-image3.jpeg" alt="photo of venue">
                </div>
                <section id="Program">
                    <div class="container">
                        <div class="row">
                            <div class="program">
                                <img class="prog-image" src="./images/newPhotos/slide/prog.png" alt="">
                            </div>
                        </div>
                    </div>
                </section>
                <h3 style="margin-top: 50px ;">Looking for the venue?</h3>
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3306.269534460115!2d18.797625719864584!3d-34.03695648228327!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1dcc4b3229c00bf7%3A0xd2a3f3e1e1bb7c92!2sWinery%20Road%20Forest!5e0!3m2!1sen!2sza!4v1658927740937!5m2!1sen!2sza" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                <div class="accommodation-container">
                    <div class="section-title">
                        <h2>List of Accommodations nearby</h2>
                    </div>
                    <div class="accom-list">
                        <ul>
                            <li>
                                <div>Manor House at Knorhoek Estate</div><a type="button" class="btn btn-outline-dark" href="http://www.knorhoekestate.co.za/" target="_blank">See website...</a>
                            </li>
                            <hr style="padding: 0 5px; max-width: 500px; margin: 20px auto; ">

                            <li>
                                <div>Acara Self Catering Cottage </div><a type="button" class="btn btn-outline-dark" href="https://www.acara.co.za/" target="_blank">See website...</a>
                            </li>
                            <hr style="padding: 0 5px; max-width: 500px; margin: 20px auto; ">

                            <li>
                                <div>Klein wilmoed Luxury Cottage & B&B</div><a type="button" class="btn btn-outline-dark" href="https://www.kleinwelmoed.co.za/self-catering-cottages-accommodation.php" target="_blank">See website...</a>
                            </li>
                            <hr style="padding: 0 5px; max-width: 500px; margin: 20px auto; ">

                            <li>
                                <div>Vredenburg Manor B&B</div><a type="button" class="btn btn-outline-dark" href="https://vredenburgmanor.com/accommodation/" target="_blank">See website...</a>
                            </li>
                            <hr style="padding: 0 5px; max-width: 500px; margin: 20px auto; ">
                            <li>
                                <div>Country Guesthouse</div><a type="button" class="btn btn-outline-dark" href="https://thecountryguesthouse.co.za/accommodation.html" target="_blank">See website...</a>
                            </li>
                            <hr style="padding: 0 5px; max-width: 500px; margin: 20px auto; ">

                            <li>
                                <div>Winelands Villa Guesthouse & Cottages</div><a type="button" class="btn btn-outline-dark" href="https://www.winelands-villa.co.za/accommodation/self-catering-units/" target="_blank">See website...</a>
                            </li>
                            <hr style="padding: 0 5px; max-width: 500px; margin: 20px auto; ">

                            <li>
                                <div>Majeka House - Spa & Hotel</div><a type="button" class="btn btn-outline-dark" href="https://book.nightsbridge.com/11484" target="_blank">See website...</a>
                            </li>
                            <hr style="padding: 0 5px; max-width: 500px; margin: 20px auto; ">

                            <li>
                                <div>De Zalze Lodge</div><a type="button" class="btn btn-outline-dark" href="https://dezalzelodge.co.za/" target="_blank">See website...</a>
                            </li>
                            <hr style="width: 500px; margin: 40px auto;">

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Frequently asked questions -->
    <div id="faq" style="margin-bottom: 40px;"></div>
    <div class="accordion accordion-flush">
        <div class="section-title">
            <h2>Frequently Asked Questions</h2>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseThree">
                    What time is the ceremony?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Sat 10 Dec - 15:00</strong>
                </div>
            </div>
        </div>
        <hr>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    What is the dress code?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Semi-formal.</strong>
                </div>
            </div>
        </div>
        <hr>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    What are the food options?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>#1 Beef Wellington served with honey giazed baby vegetables and potato dauphinoise and a carrot puree.<br><br> #2 Lamb shoulder drizzled with a red wine jus served with carrot puree, potato croquettes and garlic suateed baby vegetables.</strong>
                </div>
            </div>
        </div>
        <hr>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseOne">
                    Are children welcome?
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>Sorry for the inconvenience, no children on the day.</strong>
                </div>
            </div>
            <hr>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="true" aria-controls="collapseOne">
                    Are we allowed to bring our own drinks?
                </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>No, pre-drinks and bubbly will be served. <br> All other drinks can be ordered at the cash bar.</strong>
                </div>
            </div>
            <hr>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSeven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="true" aria-controls="collapseOne">
                    Is smoking allowed?
                </button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>The forest is a no smoking area. <br> However, the venue offers designated smoking areas.</strong>
                </div>
            </div>
            <hr>
        </div>
    </div>

    <!-- RSVP Section -->
    <div id="rsvp-section" style="margin-bottom: 20px;"></div>
    <section class="rsvp-section">
        <div class="container">
            <div class="row">
                <div class="section-title">
                    <h2>You are invited</h2>
                    <p>Please kindly respond before 15 October 2022</p>
                </div>
            </div>
            <div class="row">
                <div class="rsvp-form">
                    <form action="index.php" method="POST">
                        <div class="row">
                            <h5 style="margin-bottom: 10px;">Please ensure you enter the right RSVP Code</h5>
                            <div id="form-check">

                            </div>
                            <div class="input-group">
                                <input type="text" class="input-control rsvp-code" id="rsvp-code" value="" placeholder="RSVP Code" name="rsvpCode" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group">
                                <select name="attendingOption" id="select-attendance" class="input-control" required>
                                    <option value="Yes, I will be attending">I am attending</option>
                                    <option value="Unfortunately, I won't be attending">I am not attending</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-group">
                                <div id="food">
                                    <select name="foodOption" id="select-food" class="input-control" required>
                                        <option value="">Food options</option>
                                        <option value="1">Option 1 : Beef Wellington served with honey giazed baby vegetables and potato dauphinoise and a carrot puree.</option>
                                        <option value="2">Option 2 : Lamb shoulder drizzled with a red wine jus served with carrot puree, potato croquettes and garlic suateed baby vegetables.</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" styles="min-height: 100px;">
                            <div class="input-group" styles="min-height: 100px;">
                                <textarea name="music-request" class="input-control" cols="30" rows="10" placeholder="Music request: with artist name" styles="min-height: 100px;"></textarea>
                            </div>
                        </div>
                        <button type="submit" name="btnSubmit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            SEND
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <div class="footer">
        <div class="container1">
            <div class="row1">
                <div class="footer-content">
                    <div class="couple-names">
                        <img src="./images/flower-circle.png" alt="flower-circle">
                        <h2>Robin <span>&</span> Cameron</h2>
                    </div>
                    <p>Thank you</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Copyright -->
    <p class="copyright">copyright &copy; 2022 <br> Designed by Stuart & Tiffany</p>


    <script defer src="./js/jquery.min.js"></script>
    <script defer src="./js/main.js"></script>
    <script defer>
        function getName(value) {

            var guestList = ['Stuart', 'Ethan', 'Wilbur', 'Constance', 'Nolan', 'Daune', 'Monique', 'Tashlyn', 'Dominique', 'Tifanny', 'Robert Cunningham', 'Shirna Cunningham', 'Caitlin Cunningham', 'Matilda Cunningham', 'Ellen', 'Delina', 'Mark', 'Easton', 'Cludia', 'Peter', 'Shireen', 'Gurshon', 'Mandy', 'Zelda', 'Sharon', 'Johanna Myburgh', 'Liezel Wates', 'Johny Wates', 'Urshula', 'Oom Miller', 'Lorrette', 'Emile', 'Shenise', 'Tamzon', 'Eden', 'Dylan', 'Jeremy', 'Grant', 'Yolanda', 'Adrian', 'Devin', 'Brett', 'Ross', 'Anthony', 'Frieda', 'Rheeda', 'Petra', 'Oom Jan', 'Cyrileen', 'Granville', 'Dizelle', 'Akshay', 'Denray', 'Jennica Jacobs', 'Jenine Thockey', 'Ferlin Arends', 'Jennah Hurree', 'Boitumelo Diale', 'Bonga Magazi', 'Maahier Maloon', 'Xaviar Poole', 'Donna Europa', 'Nurhal', 'Nico Busby', 'Ryab Busby', 'Shuan Baron', 'Yolanda Baron', 'Jo-Ann Solomans', 'Selvin Solomans', 'Dawie Olivier', 'Elenor Olivier', 'Ann Smith', 'Leigh-Lynn Le Fleur', 'Sandra Bason', 'Japhet Kalombo', 'Mano Olivier', 'Maxine Olivier', 'Sheroll Jansen', 'Trevor Jansen', 'Nadine Patterson', 'Rochelle Jasson', 'Donnie Jasson', 'Maurisha Jasson', 'Lauren Jasson', 'Arthur Kayster', 'Andrea Hendricks', 'Maurisha Olivier', 'Zhaundrea Bason', 'Gavin Klein', 'Angie Klein', 'Raedene Naidoo', 'Anver Naidoo', 'Linda Patterson', 'Ben Patterson', 'Marie Smith', 'Jaco Smith', 'Robin', 'Cameron', 'Kaylin Kleynhans'];

            var rsvpList = ['1272', '1380', '1486', '1688', '1138', '1860', '1976', '1085', '2324', '2475', '2595', '2644', '2773', '2877', '2997', '1593', '1720', '2070', '2170', '2232', '3019', '3101', '3295', '3387', '3409', '3576', '3605', '3786', '3824', '3991', '4015', '4182', '4263', '4335', '4439', '4567', '4611', '4709', '4895', '4950', '5042', '5142', '5218', '5311', '5427', '5579', '5688', '5703', '5811', '5956', '6010', '6193', '6280', '6378', '6465', '6580', '6678', '6768', '6810', '6983', '7036', '7119', '7200', '7314', '7417', '7592', '7655', '7707', '7851', '7995', '8041', '8101', '8250', '8354', '8488', '8575', '8652', '8763', '8888', '8941', '9019', '9101', '9254', '9387', '9468', '9507', '9672', '9706', '9863', '9900', '10068', '10111', '10210', '10328', '10479', '10565', '9534', '9687', '9746'];

            var limit = rsvpList.length + 9;
            value = value.trim('');

            if (value) {
                rsvpList.forEach(element2 => {
                    if (value === element2) {
                        var guestName = guestList[rsvpList.indexOf(element2)];
                        var element = document.getElementById("form-check")
                        while (element.firstChild) {
                            element.removeChild(element.firstChild);
                        };
                        if (guestName != null) {
                            document.getElementById("form-check").innerHTML +=
                                `
                                <h3 class="guest-name" style="">
                                ${guestName}
                                <h3/>
                            `
                        } else {
                            alert("Incorrect RSVP Code. Please ensure that you enter a valid code.");
                            document.getElementById('rsvp-code').value = '';
                        }
                    }
                });
            } else {
                alert("Incorrect RSVP Code. Please ensure that you enter a valid code.");
                document.getElementById('rsvp-code').value = '';
            }
        }
    </script>
</body>

</html>