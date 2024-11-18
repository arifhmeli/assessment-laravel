<button type="{{ $type ?? 'button' }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 w-[200px] {{ $extraClass ?? '' }}">
    {{ $slot }}
</button>