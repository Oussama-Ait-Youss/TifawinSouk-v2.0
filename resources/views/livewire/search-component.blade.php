<div>
     <div wire:loading class="mt-2 text-gray-500">
        Searching...
    </div>

    <div wire:loading.remove class="mt-4">
        @if (strlen($search) > 0)
            @if($results->isEmpty())
                <p class="text-gray-500">No results found for "{{ $search }}".</p>
            @else
                @foreach($results as $item)
                    <div class="py-2 border-b">
                        <h3 class="font-bold">{{$item->nom}}</h3>
                    </div>
                @endforeach
            @endif
        @else
            <p class="text-gray-400">Enter a term to search...</p>
        @endif
    </div>
</div>