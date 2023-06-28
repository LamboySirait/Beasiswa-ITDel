@extends('layouts.app')
@section('title','about')
@section('background', 'bg-white')
@section('content')
<div class="container w-3/4 m-auto px-10 pb-20">
  <h1 class="text-center font-bold text-3xl pt-12 pb-3 text-white" style="color: #0D285F;">TENTANG KAMI</h1>
  <section class="text-gray-600 body-font">
    <div class="container flex flex-wrap px-5 py-24 mx-auto items-center">
      <div class="md:w-1/2 md:pr-12 md:py-8 md:border-r md:border-b-0 mb-10 md:mb-0 pb-10 border-b border-gray-200">
        <p class="leading-relaxed text-justify">Selamat datang di website resmi Institut Teknologi Del (IT Del), perguruan tinggi teknologi yang berlokasi di desa Sitoluama, kecamatan Laguboti, Kabupaten Toba, Sumatera Utara. IT Del memiliki visi untuk menjadi perguruan tinggi terkemuka di bidang teknologi yang mampu menghasilkan lulusan berkualitas dan mampu bersaing di tingkat global. Dalam mencapai visi tersebut, IT Del memiliki beberapa misi, di antaranya menyelenggarakan pendidikan teknologi berkualitas, mengembangkan penelitian dan pengabdian masyarakat, menjalin kemitraan dengan industri dan lembaga lainnya, menumbuhkan semangat wirausaha dan inovasi, serta mengembangkan sistem manajemen dan tata kelola perguruan tinggi yang baik.</p>
      </div>
      <div class="flex flex-col md:w-1/2 md:pl-12">
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
          <img class="object-cover object-center rounded" alt="hero" src="{{url(asset('assets/del.jpg'))}}">
        </div>
      </div>
      <div class="">
        <p class="leading-relaxed text-justify">IT Del menyediakan berbagai program studi di bidang teknologi, antara lain Teknik Informatika, Sistem Informasi, Teknik Elektro, Teknik Mesin, Teknik Sipil, Teknik Arsitektur, dan Desain Komunikasi Visual. Selain itu, IT Del juga menyediakan program studi magister di bidang Teknik Elektro dan Teknik Informatika.
          Untuk mendukung proses belajar mengajar, IT Del memiliki fasilitas yang lengkap dan modern, seperti laboratorium komputer, laboratorium elektronika, laboratorium otomotif, studio televisi, studio desain grafis, perpustakaan, aula, dan gedung perkuliahan yang representatif. IT Del juga memiliki dosen dan tenaga pendidik yang berkualitas dan berpengalaman di bidang teknologi.
          IT Del menyediakan berbagai program beasiswa bagi mahasiswa yang memiliki potensi akademik dan finansial yang terbatas. Program beasiswa tersebut bertujuan untuk membantu mahasiswa yang ingin melanjutkan studinya di IT Del namun mengalami kesulitan dalam membayar biaya kuliah.
          Kami berharap informasi ini dapat membantu Anda untuk mengenal lebih lanjut tentang profil dan program studi yang disediakan oleh IT Del. Untuk informasi lebih lanjut, silakan hubungi kami melalui kontak yang tersedia di website ini. Terima kasih telah mengunjungi website resmi Institut Teknologi Del.</p>
      </div>
    </div>
  </section>
</div>
@endsection