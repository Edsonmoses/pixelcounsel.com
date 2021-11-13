{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>--}}
<x-guest-layout>
    <div class="container mb-0">
    <div class="row text-center">
        <div class="col-md-12 lgin">
            <img src="{{asset('assets/uploads/img/Pixel Counsel--11.svg')}}" alt="Pixel Counsel" width="100" height="100" class="mx-auto d-block"> 
            <span class="text-md text-gray-600" style="color: #fff100">Online vector logo collection of brands in Africa</span>
        </div>
    </div>
</div>
    <div class="form-modal">
        <div class="form-toggle">

            <button id="login-toggle" onclick="toggleLogin()">sign up</button>
            <button id="signup-toggle" onclick="toggleSignup()">log in</button>
        </div>
    
        <div id="signup-form">
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
                     <div class="form-checked">
                           <label for="remember_me" class="flex items-center">
                            <span class="texted">{{ __('keep me signed in') }}</span>
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600 checkmark"></span>
                        </label>
                        </div>
                       
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('password.request') }}" class="pull-right" style="margin-right: 5px">Forgot password</a>
                    </div>
                </div>
                <button type="submit" class="btn login">login</button>
                <span class="ml-2 text-sm text-gray-600">By joining Pixel Counsel, you agree to our Terms Of Service and Privacy Policy</span>
              
            </form>
        </div>
    
        <div id="login-form">
            <form name="frm-login" method="POST" action="{{route('register')}}">
                @csrf
                <input type="email" name="email" class="form-input" placeholder="Email Address" :value="email" required autofocus>
                <input type="text" name="name" id="first_name" class="form-input" placeholder="Username" :value="name" required autofocus autocomplete="name">
                <input type="password" name="password" class="form-input" placeholder="Password" required autocomplete="new-password">
                <input type="password" name="password_confirmation" class="form-input" placeholder="Confirm Password" required autocomplete="new-password">
                <div class="form-checked">
                    <label class="flex items-center">
                     <span class="texted text-gray-600">{{ __('I wish to receive news, promotions & the latest uploads from Pixel Counsel by email') }}</span>
                     <x-jet-checkbox id="news" name="news" />
                     <span class="ml-2 text-sm text-gray-600 checkmark"></span>
                 </label>
                 </div>
                <button type="submit" class="btn signup"><i class="fa fa-spinner fa-pulse"></i> Create Your Pixel Counsel Account
              </button> 
              <span class="ml-12 text-sm text-gray-600">By joining Pixel Counsel, you agree to our Terms Of Service and Privacy Policy</span>
                
            </form>
        </div>
    
    </div>    
</x-guest-layout>
