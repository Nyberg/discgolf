
@extends('fp')

@section('content')

<!-- =========================
     PRE LOADER
============================== -->
<div class="preloader">
  <div class="status">&nbsp;</div>
</div>

<!-- =========================
     HEADER
============================== -->
<header id="home">

<!-- COLOR OVER IMAGE -->
<div class="color-overlay">

	<div class="navigation-header">

		<!-- STICKY NAVIGATION -->
		<div class="navbar navbar-inverse bs-docs-nav navbar-fixed-top sticky-navigation">
			<div class="container">
				<div class="navbar-header">

					<!-- LOGO ON STICKY NAV BAR -->
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#landx-navigation">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand margin-top" href="/"><img src="/img/front/logo.png" alt=""></a>

				</div>

				<!-- NAVIGATION LINKS -->
				<div class="navbar-collapse collapse" id="landx-navigation">
					<ul class="nav navbar-nav navbar-right main-navigation">
						<li><a href="#home">Startsida</a></li>
						<li><a href="#section1">Funktioner</a></li>
						<li><a href="#section6">Screenshots</a></li>
						<li><a href="#section7">Om Projektet</a></li>
						<li><a href="#section8">Bli medlem</a></li>
					</ul>
				</div>

			</div>
			<!-- /END CONTAINER -->

		</div>

		<!-- /END STICKY NAVIGATION -->

		<!-- ONLY LOGO ON HEADER -->
		<div class="navbar non-sticky">

			<div class="container">

				<div class="navbar-header">
					<img src="images/logo.png" alt="">
				</div>

				<ul class="nav navbar-nav navbar-right social-navigation hidden-xs">
					<li><a href="#"><i class="social_facebook_circle"></i></a></li>
					<li><a href="#"><i class="social_twitter_circle"></i></a></li>
					<li><a href="#"><i class="social_linkedin_circle"></i></a></li>
				</ul>
			</div>
			<!-- /END CONTAINER -->

		</div>
		<!-- /END ONLY LOGO ON HEADER -->

	</div>

	<!-- HEADING, FEATURES AND REGISTRATION FORM CONTAINER -->
	<div class="container">

		<div class="row">
            <!-- RIGHT - HEADING AND TEXTS -->
			<div class="col-md-12 intro-section">

				<h1 class="intro text-left">
				<span class="strong colored-text">Förbättra</span> ditt spel med <strong class="strong colored-text">Penguin Project! (alfa)</strong>
				</h1>

				<p class="sub-heading text-left">
				    Penguin Project är en ide som ska hjälpa Svensk Discgolf att växa - både för spelare och banor runt om i Sverige.
				</p>

				<!-- CTA BUTTONS -->
				<div id="cta-5" class="button-container">

				<a href="/login" class="btn standard-button pull-left">Logga in</a>
				<a href="#section1" class="btn secondary-button-white pull-left">Läs mer!</a>

				</div>

			</div>

		</div>

	</div>
	<!-- /END HEADING, FEATURES AND REGISTRATION FORM CONTAINER -->

</div>

</header>


<!-- =========================
     SECTION 1
============================== -->
<section class="section1" id="section1">

