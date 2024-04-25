<?php
session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true ){
    if(isset($_SESSION['id'])){
        header("location: officiallogin.php");
        die();

    }
    else{
        header("location: login.php");
        die();
    }



      exit;
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criminal Records</title>

    <link rel="stylesheet" href="style.css">


    
    <style>
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            
        }
        .wall img{
            width: 100%;
            height: 100%;
            /* position: absolute; */
            /* z-index: 1; */
            /* z-index: 45; */
            background-size: cover;
            background-position: center center;
            opacity: 0.6;
        }
        
        /* CSS styling */
.container {
  position: relative;
  text-align: center;
  color: white;
  background-color: black; /* Choose a text color that contrasts well with your image */
}

.container img {
    margin-top: 10px;
    margin-bottom: 10px;
  width: 50%;
  height: 80%;
  opacity: 0.9;
  border-radius: 50px;
  /* background-size: cover;
  background-position: center center; */
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  background-size: cover;
  background-position: center center;
  transform: translate(-50%, -50%);
  z-index: 1;
  /* Styling for the text */
  font-family: 'Arial', sans-serif;
  font-size: 20px; /* Adjust size as needed */
  font-weight: bold;
  text-shadow: 2px 2px 4px #000000; /* Text shadow for better readability */
  
  /* ... other styles ... */
  background-color: rgba(0, 0, 0, 0.8); /* Semi-transparent black background */
  padding: 20px; /* Add some padding around the text */
  border-radius: 50px; /* Optional: rounded corners for the background */

            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
}

.centered a {
  color: #00FF00; /* Style for the link */
  text-decoration: none;
  font-weight: bold;
  
}

.centered a:hover {
  text-decoration: underline;
}

footer {
    background-color: #333;
    color: wheat;
    overflow: hidden;
    display: flex;
    justify-content: center;
    padding: 50px;
    box-sizing: border-box;
}

.slider {
    overflow: hidden;
    width: 100%;
    height: 600px; /* Adjust the height as needed */
}

.slides {
    display: flex;
    width: 300%; /* Three images, each taking up 100% of the container */
}

.slides img {
    width: 100%;
    height: 100%;
    transition: transform 0.5s ease-in-out;
}

/* Hide scrollbar */
.slides::-webkit-scrollbar {
    display: none;
}
button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 2;
    background: rgb(0, 0, 0);
    border: none;
    padding: 10px;
    cursor: pointer;
    color: wheat;
}

#prevButton {
    left: 0;
}

#nextButton {
    right: 0;
}

</style>

</head>
<body>
    <header>
        <h1 class="CID">Crime Management System</h1>
        <nav>
            <div class="logo">
                <a href="index2.php">
                    <img class="rotate" src="ashok.jpg" alt="LOGO">
                </a>
            </div>
            <span class="btn">Welcome, <?php echo $_SESSION['username'] ?> </span> 
            <div class="items">
            <ul class="cta-buttons">
                
                <a href="index2.php" class="btn"style="background-color: aliceblue; color: black;">Home</a>
                <a href="complaint.php" class="btn">Register a complaint</a>
                <a href="TrackRecord.php" class="btn">Track your Complaint</a>
                <a href="contact_us.php" class="btn">Contact us</a>
                <a href="aboutus.php" class="btn">About us</a>
                <a href="logout.php" class="btn">Logout</a>
                

            </ul>
        </div></nav>
    </header>
        
    <section class="slider">
        <div class="slides">
            <img src="OIP.jpg" alt="Slide 1">
            <img src="dont be a victim.webp" alt="Slide 2">
            <img src="dbav.jpg" alt="Slide 3">
        </div>
        <button id="prevButton">Previous</button>
    <button id="nextButton">Next</button>
    
    </section>
    

<div class="container">
    <img src="OIP.jpg" alt="Background Image">
    <div class="centered">Welcome to the Crime Management System <br><br>
        <a href="aboutus.php">click here</a> for about us</div>
  </div>
  
    <footer>
        <p>&copy; 2024 Crime Management System</p>
    </footer>

<script>
// JavaScript for image slider
const slides = document.querySelector('.slides');
const images = document.querySelectorAll('.slides img');


let counter = 0;
const size = images[0].clientWidth;

setInterval(() => {
    slides.style.transition = 'transform 0.1s ease-in-out';
    slides.style.transform = `translateX(${-size * counter}px)`;

    if (counter === images.length - 1) {
        // If it's the last slide, stay for longer (e.g., 5 seconds)
        setTimeout(() => {
            slides.style.transition = 'transform 0.1s ease-out'; // Change transition to ease out
            slides.style.transform = `translateX(${-size * counter}px)`;
        }, 5000);
    }

    counter++;

    if (counter === images.length) {
        counter = 0;
        setTimeout(() => {
            // slides.style.transition = 'none';
            slides.style.transform = `translateX(2)`;
        }, 500);
    }
}, 3000);
// JavaScript for image slider

const prevButton = document.getElementById('prevButton');
const nextButton = document.getElementById('nextButton');

// let counter = 0;

// Function to go to the next slide
const nextSlide = () => {
    if (counter < images.length - 1) {
        counter++;
    } else {
        counter = 0;
    }
    slides.style.transition = 'transform 0.5s ease-in-out';
    slides.style.transform = `translateX(${-size * counter}px)`;
};

// Function to go to the previous slide
const prevSlide = () => {
    if (counter > 0) {
        counter--;
    } else {
        counter = images.length - 1;
    }
    slides.style.transition = 'transform 0.5s ease-in-out';
    slides.style.transform = `translateX(${-size * counter}px)`;
};

// Event listeners for the buttons
nextButton.addEventListener('click', nextSlide);
prevButton.addEventListener('click', prevSlide);

</script>

</body>
</html>