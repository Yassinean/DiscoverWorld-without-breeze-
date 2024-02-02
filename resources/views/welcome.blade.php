@extends('layouts.master')
@section('title')
    Accueil
@endsection
@section('main')
    <div class="grid md:grid-cols-2 items-center md:gap-4 gap-8 font-sans-serif text-[#333] max-w-5xl mx-auto">
        <div class="max-md:order-1 max-md:text-center">
            <h3 class="md:text-3xl text-2xl md:leading-10">Prompt Delivery and Enjoyable Dining Experience.</h3>
            <p class="mt-4 text-sm">Laboris qui Lorem ad tempor ut reprehenderit. Nostrud anim nulla officia ea sit deserunt.
                Eu eu quis anim aute Laboris qui Lorem ad tempor ut reprehenderit.</p>
            <button type="button"
                class="px-6 py-2 mt-8 font-semibold rounded text-sm outline-none border-2 border-[#333] hover:bg-[#333] hover:text-white transition-all duration-300">Explore</button>
        </div>
        <div class="md:h-[450px]">
            <img src="https://readymadeui.com/photo.webp" class="w-full h-full md:object-contain" alt="Banner Image" />
        </div>
    </div>

    <div class="px-8 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="grid grid-cols-2 row-gap-8 md:grid-cols-3 mx-auto grid text-center">
            <div class="md:border-r">
                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{ $destinationCount }}</h6>
                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                    Destinations
                </p>
            </div>
            <div class="md:border-r">
                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{ $recitCount }}</h6>
                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                    Aventures
                </p>
            </div>
            <div class="md:border-r">
                <h6 class="text-4xl font-bold lg:text-5xl xl:text-6xl">{{ $userCount }}</h6>
                <p class="text-sm font-medium tracking-widest text-gray-800 uppercase lg:text-base">
                    Utilisateurs
                </p>
            </div>
        </div>
    </div>

    <div class="max-w-screen-xl mx-auto p-4 service-section">
        <h1 class="text-3xl lg:text-5xl xl:text-6xl text-center mt-6 font-bold text-gray-800">Aventures</h1>

        <div class="flex flex-wrap justify-between mt-8">

            <div class="flex flex-wrap gap-6">
                <form action="{{ route('filter.asc') }}" method="GET">
                    <button type="submit"
                        class="py-2 px-4 mb-2 text-sm font-medium text-white bg-blue-500 rounded border border-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Oldest First
                    </button>
                </form>

                <form action="{{ route('filter.desc') }}" method="GET">
                    <button type="submit"
                        class="py-2 px-4 mb-2 text-sm font-medium text-white bg-blue-500 rounded border border-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Newest First
                    </button>
                </form>
            </div>

            <div class="flex items-center space-x-4 mt-4">
                <form action="{{ route('filter.destination') }}" method="GET" class="flex gap-2">
                    <select id="countries" name="destination"
                        class="bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded focus:ring-blue-500 focus:border-blue-500 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected disabled>Select a continent</option>
                        <option value="All">All</option>
                        <option value="Afrique">Africa</option>
                        <option value="Europe">Europe</option>
                        <option value="Asia">Asia</option>
                        <option value="North">North America</option>
                        <option value="South">South America</option>
                    </select>
                    <button type="submit"
                        class="px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Filter
                    </button>
                </form>
            </div>
        </div>
    </div>


    <div class="bg-white font-[sans-serif] my-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center">
                <h2
                    class="text-3xl font-extrabold text-[#333] inline-block relative after:absolute after:w-4/6 after:h-1 after:left-0 after:right-0 after:-bottom-4 after:mx-auto after:bg-pink-400 after:rounded-full">
                    LATEST BLOGS</h2>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-16 max-md:max-w-lg mx-auto">
                @foreach ($recits as $recit)
                    <div
                        class="bg-white cursor-pointer rounded overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] relative top-0 hover:-top-2 transition-all duration-300">
                        @foreach ($recit->images as $image)
                            <img src="{{ URL('/storage/images/' . $image->image) }}" alt="Blog Post 1"
                                class="w-full h-60 object-cover" />
                        @break
                    @endforeach
                    <div class="p-6">
                        <pre class="text-sm block text-gray-400 mb-2">Created at {{ $recit->created_at }} | BY {{ $recit->user->name }}
                        </pre>
                        <h3 class="text-xl font-bold text-[#333]">{{ $recit->title }}</h3>
                        <hr class="my-6" />
                        <p class="text-gray-400 text-sm">{{ $recit->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection
