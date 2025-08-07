<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    * {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

body {
	font-family: "Arial", sans-serif;
	background: #000;
	overflow: hidden;
	cursor: none;
}

.slideshow-container {
	position: relative;
	width: 100vw;
	height: 100vh;
	overflow: hidden;
}

.slide {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	opacity: 0;
	visibility: hidden;
	transition: all 1.2s cubic-bezier(0.23, 1, 0.32, 1);
	transform: scale(1.1) rotate(2deg);
}

.slide.active {
	opacity: 1;
	visibility: visible;
	transform: scale(1) rotate(0deg);
}

.slide.prev {
	transform: scale(0.9) rotate(-2deg) translateX(-50px);
	opacity: 0;
	visibility: hidden;
}

.slide.next {
	transform: scale(0.9) rotate(2deg) translateX(50px);
	opacity: 0;
	visibility: hidden;
}

.slide-background {
	position: absolute;
	top: -10%;
	left: -10%;
	width: 120%;
	height: 120%;
	background-size: cover;
	background-position: center;
	transform: skewX(-15deg);
	transition: transform 1.5s cubic-bezier(0.23, 1, 0.32, 1),
		opacity 1.2s cubic-bezier(0.23, 1, 0.32, 1);
	opacity: 0;
}

.slide.active .slide-background {
	transform: skewX(-5deg) scale(1.05);
	opacity: 1;
}

.slide-overlay {
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	background: linear-gradient(135deg, rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.1));
	transform: skewX(-10deg);
	transition: transform 1.2s cubic-bezier(0.23, 1, 0.32, 1);
}

.slide.active .slide-overlay {
	transform: skewX(-3deg);
}

.slide-content {
	position: absolute;
	top: 50%;
	left: 15%;
	transform: translateY(-50%);
	color: white;
	z-index: 10;
	opacity: 0;
	transform: translateY(-50%) translateX(-100px) skewX(-20deg);
	transition: all 1.5s cubic-bezier(0.23, 1, 0.32, 1);
}

.slide.active .slide-content {
	opacity: 1;
	transform: translateY(-50%) translateX(0) skewX(-5deg);
}

