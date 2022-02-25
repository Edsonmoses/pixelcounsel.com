<div class="home-page" style="overflow: hidden !important">
	<section class="header">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-lg-4 logo">
					<img src="{{asset('assets/uploads/img/Pixel Counsel--11.svg')}}" class="img-fluid" alt="Pixel Counsel Logo">
				</div>
				<div class="col-sm-12 col-md-12 col-lg-8 banner">
					<img src="{{asset('assets/user/img/about-bg.jpg')}}" class="img-fluid" alt="Pixel Counsel Logo">
				</div>
			</div>
		</div>
	</section>
	<section class="main">
		<div class="container-fluid">
			<div class="container">
			<div class="row">
				<div class="col-md-12 col-lg-7 col-sm-12 vectorl">
					<a href="/vector"><img src="{{asset('assets/uploads/img/vector logos of brands in africa.svg')}}" class="img-fluid" alt="Pixel Counsel Logo"></a>
					@livewire('home-search-component')
				</div>
				<div class="col-lg-5 col-md-12 col-sm-12 ads">
					<div class="row ml-4">
						{{--<div class="col-md-4 h-updates">
							<img src="{{asset('assets/uploads/img/message.png')}}" class="img-fluid" alt="RVector Logo">
							<h3 style="color:#444">Have Your Say</h3>
							<h3> It's The Blog</h3>
							<p style="margin-top:16px">Daily posts of what's trending in the creative field in Africa at large</p>
							<p></p>
							<p></p>
							<p>Daily posts of what's trending in the creative field in Africa at large</p>
						</div>--}}
						<div class="col-lg-8 col-md-12 col-sm-12 h-events" style="border-left: none !important;">
							<div style="margin-top:47px;"></div>
							
							<div class="m-hookup">
								<h3><a href="/hookup">Hook Up 
									@if (!empty($hookup))
									<span class="fa-stack fa-2x" data-count="{{ $hookup }}">
									<i class="fa fa-bell-o fa-stack-1x fa-inverse"></i>
								  </span>
								@endif</a></h3>
								<p><a href="/hookup">Collection of career changing jobs in Africa for your picking</a></p>
								<hr>
							</div>
							<!--hookup end here-->
							@if (!empty($jargon))
							<div class="m-hookup">
								<h3  style="width:50px; line-height: 1;"><a href="/jargon">Jargon Buster</a></h3>
								<p><a href="/jargon-category/architecture">{!! Str::words("Online vector logo collection of brands in Africa", 100,'') !!}</a></p>
								<hr>
							</div>
							@endif
							<!--Jargon end here-->
							@if (!empty($event))
							<div class="m-hookup"style="margin-bottom: 30px;">
								<h3><a href="/events">Events</a></h3>
								<p><a href="/events">What’s happening where and when</a></p>
						</div>
						<hr/>
						@endif
						<!--events end here-->
					</div><!--col-8 end here-->
				</div><!--inner row end here-->
				</div><!--col-5 end here-->
			</div><!--row end here-->
			</div><!--inner container end here-->
		</div><!--container end here-->
	</section>
</div>