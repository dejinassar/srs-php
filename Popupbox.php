<?php
include_once("Inc/header.php");
include_once("DB_Files/db.php");
?>
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<div class="popup-overlay">
    <div class="popup-box-container">
        <div class="check-container">
            <i class="uil uil-exclamation-octagon"></i>
        </div>
        <div class="popup-message-container">
            <h1>LOGIN REQUIRED!!!</h1>
            <p>Please log in to enroll in the course.</p>
        </div>
        <a href="courses.php">
            <button class="ok-btn">
                <span>OK</span>
            </button>
        </a>
    </div>
</div>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html,
    body {
        background-color: #f0f0f0; /* Changed background color */
        font-size: 18px;
        font-family: 'Titillium Web', sans-serif;
    }

    .popup-overlay {
        position: fixed;
        left: 0;
        top: 0;
        overflow-y: auto;
        overflow-x: hidden;
        background-color: rgba(0, 0, 0, 0.5);
        transition: .5s;
        -webkit-transition: 0.5s;
        -moz-transition: 0.5s;
        -o-transition: 0.5s;
        z-index: 1;
        width: 100vw;
        height: 100vh;
        user-select: none;
        display: flex;
        justify-content: center;
        align-items: center; /* Center vertically and horizontally */
    }

    .popup-box-container {
        background-color: #ffffff; /* Changed background color */
        width: 400px;
        text-align: center;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3); /* Added box shadow */
    }

    .check-container i {
        border-radius: 50%;
        color: red;
        opacity: 0.6;
        font-size: 70px;
        margin: 20px 0; /* Adjusted margin */
        padding: 20px;
    }

    .popup-message-container p {
        margin-top: 20px;
    }

    .ok-btn {
        background-color: #00bf8e;
        border: transparent;
        border-radius: 10px;
        padding: 10px 15px;
        color: #ffffff;
        margin-top: 15px;
        width: 25%;
        font-size: 18px;
        cursor: pointer;
        transition: background-color 0.3s; /* Smooth button hover effect */
    }

    .ok-btn:hover {
        background-color: #009e7c; /* Change button color on hover */
    }

    @media only screen and (max-width: 400px) {
        .popup-box-container {
            width: 300px;
        }
    }
</style>
