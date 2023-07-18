<x-layout>
@include('partials._hero')
@include('partials._search')

<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

<!-- blade -->

@foreach($listings as $list)
<x-listingcard :list="$list" />
@endforeach

@if (count($listings)==0)
    <p>No listings found</p>
@endif

</div>
</x-layout>
