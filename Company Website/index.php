<!DOCTYPE HTML> <!--definiuje wersje html5 -->
<html lang="pl">
<head>

	<meta charset="utf-8" /> <!-- ustawienie odpowiedniego stylu znakowego (mustbe) -->
	<title>Take your life ! </title>  <!-- tytul strony -->
	<meta name="description" content="Serwis poświęcony dla systemu Linux !" />  <!-- opis zakladki -->
	
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> <!-- odpowiedni format dla 
																													przegladarek (mustbe!!) -->
	<link rel="stylesheet" href="style.css" type="text/css" />  
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />     <!--dodanie obrazkow z fontello -->
	<!--head zawartosc niedostepna do podgladu zawiera ogolne informacje oraz formaty projektowania strony -->

	<link href="https://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,latin-ext" rel="stylesheet" type="text/css">
	
	<!--js script odpowiedzialny za przewijanie do wybranych miejsc z strony www -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="jquery.scrollTo.min.js"></script>
	<script>
		jQuery (function($)		//funkcja jQuery umożliwiająca animowane przejścia w wybrane miejsca
			{

				$.scrollTo(0); 		//zresetowanie scrolla
				$('#link1').click(function() { $.scrollTo($('#topheader'), 500); });
				$('#link2').click(function() { $.scrollTo($('#cAbout'), 500); });
				$('#link3').click(function() { $.scrollTo($('#cSkills'), 500); });
				$('#link4').click(function() { $.scrollTo($('#cPortfolio'), 500); });
				$('#link5').click(function() { $.scrollTo($('#cTravel'), 500); });
				$('#link6').click(function() { $.scrollTo($('#cContact'), 500); });
				
			}
		);
		
	</script>
	
	
	<!--js script odpowiedzialny za przyklejane menu w trakcie przewijania menu -->
	<script src="jquery-3.1.1.min.js"></script>
			
			<script>

				$(document).ready(function() {
					var stickyNavTop = $('.nav').offset().top;

					var stickyNav = function(){
					var scrollTop = $(window).scrollTop();

					if (scrollTop > stickyNavTop) { 
					$('.nav').addClass('sticky');
					} else {
					$('.nav').removeClass('sticky');
					}
					};

					stickyNav();

					$(window).scroll(function() {
					stickyNav();
				});
				});

			</script>

</head>




<body>


<!--kontener zawierajacy naglowek-->
		<div id="topheader"  class="header">
			
				<div class="logorocket">
					<i class="icon-rocket"></i>
				</div>
			
				<div class="logo">
					<span style="color: #335284"> Choose</span>YourWay.com 
				</div>
				
		</div>
	

	<!--kontener zawierajacy belke nawigacji -->
		<div class="nav">
			<ol>
				<li><a id="link1" href="#"  class="tilelinkhtml5">Home</a></li>
				<li><a  id="link2" href="#"  class="tilelinkhtml5">About</a></li>
				<li><a  id="link3" href="#"  class="tilelinkhtml5">Skills</a></li>
				<li><a  id="link4" href="#"  class="tilelinkhtml5">Portfolio</a></li>
				<li><a  id="link5" href="#"  class="tilelinkhtml5">Travel</a></li>
				<li><a  id="link6" href="#"  class="tilelinkhtml5">Contact</a></li>
				<li><a href = "login.php" class="tilelinkhtml5">Login</a></li>
			</ol>
		</div>
	
	<!--kontener zawieracay informacje o firmie -->	
			<div id="topbar">
		
				<div id="topbarL">
					<span class="bigtitle">Our Company</span>
					<div style="height: 15px;"></div>
						Aenean scelerisque metus ac luctus lacinia. Suspendisse pellentesque mollis turpis in hendrerit. Pellentesque orci sem, fermentum vel leo eu, aliquet cursus lorem. Pellentesque odio augue, malesuada a ex at, accumsan semper nibh. Integer id dapibus turpis. Aenean rutrum lacus libero. Aliquam erat volutpat.
				</div>
		
				<div id="topbarR">
					<img src="linux.png" />
				</div>
					<div style="clear:both;"></div>

			</div>
			
	<!--kontener zawierajacy wszystkie pola do ktorych mozemy sie odwoloac za posrednictwem menu -->		
			<div id="maincontent">
			
			
	<!--kontener About Company-->		
				<div id="cAbout" class="contentAbout">
					<div class="caboutL">
						<span class="bigtitle">About Company</span><br/><br/>
						
						<div style="height: 15px;"></div>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent risus leo, tincidunt consequat imperdiet ac, vestibulum quis erat. Suspendisse molestie enim libero. Aliquam nec mauris vestibulum, semper metus ut, facilisis nulla. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc in libero elit. Duis dignissim vitae mi eu volutpat. Nunc molestie lacus sed rhoncus ultrices. Vivamus eget dapibus augue. Nullam scelerisque, justo non consectetur dapibus, tellus quam maximus velit, in bibendum enim ligula eu turpis. Vestibulum vel risus lectus.
						<br/><br/>
							Morbi placerat consectetur sodales. Proin vel risus justo. Integer ut rhoncus augue. Suspendisse sollicitudin fringilla lorem et convallis. Etiam pharetra justo id pellentesque vulputate. Pellentesque rutrum lobortis nisl sed lobortis. Integer eu convallis odio, quis feugiat sem. Mauris at tristique lacus, vel varius quam.
					</div>
						
					<div class="caboutR">
						
						<img src="responsive_design.png" />
						
					</div>
					
					<div style="clear:both;"></div>
						
				</div>
				
				
	<!-- kontener Skills -->			
				<div  id="cSkills" class="contentSkills">
					<span  class="bigtitle">My Skills</span>
					<div style="height: 15px;"></div>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent risus leo, tincidunt consequat imperdiet ac, vestibulum quis erat. Suspendisse molestie enim libero. Aliquam nec mauris vestibulum, semper metus ut, facilisis nulla. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc in libero elit. Duis dignissim vitae mi eu volutpat. Nunc molestie lacus sed rhoncus ultrices. Vivamus eget dapibus augue. Nullam scelerisque, justo non consectetur dapibus, tellus quam maximus velit, in bibendum enim ligula eu turpis. Vestibulum vel risus lectus.
					<br/><br/>
						Morbi placerat consectetur sodales. Proin vel risus justo. Integer ut rhoncus augue. Suspendisse sollicitudin fringilla lorem et convallis. Etiam pharetra justo id pellentesque vulputate. Pellentesque rutrum lobortis nisl sed lobortis. Integer eu convallis odio, quis feugiat sem. Mauris at tristique lacus, vel varius quam.
					<br/><br/>
						Donec tincidunt vitae ligula vitae euismod. Aliquam eget mattis ex. Integer turpis purus, cursus sit amet posuere sit amet, tincidunt et risus. Curabitur eget malesuada nulla. Nullam pulvinar efficitur orci quis hendrerit. Praesent at metus semper elit porta tempor. Nulla facilisi. Proin efficitur orci eget augue congue sagittis. Phasellus eget fermentum augue.
				</div>
	

	<!--kontener portfolio -->	
				<div id="cPortfolio"  class="contentPortfolio">
					<span class="bigtitle">Portfolio</span>
					<div style="height: 15px;"></div>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent risus leo, tincidunt consequat imperdiet ac, vestibulum quis erat. Suspendisse molestie enim libero. Aliquam nec mauris vestibulum, semper metus ut, facilisis nulla. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc in libero elit. Duis dignissim vitae mi eu volutpat. Nunc molestie lacus sed rhoncus ultrices. Vivamus eget dapibus augue. Nullam scelerisque, justo non consectetur dapibus, tellus quam maximus velit, in bibendum enim ligula eu turpis. Vestibulum vel risus lectus.
					<br/><br/>
						Morbi placerat consectetur sodales. Proin vel risus justo. Integer ut rhoncus augue. Suspendisse sollicitudin fringilla lorem et convallis. Etiam pharetra justo id pellentesque vulputate. Pellentesque rutrum lobortis nisl sed lobortis. Integer eu convallis odio, quis feugiat sem. Mauris at tristique lacus, vel varius quam.
					<br/><br/>
						Donec tincidunt vitae ligula vitae euismod. Aliquam eget mattis ex. Integer turpis purus, cursus sit amet posuere sit amet, tincidunt et risus. Curabitur eget malesuada nulla. Nullam pulvinar efficitur orci quis hendrerit. Praesent at metus semper elit porta tempor. Nulla facilisi. Proin efficitur orci eget augue congue sagittis. Phasellus eget fermentum augue.
				</div>
				
				
	<!--kontener travel -->			
				<div id="cTravel" class="contentTravel">
					<span class="bigtitle">The best places</span>
					<br/><br/>
					
						<div class="pictures1">
							<img src="picture1.jpg" />
							<span class="descriptionimage">Olomouc,  Czech Republic</span>
						</div>
						
						<div class="pictures2">
							<img src="picture2.jpg" />
							<span class="descriptionimage">Praha,  Czech Republic</span>
						</div>
						
						<div class="pictures3">
							<img src="picture3.jpg" />
							<span class="descriptionimage">Winter in Poland</span>
						</div>
						
						<div class="pictures4">
							<img src="picture4.jpg" />
							<span class="descriptionimage">Krakow old city, Poland</span>
						</div>
					
					<div style="clear:both;"></div>
				</div>
				
				
	<!--kontener Contact-->
				<div id="cContact" class="contentContact">
					<div class="contactL">
						<span class="bigtitle">Write to me</span><br/><br/>
						<div style="height: 15px;"></div>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent risus leo, tincidunt consequat imperdiet ac, vestibulum quis erat. Suspendisse molestie enim libero. Aliquam nec mauris vestibulum, semper metus ut, facilisis nulla. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc in libero elit. Duis dignissim vitae mi eu volutpat. Nunc molestie lacus sed rhoncus ultrices. Vivamus eget dapibus augue. Nullam scelerisque, justo non consectetur dapibus, tellus quam maximus velit, in bibendum enim ligula eu turpis. Vestibulum vel risus lectus.
					</div>
						
					<div class="contactR">
						
						<fieldset>
							<legend>Contact Information</legend>
							<br/><br/>
							Your Name: 
							<label>
							<input type="text" name="name" /> 
							</label>
							<br/><br/>
							Your E-mail:
							<label>
							<input type="text" name="email" /> 
							</label>
							<br/><br/>
							<p>Message:</p>
							<textarea name="message" cols="50" rows="6">
							</textarea>
							<br/><br/>
								<input type="submit" class="button" value="Send mail" />

						</fieldset>
					</div>
					
					<div style="clear:both;"></div>
						
				</div>
				
				
			</div>
			
			
			
	<!--kontener Socials-->		
				<div id="socials">
				
						<a href="http://facebook.com" target="_blank" class="tilelinkhtml5">
							<div class="fb">
								<i class="icon-facebook"></i>
							</div>
						</a>
						<a href="http://youtube.com" target="_blank" class="tilelinkhtml5">
							<div class="yt">
								<i class="icon-youtube"></i>
							</div>
						</a>
					<a href="http://twitter.com" target="_blank" class="tilelinkhtml5">
							<div class="tw">
								<i class="icon-twitter"></i>
							</div>
					</a>
					<a href="http://plus.google.com" target="_blank" class="tilelinkhtml5">
							<div class="gplus">
								<i class="icon-gplus"></i>
							</div>
					</a>
		
			</div>
			
		
		
	<!--kontener stopki -->
			<div id="footer">
				The best brand in the Internet &copy All rights reserved !
			</div>
			
	
	
					
</body>

</html>