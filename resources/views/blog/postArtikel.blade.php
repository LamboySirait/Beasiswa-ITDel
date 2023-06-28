<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 justify-center">
  @foreach($arrayOfArticle as $key => $value)
  @php
  $img = "imgArt";
  @endphp
  <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadowm m-2 relative">
    <div class="px-3 py-2" style="background-color: #0D285F33;">
      <img src="{{ asset('storage/' . str_replace('public/', '', $value->thumbnail)) }}" alt="{{$value->title}}" height="300">

      <div class="font-bold pt-2">
        <a href="">
          <h5 class="mb-2 text-2xl font-bold tracking-tight text-black">{{$value->title}}</h5>
        </a>
      </div>

      @if(auth()->check() && auth()->user()->role == 'Admin')
      <form class="absolute top-2 right-2 mr-2 mt-2" action="{{ route('delete-article', $value->id_article) }}" method="POST">
        @csrf
        @method('DELETE')
        <button class="text-amber-400 hover:text-red-700 focus:text-red-700 border-solid border-2 border-amber-600 hover:border-red-700" type="submit">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
          </svg>
        </button>
      </form>
      @endif
    </div>
    
    <div class="px-3 mx-1">
      <p class="py-2">{{limit_text($value->caption,12)}}</p>
      <div class="flex">
        <form class="w-full my-5" action="{{route('article',$value->id_article) }}" method="GET">
          <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit" style="background-color: #F49D1A;">
            Read more
            <svg aria-hidden="true" class="w-4 h-4 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
            </svg>
          </button>
        </form>

            {{-- Create method edit article --}}
    @if(auth()->check() && auth()->user()->role == 'Admin')
    <form class="w-full my-5" action="{{ route('edit-article', $value->id_article) }}" method="GET">
      @csrf
          <button class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="submit" style="background-color: #F49D1A;">
            Edit
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>                      
          </button>
    </form>
    @endif

      </div>
    </div>
  </div>
  @endforeach
</div>
<div class="m-auto pb-5">
  {!! $arrayOfArticle->appends(Request::except('page'))->render() !!}
</div>