<div class="container">

	<!-- SECTION HEADING -->

	<h2>Penguin Projects Funktioner</h2>

	<div class="colored-line">
	</div>

	<div class="sub-heading">
		Nedan kan du läsa lite om några av de funktioner som finns.
	</div>

	<div class="features">

		<!-- FEATURES ROW 1 -->
		<div class="row">

			<!-- SINGLE FEATURE BOX -->
			<div class="col-md-4">
				<div class="feature">
					<div class="icon">
						<span class="icon_pin_alt"></span>
					</div>
					<h4>Banor</h4>
					<p>
                        Se detaljerad information om alla banor i Sverige, olika tees, hål samt se statistik för din bana. Läs banrecensioner, se Aces och rekordrundor!
					</p>
				</div>
			</div>

			<!-- SINGLE FEATURE BOX -->
			<div class="col-md-4">
				<div class="feature">
					<div class="icon">
						<span class="icon_star_alt"></span>
					</div>
					<h4>Rundor</h4>
					<p>
                        Lägg upp dina rundor, se dina resultat, jämför med andra rundor och se ditt snitt. Du kan även kan se rundor i olika väder och vind-förhållanden.
					</p>
				</div>
			</div>

			<!-- SINGLE FEATURE BOX -->
			<div class="col-md-4">
				<div class="feature">
					<div class="icon">
						<span class="icon_group"></span>
					</div>
					<h4>Användare & Klubbar</h4>
					<p>
						Se alla användare, deras rundor, statistik och banrecensioner. Bli vän med dom och få uppdateringar på allt dom gör!
					</p>
				</div>
			</div>
		</div>

		<!-- FEATURES ROW 2 -->
		<div class="row">

			<!-- SINGLE FEATURE BOX -->
			<div class="col-md-4">
				<div class="feature">
					<div class="icon">
						<span class="icon_chat_alt"></span>
					</div>
					<h4>Forum</h4>
					<p>
						Penguin Project erbjuder ett öppet forum för alla medlemmar. Var med och diskutera, argumentera och påverka sidans utveckling!
					</p>
				</div>
			</div>

			<!-- SINGLE FEATURE BOX -->
			<div class="col-md-4">
				<div class="feature">
					<div class="icon">
						<span class="icon_piechart"></span>
					</div>
					<h4>Statistik</h4>
					<p>
						Gillar du siffror? Då har du kommit rätt. Penguin Project erbjuder siffror på det mesta såsom banor, rundor, hål och mycket mer!
					</p>
				</div>
			</div>

			<!-- SINGLE FEATURE BOX -->
			<div class="col-md-4">
				<div class="feature">
					<div class="icon">
						<span class="icon_balance"></span>
					</div>
					<h4>Jämför & Analysera</h4>
					<p>
						Har du fastnat i en dållig vana? Jämför och analysera dina rundor. Du kan enkelt välja rundor mellan olika datum och banor, för att sedan studera dina siffror.
					</p>
				</div>
			</div>
		</div>
	</div>

</div> <!-- /END CONTAINER -->
</section>


<!-- =========================
     SECTION 2
============================== -->
<section class="section2 bgcolor-2" id="section2">
<div class="container">

	<div class="row">

		<div class="col-md-6">

			<!-- DETAILS WITH LIST -->
			<div class="brief text-left">

				<!-- HEADING -->
				<h2>Jämför & Analysera!</h2>
				<div class="colored-line pull-left">
				</div>

				<!-- TEXT -->
				<p>
					Som medlem på Penguin Project kan du få en snygg överblick över dina rundor. Du ser en graf med ditt resultat, ditt snitt och banans snitt. Har du spelat en grupprunda? Då kan man enkelt hämta de andras resultat!
				</p>

				<!-- FEATURE LIST -->
				<ul class="feature-list-2">

					<!-- FEATURE -->
					<li>
					<!-- ICON -->
					<div class="icon-container pull-left">
						<span class="icon_star-half_alt"></span>
					</div>
					<!-- DETAILS -->
					<div class="details pull-left">
						<h6>Grupprundor!</h6>
						<p>
							Med Penguin Project kan du lägga upp grupprundor på upp till 8 personer. På varje enskild runda kan du hämta de andras resultat.
						</p>
					</div>
					</li>

					<!-- FEATURE -->
					<li>
					<!-- ICON -->
					<div class="icon-container pull-left">
						<span class="icon_balance"></span>
					</div>
					<!-- DETAILS -->
					<div class="details pull-left">
						<h6>Jämför!</h6>
						<p>
							Har du spelat många rundor på samma bana? Då kan du med med 4 knapptryck hämta en annan runda (upp till 10 gånger) som sedan skrivs ut och du kan jämföra hål för hål.
						</p>
					</div>
					</li>
				</ul>
			</div>
		</div>

		<div class="col-md-6">
			<!-- SCREENSHOT -->
			<div class="side-screenshot2 pull-right">
				<img src="/img/front/content-3.png" alt="Feature" class="img-responsive">
			</div>
		</div>

	</div> <!-- END ROW -->