.slide-number {
	font-size: 8rem;
	font-weight: 900;
	line-height: 0.8;
	opacity: 0.7;
	margin-bottom: 1rem;
	transform: skewX(-25deg);
	background: linear-gradient(45deg, #ff0, #ffd);
	-webkit-background-clip: text;
	-webkit-text-fill-color: transparent;
	background-clip: text;
	filter: drop-shadow(0 0 20px rgba(0, 0, 0, 0.9))
		drop-shadow(2px 2px 4px rgba(0, 0, 0, 1))
		drop-shadow(-2px -2px 4px rgba(0, 0, 0, 0.8));
}

.slide-title {
	font-size: 4rem;
	font-weight: 700;
	margin-bottom: 1rem;
	text-transform: uppercase;
	letter-spacing: 0.1em;
	transform: skewX(-15deg);
	text-shadow: 0 0 30px rgba(0, 0, 0, 0.9), 2px 2px 8px rgba(0, 0, 0, 1),
		-2px -2px 8px rgba(0, 0, 0, 0.8), 4px 4px 15px rgba(0, 0, 0, 0.7);
}

.slide-description {
	font-size: 1.2rem;
	line-height: 1.6;
	max-width: 500px;
	opacity: 0.9;
	transform: skewX(-8deg);
	text-shadow: 0 0 20px rgba(0, 0, 0, 0.8), 1px 1px 4px rgba(0, 0, 0, 1);
}

.navigation {
	position: fixed;
	bottom: 40px;
	left: 50%;
	transform: translateX(-50%);
	display: flex;
	gap: 15px;
	z-index: 100;
}

.nav-dot {
	width: 12px;
	height: 12px;
	border-radius: 50%;
	background: rgba(255, 255, 255, 0.3);
	cursor: pointer;
	transition: all 0.3s ease;
	transform: skewX(-25deg);
}

.nav-dot.active {
	background: #ff6b6b;
	transform: scale(1.5) skewX(-10deg);
	box-shadow: 0 0 20px rgba(255, 107, 107, 0.8);
}

.nav-arrow {
	position: fixed;
	top: 50%;
	transform: translateY(-50%);
	width: 60px;
	height: 60px;
	border: 2px solid rgba(255, 255, 255, 0.3);
	background: rgba(255, 255, 255, 0.1);
	backdrop-filter: blur(10px);
	cursor: pointer;
	z-index: 100;
	display: flex;
	align-items: center;
	justify-content: center;
	transition: all 0.3s ease;
	transform: translateY(-50%) skewX(-20deg);
}

.nav-arrow:hover {
	border-color: #ff6b6b;
	background: rgba(255, 107, 107, 0.2);
	transform: translateY(-50%) skewX(-10deg) scale(1.1);
	box-shadow: 0 0 20px rgba(255, 107, 107, 0.3);
}

.nav-arrow.prev {
	left: 40px;
}

.nav-arrow.next {
	right: 40px;
}

.nav-arrow::after {
	content: "";
	width: 12px;
	height: 12px;
	border-top: 2px solid white;
	border-right: 2px solid white;
}

.nav-arrow.prev::after {
	transform: rotate(-135deg);
	margin-left: 5px;
}

.nav-arrow.next::after {
	transform: rotate(45deg);
	margin-right: 5px;
}

.progress-bar {
	position: fixed;
	bottom: 0;
	left: 0;
	height: 4px;
	background: linear-gradient(90deg, #ff6b6b, #4ecdc4);
	z-index: 100;
	transform-origin: left;
	transform: scaleX(0) skewX(-10deg);
	transition: transform 5s linear;
}

.slide-image {
	position: absolute;
	top: 50%;
	right: 10%;
	width: 400px;
	height: 300px;
	transform: translateY(-50%) skewX(-15deg) scale(0.8);
	opacity: 0;
	transition: all 1.5s cubic-bezier(0.23, 1, 0.32, 1);
	border-radius: 10px;
	overflow: hidden;
	box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
}

.slide.active .slide-image {
	transform: translateY(-50%) skewX(-5deg) scale(1);
	opacity: 1;
}

.slide-image img {
	width: 100%;
	height: 100%;
	object-fit: cover;
}

.custom-cursor {
	position: fixed;
	width: 20px;
	height: 20px;
	background: #ff6b6b;
	border-radius: 50%;
	pointer-events: none;
	z-index: 1000;
	mix-blend-mode: difference;
	transition: transform 0.1s ease;
}

@media (max-width: 768px) {
	.slide-title {
		font-size: 2.5rem;
	}

	.slide-number {
		font-size: 4rem;
	}

	.slide-content {
		left: 5%;
		right: 5%;
	}

	.slide-image {
		width: 250px;
		height: 180px;
		right: 5%;
	}

	.nav-arrow {
		width: 50px;
		height: 50px;
	}
}

</style>
<body>
    <a href="affichageacceuil.php" class="btn-retour" style="position:fixed;top:30px;left:30px;z-index:200;background:#fff;color:#212121;padding:10px 22px;border-radius:30px;text-decoration:none;font-weight:bold;box-shadow:0 2px 8px rgba(0,0,0,0.08);transition:background 0.2s;">
	<svg width="24" height="24" fill="currentColor" viewBox="0 0 24 24" transform="" id="injected-svg">
<!-- Boxicons v3.0 https://boxicons.com | License  https://docs.boxicons.com/free -->
<path d="M12.71 16.29 8.41 12l4.3-4.29-1.42-1.42L5.59 12l5.7 5.71z"/>
<path d="M16.29 6.29 10.59 12l5.7 5.71 1.42-1.42-4.3-4.29 4.3-4.29z"/>
    </svg>
    </a>
    <div class="slideshow-container">
	<div class="slide active">
		<div class="slide-background" style="background-image: url('./sary3.jpg')"></div>
		<div class="slide-overlay"></div>
		<div class="slide-content">
			<div class="slide-number">01</div>
			<h2 class="slide-title">Projet Universitaire</h2>
			<p class="slide-description">
				Ceci est un projet de l'Université FJKM Ravelojaona Mahajanga, réalisé par les étudiants de 2<sup>ème</sup> année en Informatique.
			</p>
		</div>
		<div class="slide-image">
			<img src="./sary3.jpg" alt="Projet Universitaire">
		</div>
	</div>

	<div class="slide">
		<div class="slide-background" style="background-image: url('https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=1200&q=80')"></div>
		<div class="slide-overlay"></div>
		<div class="slide-content">
			<div class="slide-number">02</div>
			<h2 class="slide-title">Partage ta passion de la lecture</h2>
			<p class="slide-description">
				La lecture ouvre l’esprit, nourrit l’imagination et fait voyager sans bouger.<br>
				Ose découvrir de nouveaux mondes à travers les livres et partage ta passion autour de toi.<br>
				<b>Un livre partagé, c’est une aventure multipliée !</b>
			</p>
		</div>
		<div class="slide-image">
			<img src="https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=400&q=80" alt="Motivation lecture">
		</div>
	</div>

	<div class="slide">
		<div class="slide-background" style="background-image: url('https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=1200&q=80')"></div>
		<div class="slide-overlay"></div>
		<div class="slide-content">
			<div class="slide-number">03</div>
			<h2 class="slide-title">Persévérance</h2>
			<p class="slide-description">
				Le succès n’est pas la clé du bonheur. Le bonheur est la clé du succès. Si tu aimes ce que tu fais, tu réussiras.
			</p>
		</div>
		<div class="slide-image">
			<img src="https://images.unsplash.com/photo-1464983953574-0892a716854b?auto=format&fit=crop&w=400&q=80" alt="Motivation 2">
		</div>
	</div>

	<div class="slide">
		<div class="slide-background" style="background-image: url('https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=1200&q=80')"></div>
		<div class="slide-overlay"></div>
		<div class="slide-content">
			<div class="slide-number">04</div>
			<h2 class="slide-title">Ose apprendre</h2>
			<p class="slide-description">
				Chaque jour est une nouvelle opportunité d’apprendre, de progresser et de devenir meilleur.
			</p>
		</div>
		<div class="slide-image">
			<img src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=400&q=80" alt="Motivation 3">
		</div>
	</div>

	<div class="slide">
		<div class="slide-background" style="background-image: url('https://images.unsplash.com/photo-1503676382389-4809596d5290?auto=format&fit=crop&w=1200&q=80')"></div>
		<div class="slide-overlay"></div>
		<div class="slide-content">
			<div class="slide-number">05</div>
			<h2 class="slide-title">Travail d'équipe</h2>
			<p class="slide-description">
				Ensemble, nous allons plus loin. Le partage et la collaboration sont les clés de la réussite.
			</p>
		</div>
		<div class="slide-image">
			<img src="https://images.unsplash.com/photo-1503676382389-4809596d5290?auto=format&fit=crop&w=400&q=80" alt="Motivation 4">
		</div>
	</div>
</div>

<div class="navigation">
	<div class="nav-dot active" data-slide="0"></div>
	<div class="nav-dot" data-slide="1"></div>
	<div class="nav-dot" data-slide="2"></div>
	<div class="nav-dot" data-slide="3"></div>
	<div class="nav-dot" data-slide="4"></div>
</div>

<div class="nav-arrow prev"></div>
<div class="nav-arrow next"></div>

<div class="progress-bar"></div>
<div class="custom-cursor"></div>
</body>
<script>
    class SlantedCarousel {
	constructor() {
		this.slides = document.querySelectorAll(".slide");
		this.navDots = document.querySelectorAll(".nav-dot");
		this.prevBtn = document.querySelector(".nav-arrow.prev");
		this.nextBtn = document.querySelector(".nav-arrow.next");
		this.progressBar = document.querySelector(".progress-bar");
		this.cursor = document.querySelector(".custom-cursor");

		this.currentSlide = 0;
		this.totalSlides = this.slides.length;
		this.isAnimating = false;
		this.autoPlayInterval = null;

		this.init();
	}

	init() {
		this.bindEvents();
		this.startAutoPlay();
		this.updateProgress();
	}

	bindEvents() {
		// Navigation arrows
		this.prevBtn.addEventListener("click", () => this.prevSlide());
		this.nextBtn.addEventListener("click", () => this.nextSlide());

		// Navigation dots
		this.navDots.forEach((dot, index) => {
			dot.addEventListener("click", () => this.goToSlide(index));
		});

		// Keyboard navigation
		document.addEventListener("keydown", (e) => {
			if (e.key === "ArrowLeft") this.prevSlide();
			if (e.key === "ArrowRight") this.nextSlide();
		});

		// Mouse events for auto-play
		document.addEventListener("mouseenter", () => this.stopAutoPlay());
		document.addEventListener("mouseleave", () => this.startAutoPlay());

		// Custom cursor
		document.addEventListener("mousemove", (e) => {
			this.cursor.style.left = e.clientX + "px";
			this.cursor.style.top = e.clientY + "px";
		});

		// Touch support
		let startX = 0;
		document.addEventListener("touchstart", (e) => {
			startX = e.touches[0].clientX;
		});

		document.addEventListener("touchend", (e) => {
			const endX = e.changedTouches[0].clientX;
			const diff = startX - endX;

			if (Math.abs(diff) > 50) {
				if (diff > 0) {
					this.nextSlide();
				} else {
					this.prevSlide();
				}
			}
		});
	}

	goToSlide(index) {
		if (this.isAnimating || index === this.currentSlide) return;

		this.isAnimating = true;

		// Update slides
		this.slides.forEach((slide, i) => {
			slide.classList.remove("active", "prev", "next");

			if (i === index) {
				slide.classList.add("active");
			} else if (i < index) {
				slide.classList.add("prev");
			} else {
				slide.classList.add("next");
			}
		});

		// Update navigation dots
		this.navDots.forEach((dot, i) => {
			dot.classList.toggle("active", i === index);
		});

		this.currentSlide = index;
		this.updateProgress();

		setTimeout(() => {
			this.isAnimating = false;
		}, 1500);
	}

	nextSlide() {
		const next = (this.currentSlide + 1) % this.totalSlides;
		this.goToSlide(next);
	}

	prevSlide() {
		const prev = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
		this.goToSlide(prev);
	}

	startAutoPlay() {
		this.stopAutoPlay();
		this.autoPlayInterval = setInterval(() => {
			this.nextSlide();
		}, 2000);

		this.progressBar.style.transform = "scaleX(1)";
	}

	stopAutoPlay() {
		if (this.autoPlayInterval) {
			clearInterval(this.autoPlayInterval);
			this.autoPlayInterval = null;
		}
		this.progressBar.style.transform = "scaleX(0)";
	}

	updateProgress() {
		this.progressBar.style.transition = "none";
		this.progressBar.style.transform = "scaleX(0)";

		setTimeout(() => {
			this.progressBar.style.transition = "transform 5s linear";
			if (this.autoPlayInterval) {
				this.progressBar.style.transform = "scaleX(1)";
			}
		}, 50);
	}
}

// Initialize carousel when DOM is loaded
document.addEventListener("DOMContentLoaded", () => {
	new SlantedCarousel();
});

// Add some extra visual flair
document.addEventListener("mousemove", (e) => {
	const mouseX = e.clientX / window.innerWidth;
	const mouseY = e.clientY / window.innerHeight;

	document.querySelectorAll(".slide-background").forEach((bg, i) => {
		const speed = (i + 1) * 0.5;
		const xPos = (mouseX - 0.5) * 1.5 * speed;
		const yPos = (mouseY - 0.5) * speed;

		bg.style.transform += ` translate(${xPos}px, ${yPos}px)`;
	});
});

</script>
</html>