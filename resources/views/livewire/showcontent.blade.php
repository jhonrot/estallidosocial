<div>
    @livewire('banner')
    <div class="container p-8">

        @foreach ($maincontents as $maincont)
            <h1 class="text-center text-xl m-6">
                @if ($maincont->id == '1')
                    {{ $maincont->title }}
                @endif
            </h1>

            <p>
                @if ($maincont->id == '1')
                    {{ $maincont->description }}
                @endif
            </p>
        @endforeach

        <div>
            @foreach ($categories as $category)
                @if ($category->id == '1')
                    <a href="{{ route('secondcontent.category', $category) }}"
                        class="inline-block px-3 h-6 bg-orange-300 text-white rounded-xl"> {{ $category->name }}
                    </a>
                @endif
            @endforeach
        </div>

    </div>
</div>
