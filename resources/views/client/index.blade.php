<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Client List</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto">
        @auth
        @if(auth()->user()->role === 'superadmin')
        <a href="{{ route('client.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded">
            + Add Client
        </a>
        @endif
        @endauth

        @if(session('success'))
        <div class="text-green-600 mb-4">{{ session('success') }}</div>
        @endif

        <div class="bg-white p-4 rounded shadow">
            <table class="w-full table-auto text-sm">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2 border">Name</th>
                        <th class="p-2 border">Address</th>
                        <th class="p-2 border">Start</th>
                        <th class="p-2 border">End</th>
                        <th class="p-2 border">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <td class="border p-2">{{ $client->name }}</td>
                        <td class="border p-2">{{ $client->address }}</td>
                        <td class="border p-2">{{ $client->beginning_contract_date }}</td>
                        <td class="border p-2">{{ $client->end_contract_date }}</td>

                        @auth
                        @if(auth()->user()->role === 'superadmin')
                        <td class="border p-2 space-x-2">
                            <a href="{{ route('client.edit', $client) }}" class="text-blue-600">Edit</a>
                            <form action="{{ route('client.destroy', $client) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-600">Delete</button>
                            </form>
                        </td>
                        @endif
                        @endauth
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>