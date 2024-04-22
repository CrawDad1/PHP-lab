<?php
session_start();

// initialize form variables
$pName = "";
$wCity = "";
$minQ = "";
$maxQ = "";
$minPrice = "";
$maxPrice = "";

// retrieve values from session if available
if (isset($_SESSION['formData'])) {
    $pName = $_SESSION['formData']['pName'];
    $wCity = $_SESSION['formData']['wCity'];
    $minQ = $_SESSION['formData']['minQ'];
    $maxQ = $_SESSION['formData']['maxQ'];
    $minPrice = $_SESSION['formData']['minPrice'];
    $maxPrice = $_SESSION['formData']['maxPrice'];
}
?>
<!doctype html>
<html lang="en" style="background-color: #0f0f0f;">
    <?php
    ?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">
        <title>PHP project</title>    
        <!-- Bootstrap core CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <style>
        .text-input{
            width: 100%;
            background-color: #404040;
            color: aliceblue;
        }
    </style>

    <body class="d-flex align-items-center justify-content-center" style="background-color: #0f0f0f; color:aliceblue; height:100%;">
        <div style="width:50%;">
            <h1 class="text-center">Crawford's Project Products</h1>
            <h2 class="text-center">Product Search</h2>
            <div>
                <form method="GET" action="results.php">
                    <div class="container card" style="background-color: #303030;color: aliceblue;">
                        <div class="row mx-1 my-2">
                            <label class="p-0" for="pName">Product Name (substring)</label>
                            <input value="<?= $pName ?>" class="text-input" type="text" name="pName" id="pName">
                        </div>
                        <div class="row mx-1 my-2">
                            <label class="p-0" for="wCity">Warehouse City (substring)</label>
                            <input value="<?= $wCity ?>"  class="text-input" type="text" name="wCity" id="wCity">
                        </div>
                        <div class="row my-2">
                            <div class="col me-2">
                                <label for="minQ">Minimum Quantity</label>
                                <br/>
                                <input value="<?= $minQ ?>" class="text-input"  type="text" name="minQ" id="minQ">
                            </div>
                            <div class="col">
                                <label for="maxQ">Maximum Quantity</label>
                                <br/>
                                <input value="<?= $maxQ ?>" class="text-input"  type="text" name="maxQ" id="maxQ">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col me-2">
                                <label for="minPrice">Minimum Price</label>
                                <br/>
                                <input value="<?= $minPrice ?>" class="text-input"  type="text" name="minPrice" id="minPrice">
                            </div>
                            <div class="col">
                                <label for="maxPrice">Maximum Price</label>
                                <br/>
                                <input value="<?= $maxPrice ?>" class="text-input"  type="text" name="maxPrice" id="maxPrice">
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class="col justify-self-center">
                                <button type="button" class="btn btn-secondary w-100" id="clear_button">Clear Form</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary w-100" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
    <script>
        window.onload = function() {
            document.getElementById('clear_button').onclick = function() {
                var inputs = Array.from(document.getElementsByTagName('input'));
                inputs.forEach(element => {
                    element.value = '';
                });
            };
        };
    </script>
</html>