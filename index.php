<?php 

$path = './content.json';
$jsonString = file_get_contents($path);
$jsonData = json_decode($jsonString, true);

$title = $jsonData['title'];
$sections = $jsonData['sections'];

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0"
		/>
		<link
			rel="stylesheet"
			href="./assets/styles/style.css"
		/>
		<title><?= $title; ?></title>
	</head>
	<body>
		<nav
			class="nav"
			id="nav"
		>
			<ul class="container container--nav nav__items">
				<li class="nav__item">
					<a
						href="#<?= $sections[1]['name']; ?>"
						class="nav-item__link"
					>
						About
					</a>
				</li>
				<li class="nav__item">
					<a
						href="#<?= $sections[2]['name']; ?>"
						class="nav-item__link"
					>
						Services
					</a>
				</li>
				<li class="nav__item nav__item--brand">
					<a
						href="#"
						class="nav-item__link"
					>
						<img src="./assets/images/brand.svg" />
					</a>
				</li>
				<li class="nav__item">
					<a
						href="#<?= $sections[3]['name']; ?>"
						class="nav-item__link"
					>
						Gallery
					</a>
				</li>
				<li class="nav__item">
					<a
						href="#<?= $sections[4]['name']; ?>"
						class="nav-item__link"
					>
						Booking
					</a>
				</li>
			</ul>
		</nav>
		<section
			class="<?= $sections[0]['name']; ?>"
			id="<?= $sections[0]['name']; ?>"
		>
			<div class="container">
				<h2 class="hero__subtitle"><?= $sections[0]['subtitle']; ?></h2>
				<h1 class="hero__title">
					<?= $sections[0]['title']; ?>
				</h1>
				<section class="hero__brand">
					<img src="<?= $sections[0]['brand']; ?>" />
				</section>
			</div>
			<section class="hero__image">
				<img
					srcset="<?= $sections[0]['image']['srcset']; ?>"
					src="<?= $sections[0]['image']['src']; ?>"
					alt=""
				/>
			</section>
		</section>
		<section
			class="<?= $sections[1]['name']; ?>"
			id="<?= $sections[1]['name']; ?>"
		>
			<div class="container">
				<h1 class="about__title"><?= $sections[1]['title']; ?></h1>
				<p class="about__text">
				<?= $sections[1]['text']; ?>
				</p>
			</div>
		</section>
		<section
			class="<?= $sections[2]['name']; ?>"
			id="<?= $sections[2]['name']; ?>"
		>
			<div class="container">
				<div class="services__content">
					<h1 class="services__title"><?= $sections[2]['title']; ?></h1>
					<p class="services__text">
					<?= $sections[2]['text']; ?>
					</p>
				</div>
				<div class="services__image">
					<img
						srcset="<?= $sections[2]['image']['srcset']; ?>"
						src="<?= $sections[2]['image']['src']; ?>"
						alt=""
					/>
				</div>
			</div>
		</section>
		<section
			class="<?= $sections[3]['name']; ?>"
			id="<?= $sections[3]['name']; ?>"
		>
			<div class="container">
				<h2 class="gallery__subtitle"><?= $sections[3]['subtitle']; ?></h2>
				<h1 class="gallery__title"><?= $sections[3]['title']; ?></h1>
				<? foreach($sections[3]['images'] as $row) { ?>
					<div class="gallery__row">
					<? foreach($row as $image) { ?>
						<img
							srcset="<?= $image['srcset']; ?>"
							src="<?= $image['src']; ?>"
							alt=""
						/>
					<? } ?>
					</div>
				<? } ?>
			</div>
		</section>
		<section
			class="<?= $sections[4]['name']; ?>"
			id="<?= $sections[4]['name']; ?>"
		>
			<div class="container">
				<h2 class="booking__subtitle"><?= $sections[4]['subtitle']; ?></h2>
				<section class="booking__content">
					<section class="booking__calendar">
						<div class="booking-calendar__controls">
							<div
								class="booking-calendar__arrow booking-calendar__arrow--left"
								onclick="moveMonth(-1)"
							>
								<svg
									xmlns="http://www.w3.org/2000/svg"
									width="42"
									height="25"
									viewBox="0 0 42 25"
									fill="none"
								>
									<path
										d="M29.708 22L39.208 12.5L29.708 3"
										stroke="white"
										stroke-width="3"
										stroke-linecap="square"
									/>
									<path
										d="M2 12.5H37.625"
										stroke="white"
										stroke-width="3"
										stroke-linecap="square"
									/>
								</svg>
							</div>
							<div class="booking-calendar__month">February 2023</div>
							<div
								class="booking-calendar__arrow"
								onclick="moveMonth(+1)"
							>
								<svg
									xmlns="http://www.w3.org/2000/svg"
									width="42"
									height="25"
									viewBox="0 0 42 25"
									fill="none"
								>
									<path
										d="M29.708 22L39.208 12.5L29.708 3"
										stroke="white"
										stroke-width="3"
										stroke-linecap="square"
									/>
									<path
										d="M2 12.5H37.625"
										stroke="white"
										stroke-width="3"
										stroke-linecap="square"
									/>
								</svg>
							</div>
						</div>
						<div class="booking-calendar__body">
							<ul class="booking-calendar__row booking-calendar__row--header">
								<li class="booking-calendar__item">Mon</li>
								<li class="booking-calendar__item">Tue</li>
								<li class="booking-calendar__item">Wen</li>
								<li class="booking-calendar__item">Thu</li>
								<li class="booking-calendar__item">Fri</li>
								<li class="booking-calendar__item">Sat</li>
								<li class="booking-calendar__item">Sun</li>
							</ul>
							<ul class="booking-calendar__row">
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
							</ul>
							<ul class="booking-calendar__row">
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
							</ul>
							<ul class="booking-calendar__row">
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
							</ul>
							<ul class="booking-calendar__row">
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
							</ul>
							<ul class="booking-calendar__row">
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
								<li class="booking-calendar__item"></li>
							</ul>
						</div>
						<ul class="booking-calendar__legend">
							<li class="booking-calendar-legend">Available</li>
							<li
								class="booking-calendar-legend booking-calendar-legend--unavailable"
							>
								Unavailable
							</li>
						</ul>
					</section>
					<form
						action=""
						class="booking__form"
					>
						<div class="booking-form__item">
							<input
								type="text"
								class="booking-form__input"
								required="true"
								placeholder="Full name"
								name="Full name"
							/>
						</div>
						<div class="booking-form__item">
							<input
								type="email"
								class="booking-form__input"
								required="true"
								placeholder="Email address"
								name="Email address"
							/>
						</div>
						<div class="booking-form__item">
							<input
								type="text"
								class="booking-form__input"
								required="true"
								placeholder="Phone number"
								name="Phone number"
							/>
						</div>
						<div class="booking-form__item">
							<input
								type="text"
								class="booking-form__input"
								required="true"
								placeholder="Your inqury"
								name="Inqury"
							/>
						</div>
						<div class="booking-form__item">
							<input
								type="submit"
								class="booking-form__button"
								value="Send"
							/>
						</div>
					</form>
				</section>
			</div>
		</section>
		<footer class="footer">
			<div class="container">
				<span class="footer__copyright"> All rights reserved ©2023 </span>
				<a
					href="#nav"
					class="footer__back-to-top"
				>
					↑ Back to top
				</a>
			</div>
		</footer>
		<script src="./assets/scripts/calendar.js"></script>
		<script src="./assets/scripts/booking.js"></script>
	</body>
</html>
