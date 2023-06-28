@extends('layouts.app')
@section('title','Homepage')
@section('background', 'bg-white')
@section('background-opc')
@section('content')


<script src="{{ asset('js/tabs.js') }}">
  // Initialization for ES Users
  import {
    Tab,
    initTE,
  } from "tw-elements";

  initTE({
    Tab
  });
</script>



@csrf
<div id="hero" class="lg:flex items-center">
  <div class="px-5 sm:px-10 md:px-10 md:flex lg:block lg:w-1/2 lg:max-w-3xl lg:mr-8 lg:px-20">
    <div class="md:w-1/2 md:mr-10 lg:w-full lg:mr-0">
      <h1 class="text-5xl font-extrabold tracking-tight text-black sm:text-5xl md:text-5xl lg:text-6xl xl:text-8xl">
        <span class="block xl:inline">Create The</span><br>
        <span class="block text-indigo-600 xl:inline">Best Future</span>
      </h1>
      <p class="mt-5 mx-auto text-base text-yellow-400 sm:max-w-md lg:text-xl md:max-w-3xl font-extrabold">Create Your Own Dream</p>
    </div>
  </div>

  <div class="mt-6 w-full flex-1 lg:mt-0">
    <img class="" src="{{url(asset('assets/landing-page.png'))}}" />
  </div>
</div>

<style>
  .test {
    background: hsla(0, 0%, 100%, 1);
    background: linear-gradient(90deg, hsla(0, 0%, 100%, 1) 45%, hsla(0, 0%, 90%, 1) 45%);
    background: -moz-linear-gradient(90deg, hsla(0, 0%, 100%, 1) 45%, hsla(0, 0%, 90%, 1) 45%);
    background: -webkit-linear-gradient(90deg, hsla(0, 0%, 100%, 1) 45%, hsla(0, 0%, 90%, 1) 45%);
    filter: progid: DXImageTransform.Microsoft.gradient(startColorstr="#FFFFFF", endColorstr="#E6E6E6", GradientType=1);
  }
</style>

<div class="absolute top-[522px] left-[373px] rounded-xxs bg-white shadow-[0px_10px_2px_rgba(0,_0,_0,_0.03),_0px_12px_16px_rgba(0,_0,_0,_0.1)] flex flex-row py-px pr-[1.015625px] pl-px items-center justify-center text-darkslategray-100 border-[1px] border-solid border-darkgray rounded-md">
  <div class="relative w-[379.33px] h-[410.89px] shrink-0">
    <img class="absolute top-[50px] left-[149px] rounded-base w-[82px] h-[82px] object-cover" alt="" src="{{url(asset('assets/icon-internal.png'))}}" />
    <div class="absolute top-[161.75px] left-[25px] flex flex-col pt-0 pb-[0.09375px] pr-[4.50311279296875px] pl-[4.6875px] items-center justify-start gap-[15.8px]">
      <b class="relative text-2xl text-[#31506E]">Beasiswa Internal</b>
      <div class="relative text-base text-darkslategray-200 flex items-center justify-center w-[320.14px] text-[#31506E] text-center">
        Beasiswa yang diberikan oleh Institut Teknologi Del dengan
        sasaran dan ketentuan yang ...
      </div>
    </div>
    <div class="absolute top-[calc(50%_+_109.95px)] left-[calc(50%_-_57.29px)] rounded flex flex-row pt-[8.5px] pb-[9px] pr-[21.181251525878906px] pl-[21.381248474121094px] items-start justify-start text-[17px] border-[1px] border-solid border-whitesmoke-200">
      <a href="/postsbeasiswainternal"><b class="text-base text-[#31506E]">Read me</a>
    </div>
  </div>

  <div class="relative w-[379.33px] h-[410.89px] shrink-0 text-orange">
    <img class="absolute top-[51px] left-[148.67px] rounded-base w-[82px] h-[82px] object-cover" alt="" src="{{url(asset('assets/icon-eksternal.png'))}}" />
    <div class="absolute top-[161.75px] left-[25px] flex flex-col pt-0 pb-[0.09375px] pr-[6.51873779296875px] pl-[6.71875px] items-center justify-start gap-[15.8px]">
      <b class="text-2xl text-[#F49D1A]">Beasiswa Eksternal</b>
      <div class="relative text-base text-darkslategray-200 flex items-center justify-center w-[320.14px] text-[#31506E] text-center">
        Beasiswa yang diperoleh dari luar kampus, namun dikelola oleh
        Institut Teknologi Del sesuai ketentuan yang ...
      </div>
    </div>
    <div class="absolute top-[calc(50%_+_109.95px)] left-[calc(50%_-_55.95px)] rounded flex flex-row pt-[8.5px] pb-[9px] pr-[17.845314025878906px] pl-[18.045310974121094px] items-start justify-start text-xl border-[1px] border-solid border-whitesmoke-200">
      <a href="/beasiswaEksternal"><b class="text-base text-[#F49D1A]">Read me</b></a>
    </div>
  </div>
</div>

