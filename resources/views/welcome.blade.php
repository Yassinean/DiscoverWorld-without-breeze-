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
        <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                <div class="text-center">
                    <h6 class="text-5xl font-bold text-deep-purple-accent-400">144K</h6>
                    <p class="font-bold">Downloads</p>
                </div>
                <div class="text-center">
                    <h6 class="text-5xl font-bold text-deep-purple-accent-400">12.9K</h6>
                    <p class="font-bold">Subscribers</p>
                </div>
                <div class="text-center">
                    <h6 class="text-5xl font-bold text-deep-purple-accent-400">27.3K</h6>
                    <p class="font-bold">Users</p>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-screen-xl mx-auto p-4 service-section">
        <h1 class="text-3xl lg:text-5xl xl:text-6xl text-center mt-6 font-bold">Aventures</h1>
        <div class="flex flex-wrap justify-between">
      <div class="flex flex-wrap gap-6 mt-4 ">
        <form action="{{ route('filter.asc') }}" method="GET">
          <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
              ASC
          </button>
      </form>
      
      <form action="{{ route('filter.desc') }}" method="GET">
          <button type="submit" class="py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
              DESC
          </button>
      </form>
      
    </div>
    <div class=" flex-end" >
      <form  class="flex gap-2 " action="{{ route('filter.destination') }}" method="GET">
        <select id="countries" name="destination" class="mt-6 ml-auto bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-80 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected disabled>Sélectionnez un continent</option>
            <option value="Tout">Tout</option>
            <option value="Afrique">Afrique</option>
            <option value="Europe">Europe</option>
            <option value="Asie">Asie</option>
            <option value="Nord">Amérique du Nord</option>
            <option value="Sud">Amérique du Sud</option>
        </select>
        <div>
        <button type="submit" class="px-4 py-2 mt-7 text-sm font-medium text-white bg-blue-700 rounded-md hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
            Filtrer
        </button> 
        </div>
        
    </form>
    </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mx-auto mt-20">
            @foreach ($aventures as $aventure)
                <div class="w-full border rounded-md">
                    @foreach ($aventure->images as $image)
                        <img class="rounded-t-lg h-25" src="{{ URL('/storage/images/' . $image->image) }}"
                            alt="Adventure Image" />
                    @break
                @endforeach
                <div class="p-5">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $aventure->ville }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700">{{ $aventure->description }}</p>
                    <a href="#"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
