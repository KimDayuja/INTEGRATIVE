<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Theater</title>
    <link href="<?=ROOT?>/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=ROOT?>/assets/css/sidebar/sidebar.css" rel="stylesheet">
    <link href="<?=ROOT?>/assets/css/sidebar/theater.css" rel="stylesheet">
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
                <h1>Theater Management</h1>
                <p>Welcome to the theater management panel. Here you can manage movies, reservations, customers, and more.</p>

                <!-- Buttons -->
                <div class="mb-3">
                    <button type="button" class="btn btn-primary mr-2">New Theater</button>
                    <button type="button" class="btn btn-danger">New Screen</button>
                </div>

                <!-- Tables -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Theater Table -->
                                <div>
                                    <h2>Theater</h2>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Title</th>
                                                <th>Description</th>
                                                <th>Location</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                // Establish database connection
                                                $host = 'localhost';
                                                $dbname = 'bookingsystem';
                                                $user = 'root';
                                                $password = '';

                                                try {
                                                    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
                                                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                                } catch (PDOException $e) {
                                                    echo "Connection failed: " . $e->getMessage();
                                                    exit();
                                                }

                                                // Fetch data from movies table
                                                try {
                                                    $stmt = $pdo->query("SELECT * FROM theater");
                                                    $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                } catch (PDOException $e) {
                                                    echo "Error: " . $e->getMessage();
                                                    exit();
                                                }

                                                // Display data in table rows
                                                foreach ($movies as $movie) {
                                                    echo "<tr>";
                                                    echo "<td>{$movie['TheaterID']}</td>";
                                                    echo "<td>{$movie['Name']}</td>";
                                                    echo "<td>{$movie['Location']}</td>";
                                                    echo "<td>";
                                                    echo "<div class='dropdown'>";
                                                    echo "<button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Action</button>";
                                                    echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
                                                    echo "<a class='dropdown-item' href='#'>Update</a>";
                                                    echo "<a class='dropdown-item' href='#'>Delete</a>";
                                                    echo "<a class='dropdown-item' href='#'>Add</a>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <!-- Screen Table -->
                                <div>
                                    <h2>Screen</h2>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Theater</th>
                                                <th>Screen</th>
                                                <th>Movie</th>
                                                <th>Seat(s)</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                // Fetch data from reservations table
                                                try {
                                                    $stmt = $pdo->query("SELECT * FROM screen");
                                                    $screens = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                                } catch (PDOException $e) {
                                                    echo "Error: " . $e->getMessage();
                                                    exit();
                                                }

                                                // Display data in table rows
                                                foreach ($screens as $screen) {
                                                    echo "<tr>";
                                                    echo "<td>{$screen['ScreenID']}</td>";
                                                    echo "<td>{$screen['TheaterID']}</td>";
                                                    echo "<td>{$screen['ScreenName']}</td>";
                                                    echo "<td>{$screen['Capacity']}</td>";
                                                    echo "<td>";
                                                    echo "<div class='dropdown'>";

                                                    echo "<button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>Action</button>";
                                                    echo "<div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>";
                                                    echo "<a class='dropdown-item' href='#'>Update</a>";
                                                    echo "<a class='dropdown-item' href='#'>Delete</a>";
                                                    echo "</div>";
                                                    echo "</div>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery -->
    <script src="<?=ROOT?>/assets/js/bootstrap.bundle.min.js"></script>
    <script>
        // JavaScript to toggle dropdown menu visibility
        $('.dropdown-toggle').click(function() {
            $(this).next('.dropdown-menu').toggle();
        });
    </script>
</body>

</html>
