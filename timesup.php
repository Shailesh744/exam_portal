<?php include 'inc/header.php'; ?>
<?php
Session::checkSession();
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Time's Up</h1>
            <p>Your exam time has expired.</p>
            <a href="final.php" class="btn btn-primary">View Results</a>
        </div>
    </div>
</div>
<?php include 'inc/footer.php'; ?>
