@if (count($providers) !== 0)
    <span class="sign-in-with">
        @if (request()->routeIs('login'))
            {{ trans('user::auth.or_continue_with') }}
        @else
            {{ trans('user::auth.or_sign_up_with') }}
        @endif
    </span>

    <ul class="list-inline social-login">
            <li>
                <a href="{{ route('login.redirect', ['provider' => 'facebook']) }}" class="facebook" data-toggle="tooltip" data-placement="top" title="{{ trans('user::auth.facebook') }}">
                   <img src="/images/facebook.png" width="27px"/>
                </a>
            </li>

            <li>
                <a href="{{ route('login.redirect', ['provider' => 'google']) }}" class="google" data-toggle="tooltip" data-placement="top" title="{{ trans('user::auth.google') }}">
                    <img src="/images/google.png" width="20px"/>
                </a>
            </li>


        @if (setting('apple_login_enabled'))
            <li>
                <a href="{{ route('login.redirect', ['provider' => 'apple']) }}" class="apple" data-toggle="tooltip" data-placement="top" title="Apple">
                    <img src="/images/apple.png" width="20px"/>
                </a>
            </li>
        @endif
    </ul>
@endif
