<x-app-layout> 
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="uppercase text-3xl">Categoria: {{$category->name}} </h1>
        {{-- <h1 class="uppercase text-center text-3xl font-bold mb-4">Categoria: {{$category->name}} </h1> --}}

        @foreach ($seconContents as $secont)
            <article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
                @foreach ($secont->image as $seco)
                    <img class="w-full h-80 object-cover object-center bg-contain" src="{{ Storage::url($seco->url)}}" alt="">
                @endforeach

                <div class="px-6 py-4">
                    <h2 class="font-bold text-xl mb-2">
                        <a href="{{ route('secondcontent.show', $secont) }}">{{$secont->title}}</a>
                    </h2>

                    <div class="text-gray-700 text-base">
                        {{$secont->description}}
                    </div>
                    
                    <div class="px-6 pt-4 pb-2">
                        <a href="{{$secont->url}}" class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2" target="_blank">Más información</a>
                    </div>
                </div>
            </article>
        @endforeach

        <div class="mt-4">
            {{$seconContents->links()}}
        </div>
    </div>
</x-app-layout>