<!-- Container -->
<div class="container my-24 px-12 mx-auto">

  <!-- Section: Design Block -->
  <section class="mb-32 text-[#0D285F]">
    <div class="px-6 py-12 md:mx-24 text-center lg:text-left">
      <div class="container mx-auto mt-40">
        <div class="grid lg:grid-cols-2 gap-12 flex items-center">
          <div class="mt-12 lg:mt-0">
            <h1 class="text-5xl md:text-6xl xl:text-7xl font-bold tracking-tight mb-12">
              Tentang <br /><span>Kami</span>
            </h1>
            <p class="text-lg">
              Insititut Teknonogi Del adalah sebuah perguruan tinggi swasta yang berkedudukan di desa Sitoluama, kecamatan Laguboti, Kabupaten Toba, Sumatra Utara, Indonesia yang didirikan oleh Luhut Binsar Panjaitan.
            </p>
          </div>
          <div class="mb-12 lg:mb-0">
            <div class="embed-responsive embed-responsive-16by9 relative w-full overflow-hidden rounded-lg shadow-lg" style="padding-top: 56.25%">
              <iframe class="embed-responsive-item absolute top-0 right-0 bottom-0 left-0 w-full h-full" src="https://www.youtube.com/embed/iRuvHVWDpGk" allowfullscreen="" data-gtm-yt-inspected-2340190_699="true" id="240632615"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->

</div>

<!-- MULTI TAB -->

<!--Tabs navigation-->
<div class="container mx-auto px-4">
  <ul class="mb-5 flex list-none flex-row flex-wrap border-b-0 pl-0 rounded-lg" role="tablist" data-te-nav-ref style="background-color: #0D285F;">

    <li role="presentation" class="flex-grow basis-0 text-center">
      <a href="#tabs-berita02" class="border-x-4 border-white-500 my-2 block px-7 pb-3.5 pt-4 text-xm font-bold uppercase leading-tight text-neutral-500  focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-white dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-white-400" data-te-toggle="pill" data-te-target="#tabs-berita02" data-te-nav-active role="tab" aria-controls="tabs-berita02" aria-selected="true">BERITA</a>
    </li>
    <li role="presentation" class="flex-grow basis-0 text-center">
      <a href="#tabs-pengumuman02" class="border-x-4 border-white-500 my-2 block px-7 pb-3.5 pt-4 text-xm font-bold uppercase leading-tight text-neutral-500  focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-white dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-white-400" data-te-toggle="pill" data-te-target="#tabs-pengumuman02" role="tab" aria-controls="tabs-pengumuman02" aria-selected="false">PENGUMUMAN</a>
    </li>
    <li role="presentation" class="flex-grow basis-0 text-center">
      <a href="#tabs-testimoni02" class="border-x-4 border-white-500 my-2 block px-7 pb-3.5 pt-4 text-xm font-bold uppercase leading-tight text-neutral-500  focus:isolate focus:border-transparent data-[te-nav-active]:border-primary data-[te-nav-active]:text-white dark:text-neutral-400 dark:hover:bg-transparent dark:data-[te-nav-active]:border-primary-400 dark:data-[te-nav-active]:text-white-400" data-te-toggle="pill" data-te-target="#tabs-testimoni02" role="tab" aria-controls="tabs-testimoni02" aria-selected="false">TESTIMONI</a>
    </li>
  </ul>
</div>

<!--Tabs content-->
<div>
  <div class="">
    <div class="hidden opacity-100 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-berita02" role="tabpanel" aria-labelledby="tabs-berita-tab02" data-te-tab-active>
      <div style="border: 8px solid #F49D1A; width: 350px;" class="mb-5 shadow md:shadow-lg"></div>
      <h1 class="text-5xl md:text-6xl md:ml-20 xl:text-6xl text-[#0D285F] font-bold tracking-tight">BERITA</span></h1>

      <!-- TAMPIL BERITA -->
      <div class="flex items-center justify-center my-10">
        <div class="bg-white border border-gray-200 rounded-lg shadowm m-2">
          @include('blog.postArtikel')
        </div>
      </div>
    </div>

    <!-- TAMPIL PENGUMUMAN -->
    <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-pengumuman02" role="tabpanel" aria-labelledby="tabs-pengumuman-tab02">
      <div style="border: 8px solid #F49D1A; width: 450px;" class="mb-5 shadow md:shadow-lg"></div>
      <h1 class="text-5xl md:text-6xl md:ml-20 xl:text-5xl text-[#0D285F] font-bold tracking-tight">PENGUMUMAN</span></h1>
      <div class="flex items-center justify-center my-10 rounded-lg" style="width: 800px; margin:20px auto;">
        <div class="bg-white m-2" style="width:800px;">
          @include('blog.postPengumuman')
        </div>
      </div>
    </div>

    <!-- TAMPIL TESTIMONI -->
    <div class="hidden opacity-0 transition-opacity duration-150 ease-linear data-[te-tab-active]:block" id="tabs-testimoni02" role="tabpanel" aria-labelledby="tabs-testimoni-tab02">
      <div style="border: 8px solid #F49D1A; width: 350px;" class="mb-5 shadow md:shadow-lg"></div>
      <h1 class="text-5xl md:text-6xl md:ml-20 xl:text-5xl text-[#0D285F] font-bold tracking-tight">TESTIMONI</span></h1>
      <div class="flex items-center justify-end mt-20 mr-20 rounded-lg" style="width: 800px; margin:20px auto;">
        <div class="bg-white border border-gray-200 rounded-lg shadowm m-2" style="width:800px;">
          @if(!Auth::guest())
          @if(Auth::user()->role == 'Admin')
          <a href="/testimoni" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
            <svg class="h-8 w-8 text-grey-500" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
              <path stroke="none" d="M0 0h24v24H0z" />
              <path d="M9 7 h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
              <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
              <line x1="16" y1="5" x2="19" y2="8" />
            </svg>
            <span>Edit</span>
          </a>
          @endif
          @endif
          @include('blog.postTestimoni')
        </div>
      </div>
    </div>
    <!-- END MULTI TAB -->

    @endsection