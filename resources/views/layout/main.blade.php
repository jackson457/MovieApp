<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie App</title>
    <link rel="stylesheet" href="/css/app.css" />
    <script src="https://kit.fontawesome.com/7c9afde9d2.js" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireStyles
</head>
<body class="font-sans bg-gray-900 text-white">
   <nav class="border-b border-gray-800 ">
    <div class="mx-auto items-center flex flex-col md:flex-row justify-between px-4 py-6 container">
        <ul class="flex items-center flex-col md:flex-row">
            <li>
                <a href="{{route('movies.index')}}" ><svg class="w-12" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 495 495" style="enable-background:new 0 0 495 495;" xml:space="preserve">
               <g>
                   <path style="fill:#2488FF;" d="M247.5,495H495v-40H382.432C343.619,480.291,297.28,495,247.5,495z"/>
                   <path style="fill:#00479B;" d="M247.5,405c-27.57,0-50-22.43-50-50c0-27.57,22.43-50,50-50V190c-27.57,0-50-22.43-50-50
                       c0-27.57,22.43-50,50-50V0C110.81,0,0,110.81,0,247.5S110.81,495,247.5,495V405z M140,297.5c-27.57,0-50-22.43-50-50
                       c0-27.57,22.43-50,50-50s50,22.43,50,50C190,275.07,167.57,297.5,140,297.5z"/>
                   <path style="fill:#003068;" d="M495,247.5C495,110.81,384.19,0,247.5,0v90c27.57,0,50,22.43,50,50c0,27.57-22.43,50-50,50v115
                       c27.57,0,50,22.43,50,50c0,27.57-22.43,50-50,50v90c49.78,0,96.119-14.709,134.932-40C450.195,410.845,495,334.41,495,247.5z
                        M355,197.5c27.57,0,50,22.43,50,50c0,27.57-22.43,50-50,50s-50-22.43-50-50C305,219.93,327.43,197.5,355,197.5z"/>
                   <path style="fill:#46F8FF;" d="M197.5,140c0,27.57,22.43,50,50,50s50-22.43,50-50c0-27.57-22.43-50-50-50S197.5,112.43,197.5,140z"
                       />
                   <path style="fill:#46F8FF;" d="M140,197.5c-27.57,0-50,22.43-50,50c0,27.57,22.43,50,50,50s50-22.43,50-50
                       C190,219.93,167.57,197.5,140,197.5z"/>
                   <path style="fill:#46F8FF;" d="M197.5,355c0,27.57,22.43,50,50,50s50-22.43,50-50c0-27.57-22.43-50-50-50S197.5,327.43,197.5,355z"
                       />
                   <path style="fill:#46F8FF;" d="M355,297.5c27.57,0,50-22.43,50-50c0-27.57-22.43-50-50-50s-50,22.43-50,50
                       C305,275.07,327.43,297.5,355,297.5z"/>
               </g>
               </svg>
               </a>
            </li>
            <li class="md:ml-16 mt-1">
                <a href={{route('movies.index')}} class="hover:text-gray-300">Movies</a>
            </li>
            <li class="md:ml-6 mt-1">
                <a href={{route('tv.index')}} class="hover:text-gray-300">Tv Show</a>
            </li>
            <li class="md:ml-6 mt-1">
                <a href={{route('actors.index')}} class="hover:text-gray-300">Actors</a>
            </li>
        </ul>
        <div class="flex items-center flex-col md:flex-row mt-2 md:mt-0">
            <livewire:search-dropdown>
            <div class="md:ml-3 mt-1 md:mt-0">
                <a href="#" ><img src="/img/icon.png" class="rounded-full w-8 h-8" alt="man photo" />
               </a>
            </div>
        </div>
    </div>
   </nav>
   @yield('content')
   @livewireScripts
   @yield('script')
</body>
</html>