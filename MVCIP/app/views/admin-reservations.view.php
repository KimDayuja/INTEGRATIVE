<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Theater</title>
    <link href="<?=ROOT?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=ROOT?>/assets/css/sidebar/sidebar.css" rel="stylesheet">
    <style>
    </style>
</head>
<body>
    <div class="container-fluid" style="padding-left: 0;">
        <div class="row">
            <div class="col-3">
                <!-- Sidebar -->
                <?php include 'shared/sidebar.view.php'; ?>
            </div>

            <div class="col-9">
                <!-- Main Content -->
                <h1>RESERVATIONS</h1>
                <p>Welcome to the theater management panel. Here you can manage movies, reservations, customers, and more.</p>

                <!-- Add your content here -->
                <div>
                    <h2>Upcoming Movies</h2>
                    <ul>
                        <li>Movie 1: Description, Date, etc.</li>
                        <li>Movie 2: Description, Date, etc.</li>
                        <!-- Add more movie information here -->
                    </ul>
                </div>

                <div>
                    <h2>Reservations</h2>
                    <p>Manage reservations for the theater.</p>
                    <!-- Add reservation management content here -->
                </div>
            </div>
        </div>
    </div>

    <script src="<?=ROOT?>/assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
