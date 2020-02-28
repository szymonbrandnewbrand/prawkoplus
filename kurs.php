<?php 
session_start();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="img/favicon.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prawko Plus - Kurs</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="kurs-style.css" rel="stylesheet">
</head>
<body>
    
    <div id="wrapper">
        <div class="container-fluid">
            <div class="row pt-5 mx-0 pl-2">
                <div class="text-white animate-hr">
                    <?php
                    if (isset($_SESSION['active'])) {
                        echo '<input type="button" value="Wróć do wyboru kursów" onClick="history.back();" style="background: none; border: none; color: #fff; padding: 0;"/>';
                    } else {
                        echo '<a href="index.php#search" class="mb-2">wróc do wyboru kursów</a>';
                    }
                    ?>
                    
                    <hr class="small-hr ml-0 mt-0">
                </div>
            </div>
            <div class="row m-0 justify-content-between">
                <div class="col-xl-7 text-center text-xl-left bg-white os-card mt-4">
                    <div id="os-card-header" class="os-card-header">

                    </div>
                    <hr>
                    <div id="os-description" class="row m-0">

                    </div>
                    <div id="os-ratings" class="mt-4">

                    </div>
                </div>
                <div class="col-xl-4 bg-white os-form d-flex align-items-center justify-content-center py-4 mt-4">
                    <div class="contact-form c-back side-form">
                        <h4 class="font-weight-bold text-center">Zapisz się na kurs już teraz!</h4>
                        <p id="form-text" class="text-center pt-4"></p>
                        <form class="pt-4 d-flex flex-column align-items-end" action="send_zapis.php" method="POST">
                            <div id="mail_osk"></div>
                            <div class="form-group w-100">
                                <input type="text"  name="name" class="form-control w-100" id="name" placeholder="Twoje imię" required>
                            </div>
                            <div class="form-group pt-2 pt-xl-3 w-100">
                                <input type="text"  name="nazwisko" class="form-control w-100" id="forname" placeholder="Twoje Nazwisko" required>
                            </div>
                            <div class="form-group pt-2 pt-xl-3 w-100">
                                <input type="email"  name="poczta" class="form-control w-100" id="poczta" placeholder="Twój email" required>
                            </div>
                            <div class="form-group pt-2 pt-xl-3 w-100">
                                <input type="tel"  name="tel" class="form-control w-100" id="tel" placeholder="Twój numer telefonu">
                            </div>
                            <div class="form-group form-check">
                                <label class="form-check-label f20">
                                    <input class="form-check-input" type="checkbox" required>
                                    <span style="padding: 0 10px; display: block;">Wyrażam zgodę na przetwarzanie moich danych osobowych zgodnie z <a href="regulamin.pdf" target="_blank" style="color: blue;">regulaminem</a></span>
                                </label>


                            </div>
                            <button type="submit" class="btn btn-primary btn-submicik">Zapisz się</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid position-relative text-white pt-0">
        <div class="row">
            <div class="col-md-2 d-flex flex-column justify-content-center align-items-center py-3 py-xl-1 ml-0 ml-xl-5">
                <div class="ml-0 pl-0 ml-xl-5 pl-xl-5">
                    <img class="d-none d-xl-block " src="img/logo.svg">
                    <img class="d-block d-xl-none" src="img/logo-mobile.svg">
                    <h4 class="text-center">Prawko Plus</h4>
                </div>

            </div>
            <div class="col-md-6 offset-md-2 d-flex justify-content-center flex-column">
                <div class="heading">
                    <p>Partnerzy</p>
                </div>
                <hr class="w-100">
                <div class="row px-3">
                    <h5>Chcesz dołączyć do programu bezpieczna droga? Śmiało napisz do nas! Niebawem może tu zabraknąć miejsca.</h5>
                </div>
            </div>
        </div>
    </footer>
<script src="js/kurs.js"></script>
</body>

</html>