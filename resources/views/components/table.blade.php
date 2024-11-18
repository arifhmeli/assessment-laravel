<div class="overflow-x-auto">
    <table class="min-w-full table-auto border-collapse mb-6 bg-white shadow-lg rounded-lg">
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th class="border px-4 py-2 text-left text-sm font-medium text-gray-700 bg-gray-100">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
