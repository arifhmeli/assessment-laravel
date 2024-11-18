<div class="mb-4">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ $label }}</label>
    <div class="relative">
        {{-- Icon (conditionally rendered if $icon is passed) --}}
        @if ($icon)
        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
            {!! $icon !!}
        </div>
        @endif

        {{-- Checkbox or Input Field --}}
        @if ($type === 'checkbox')
            <div class="flex items-center">
                <input 
                    type="checkbox" 
                    name="{{ $name }}" 
                    id="{{ $name }}" 
                    value="1" 
                    class="w-4 h-4 border border-gray-300 rounded-sm focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                    {{ old($name) ? 'checked' : '' }}
                    {{ $required ? 'required' : '' }}
                />
                <label for="{{ $name }}" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Active</label>
            </div>
        @else
            <input 
                type="{{ $type }}" 
                name="{{ $name }}" 
                id="{{ $name }}" 
                placeholder="{{ $placeholder }}" 
                value="{{ old($name, $value) }}" 
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full 
                {{ $icon ? 'ps-10' : '' }} p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                {{ $required ? 'required' : '' }}
            />
        @endif
    </div>

    {{-- Error Message --}}
    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>