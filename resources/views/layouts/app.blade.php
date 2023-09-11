@if (auth()->user()->is_admin)
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Fonts -->
        <link rel="stylesheet" href="{{ asset('css/dash.css') }}" />
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>

@else
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="initial-scale=1, width=device-width" />
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Monoton&display=swap" />
            <link rel="stylesheet" href="{{ asset('css/global.css') }}" />
            <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
            <link rel="stylesheet" href="{{ asset('css/timeline.css') }}" />
            <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;600;700&display=swap"/>
            <style>
                @media (max-width: 534px){
  .form, .text-input {
    display: block;
  }
  .footer-links {
    display:none;
  }

}
.footer-links{
    bottom: 70px;
    left: 8vw;
  }
                </style>
            @vite(['resources/css/app.css', 'resources/js/app.js'])
            <script>
                /*to prevent Firefox FOUC, this must be here*/
                let FF_FOUC_FIX;
            </script>
        </head>
        <body>
            <div class="home">
                @include('layouts.navigation')
                <main>
                    {{ $slot }}
                </main>
                <div class="footer-10">
                    <div class="card1">
                        <div class="links">
                            <div class="column5">
                                <img class="logo-icon" alt="" src="{{ asset('photo/public/COMPUTER101-1.png') }}" />
                            </div>
                            <div class="column6">
                            <div class="footer-links2">
                                <div class="link4">
                                <a href="/computer"><div class="placeholder">Computers</div></a>
                                </div>
                                <div class="link4">
                                <a href="/keyboard"><div class="placeholder">Keyboards</div></a>
                                </div>
                                <div class="link4">
                                <a href="/monitor"><div class="placeholder">Monitor</div></a>
                                </div>
                                <div class="link4">
                                <a href="/joystick"><div class="placeholder">Joystick</div></a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="column6">
                            <div class="footer-links2">
                            <div class="link4">
                                <a href="/mouse"><div class="placeholder">Mices</div></a>
                                </div>
                            <div class="link4">
                                <a href="/terminal"><div class="placeholder">Terminals</div></a>
                                </div>
                                <div class="link4">
                                <a href="/cable"><div class="placeholder">Power Supplies</div></a>
                                </div>
                                <div class="link4">
                                <a href="/peripheral"><div class="placeholder">Other Peripherals</div></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="newslatter">
                        <div class="heading-parent">
                            <div class="page-one">Subscribe</div>
                            <div class="text">
                                Join our newsletter to stay up to date on features and releases.
                            </div>
                        </div>
                        <div class="container">
                            @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ \Session::get('success') }}</p>
                            </div><br />
                            @endif
                            @if (\Session::has('failure'))
                            <div class="alert alert-danger">
                                <p>{{ \Session::get('failure') }}</p>
                            </div><br />
                            @endif
                            <h2 class="mb-2 mt-2">Laravel Newsletter Tutorial With Example</h2>
                            <form action="https://computer.us17.list-manage.com/subscribe/post?u=d410179bc6f0c24f11eec14e1&amp;id=bb196492c9&amp;f_id=00895ee0f0" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                                @csrf

                                
                                <div class="row">
                                <div class="col-md-8"></div>
                                    <div class="form-group col-md-2">
                                    <label for="Email">Email:</label>
                                    <input type="text" class="form-control" name="email">
                                    </div>
                                </div>
                                <div class="row">
                                <div class="col-md-4"></div>
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                                </div>
                            </form>
                        </div>
                        </div>

    <div class="footer-links">
                    <div class="row">
                        <div class="credits1">
                            <div class="link">© 2023 Relume. All rights reserved.</div>
                            <div class="footer-links3">
                                <div class="link34">Privacy Policy</div>
                                <div class="link34">Terms of Service</div>
                                <div class="link34">Cookies Settings</div>
                            </div>
                        </div>
                        <div class="social-links">
                            <img class="chevron-down-icon" src="{{ asset('photo/public/icon--facebook.svg') }}"/>
                            <img class="chevron-down-icon" src="{{ asset('photo/public/icon--instagram.svg') }}"/>
                            <img class="chevron-down-icon" src="{{ asset('photo/public/icon--twitter.svg') }}"/>
                            <img class="chevron-down-icon" src="{{ asset('photo/public/icon--linkedin.svg') }}"/>
                        </div>
                    </div>
                </div>
    <script type="text/javascript" src="//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js"></script><script type="text/javascript">(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';fnames[3]='ADDRESS';ftypes[3]='address';fnames[4]='PHONE';ftypes[4]='phone';fnames[5]='BIRTHDAY';ftypes[5]='birthday';}(jQuery));var $mcj = jQuery.noConflict(true);</script></div>

                
                
            </div>
        </body>
    </html>
@endif
