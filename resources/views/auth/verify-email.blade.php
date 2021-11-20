{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
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
    
        <div id="login-form">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-5 text-md text-gray-600" style="margin-left: 15px">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>
        
                @if (session('status') == 'verification-link-sent')
                    <div class="mt-5 mb-5 font-medium text-md text-green-600" style="margin-left: 15px; margin-right: 15px;">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif
            </div>
            <div class="col-md-8">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
    
                    <div>
                        <button type="submit" class="btn btn-secondary signup btn-sm">Resend Verification Email</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
    
                    <button type="submit" class="btn btn-link underline text-sm text-gray-600 hover:text-gray-900 btn-sm">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
        </div>
    
    </div>    
</x-guest-layout>

