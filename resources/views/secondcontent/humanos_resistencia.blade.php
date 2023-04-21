<x-app-layout>
    <div class="container p-8">
        <h1>Humanos en resitencia</h1>

        @foreach ($maincontents as $main)
            @if ($main->id == '8')
                <article class="mb-8 bg-white shadow-xl rounded-md">
                    <div class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                        <div class="col-span-2">
                            <div class="px-6 py-4">
                                <img class="float-none lg:float-left mr-6 mb-4 w-60 h-33 object-cover object-center rounded-md saturate-150"
                                    src="images/HR1.jpg">
                                <div class="text-gray-700 text-base">
                                    <p>{{ $main->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            @else
                @if ($main->id == '9')
                    <article class="mb-8 bg-white shadow-xl rounded-md">
                        <div class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                            <div class="col-span-2">
                                <div class="px-6 py-4">
                                    <img class="float-none lg:float-right  ml-6 mb-4 w-56 h-33 object-cover object-center rounded-md saturate-150"
                                        src="images/HR2.jpg">
                                    <div class="text-gray-700 text-base">
                                        <p>{{ $main->description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                @else
                    @if ($main->id == '10')
                        <article class="mb-8 bg-white shadow-xl rounded-md">
                            <div class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                <div class="col-span-2">
                                    <div class="px-6 py-4">
                                        <img class="float-none lg:float-left mr-6 mb-4 w-60 h-33 object-cover object-center rounded-md saturate-150"
                                            src="images/HR3.jpg">
                                        <div class="text-gray-700 text-base">
                                            <p>{{ $main->description }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </article>
                    @else
                        @if ($main->id == '11')
                            <article class="mb-8 bg-white shadow-xl rounded-md">
                                <div class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                    <div class="col-span-2">
                                        <div class="px-6 py-4">
                                            <img class="float-none lg:float-right ml-6 mb-4 w-56 h-33 object-cover object-center rounded-md saturate-150"
                                                src="images/HR4.1.jpg">
                                            <div class="text-gray-700 text-base">
                                                <p>{{ $main->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @else
                            @if ($main->id == '12')
                                <article class="mb-8 bg-white shadow-xl rounded-md">
                                    <div class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                        <div class="col-span-2">
                                            <div class="px-6 py-4">
                                                <img class="float-none lg:float-left mr-6 m-4 w-60 h-33 object-cover object-center rounded-md saturate-150"
                                                    src="images/HR5.jpg">
                                                <div class="text-gray-700 text-base">
                                                    <p>{{ $main->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            @else
                                @if ($main->id == '13')
                                    <article class="mb-8 bg-white shadow-xl rounded-md">
                                        <div class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                            <div class="col-span-2">
                                                <div class="px-6 py-4">
                                                    <img class="float-none lg:float-right ml-6 mb-4 w-56 h-33 object-cover object-center rounded-md saturate-150"
                                                        src="images/HR6.jpg">
                                                    <div class="text-gray-700 text-base">
                                                        <p>{{ $main->description }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                @else
                                    @if ($main->id == '14')
                                        <article class="mb-8 bg-white shadow-xl rounded-md">
                                            <div class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                                <div class="col-span-2">
                                                    <div class="px-6 py-4">
                                                        <img class="float-none lg:float-left mr-6 mb-4 w-60 h-33 object-cover object-center rounded-md saturate-150"
                                                            src="images/HR7.jpg">
                                                        <div class="text-gray-700 text-base">
                                                            <p>{{ $main->description }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </article>
                                    @else
                                        @if ($main->id == '15')
                                            <article class="mb-8 bg-white shadow-xl rounded-md">
                                                <div class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                                    <div class="col-span-2">
                                                        <div class="px-6 py-4">
                                                            <img class="float-none lg:float-right ml-6 mb-4 lg:w-33 lg:h-20 w-60 h-33 object-cover object-center rounded-md saturate-150"
                                                                src="images/HR8.jpg">
                                                            <div class="text-gray-700 text-base">
                                                                <p>{{ $main->description }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        @else
                                            @if ($main->id == '16')
                                                <article class="mb-8 bg-white shadow-xl rounded-md">
                                                    <div class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                                        <div class="col-span-2">
                                                            <div class="px-6 py-4">
                                                                <img class="float-none lg:float-left mr-6 mb-4 w-60 h-33 object-cover object-center rounded-md saturate-150"
                                                                    src="images/HR9.jpg">
                                                                <div class="text-gray-700 text-base">
                                                                    <p>{{ $main->description }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </article>
                                            @else
                                                @if ($main->id == '17')
                                                    <article class="mb-8 bg-white shadow-xl rounded-md">
                                                        <div class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                                            <div class="col-span-2">
                                                                <div class="px-6 py-4">
                                                                    <img class="float-none lg:float-right ml-6 mb-4 w-56 h-33 object-cover object-center rounded-md saturate-150"
                                                                        src="images/HR10.jpg">
                                                                    <div class="text-gray-700 text-base">
                                                                        <p>{{ $main->description }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </article>
                                                @else
                                                    @if ($main->id == '18')
                                                        <article class="mb-8 bg-white shadow-xl rounded-md">
                                                            <div class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                                                <div class="col-span-2">
                                                                    <div class="px-6 py-4">
                                                                        <img class="float-none lg:float-left mr-6 mb-4 w-60 h-33 object-cover object-center rounded-md saturate-150"
                                                                            src="images/HR11.jpg">
                                                                        <div class="text-gray-700 text-base">
                                                                            <p>{{ $main->description }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </article>
                                                    @else
                                                        @if ($main->id == '19')
                                                            <article class="mb-8 bg-white shadow-xl rounded-md">
                                                                <div
                                                                    class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                                                    <div class="col-span-2">
                                                                        <div class="px-6 py-4">
                                                                            <img class="float-none lg:float-right ml-6 mb-4 lg:w-28 lg:h-16 w-60 h-33 object-cover object-center rounded-md saturate-150"
                                                                                src="images/HR12.jpg">
                                                                            <div class="text-gray-700 text-base">
                                                                                <p>{{ $main->description }}</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </article>
                                                        @else
                                                            @if ($main->id == '20')
                                                                <article class="mb-8 bg-white shadow-xl rounded-md">
                                                                    <div
                                                                        class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                                                        <div class="col-span-2">
                                                                            <div class="px-6 py-4">
                                                                                <img class="float-none lg:float-left mr-6 mb-4 w-60 h-33 object-cover object-center rounded-md saturate-150"
                                                                                    src="images/HR13.jpg">
                                                                                <div class="text-gray-700 text-base">
                                                                                    <p>{{ $main->description }}</p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </article>
                                                            @else
                                                                @if ($main->id == '21')
                                                                    <article class="mb-8 bg-white shadow-xl rounded-md">
                                                                        <div
                                                                            class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                                                            <div class="col-span-2">
                                                                                <div class="px-6 py-4">
                                                                                    <img class="float-none lg:float-right ml-6 mb-4 w-56 h-33 object-cover object-center rounded-md saturate-150"
                                                                                        src="images/HR14.jpg">
                                                                                    <div
                                                                                        class="text-gray-700 text-base">
                                                                                        <p>{{ $main->description }}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </article>
                                                                @else
                                                                    @if ($main->id == '22')
                                                                        <article
                                                                            class="mb-8 bg-white shadow-xl rounded-md">
                                                                            <div
                                                                                class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                                                                <div class="col-span-2">
                                                                                    <div class="px-6 py-4">
                                                                                        <img class="float-none lg:float-left mr-6 mb-4 w-60 h-33 object-cover object-center rounded-md saturate-150"
                                                                                            src="images/HR15.jpg">
                                                                                        <div
                                                                                            class="text-gray-700 text-base">
                                                                                            <p>{{ $main->description }}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </article>
                                                                    @else
                                                                        @if ($main->id == '23')
                                                                            <article
                                                                                class="mb-8 bg-white shadow-xl rounded-md">
                                                                                <div
                                                                                    class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                                                                    <div class="col-span-2">
                                                                                        <div class="px-6 py-4">
                                                                                            <img class="float-none lg:float-right ml-6 mb-4 w-56 h-33 object-cover object-center rounded-md saturate-150"
                                                                                                src="images/HR16.jpg">
                                                                                            <div
                                                                                                class="text-gray-700 text-base">
                                                                                                <p>{{ $main->description }}
                                                                                                </p>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </article>
                                                                        @else
                                                                            @if ($main->id == '24')
                                                                                <article
                                                                                    class="mb-8 bg-white shadow-xl rounded-md">
                                                                                    <div
                                                                                        class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                                                                        <div class="col-span-2">
                                                                                            <div class="px-6 py-4">
                                                                                                <img class="float-none lg:float-left mr-6 mb-4 w-60 h-33 object-cover object-center rounded-md saturate-150"
                                                                                                    src="images/HR17.jpg">
                                                                                                <div
                                                                                                    class="text-gray-700 text-base">
                                                                                                    <p>{{ $main->description }}
                                                                                                    </p>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </article>
                                                                            @else
                                                                                @if ($main->id == '25')
                                                                                    <article
                                                                                        class="mb-8 bg-white shadow-xl rounded-md">
                                                                                        <div
                                                                                            class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                                                                            <div class="col-span-2">
                                                                                                <div class="px-6 py-4">
                                                                                                    <img class="float-none lg:float-right ml-6 mb-4 w-56 h-33 object-cover object-center rounded-md saturate-150"
                                                                                                        src="images/HR18.jpg">
                                                                                                    <div
                                                                                                        class="text-gray-700 text-base">
                                                                                                        <p>{{ $main->description }}
                                                                                                        </p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </article>
                                                                                @else
                                                                                    @if ($main->id == '26')
                                                                                        <article
                                                                                            class="mb-8 bg-white shadow-xl rounded-md">
                                                                                            <div
                                                                                                class="grid lg:grid-rows-1 lg:grid-flow-col lg:gap-3">
                                                                                                <div
                                                                                                    class="col-span-2">
                                                                                                    <div
                                                                                                        class="px-6 py-4">
                                                                                                        <img class="float-none lg:float-left mr-6 mb-4 w-60 h-33 object-cover object-center rounded-md saturate-150"
                                                                                                            src="images/HR19.jpg">
                                                                                                        <div
                                                                                                            class="text-gray-700 text-base">
                                                                                                            <p>{{ $main->description }}
                                                                                                            </p>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </article>
                                                                                    @endif
                                                                                @endif
                                                                            @endif
                                                                        @endif
                                                                    @endif
                                                                @endif
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        @endif
                                    @endif
                                @endif
                            @endif
                        @endif
                    @endif
                @endif
            @endif
        @endforeach
        {{-- <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 mb-4">
            <x-carousel_HR />
        </div> --}}
    </div>
</x-app-layout>
