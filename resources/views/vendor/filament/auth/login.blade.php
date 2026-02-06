<x-filament::layouts.base>
    <div class="flex min-h-screen items-center justify-center bg-gray-50 dark:bg-gray-900">
        <div class="w-full max-w-md">
            <!-- Custom Header -->
            <div class="mb-8 text-center">
                <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                    TifawinSouk
                </h1>
                <p class="mt-2 text-gray-600 dark:text-gray-400">
                    Welcome to your admin panel
                </p>
            </div>

            <!-- Login Form -->
            <x-filament::card>
                <form wire:submit="authenticate">
                    {{ $this->form }}
                    
                    <div class="mt-6">
                        <x-filament::button type="submit" class="w-full">
                            Sign in
                        </x-filament::button>
                    </div>
                </form>

                @if (filament()->hasRegistration())
                    <div class="mt-4 text-center">
                        <a href="{{ filament()->getRegistrationUrl() }}" 
                           class="text-sm text-primary-600 hover:text-primary-500">
                            Don't have an account? Register
                        </a>
                    </div>
                @endif
            </x-filament::card>
        </div>
    </div>
</x-filament::layouts.base>
