<div class="mt-5 ml-5">
    @foreach($announcements as $key => $value)
    @php
    $expirationDate = \Carbon\Carbon::parse($value->created_at)->addMonth();
    $currentDate = \Carbon\Carbon::now();
    $isExpired = $currentDate->greaterThan($expirationDate);
    @endphp

    @if(!$isExpired)
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4 border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600">
                                    <a href="{{route('article',$value->id_article) }}" class="text-lg pt-2 text-blue-600/100">{{$value->title}}</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $value->created_at}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if(auth()->check() && auth()->user()->role == 'Admin')
    <div class="w-full flex items-center justify-end mt-5">
        <a href="{{ route('edit-article', $value->id_article) }}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:hover:bg-blue-700 dark:focus:ring-blue-800" style="background-color: #F49D1A;">
            Edit
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
            </svg>
        </a>
        <form action="{{ route('delete-article', $value->id_article) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this article?')">
            @csrf
            @method('DELETE')
            <button type="submit" class="inline-flex items-center px-3 py-2 ml-2 text-sm font-medium text-center text-white rounded-lg hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 dark:hover:bg-red-700 dark:focus:ring-red-800" style="background-color: #EF4444;">
                Delete
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                </svg>
            </button>
        </form>
    </div>
    @endif
    @endif
    @endforeach
</div>