<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Begin</title>
    <link rel="stylesheet" href="{{ asset('css/layout.css')}}">
    @yield('css')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Chakra+Petch:wght@700&display=swap" rel="stylesheet">
    <script type="module" src="{{ asset('js/app.js')}}"></script> 
</head>
<body>
    <div class="centered-content">
        <h1>Begin Here</h1>

        @auth
            @include('partials._navigationFull')
        @else
            @include('partials._navigation')
        @endauth
        
        {{-- <nav>
            <ul>
                <div class="navigation">
                    <li><a href="">Home</a></li>
                    <li class="create"><a href="">Create</a></li>
                </div>
                <div class="login">
                    <li><a href="">Log in</a></li>
                    <li><a href="">Sign up</a></li>
                </div>
            </ul>
        </nav> --}}
        {{-- <div class="col-md-2 col-md-offset-6 text-right">
            <strong>Select Language: </strong>
        </div>
        <div class="col-md-4">
            <select class="form-control changeLang">
                <option value="en" {{ session()->get('locale') == 'en' ? 'selected' : '' }}>English</option>
                <option value="lv" {{ session()->get('locale') == 'lv' ? 'selected' : '' }}>Latvian</option>
                <option value="sp" {{ session()->get('locale') == 'sp' ? 'selected' : '' }}>Spanish</option>
                </select>
            </select>
        </div> --}}
        {{-- <h1>{{ __('messages.title') }}</h1> --}}

        @yield('content')

             <!-- ======================================================================== -->
            
             <!-- <strong>Database Connected: </strong> -->
        <?php
            // try {
            //     \DB::connection()->getPDO();
            //     echo \DB::connection()->getDatabaseName();
            //     } catch (\Exception $e) {
            //     echo 'None';
            // }
        ?>  

            <!-- ========================================================================  -->
        <footer>
            <p>Created for Web Technologies II</p>
        </footer>
    </div> 
    {{-- <script type="text/javascript">

        var url = "{{ route('changeLang') }}";
        
        $(".changeLang").change(function(){
            window.location.href = url + "?lang="+ $(this).val();
        });
        
        </script> --}}
</body>
</html>