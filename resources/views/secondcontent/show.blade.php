<x-app-layout>
    <div class="container py-8">
        <h1 class="font-ral  text-gray-800 m-4">{{ $secondary->title }}</h1>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            {{-- Contenido principal --}}
            <div class="lg:col-span-2">

                @foreach ($secondary->image as $second)
                    <figure>
                        <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($second->url) }}"
                            alt="">
                    </figure>
                @endforeach

                <div class="text-base font-ral text-gray-500 mt-4">
                    <?php echo $secondary->body; ?>
                </div>
            </div>

            {{-- Contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-ral font-bold text-gray-600 mb-4">Mas en {{ $secondary->category->name }}</h1>

                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{ route('secondcontent.show', $similar) }}">
                                @foreach ($similar->image as $simil)
                                    <img class="w-32 h-20 object-cover object-center" src="{{Storage::url($simil->url)}}" alt="">
                                    <span class="ml-2 text-gray-600">{{$similar->title}}</span>
                                @endforeach
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>
