<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/navbar.css"/>
    <link rel="stylesheet" href="css/landing.css"/>
    <link rel="stylesheet" href="css/footer.css"/>    
    <title>Gym Edge</title>
</head>
<body>
    <!-- The header of the webpage wich have a navbar  -->
    <?php include "inc/header.php" ; ?>
    <!-- first section wich contains the slider  -->
    <section class="container-fluid position-relative">
      <h1 id="bigHeader">
        <span class="whiteH">BUILD</span><span class="orangeH mx-5">YOUR</span
        ><span class="whiteH">BODY</span
        ><span class="orangeH ms-5">STRONG</span>
      </h1>
      <p id="mainPara">
        Ready to change your physique,but can't work out in the gym?
      </p>
      <a href=""><button id="firstJoinButt">JOIN WITH US</button></a>
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="2000">
      <img src="imgs/Rope.jpg" class="d-block w-100 silderImg" alt="image slider 1">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="imgs/armlifting.jpg" class="d-block w-100 silderImg" alt="image slider 2">
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img src="imgs/pexels-victor-freitas-841131.jpg" class="d-block w-100 silderImg" alt="image slider 3">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
    </section>
    <!-- Second section wich contains an image with a big heading in addittion to the fitness info in the right -->
    <section class="container-fluid d-flex flex-column flex-xl-row">
      <div class="section2imgPlaceHolder position-relative d-none d-md-block">
        <h1 id="section2Heading">
          <span>ALL</span><br /><br class="d-none d-md-block" /><br /><span
            >ABOUT</span
          ><br /><br class="d-none d-md-block" /><br /><span>FITNNESS</span>
        </h1>
        <img
          id="sittingManImg"
          src="imgs/sitting.png"
          alt="A men sitting in yoga position"
        />
      </div>
      <article
        class="ms-5 pt-5 bg-white d-flex flex-column justify-content-evenly"
      >
        <div class="d-flex">
          <img
            class="infoIcons"
            src="imgs/updownArrow.png"
            alt="updown Arrow"
          />
          <div class="ms-3">
            <h1 class="articlesHeading">Weight Lifting</h1>
            <p class="articlesParag">
              Weightlifting, also called Olympic weightlifting, is an athletic
              discipline in the modern Olympic programme in wich the athlete
              attempts a maximum weight single lift of a barbell loaded with
              weight plates.
            </p>
          </div>
        </div>
        <div class="d-flex mt-5">
          <img class="infoIcons" src="imgs/running.png" alt="Running image" />
          <div class="ms-3">
            <h1 class="articlesHeading">Running</h1>
            <p class="articlesParag">
              Running is a method of terrestrial locomotion allowing humans and
              other animals to move rapidly on foot . Running is a type of galt
              characterized by an aerial phase in wich all feet ..
            </p>
          </div>
        </div>
        <div class="d-flex mt-5">
          <img class="infoIcons" src="imgs/yoga.png" alt="yoga" />
          <div class="ms-3">
            <h1 class="articlesHeading">Yoga</h1>
            <p class="articlesParag">
              Yoga, is a meditative means of discovering dysfunctional
              perception and cognition , as well as overcoming it for release
              from suffering , inner peace and salvation
            </p>
          </div>
        </div>
      </article>
    </section>
    <div class="container">
      <section class="mt-5">
        <div class="d-flex align-items-center justify-content-center">
          <h3 class="h3Headings me-md-5"><bold>FEATURED CLASSES</bold></h3>
          <div class="separatorDIv me-4"></div>
        </div>
        <div class="row mt-5 justify-content-around">
          <article class="card section3Articles col-4 float-start">
            <img
              src="imgs/cyclingMachines.png"
              class="card-img-top"
              alt="PeopleCycling"
            />
            <div class="card-body">
              <h3 class="card-title">Cycling</h3>
              <div class="d-flex align-items-center mt-4">
                <img class="coachIcon" src="imgs/coach.png" alt="coach Icon" />
                <span class="ms-4 coaches"> Coach Abd l ilah ,Da Hmad</span>
              </div>
            </div>
          </article>
          <article class="card section3Articles col-4 float-end">
            <img
              src="imgs/cyclingMachines.png"
              class="card-img-top"
              alt="PeopleCycling"
            />
            <div class="card-body">
              <h3 class="card-title">Cycling</h3>
              <div class="d-flex align-items-center mt-4">
                <img class="coachIcon" src="imgs/coach.png" alt="coach Icon" />
                <span class="ms-4 coaches"> Coach Abd l ilah ,Da Hmad</span>
              </div>
            </div>
          </article>
          <article
            class="card section3Articles lastArticlesSection3 col-4 float-end"
          >
            <img
              src="imgs/cyclingMachines.png"
              class="card-img-top"
              alt="PeopleCycling"
            />
            <div class="card-body">
              <h3 class="card-title">Cycling</h3>
              <div class="d-flex align-items-center mt-4">
                <img class="coachIcon" src="imgs/coach.png" alt="coach Icon" />
                <span class="ms-4 coaches">Coach Nada , Khalid</span>
              </div>
            </div>
          </article>
        </div>
      </section>
    </div>
    <section class="container mt-5">
      <h1 class="mb-5 fw-bolder">What Clients Say</h1>
      <div class="d-flex flex-column flex-lg-row mt-5">
        <article class="me-5">
          <div class="d-flex">
            <img src="imgs/user1.jpg" class="usersImage" alt="user1 Image" />
            <div class="ms-5">
              <h1 class="fw-bolder">Fouad</h1>
              <div class="lineBreaker mt-4"></div>
            </div>
          </div>
          <p class="mt-4 clientsFeeds">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia
            optio eos, temporibus autem non maxime vel pariatur eaque ullam
            rerum nemo placeat nisi voluptas doloremque magnam repudiandae
            repellat. Amet, dolorem?
          </p>
        </article>
        <article>
          <div class="d-flex">
            <img
              src="imgs/user1.jpg"
              class="usersImage"
              alt="user1 Image"
              id="user2Img"
            />
            <div class="ms-5">
              <h1 class="fw-bolder">Hamid</h1>
              <div class="lineBreaker mt-4"></div>
            </div>
          </div>
          <p class="mt-4 clientsFeeds">
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Mollitia
            optio eos, temporibus autem non maxime vel pariatur eaque ullam
            rerum nemo placeat nisi voluptas doloremque magnam repudiandae
            repellat. Amet, dolorem?
          </p>
        </article>
      </div>
    </section>

    <section class="container-fluid bmiHolderSection position-relative d-none d-md-block">
      <div class="text-center">
        <img src="imgs/Bmi-pic.jpeg" alt="2 persons Running" id="bmiPicture" />
      </div>
      <div class="bmiContent d-flex flex-column justify-content-between h-75">
        <h1 id="bmiHeader">CALCULATE YOUR BMI !</h1>
        <div class="d-flex w-100 justify-content-center">
          <p id="bmiParagraph">
            A BMI of 25.0 or more is overweight, while the healthy <br />
            range is 18.5 to 24.9. BMI applies to most adults 18-65 years.
            <br />
            Your Body Mass Index is
            <span class="fw-bold" id="bodyMass">___</span> This is considered
            <span class="fw-bold" id="bodyState">___</span>
          </p>
          <div
            class="d-flex flex-column align-items-center justify-content-end ms-5"
          >
            <input
              type="number"
              class="bmiInputs mb-5"
              id="bmiInput1"
              placeholder="Weight / KG"
            />
            <input
              type="number"
              class="bmiInputs mt-5"
              id="bmiInput2"
              placeholder="Height / cm"
            />
            <button class="mt-5" id="calculateBtn">Calculate</button>
          </div>
        </div>
      </div>
    </section>
    <section class="section5 mt-5 p-5">
      <div>
        <h1 class="text-white section5Heading">OUR PRICING PLAN</h1>
        <div class="row mt-5 justify-content-between pricingContainer">
          <article
            class="d-flex flex-column align-items-center bg-light col-lg-3 mb-5 mb-lg-0"
          >
            <h4 class="fw-bold text-dark mt-5 PricingCardTitle">STANDARD</h4>
            <div class="mt-5">
              <span id="CardsPrice">$30</span><span id="perMonth">/month</span>
            </div>
            <span class="cardsOffers mt-3">Gym Fitness</span>
            <span class="cardsOffers mt-3"><del>Gym Events</del></span>
            <span class="cardsOffers mt-3">Cycling</span>
            <span class="cardsOffers mt-3">---</span>
            <span class="cardsOffers mt-3">---</span>
            <button class="detailsButt">Details</button>
          </article>
          <article
            id="article2"
            class="d-flex flex-column align-items-center bg-light col-lg-3 mb-5 mb-lg-0"
          >
            <h4 class="fw-bold text-dark mt-5 PricingCardTitle">PREMIUM</h4>
            <div class="mt-5">
              <span id="CardsPrice">$59</span><span id="perMonth">/month</span>
            </div>
            <span class="cardsOffers mt-3">Gym Fitness</span>
            <span class="cardsOffers mt-3">Gym Events</span>
            <span class="cardsOffers mt-3">Cycling</span>
            <span class="cardsOffers mt-3">Yoga</span>
            <span class="cardsOffers mt-3">---</span>
            <button class="detailsButt">Details</button>
          </article>
          <article
            class="d-flex flex-column align-items-center bg-light col-lg-3 mb-5 mb-lg-0"
          >
            <h4 class="fw-bold text-dark mt-5 PricingCardTitle">PLATINUM</h4>
            <div class="mt-5">
              <span id="CardsPrice">$90</span><span id="perMonth">/month</span>
            </div>
            <span class="cardsOffers mt-3">Gym Fitness</span>
            <span class="cardsOffers mt-3">Gym Events</span>
            <span class="cardsOffers mt-3">Cycling</span>
            <span class="cardsOffers mt-3">Yoga</span>
            <span class="cardsOffers mt-3">Body Building</span>
            <button class="detailsButt">Details</button>
          </article>
        </div>
      </div>
    </section>
    <?php include "inc/footer.php"; ?>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"
    ></script>
    <script src="js/index.js"></script>
  </body>
</html>
