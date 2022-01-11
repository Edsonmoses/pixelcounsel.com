<div class="home-page" style="overflow: hidden !important">
	<section class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-lg-4 logo">
					<img src="{{asset('assets/uploads/img/Pixel Counsel--11.svg')}}" class="img-fluid" alt="Pixel Counsel Logo">
				</div>
				<div class="col-md-12 col-lg-8 banner">
					<img src="{{asset('assets/user/img/about-bg.jpg')}}" class="img-fluid" alt="Pixel Counsel Logo">
				</div>
			</div>
		</div>
	</section>
	<section class="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 col-md-12 col-sm-12 vectorl">
					<img src="{{asset('assets/uploads/img/Pixel Counsel-Vector-09.svg')}}" class="img-fluid" alt="Pixel Counsel Logo">
					@livewire('home-search-component')
				</div>
				<div class="col-lg-5 col-md-12 col-sm-12 ads">
					<div class="row ml-4">
						<div class="col-md-4 h-updates">
							<img src="{{asset('assets/uploads/img/message.png')}}" class="img-fluid" alt="RVector Logo">
							<h3 style="color:#444">Have Your Say</h3>
							<h3> It's The Blog</h3>
							<p style="margin-top:16px">Daily posts of what's trending in the creative field in Africa at large</p>
							<p></p>
							<p></p>
							<p>Daily posts of what's trending in the creative field in Africa at large</p>
						</div>
						<div class="col-md-4 col-sm-12 h-events">
							<div style="margin-top:47px;"></div>
							<div>
								<h3><a href="/hookup" style="color: #fff;">Hook Up</a></h3>
								<p><a href="/hookup-category/senior" style="color: #fff; text-decoration: none;">{{ $hookup->name }}</a></p>
								<hr>
							</div>
							<div>
								<h3><a href="/jargon" style="color: #fff;">Jargon <br/><br/><br/><br/><br/>Buster</a></h3>
								<p><a href="/jargon-category/architecture" style="color: #fff; text-decoration: none;">{!! Str::words("$jargon->short_description", 10,'') !!}</a></p>
								<hr>
							</div>
							<div>
								<h3><a href="/events" style="color: #fff;">Events</a></h3>
								<p><a href="/events-category/east-africa" style="color: #fff; text-decoration: none;">{{ $event->name }}</a></p>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>
</div>