<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Order List') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @auth
            @if(auth()->user()->role === 'superadmin' || auth()->user()->role === 'admin')
            <div class="mb-4">
                <a href="{{ route('order.create') }}"
                    class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    + Add Order
                </a>
            </div>
            @endif
            @endauth

            @if (session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
            @endif

            <div class="bg-white shadow-md rounded overflow-x-auto">
                <table class="min-w-full text-sm text-left">
                    <thead class="bg-gray-100 text-xs uppercase text-gray-600">
                        <tr>
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Client</th>
                            <th class="px-4 py-2">Item Name</th>
                            <th class="px-4 py-2">Item Price</th>
                            <th class="px-4 py-2">Order Date</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($orders as $order)
                        <tr>
                            <td class="px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2">{{ $order->client->name ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $order->item_name }}</td>
                            <td class="px-4 py-2">Rp {{ number_format($order->item_price, 0, ',', '.') }}</td>
                            <td class="px-4 py-2">{{ $order->created_at->format('d-m-Y') }}</td>
                            @auth
                            @if(auth()->user()->role === 'superadmin' || auth()->user()->role === 'admin')
                            <td class="px-4 py-2 space-x-2">
                                <a href="{{ route('order.edit', $order) }}" class="text-blue-600 hover:underline">Edit</a>
                                <form action="{{ route('order.destroy', $order) }}" method="POST" class="inline"
                                    onsubmit="return confirm('Are you sure you want to delete this order?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                            @endif
                            @endauth
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                @if($orders->isEmpty())
                <div class="text-center py-4 text-gray-500">
                    No orders found.
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>