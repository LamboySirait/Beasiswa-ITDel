@extends('layouts.app')
@section('title','Beasiswa Eksternal')
@section('background', 'bg-white')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">
<style>
    .carousel-open:checked+.carousel-item {
        position: static;
        opacity: 100;
    }

    .carousel-item {
        -webkit-transition: opacity 0.6s ease-out;
        transition: opacity 0.6s ease-out;
    }

    #carousel-1:checked~.control-1,
    #carousel-2:checked~.control-2,
    #carousel-3:checked~.control-3 {
        display: block;
    }

    .carousel-indicators {
        list-style: none;
        margin: 0;
        padding: 0;
        position: absolute;
        bottom: 2%;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 10;
    }

    #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
    #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
    #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet {
        color: #2b6cb0;
        /*Set to match the Tailwind colour you want the active one to be */
    }
</style>

<h1 class="text-center font-bold text-3xl pt-1 text-white mt-10" style="color: #0D285F;">Jenis Beasiswa</h1>
<h1 class="text-center font-bold text-3xl pt-1 text-white mb-10 " style="color: #0D285F;">Eksternal</h1>

@php
$id = 1;
// split the description and store it in an array
foreach($sponsorship as $item){
$list = explode(";", $item->description);
$item->description = $list;
}
@endphp
@foreach($sponsorship as $item)
<div class="container w-3/4 m-auto px-10">
    <h1 class="text-3xl font-bold pb-5 ">{{$id}}. {{$item->title}}</h1>
    @if(
    $item->image == "-"
    )
    @else
    <img class="px-16" src="{{$item->image}}" alt="beasiswa">
    @endif
    <p class="px-10 py-3">
        @foreach($item->description as $desc)
    <p class="py-1 indent-8 px-10">{{$desc}}</p>
    @endforeach
    </p>
    <hr class="my-5">
</div>
@php
$id++;
@endphp
@endforeach