</div> <!-- END CONTAINER -->

</section>


<!-- =========================
     SECTION 3
============================== -->
<section class="section3" id="section3">

<div class="container">
	<div class="row">

		<div class="col-md-6">

			<!-- SCREENSHOT -->
			<div class="side-screenshot pull-left">
				<img src="/img/front/content-2.png" alt="Feature" class="img-responsive">
			</div>

		</div>

		<div class="col-md-6">

			<!-- DETAILS WITH LIST -->
			<div class="brief text-left">

				<!-- HEADING -->
				<h2>Explore the awesomeness</h2>
				<div class="colored-line pull-left">
				</div>

				<!-- TEXT -->
				<p>
					Penguin Project erbjuder användare statistik i alla former. På varje användares profil kan du se flest birdie på en runda, unkia banor spelade, snittresultat och bogeyfria rundor.
				</p>

				<!-- FEATURE LIST -->
				<ul class="feature-list-2">

					<!-- FEATURE -->
					<li>
					<!-- ICON -->
					<div class="icon-container pull-left">
						<span class="icon_cog"></span>
					</div>
					<!-- DETAILS -->
					<div class="details pull-left">
						<h6>Statistik</h6>
						<p>
							Peguin Project erbjuder användare statistik - väldigt mycket statistik! Ta reda på saker som du inte tidigare haft möjligheten till!
						</p>
					</div>
					</li>

					<!-- FEATURE -->
					<li>
					<!-- ICON -->
					<div class="icon-container pull-left">
						<span class="icon_cart_alt"></span>
					</div>
					<!-- DETAILS -->
					<div class="details pull-left">
						<h6>Håll koll på allt!</h6>
						<p>
							Hur många banor har du spelat? Hur många kast har du kastat total? Hur många bogeyfria rundor har du spelat? Med Penguin Project får du svaret!
						</p>
					</div>
					</li>
				</ul>
			</div>
		</div> <!-- /END DETAILS WITH LIST -->

	</div> <!-- END ROW -->

</div> <!-- END CONTAINER -->

</section>

<!-- =========================
     SECTION 6
============================== -->
<section class="section6 bgcolor-2" id="section6">
<div class="container">

	<!-- SECTION HEADING -->
	<h2>Screenshots</h2>
	<div class="colored-line">
	</div>

	<div class="sub-heading">
		Term sheet convertible note colluding bootstrapping.
	</div>

	<!-- SCREENSHOTS -->
	<div class="row screenshots">

		<div id="screenshots" class="owl-carousel owl-theme">

			<div class="shot">
				<a href="/img/front/screenshots/s1.png" data-lightbox-gallery="screenshots-gallery"><img src="/img/front/screenshots/s1.png" alt="Screenshot"></a>
			</div>

			<div class="shot">
				<a href="/img/front/screenshots/s3.png" data-lightbox-gallery="screenshots-gallery"><img src="/img/front/screenshots/s3.png" alt="Screenshot"></a>
			</div>

			<div class="shot">
				<a href="/img/front/screenshots/s4.png" data-lightbox-gallery="screenshots-gallery"><img src="/img/front/screenshots/s4.png" alt="Screenshot"></a>
			</div>

			<div class="shot">
				<a href="/img/front/screenshots/s5.png" data-lightbox-gallery="screenshots-gallery"><img src="/img/front/screenshots/s5.png" alt="Screenshot"></a>
			</div>

			<div class="shot">
				<a href="/img/front/screenshots/s6.png" data-lightbox-gallery="screenshots-gallery"><img src="/img/front/screenshots/s6.png" alt="Screenshot"></a>
			</div>

			<div class="shot">
				<a href="/img/front/screenshots/s7.png" data-lightbox-gallery="screenshots-gallery"><img src="/img/front/screenshots/s7.png" alt="Screenshot"></a>
			</div>

            <div class="shot">
                <a href="/img/front/screenshots/s8.png" data-lightbox-gallery="screenshots-gallery"><img src="/img/front/screenshots/s8.png" alt="Screenshot"></a>
            </div>

            <div class="shot">
                <a href="/img/front/screenshots/s9.png" data-lightbox-gallery="screenshots-gallery"><img src="/img/front/screenshots/s9.png" alt="Screenshot"></a>
            </div>
		</div>

	</div> <!-- /END SCREENSHOTS -->

