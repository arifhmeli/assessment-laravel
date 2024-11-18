<div class="mb-4">
    <label for="{{ $name }}" class="block mb-2 text-sm font-medium text-gray-900">{{ $label }}</label>
    <div class="relative">
        {{-- Icon (conditionally rendered if $icon is passed) --}}
        @if ($icon)
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            {!! $icon !!}
        </div>
        @endif

        {{-- Checkbox or Input Field --}}
        @if ($type === 'checkbox')
            <div class="flex items-center">
                <input 
                    type="{{ $type }}" 
                    name="{{ $name }}" 
                    id="{{ $name }}" 
                    placeholder="{{ $placeholder }}" 
                    value="{{ old($name, $value) }}" 
                    class="w-4 h-4 border border-gray-300 rounded-lg focus:ring-blue-500 bg-transparent text-blue-500 {{ $icon ? 'pl-10' : '' }} p-2.5"
                    {{ $required ? 'required' : '' }}
                />
                <label for="{{ $name }}" class="ml-2 text-sm text-gray-900">{{ $label ?? 'Active' }}</label>
            </div>
        @else
            <input 
                type="{{ $type }}" 
                name="{{ $name }}" 
                id="{{ $name }}" 
                placeholder="{{ $placeholder }}" 
                value="{{ old($name, $value) }}" 
                class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-300 focus:border-blue-300 block w-full p-2.5 {{ $icon ? 'pl-10' : '' }}"
                {{ $required ? 'required' : '' }}
            />
        @endif
    </div>

    {{-- Error Message --}}
    @error($name)
        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
    @enderror
</div>
