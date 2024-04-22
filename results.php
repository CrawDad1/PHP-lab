<?php
session_start();

// save form values to session for reuse
if (isset($_GET)){
    $_SESSION['formData'] = $_GET;
}

$pName = (isset($_GET['pName'])) ? ($_GET['pName']) : ('');
$wCity = (isset($_GET['wCity'])) ? ($_GET['wCity']) : ('');

// set up sql connection
$wsuID = "f689u267";
$mysqli = new mysqli("localhost", $wsuID, $wsuID, $wsuID);
$query = "SELECT pid, pname, city, price, quantity FROM products " . 
"WHERE pname LIKE '%" . $_GET['pName'] . "%' " . 
"AND city LIKE '%" . $_GET['wCity'] . "%' "; 

// make conditions
if (is_numeric($_GET['minQ'])) {
    $query = $query . "AND quantity >= {$_GET['minQ']} ";
}

if (is_numeric($_GET['maxQ'])) {
    $query = $query . "AND quantity <= {$_GET['maxQ']} ";
}

if (is_numeric($_GET['minPrice'])) {
    $query = $query . "AND price >= {$_GET['minPrice']} ";
}

if (is_numeric($_GET['maxPrice'])) {
    $query = $query . "AND price <= {$_GET['maxPrice']} ";
}

$query = $query . ";";


$results = $mysqli->query($query);
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
            <h1 class="text-center">Crawford's Project Products</h1>
            <h2 class="text-center">Results Page</h2>
            <!-- print query for testing
                <?php
                echo "<h2 class='text-center'>{$query}</h2>";
            ?> -->
            <div>
                <div class="container card" style="background-color: #303030;color: aliceblue;">
                    <!-- print GET for testing
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
                    </div> -->
                    <div class="row my-3 justify-content-center">
                        <div style="width:80%;">
                        <table class="table" style="color: white;">
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                                <?php
                                    if ($results->num_rows < 1){
                                        // no results
                                        echo "</table>";
                                        echo "<p>No results found</p>";
                                    }
                                    else {
                                        while ($row = $results->fetch_assoc()) {
                                            // pid, pname, city, price, quantity
                                            echo "<tr>";
                                            echo "<td>{$row['pid']}</td>";
                                            echo "<td>{$row['pname']}</td>";
                                            echo "<td>{$row['city']}</td>";
                                            echo "<td>{$row['quantity']}</td>";
                                            echo "<td>{$row['price']}</td>";
                                            echo "</tr>";
                                        };
                                        echo "</table>";
                                    };
                                ?>
                        </table>
                    </div>
                    <div class="row my-3" style="width:80%;">
                        <a href="index.php" type="button" class="btn btn-primary">Seach Again</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>