# Training Plan Generator (Web Application)

This project is a web application developed as my final assignment for the 2nd-year web applications course. It was my first extensive project, built using HTML, CSS, JavaScript, and purely procedural PHP, with a MySQL database backend.

It's important to note that this application was developed a considerable time ago. While the codebase reflects an early stage in my programming journey, with minimal adherence to professional standards in terms of file structure and code organization, the application remains visually appealing and intuitive for the end-user. It serves as a valuable demonstration of my early development progress and learning curve.

## Overview

The "Training Plan Generator" is designed to help users create personalized weekly workout routines. Users can register and log in to manage their profiles and generate plans, or they can use a limited version of the application without logging in to get a sample training plan.

## Key Features

* **User Authentication:**
    * Allows users to register with an email and password.
    * Supports user login.
    * **Guest Access:** A simplified interface is available without logging in, enabling quick generation of a training plan.
* **Personalized Training Plan Generation:**
    * Users specify the desired number of training days per week (from 2 to 6).
    * The application intelligently suggests a training plan, distributing workouts across the days of the week (Monday - Sunday) based on a predefined logic for each day count.
    * For each day, the plan clearly displays:
        * The focus of the training session (e.g., specific muscle groups).
        * Individual exercises.
        * Recommended sets, repetitions, and rest periods.
        * Exercises are intelligently ordered for optimal workout flow.
* **Exercise Database & Filtering:**
    * Provides a searchable database of exercises.
    * Exercises can be filtered by the targeted muscle group. The database includes a predefined set of common gym exercises with their typical parameters (weights, reps, sets, rest).
* **User Profile Management:**
    * Users can update their profile information, including username, password, and the preferred number of training days per week.
    * Allows users to upload a profile picture.
* **Fully Responsive Design:**
    * The application is fully responsive, ensuring a seamless user experience across various devices and screen sizes.

## Technology Stack

* **Frontend:** HTML, CSS, JavaScript
* **Backend:** PHP (Procedural)
* **Database:** MySQL

## Setup and Installation

To set up and run the application, you will need a web server (e.g., Apache, Nginx) with PHP support and a MySQL database.

1.  **Clone the Repository:**
    ```bash
    git clone https://github.com/yenda420/training-plan.git
    cd training-plan
    ```
2.  **Web Server & PHP:**
    * Deploy the project files to your web server's document root.
    * Ensure PHP is correctly configured on your server.
3.  **Database Setup:**
    * Ensure a MySQL server is running.
    * Create a database (e.g., `training_app`).
    * Import the database schema and initial data (including exercises) from the `training_plan.sql` file into your MySQL database. (You'll need to locate the exact SQL file name from your project structure).
4.  **Database Connection:**
    * Configure the database connection details (hostname, username, password, database name) within the relevant PHP files of the application.
5.  **Access the Application:**
    * Open your web browser and navigate to the URL where the application is deployed.

## Project Documentation

Simple project documentation (in Czech) is available within the `web_info` directory.

## Development Reflections

This project marks a significant milestone as my first extensive solo web development endeavor. While the procedural PHP code and basic file structure reflect my early learning phase from approximately two years ago, it successfully delivers a functional and visually intuitive user experience. I've gained considerable knowledge and experience since then, and would undoubtedly architect and implement such a project with a much more refined and professional approach today. This application, therefore, stands as a clear illustration of my foundational skill development in web programming.
