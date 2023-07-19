{{-- Need accreditation to $list for that "PROPS" is used --}}
@props(['list'])

<x-card>
                    <div class="flex">
                        <img
                            class="hidden w-48 mr-6 md:block"
                            {{-- If there is a logo, display it, otherwise display the no-image.png --}}
                            src="{{ $list->logo ? asset('storage/'.$list->logo) : asset('images/no-image.png') }}"
                            alt=""
                        />
                        <div>
                            <h3 class="text-2xl">
                                <a href="/listing/{{$list->id}}">{{ $list->title }}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{ $list->company }}</div>

                            <x-listingTags :tagsCsv="$list->tags" />

                            <div class="text-lg mt-4">
                                <i class="fa-solid fa-location-dot"></i> {{ $list->location }}
                            </div>
                        </div>
                    </div>
</x-card>