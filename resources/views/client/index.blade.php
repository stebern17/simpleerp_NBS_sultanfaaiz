<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800">Client List</h2>
    </x-slot>

    <div class="py-6 max-w-7xl mx-auto px-4">
        @if(session('success'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-800 border border-green-300">
            {{ session('success') }}
        </div>
        @endif


        @auth
        @if(auth()->user()->role === 'superadmin' || auth()->user()->role === 'admin')
        <div class="mb-4">
            <a href="{{ route('client.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow transition duration-200">
                + Add Client
            </a>
        </div>
        @endif
        @endauth

        <div class="bg-white shadow-md rounded overflow-x-auto">
            <table class="min-w-full text-sm text-center">
                <thead class="bg-gray-100 text-gray-700 font-semibold">
                    <tr>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Address</th>
                        <th class="px-4 py-2">Start</th>
                        <th class="px-4 py-2">End</th>
                        @auth
                        @if(auth()->user()->role === 'superadmin' || auth()->user()->role === 'admin')
                        <th class="px-4 py-2">Action</th>
                        @endif
                        @endauth

                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @forelse($clients as $client)
                    <tr>
                        <td class="px-4 py-2">{{ $client->name }}</td>
                        <td class="px-4 py-2">{{ $client->address }}</td>
                        <td class="px-4 py-2">{{ $client->beginning_contract_date }}</td>
                        <td class="px-4 py-2">{{ $client->end_contract_date }}</td>

                        @auth
                        @if(auth()->user()->role === 'superadmin' || auth()->user()->role === 'admin')
                        <td class="px-4 py-2 space-x-2">
                            <a href="{{ route('client.edit', $client) }}"
                                class="text-blue-600 hover:underline">Edit</a>

                            <form action="{{ route('client.destroy', $client) }}" method="POST"
                                class="inline-block"
                                onsubmit="return confirm('Yakin ingin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="text-red-600 hover:underline">Delete</button>
                            </form>
                        </td>
                        @endif
                        @endauth
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-gray-500">No clients found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>