<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css"  rel="stylesheet" />
</head>
<body>
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Test Insta API</span>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container w-full h-full flex flex-col items-center justify-center gap-5">
        @foreach ($posts as $post)
            <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                <div>
                    @if ($post['media_type'] === 'IMAGE')
                        <img class="rounded-t-lg" src="{{ $post['media_url'] }}" alt="Instagram Photo">
                    @elseif ($post['media_type'] === 'CAROUSEL_ALBUM')
                    
                        <div id="controls-carousel" class="relative w-full" data-carousel="static">
                            <!-- Carousel wrapper -->
                            <div class="relative h-56 overflow-hidden rounded-lg md:h-96">

                                @foreach ($post['children']['data'] as $child)
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img class="rounded-t-lg" src="{{ $child['media_url'] }}" alt="Instagram Photo">
                                    </div>
                                @endforeach
                                <!-- Item 1 -->
                            </div>
                            <!-- Slider controls -->
                            <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                                    <span class="sr-only">Previous</span>
                                </span>
                            </button>
                            <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                    <svg aria-hidden="true" class="w-6 h-6 text-white dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    <span class="sr-only">Next</span>
                                </span>
                            </button>
                        </div>
                    @elseif ($post['media_type'] === 'VIDEO')
                        <video controls>
                            <source src="{{ $post['media_url'] }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                </div>
                <div class="p-5">
                    {{-- <p class="mb-3 font-normal text-xs text-gray-700">{{ $post->likes->count }}</p> --}}
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">username : {{ $post['username'] }}</h5>
                    </a>
                    @if (!empty($post['caption']))
                        <p class="mb-3 font-normal text-gray-700">caption : {{ $post['caption'] }}</p>
                    @endif
                </div>
                <p class="hidden date mb-3 font-normal text-xs p-5 text-gray-700">{{ $post['timestamp'] }}</p>
                <p class="convertDate mb-3 font-normal text-xs p-5 text-gray-700"></p>
            </div>
        @endforeach
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    <script>
        var dateStr = document.querySelector('.date').textContent;
        // Create a new Date object with the Instagram API date string
        var dateObj = new Date(dateStr);
        // Specify the desired output format
        var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
        // Format the date according to the desired output format
        var formattedDate = dateObj.toLocaleDateString('en-US', options);
        document.querySelector('.convertDate').innerHTML = formattedDate;
    </script>
</body>
</html>