{{--<x-guest-layout style="height:48vh !important">
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>--}}
<x-guest-layout>
    <div class="container mb-0">
    <div class="row text-center">
        <div class="col-md-12 lgin">
            <a href="/"><img src="{{asset('assets/uploads/img/Pixel Counsel--11.svg')}}" alt="Pixel Counsel" width="100" height="100" class="mx-auto d-block"> </a>
            <span class="text-md text-gray-600" style="color: #fff100">pixelcounsel a community of designers</span>
        </div>
    </div>
</div>
    <div class="form-modal">
        <div class="form-toggle">
            @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif
            <button id="signup-toggle" onclick="toggleSignup()">sign up</button>
            <button id="login-toggle" onclick="toggleLogin()">log in</button>
        </div>
    
        <div id="login-form">
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif
            <form name="frm-login" method="POST" action="{{route('login')}}">
                @csrf
                <input type="email" name="email" class="form-input" placeholder="Email Address" :value="old('email')" required autofocus>
                <input type="password" name="password" class="form-input" placeholder="Password" required autocomplete="current-password">
                <div class="row">
                    <div class="col-md-6">
                    <div class="checkbox">
                        <label for="remember_me">
                         <input type="checkbox" value="" checked id="remember_me" name="remember">
                         <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                         {{ __('keep me signed in') }}
                         </label>
                      </div>
                       
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('password.request') }}" class="pull-right" style="margin-right: 5px; margin-top:11px">Forgot password</a>
                    </div>
                </div>
                <button type="submit" class="btn login">login</button>
                {{-- <div class="flex items-center justify-end mt-4">
                    <a href="{{ url('auth/google') }}">
                        <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                    </a>
                </div>--}}
                <span class="ml-2 text-sm text-gray-600">By joining Pixel Counsel, you agree to our Terms Of Service and Privacy Policy</span>
              
            </form>
        </div>
    
        <div id="signup-form">
            <form name="frm-login" method="POST" action="{{route('register')}}">
                @csrf
                <input type="email" name="email" class="form-input" id="email" placeholder="Email Address" :value="email" required autofocus>
                <input type="text" name="name" id="name" id="password" class="form-input" placeholder="Username" :value="name" required autofocus autocomplete="name">
                <input type="password" name="password" class="form-input" placeholder="Password" required autocomplete="new-password">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" placeholder="Confirm Password" required autocomplete="new-password">
                <div class="checkbox">
                    <label>
                     <input type="checkbox" value="" checked>
                     <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                     I wish to receive news, promotions & the latest uploads from Pixel Counsel by email
                     </label>
                  </div>
                <button type="submit" class="btn signup">Create Your Pixel Counsel Account
              </button> 
             {{--  <div class="flex items-center justify-end mt-4">
                <a href="{{ url('auth/google') }}">
                    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png" style="margin-left: 3em;">
                </a>
            </div>--}}
              <span class="ml-12 text-sm text-gray-600">By joining Pixel Counsel, you agree to our <a href="#">Terms</a> Of Service and <a href="#">Privacy Policy</a></span>
                
            </form>
        </div>
    
    </div>    
</x-guest-layout>