</div> <!-- /END CONTAINER -->

</section>

<!-- =========================
     SECTION 7
============================== -->
<section class="section7" id="section7">
<div class="container">

	<!-- SECTION HEADING -->
	<h2>Om Projektet</h2>
	<div class="colored-line">
	</div>

	<div class="sub-heading">
		Ta en minut och läs mer om Johannes Nyberg och Penguin Project
	</div>

	<!-- TESTIMONIALS -->
	<div class="row testimonials">

		<!-- FEEDBACKS -->
		<div id="feedbacks" class="owl-carousel owl-theme">

			<!-- SINGLE FEEDBACK -->
			<div class="single-feedback">
				<div class="client-pic">
					<img src="/img/front/client-pics/basket.jpg" alt="">
				</div>
				<div class="box">
					<p class="message">
						 Penguin Project är ett för discgolfare i Sverige där spelare ska kunna utveckla sitt spel. Jag vet själv inte hur sidan kommer se ut om ett år (jag har planer), men mycket beror på användarna och deras ideér. Vet du något som du saknar?
					</p>
				</div>
			</div>

			<!-- SINGLE FEEDBACK -->
			<div class="single-feedback">
				<div class="client-pic">
					<img src="/img/front/client-pics/me.png" alt="">
				</div>
				<div class="box">
					<p class="message">
						 Jag, Johannes Nyberg, är en interaktionsdesigner och webbutvecklare som älskar discgolf. Jag är utbildad vid Karlstads Universitet och letar just nu ett jobb. Under tiden utvecklare jag Penguin Project för att utveckla mina kunskaper.
					</p>
				</div>
				<div class="client-info">
					<div class="client-name colored-text strong">
						Johannes Nyberg
					</div>
					<div class="company">
						Utvecklare
					</div>
				</div>
			</div>

			<!-- SINGLE FEEDBACK -->
			<div class="single-feedback">
				<div class="client-pic">
					<img src="/img/front/client-pics/discgolf.jpg" alt="">
				</div>
				<div class="box">
					<p class="message">
						 Penguin Project kommer att vara gratis för alla. Jag vil själv att discgolf ska fortsätta utvecklas, och detta är mitt bidrag. Jag uppmanar alla att ta vara på chansen att påverka och förverkliga funktioner/ideér för att sidan ska hålla högsta klass.
					</p>
				</div>
			</div>

		</div>
	</div> <!-- /END TESTIMONIALS -->

</div>  <!-- /END CONTAINER -->

</section>


<!-- =========================
     SECTION 8 - CTA
============================== -->
<section class="cta-section" id="section8">
<div class="color-overlay">

	<div class="container">

		<h4>Är du redo att förbättra ditt spel?</h4>
		<h2>Få de bästa möjligheterna med Penguin Project</h2>
		<div id="cta-4">
			<a href="/alfa" class="btn standard-button"> Bli medlem (beta)!</a>
		</div>


	</div>  <!-- /END CONTAINER -->
</div>  <!-- /END COLOR OVERLAY -->

</section>

<!-- =========================
     SECTION 10 - FOOTER
============================== -->
<footer class="bgcolor-2">
<div class="container">

	<div class="footer-logo">
		<img src="/img/front/logo.png" alt="">
	</div>

	<div class="copyright">
		 ©2014-2015 Penguin Project.
	</div>

	<ul class="social-icons">
		<li><a href=""><span class="social_facebook_square"></span></a></li>
	</ul>

</div>
</footer>


@stop