<div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 border border-gray-200 dark:border-gray-700">
    @if(isset($data['title']))
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
            {{ $data['title'] }}
        </h3>
    @endif
    
    <div class="space-y-3">
        @isset($data['content'])
            {{ $data['content'] }}
        @else
            <p class="text-gray-600 dark:text-gray-400">
                Custom card content goes here
            </p>
        @endisset
    </div>
    
    @if(isset($data['footer']))
        <div class="mt-4 pt-4 border-t border-gray-200 dark:border-gray-700">
            {{ $data['footer'] }}
        </div>
    @endif
</div>
