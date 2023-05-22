<?php
$lunghezza = $_GET['lunghezza'];

$digits    = array_flip(range('0', '9'));
$lowercase = array_flip(range('a', 'z'));
$uppercase = array_flip(range('A', 'Z')); 
$special   = array_flip(str_split('!@#$%^&*()_+=-}{[}]\|;:<>?/'));
$combined  = array_merge($digits, $lowercase, $uppercase, $special);

$password  = str_shuffle(array_rand($digits) .
                         array_rand($lowercase) .
                         array_rand($uppercase) . 
                         array_rand($special) . 
                         implode(array_rand($combined, rand(0, intval($lunghezza)))));



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        body{
            background-color: rgb(0 23 50);
            color: white;
        }
        .myContainer{
            width: 80%;
            height: 80%;
            margin: auto;
        }
        h1{
            color: rgb(128 139 153);
        }
        input{
            max-width: 100px;
        }
        .card{
            max-width: 50%;
            margin: auto;
        }
    </style>
    <title>php-strong-password-generator</title>
</head>
<body>
    <div class="myContainer">
        <div class="text-center">
            <h1>Strong Password Generator</h1>
            <h2>Genera una password sicura</h2>
        </div>
        <div class="card">
            <div class="card-header">
                <?php 
                echo $password;
                ?>
            </div>
            <div class="card-body">
                <form method="GET">
                    <div class="mb-3 d-flex justify-content-between">
                        <label class="form-label">Lunghezza Password</label>
                        <input type="number" class="form-control" name="lunghezza">
                    </div>
                    <div class="mb-3 d-flex justify-content-between">
                        <label class="form-label">Consenti ripetizioni di uno o più caratteri</label>
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Yes
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    No
                                </label>
                            </div>
                            <div class="mb-1 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Lettere</label>
                            </div>
                            <div class="mb-1 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Numeri</label>
                            </div>
                            <div class="mb-1 form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Simboli</label>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Invia</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>