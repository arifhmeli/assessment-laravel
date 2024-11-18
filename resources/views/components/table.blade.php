<div class="overflow-x-auto">
    <table class="min-w-full table-auto border-collapse mb-6">
        <thead>
            <tr>
                @foreach ($headers as $header)
                    <th class="border px-4 py-2">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>