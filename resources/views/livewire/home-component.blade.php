<div class="home-page">
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
				<div class="col-md-12 col-lg-7 vectorl">
					<img src="{{asset('assets/uploads/img/Pixel Counsel-Vector-09.svg')}}" class="img-fluid" alt="Pixel Counsel Logo">
					<div class="vector-search">
						<form action="{{ route('vector.search') }}" role="search">
							<input type="hidden" name="vector_cat" value="{{ $vector_cat }}" id="vector-cat">
							<input type="hidden" name="vector_cat_id" value="{{ $vector_cat_id }}" id="vector-cat-id">
							<div class="input-group">
							<input class="form-control" placeholder="Find a logo here" name="query" id="ed-srch-term" type="text" value="{{ $search }}">
							<div class="input-group-btn">
							<button type="submit" id="searchbtn">
								<i class="fa fa-search" aria-hidden="true"></i> </button>
							</div>
							</div>
							</form>
					</div>
				</div>
				<div class="col-md-12 col-lg-5 ads">
					<div class="row ml-4">
						<div class="col-md-4 h-updates">
							<img src="{{asset('assets/uploads/img/message.png')}}" class="img-fluid" alt="RVector Logo">
							<h3 style="color:#444">Heve Your Say</h3>
							<h3> It's The Blog</h3>
							<p style="margin-top:16px">Daily posts of what's trending in the creative field in Africa at large</p>
							<p></p>
							<p></p>
							<p>Daily posts of what's trending in the creative field in Africa at large</p>
						</div>
						<div class="col-md-4 col-sm-12 h-events">
							<div style="margin-top:47px;"></div>
							<div>
								<h3>Hook Up</h3>
								<p>{{ $hookup->name }}</p>
								<hr>
							</div>
							<div>
								<h3>Jargon <br/><br/><br/><br/><br/>Buster</h3>
								<p>{{ $jargon->name }}</p>
								<hr>
							</div>
							<div>
								<h3>Events</h3>
								<p>{{ $event->name }}</p>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>
</div>