<?php
session_start();
$_SESSION['active']=1;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="img/favicon.ico" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Prawko Plus+</title>
	<link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery-3.4.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
	<link href="style.css" rel="stylesheet">
</head>

<body>
	<div class="wrapper text-white">
		<header class="container-fluid header p-0">
			<div class="row">
				<div class="col-9 ml-auto ml-xl-0 col-xl-5 p-0">
					<div class="heading mb-4">
						<h1>Wyszukiwarka kursów prawa jazdy plus</h1>
					</div>
					<hr class="hr-margin-left">
					<div class="heading-p mt-4 mt-xl-5 ">
						<p>
							Porównaj setki ośrodków i wybierz ten, który pasuje do Ciebie! Najlepsze ośrodki i kursy w
							jednym miejscu. Dzięki nam zapis jest łatwy i intuicyjny.

						</p>
					</div>
					<div class="row mx-0 small-row d-none d-xl-flex">
						<div class="w-40 animate-hr">
							<a href="#about">Kim jesteśmy</a>
							<hr class="small-hr ml-0">
						</div>
						<div class="w-40 animate-hr">
							<a href="#contact">Kontakt</a>
							<hr class="small-hr ml-0">
						</div>
					</div>
				</div>
				<div class="col-md-1 offset-md-1 d-none d-xl-flex flex-column justify-content-end mb-4 pl-0 arrows">
					<div class="arrowDown arrow1 mb-3"></div>
					<div class="arrowDown arrow2 mb-3"></div>
					<div class="arrowDown arrow3 mb-3"></div>
				</div>
				<div
					class="col-9 col-xl-3 offset-xl-2 d-block ml-auto pl-0 pl-xl-1 d-xl-flex mt-5 mt-xl-5 flex-column justify-content-end">
					<div>
						<div class="heading">
							<h3>Prawko Plus</h3>
						</div>
						<hr class="hr-margin-right">
						<div class="heading-p">
							<p>Znajdź kurs pasujący do Ciebie.</p>
						</div>
					</div>
				</div>
			</div>
		</header>
		<section id="search" class="search container-fluid p-0">
			<div class="row">
				<div class="col-9 col-xl-3 ml-auto ml-xl-0 px-0">
					<div class="search-left">
						<div class="heading">
							<h3>Znajdź kurs</h3>
						</div>
						<hr class="hr-margin-left hr-search hr-100">
						<div class="heading-p">
							<p>
								Oszczędź swój czas i wybierz sprawdzoną przez naszych kursantów szkołę nauki jazdy.
							</p>
							<p>
								Odwiedź regulamin <a href="regulamin.html" target="_blank" class="hover_text">idealnego Ośrkodka Szkolenia Kierowców</a> - dowiedz się czy wybrany ośrodek spełnia ważne dla Ciebie kryteria.
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-8 offset-xl-1 offset-md-0 p-0">
					<div class="search-box bg-white">
						<div class="content row mx-0">
							<div class="search-tab d-flex align-items-center tab-left col-9 col-xl-9 bg-custom-purple">
								<div class="col-md-4">
									<select id="city" onchange="changeSort(true)" class="browser-default custom-select select1">
										<option value='1' selected>miasto</option>
									</select>
								</div>
								<div class="col-md-5">
									<select id="category" onchange="changeSort(true)" class="browser-default custom-select select2">
										<option value='1' selected>kategoria kursu</option>
									</select>
								</div>
							</div>
							<div class="search-tab col-3 col-xl-3 d-flex align-items-center tab-right">
								<select id="starPrice" onchange="starPrice(this.value, true)" class="browser-default custom-select sort">
									<option value="s" selected>sortuj</option>
									<option value="0">ocena malejąco</option>
									<option value="2">ocena rosnąco</option>
									<option value="1">cena rosnąco</option>
									<option value="3">cena malejąco</option>

								</select>
							</div>
							<div id="search-list" class="search-list m-0 position-relative">


							</div>
							<div id="search-list-mobile" class="search-list m-0 position-relative">


							</div>
							<div class="cyferki d-flex c-back justify-content-center pb-5">
								<button onclick="activeC(-1)" class="search-arrows arrowLeft"></button>
								<div id="numerki" class="numerki d-flex align-items-center"></div>
								<button onclick="activeC(1)" class="search-arrows arrowRight"></button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section id="about" class="about container-fluid position-relative p-0 p-md-1">
			<div class="leftImg position-absolute d-none d-xl-block">
				<img class="img-fluid" src="img/left1280.svg">
			</div>
			<div class="row">
				<div class="col-9 col-xl-8 offset-3 offset-xl-4 px-0">
					<div class="about-content">
						<div class="heading pb-3">
							<h3>Kim jesteśmy?</h3>
						</div>
						<hr class="hr-margin-right hr-100">
						<div class="pt-3">
							<p>
								Jesteśmy portalem, który umożliwi Ci znalezienie idealnego ośrodka. Stworzyliśmy regulamin <a href="regulamin.html" target="_blank" class="hover_text">idealnego Ośrodka Szkolenia Kierowców</a> – szkołę nauki jazdy, która spełnia wszystkie standardy.
							</p>
							<p>
								Opracowaliśmy wzór idealnego ośrodka szkoleniowego. Na podstawie wytycznych, kursanci
								oceniają czy wybrana przez nich szkoła jazdy wpasowała się w kryteria.
							</p>
						</div>
					</div>
				</div>
			</div>
			<img src="img/about-content-mobile-img.svg" class="img-fluid d-block d-md-none">
		</section>
		<section class="join container-fluid px-0 px-xl-1">
			<div class="row">
				<div class="col-12 col-md-6 pl-0 pl-xl-1">
					<div class="col-9 col-xl-10 ml-auto ml-xl-0 px-0 px-xl-1 offset-md-2 offset-custom">
						<div class="heading pb-3">
							<h3>Chcesz dołączyć?</h3>
						</div>
						<hr class="hr-margin-left hr-join hr-100">
						<div class="join-left">
							<p>
								Organizacja Prawko Plus dąży do standaryzacji procesów szkolenia kierowców. Dołącz do
								nas w trzech prostych krokach i spraw, aby Twój ośrodek stał się rozpoznawalny.
							</p>
						</div>
					</div>
					<div class="d-none d-xl-block col-md-8 mb-5 mb-md-4">
						<img class="img-fluid" src="img/streetUp.svg">
					</div>
					<div class="d-none d-xl-block col-md-8 offset-md-2 pl-cus">
						<img class="img-fluid" src="img/streetDown.svg">
					</div>
					<div class="d-block d-xl-none col-12 col-md-8 offset-md-2 pl-cus">
						<img class="img-fluid" src="img/street-mobile.png">
					</div>
				</div>
				<div class="steps col-md-4 offset-md-2 px-xl-0">
					<div class="step d-flex">
						<div class="dot"></div>
						<div class="step-content">
							<h4>Krok 1</h4>
							<hr class="w-75 ml-0">
							<p>ROZPOZNANIE</p>
							<p class="f24">1. Odwiedź stronę <a href="#">Prawko Plus EXPERT</a>.
							</p>
						</div>
					</div>
					<div class="step d-flex">
						<div class="dot"></div>
						<div class="step-content">
							<h4>Krok 2</h4>
							<hr class="w-75 ml-0">
							<p>WYBÓR</p>
							<p class="f24">2. Wybierz spośród naszych ofert najlepszą dla siebie.
							</p>
						</div>
					</div>
					<div class="step d-flex">
						<div class="dot"></div>
						<div class="step-content">
							<h4>Krok 3</h4>
							<hr class="w-75 ml-0">
							<p>WSPÓŁPRACA</p>
							<p class="f24">3. Ciesz się nowymi klientami dla Tojego interesu.</p>
						</div>
					</div>
				</div>

			</div>
		</section>
		<section id="contact" class="contact container-fluid px-0">
			<div class="row">
				<div class="col-9 col-md-4 offset-3 offset-md-1 pl-0 px-xl-0">
					<div class="heading pb-3">
						<h3>Odezwij się</h3>
					</div>
					<hr class="hr-margin-left hr-join hr-100">
					<div class="pt-5 mb-4 pt1700">
						<p class="f24">
							Skontaktuj się z nami i dowiedz się więcej.
						</p>
					</div>
					<div class="adress mb-4">
						<p class="f24 mb-1">Adres</p>
						<p class="f24">Na Załęczu 1D 30-716 Kraków </p>
					</div>
					<div class="telefon mb-4">
						<p class="f24 mb-1">Telefon</p>
						<p class="f24">Janusz Kowalski: 533-455-785</p>
					</div>
					<div class="email mb-4">
						<p class="f24 mb-1">Email</p>
						<p class="f24">janusz.kowalski@onet.pl </p>
					</div>
					<div class="sm col-8 col-xl-5 d-flex px-0 justify-content-between mt-4 pt-4">
						<a class="icon" href="#"><i class="fab fa-facebook-square text-white"></i></a>
						<a class="icon" href="#"><i class="fab fa-instagram text-white"></i></a>
						<a class="icon" href="#"><i class="fab fa-youtube text-white"></i></a>
					</div>
				</div>
				<div class="contact-form px-0 px-xl-1 col-md-5 offset-xl-2 c-back bg-white d-flex flex-column align-items-center">
					<h4 class="font-weight-bold mb-5">Formularz kontaktowy</h4>
					<form action="send_wiad.php" method="POST" class="d-flex flex-column align-items-end">
						<div class="form-group w-100">
							<input type="text" name="name" class="form-control" id="name" placeholder="Twoje imię">
						</div>
						<div class="form-group w-100">
							<input type="text" name="nazwisko" class="form-control" id="forname" placeholder="Twoje Nazwisko">
						</div>
						<div class="form-group w-100">
							<input type="email" name="email" class="form-control" id="email" placeholder="Twój email">
						</div>
						<div class="form-group pt-3 w-100">
							<textarea name="wiad" class="form-control p-4" id="message" placeholder="Wiadomość"></textarea>
						</div>
						<div class="form-group form-check w-75 mx-auto">
							<label class="form-check-label f20">
                                <input class="form-check-input" type="checkbox" required>
                                <span style="padding: 0 10px; display: block;">Wyrażam zgodę na przetwarzanie moich danych osobowych zgodnie z <a href="regulamin.pdf" target="_blank" style="color: blue;">regulaminem</a></span>
                            </label>

						</div>
						<button type="submit" class="btn btn-primary btn-submicik mr-5">Wyślij</button>
					</form>
				</div>
			</div>
		</section>
	</div>

	<footer class="container-fluid position-relative text-white pt-0">
		<div class="row">
			<div
				class="col-md-2  d-flex flex-column justify-content-center align-items-center py-3 py-xl-1 ml-0 ml-xl-5">
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

	<script src="js/index.js"></script>
</body>

</html>