<div class="w-4/4 m-auto px-10 pb-20">
    @if($eksternalBeasiswa->isEmpty())

    <div class="">
        <div class="items-center justify-center" style="margin-top:100px;">
            <img src="{{url(asset('assets/kosong.png'))}}" alt="Logo perusahaan" style="margin: 20px auto;">
            <h1 class="text-center font-bold text-1xl text-gray-400" style="margin: 20px auto;">
                Tidak ada pendaftaran beasiswa yang tersedia untuk saat ini!
            </h1>
        </div>


        @else
        <!-- CAROUSEL -->


        <div class="carousel relative shadow-2xl bg-white mb-5">
            <div class="carousel-inner relative overflow-hidden w-full">
                <!--Slide 1-->
                <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
                <div class="carousel-item absolute opacity-0" style="height:70vh;">
                    <div class="block h-full w-full text-white text-5xl text-center">
                        <img src="https://petrominer.com/wp-content/uploads/Inalum.png" class="block w-full" alt="..." />
                    </div>
                </div>
                <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto"></label>
                <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto"></label>

                <!--Slide 2-->
                <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
                <div class="carousel-item absolute opacity-0" style="height:70vh;">
                    <div class="block h-full w-full text-white text-5xl text-center">
                        <img src="https://filesdev.klob.id/public/mco01/ke9ovjey/Tanoto-logo-green.png" class="block w-full" alt="..." />
                    </div>
                </div>
                <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto"></label>
                <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto"></label>

                <!--Slide 3-->
                <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
                <div class="carousel-item absolute opacity-0" style="height:70vh;">
                    <div class="block h-full w-full text-white text-5xl text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/id/thumb/5/55/BNI_logo.svg/1200px-BNI_logo.svg.png" class="block w-full" alt="..." />
                    </div>
                </div>
                <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto"></label>
                <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-blue-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto"></label>

                <!-- Add additional indicators for each slide-->
                <ol class="carousel-indicators">
                    <li class="inline-block mr-3">
                        <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                    </li>
                    <li class="inline-block mr-3">
                        <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                    </li>
                    <li class="inline-block mr-3">
                        <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-white hover:text-blue-700">•</label>
                    </li>
                </ol>

            </div>
        </div>

        <div class="container w-3/4 m-auto px-10 pb-20">
            @foreach($eksternalBeasiswa as $key => $value)
            <section class="text-gray-600 body-font">
                <div class="container flex flex-wrap px-2 py-10 mx-auto items-center">
                    <div class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-gray-200">
                        <h1 class="sm:text-3xl text-2xl font-medium title-font mb-2 text-gray-900">

                            <a href="{{$value->registration_link}}">
                                {{$value->title}}
                            </a>
                        </h1>
                        <p class="leading-relaxed text-justify">
                            {{limit_text($value->caption, 20)}}
                        </p>
                    </div>
                    <div class="flex flex-col md:w-1/2 md:pl-12">
                        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                            <a href="{{$value->registration_link}}">
                                <img class="object-cover h-48 w-full scale-100 rounded-lg" src="{{ asset('storage/' . str_replace('public/', '', $value->thumbnail)) }}">
                            </a>
                        </div>
                        <form action="{{route('daftar-beasiswa')}}" method="GET" class="w-2/4 px-5 pt-4 pb-5">
                            <button class="inline-flex items-center text-white text-center font-semibold bg-blue-500 hover:bg-blue-700 px-4 py-1 rounded-md" type="submit" style="background-color: #F49D1A;">Daftar
                                <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </section>
            @endforeach
        </div>
        <div>
            <div class="table-auto">
                <div class="sm:-mx-6 lg:-mx-8">
                    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                        <div class="overflow-x-auto rounded-lg">
                            <table class="min-w-full text-left text-sm font-medium">
                                <thead class="border-b font-medium dark:border-neutral-500" style="background-color: #F49D1A;">
                                    <tr>
                                        <th scope="col" class="px-6 py-4">No</th>
                                        <th scope="col" class="px-6 py-4">Jenis Beasiswa</th>
                                        <th scope="col" class="px-6 py-4">Syarat Semester</th>
                                        <th scope="col" class="px-6 py-4">Kuota</th>
                                        <th scope="col" class="px-6 py-4">Syarat IP</th>
                                        <th scope="col" class="px-6 py-4">Besar Beasiswa</th>
                                        <th scope="col" class="px-6 py-4">Prioritas Berdasarkan Ekonomi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium">1</td>
                                        <td class="whitespace-nowrap px-6 py-4">Bidikmisi</td>
                                        <td class="whitespace-nowrap px-6 py-4">Mahasiswa yang mendaftar sejak masih SMA (ditetapkan pemerintah)</td>
                                        <td class="whitespace-nowrap px-6 py-4">6</td>
                                        <td class="whitespace-nowrap px-6 py-4">2,75</td>
                                        <td class="whitespace-nowrap px-6 py-4">SPP: 2,4 Juta
                                            Uang saku: 3,9 Juta</td>
                                        <td class="whitespace-nowrap px-6 py-4">N/A</td>
                                    </tr>
                                    <tr class="border-b dark:border-neutral-500">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">2</td>
                                        <td class="whitespace-nowrap px-6 py-4">BBP - Kopertis</td>
                                        <td class="whitespace-nowrap px-6 py-4">Minimal Semester 2</td>
                                        <td class="whitespace-nowrap px-6 py-4">10-15</td>
                                        <td class="whitespace-nowrap px-6 py-4">2,75</td>
                                        <td class="whitespace-nowrap px-6 py-4">Uang saku: 2,4 juta</td>
                                        <td class="whitespace-nowrap px-6 py-4">4</td>
                                    </tr>
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">3</td>
                                        <td class="whitespace-nowrap px-6 py-4">Tanoto Foundation</td>
                                        <td class="whitespace-nowrap px-6 py-4">Mahasiswa Baru</td>
                                        <td class="whitespace-nowrap px-6 py-4">5 - 6</td>
                                        <td class="whitespace-nowrap px-6 py-4">2,75</td>
                                        <td class="whitespace-nowrap px-6 py-4">SPP: Full
                                            Uang saku: 3,6 juta</td>
                                        <td class="whitespace-nowrap px-6 py-4">2</td>
                                    </tr>
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">4</td>
                                        <td class="whitespace-nowrap px-6 py-4">Rajawali Foundation</td>
                                        <td class="whitespace-nowrap px-6 py-4">Mahasiswa Baru</td>
                                        <td class="whitespace-nowrap px-6 py-4">5</td>
                                        <td class="whitespace-nowrap px-6 py-4">2,75</td>
                                        <td class="whitespace-nowrap px-6 py-4">SPP: Full</td>
                                        <td class="whitespace-nowrap px-6 py-4">3</td>
                                    </tr>
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">5</td>
                                        <td class="whitespace-nowrap px-6 py-4">Inalum</td>
                                        <td class="whitespace-nowrap px-6 py-4">Minimal Semester Baru</td>
                                        <td class="whitespace-nowrap px-6 py-4">7</td>
                                        <td class="whitespace-nowrap px-6 py-4">3</td>
                                        <td class="whitespace-nowrap px-6 py-4">Uang makan, uang kuliah. uang asrama: Full</td>
                                        <td class="whitespace-nowrap px-6 py-4">1</td>
                                    </tr>
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">6</td>
                                        <td class="whitespace-nowrap px-6 py-4">BNI</td>
                                        <td class="whitespace-nowrap px-6 py-4">Minimal Semester Baru</td>
                                        <td class="whitespace-nowrap px-6 py-4">10</td>
                                        <td class="whitespace-nowrap px-6 py-4">2,5</td>
                                        <td class="whitespace-nowrap px-6 py-4">Uang makan, uang kuliah. uang asrama: Full</td>
                                        <td class="whitespace-nowrap px-6 py-4">1</td>
                                    </tr>
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">7</td>
                                        <td class="whitespace-nowrap px-6 py-4">Internal (Alumni)</td>
                                        <td class="whitespace-nowrap px-6 py-4">Minimal Semester Baru</td>
                                        <td class="whitespace-nowrap px-6 py-4">ALL</td>
                                        <td class="whitespace-nowrap px-6 py-4"></td>
                                        <td class="whitespace-nowrap px-6 py-4"></td>
                                        <td class="whitespace-nowrap px-6 py-4">Joker</td>
                                    </tr>
                                    <tr class="border-b ">
                                        <td class="whitespace-nowrap px-6 py-4 font-medium ">8</td>
                                        <td class="whitespace-nowrap px-6 py-4">Pelido</td>
                                        <td class="whitespace-nowrap px-6 py-4">Minimal Semester Baru</td>
                                        <td class="whitespace-nowrap px-6 py-4">ALL</td>
                                        <td class="whitespace-nowrap px-6 py-4"></td>
                                        <td class="whitespace-nowrap px-6 py-4"></td>
                                        <td class="whitespace-nowrap px-6 py-4">Joker</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection