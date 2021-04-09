
 <!-- footer template from:
https://codepen.io/nikedia/pen/ypeayb -->

<footer id="fh5co-footer" class="fh5co-bg" role="contentinfo">
		<div class="overlay"></div>
		<div class="container">
			<div class="row row-pb-md">
				<div class="col-md-4 fh5co-widget">
					<h3>ARGUPEDIA.</h3>
					<p style="color:white;">The ideal platform for logical debating</p>
                    @guest
					<p><a class="btn btn-primary" href="#">Become A Member</a></p>
                    @endguest
                    @auth 
                    <p><a class="btn btn-primary" href="#">Create a debate</a></p>
                    @endauth
				</div>
				<div class="col-md-8">
					<h3>Get Started Now</h3>
					<div class="col-md-4 col-sm-4 col-xs-6">
						<ul class="fh5co-footer-links">
							<li><a href="/debate">Recently Created Debates</a></li>
							<li><a href="/debate">Most Viewed Debates</a></li>
							<li><a href="/create">Create A Debate</a></li>
							<li><a href="/about">Learn About Schemes</a></li>
                            @auth
                            <li><a href="/mydebate">My Debates</a></li>
                            @endauth 
                            @guest 
                            <li><a href="/login">Login Now</a></li>
                            @endguest
						</ul>
					</div>
					</div>
				</div>
			</div>

			<div class="row copyright">
				<div class="col-md-12 text-center">
					<p>
						<small class="block" style="color:white;">&copy; <?php echo "" . date("Y")  . "" ?> | All Rights Reserved.</small> 
						<small class="block" style="color:white;">Alan Mahmoud | King's College London </small>
					</p>
				</div>
			</div>

		</div>
	</footer>

