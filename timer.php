<?php
// timer.php

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Set exam duration if not already set in seconds (e.g., 30 minutes)
if (!isset($_SESSION['exam_duration'])) {
    $_SESSION['exam_duration'] = 0.5 * 60; // 30 minutes
}

// Set start time if not already set
if (!isset($_SESSION['start_time'])) {
    $_SESSION['start_time'] = time();
}

// Calculate remaining time
$elapsed_time = time() - $_SESSION['start_time'];
$remaining_time = $_SESSION['exam_duration'] - $elapsed_time;

// If time is up, redirect to a "Time's Up" page
if ($remaining_time <= 0) {
    header("Location: timesup.php");
    exit();
}
?>

<!-- JavaScript Countdown Timer -->
<div>
    <p>Time Remaining: <span id="timer"></span></p>
</div>
<script>
    var remainingTime = <?php echo $remaining_time; ?>;

    function startTimer() {
        var timerDisplay = document.getElementById('timer');
        var timer = setInterval(function() {
            var minutes = Math.floor(remainingTime / 60);
            var seconds = remainingTime % 60;

            timerDisplay.textContent =
                (minutes < 10 ? "0" : "") + minutes + ":" +
                (seconds < 10 ? "0" : "") + seconds;

            remainingTime--;

            // Redirect if time runs out
            if (remainingTime < 0) {
                clearInterval(timer);
                window.location.href = "timesup.php";
            }
        }, 1000);
    }

    // Start the timer on page load
    window.onload = startTimer;
</script>
