<x-layout>
@include('partials._search')


{{-- <h2>{{ $listingSS['title'] }}</h2>
<p>{{ $listingSS['description'] }}</p> --}}

<a href="/" class="inline-block text-black ml-4 mb-4"
                ><i class="fa-solid fa-arrow-left"></i> Back
            </a>
            <div class="mx-4">
                <x-card class="p-10">
                    <div class="flex flex-col items-center justify-center text-center">
                        <img
                            class="w-48 mr-6 mb-6"
                            src="{{ $listingSS->logo ? asset('storage/'.$listingSS->logo) : asset('images/no-image.png') }}"
                            alt=""
                        />

                        <h3 class="text-2xl mb-2">{{ $listingSS->title }}</h3>
                        <div class="text-xl font-bold mb-4">{{ $listingSS->company }}</div>
                    
                        <x-listingTags :tagsCsv="$listingSS->tags" />

                        <div class="text-lg my-4">
                            <i class="fa-solid fa-location-dot"></i> {{ $listingSS->location }}
                        </div>
                        <div class="border border-gray-200 w-full mb-6"></div>
                        <div>
                            <h3 class="text-3xl font-bold mb-4">
                                Job Description
                            </h3>
                            <div class="text-lg space-y-6">
                                <p>{{ $listingSS->description }}</p>

                                <a
                                    href="mailto:{{$listingSS->email}}"
                                    class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-envelope"></i>
                                    Contact Employer</a
                                >
                                <a
                                    href="{{$listingSS->website}}"
                                    target="_blank"
                                    class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                                    ><i class="fa-solid fa-globe"></i> Visit
                                    Website</a
                                >
                            </div>
                        </div>
                    </div>
                </x-card>

            </div>

</x-layout>