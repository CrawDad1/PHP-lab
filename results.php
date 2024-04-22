<?php
session_start();

// save form values to session for reuse
if (isset($_GET)){
    $_SESSION['formData'] = $_GET;
}

// set up sql connection
$wsuID = "f689u267";
$mysqli = new mysqli("localhost", $wsuID, $wsuID, $wsuID);
$query = 'SELECT * FROM agents;';
$results = $mysqli->query($query);
// aid, aname, city, percent
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <title>PHP project</title>    
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Results Page</title>
    </head>
    <body class="d-flex align-items-center justify-content-center" style="background-color: #0f0f0f; color:aliceblue">
        <div style="width:50%;">
            <h1 class="text-center">PHP PROJECT PAGE</h1>
            <h2 class="text-center">Results Page</h2>
            <div>
                <div class="container card" style="background-color: #303030;color: aliceblue;">
                    <div class="row my-3">
                        <h3>GET contains: </h3>
                        <?php
                        if (!empty($_GET)) {
                            echo "<ul>";
                            foreach ($_GET as $key => $value) {
                                echo "<li><strong>$key</strong>: $value</li>";
                            }
                            echo "</ul>";
                            } else {
                                echo "<p>No query variables found.</p>";
                            }
                        ?>
                    </div>
                    <div class="row my-3">
                        <table class="table">
                            <tr>
                                <th>aid</th>
                                <th>aname</th>
                                <th>city</th>
                                <th>percent</th>
                            </tr>
                                <?php
                                    while ($row = $results->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>{$row['aid']}</td>";
                                        echo "<td>{$row['aname']}</td>";
                                        echo "<td>{$row['city']}</td>";
                                        echo "<td>{$row['percent']}</td>";
                                        echo "</tr>";
                                    };
                                ?>
                        </table>
                    </div>
                    <div class="row my-3">
                        <a href="index.php" type="button" class="btn btn-primary">Seach Again</a>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>