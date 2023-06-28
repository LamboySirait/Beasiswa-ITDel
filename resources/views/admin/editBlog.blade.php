{{-- Make editBlog view --}}
@extends('layouts.app')
@section('title','Edit Content')
@section('background', 'bg-white')
@section('content')
<!DOCTYPE html>
<html>
    <head>
      <script src="https://cdn.tiny.cloud/1/r61tdwe7quptc3zicrvoj8ej7gnroxlmevlp4c6gbej45rm9/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet" />
        <link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css"
            rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="w-3/4 mx-auto font-montserrat font-medium">
            <h1 class="py-10 text-4xl font-bold"> Edit Content </h1>
            <form action="{{ route('update-blog', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-10">
                    <label class="text-xl p-1 tracking-wide" for="title">Judul</label>
                    <input class="block w-full px-4 py-3 text-gray-700 border border-gray-300 rounded leading-tight focus:outline-none hover:shadow-md"
                        id="title" name="title" type="text" value="{{ $blog->title }}">
                    @error('title')
                    <div class="text-red-600  pl-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-10">
                    <label for="tags" class="text-xl p-1 tracking-wide">Jenis Kegiatan</label>
                    <input type="text" class="w-full px-4 py-2 mt-2 mb-10 text-sm border border-gray-300 rounded leading-tight focus:outline-none hover:shadow-md "
                        id="tags" name="tags" value="{{ $blog->tags }}" autofocus />
                    @error('tags')
                    <div class="text-red-600  pl-2">{{ $message }}</div>
                    @enderror  
                </div>
                <div class="mb-10">
                    <label for="caption" class="text-xl p-1 tracking-wide">Deskripsi Singkat</label>
                    <input class="block w-full px-4 py-3 text-gray-700 border border-gray-300 rounded leading-tight focus:outline-none hover:shadow-md"
                        id="caption" name="caption"
                        type="text" value="{{ $blog->caption }}">
                    @error('caption')
                    <div class="text-red-600  pl-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-10">
                    <label for="description" class="text-xl p-1 tracking-wide">Isi Konten</label>
                    <textarea class="block w-full px-4 py-3 text-gray-700 border border-gray-300 rounded leading-tight focus:outline-none hover:shadow-md"
                        id="description" name="description" rows="10">{{ $blog->description }}</textarea>
                    @error('description')
                    <div class="text-red-600  pl-2">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-10">
                    <label for="image" class="text-xl p-1 tracking-wide">Gambar</label>
                    <input type="file" class="w-full px-4 py-2 mt-2 mb-10 text-sm border border-gray-300 rounded leading-tight focus:outline-none hover:shadow-md "
                        id="image" name="image" value="{{ $blog->image }}" autofocus />
                    @error('image')
                    <div class="text-red-600  pl-2">{{ $message }}</div>
                    @enderror
                </div>

                <div class="flex flex-row-reverse">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white px-5 py-2 my-4 rounded-md">Submit</button>
                    <a href="/" class="bg-red-500 hover:bg-red-700 text-white px-5 py-3 mx-4 my-4 rounded-md">Cancel</a>
                  </div>

            </form>
        </div>
  {{-- Script for input tags --}}
  <script src="https://unpkg.com/@yaireo/tagify"></script>
  <script src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
  <script>
    // The DOM element you wish to replace with Tagify
    var input = document.querySelector('input[name=tags]');
    var tagify = new Tagify(input, {
      keepInvalidTags: true,
      whitelist: ['Artikel', 'Berita', 'Beasiswa', 'Internal', 'Pengumuman'],
      hooks: {
        beforeRemoveTag: (tags) => {
          tags[0].node.classList.add('tagify__tag');
          return new Promise((resolve, reject) => {
            confirm(`Are you sure to delete ${tags[0].data.value} tag ?`) ?
              resolve() :
              reject();
          });
        },
      },
    });
  </script>
  {{-- Script for TinyMCE --}}
  <script>
    tinymce.init({
      selector: 'textarea',
      height: 700,
      plugins: 'anchor autolink charmap codesample emoticons image code link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
      toolbar: 'insertfile undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
      mergetags_list: [{
          value: 'First.Name',
          title: 'First Name'
        },
        {
          value: 'Email',
          title: 'Email'
        }
      ],

      images_upload_handler: function(blobInfo, success, failure) {
        var xhr, formData;

        xhr = new XMLHttpRequest();
        xhr.withCredentials = false;
        xhr.open('POST', '/upload'); // Ganti URL sesuai dengan URL upload gambar Anda

        xhr.onload = function() {
          var json;

          if (xhr.status != 200) {
            failure('HTTP Error: ' + xhr.status);
            return;
          }

          json = JSON.parse(xhr.responseText);

          if (!json || typeof json.location != 'string') {
            failure('Invalid JSON: ' + xhr.responseText);
            return;
          }

          success(json.location);
        };

        formData = new FormData();
        formData.append('file', blobInfo.blob(), blobInfo.filename());

        xhr.send(formData);
      }

    });
  </script>
    </body>
</html>
@endsection