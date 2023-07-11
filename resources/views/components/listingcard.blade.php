{{-- Need accreditation to $list for that "PROPS" is used --}}
@props(['list'])

<x-card>
                    <div class="flex">
                        <img
                            class="hidden w-48 mr-6 md:block"
                            src="images/no-image.png"
                            alt=""
                        />
                        <div>
                            <h3 class="text-2xl">
                                <a href="/listing/{{$list->id}}">{{ $list->title }}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{ $list->company }}</div>
                            <ul class="flex">
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                    <a href="#">Laravel</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                    <a href="#">API</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                    <a href="#">Backend</a>
                                </li>
                                <li
                                    class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs"
                                >
                                    <a href="#">Vue</a>
                                </li>
                            </ul>
                            <div class="text-lg mt-4">
                                <i class="fa-solid fa-location-dot"></i> {{ $list->location }}
                            </div>
                        </div>
                    </div>
</x-card>