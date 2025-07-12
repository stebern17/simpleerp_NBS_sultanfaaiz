<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Edit User Role</h2>
    </x-slot>

    <div class="max-w-md mx-auto mt-6 bg-white p-6 shadow rounded">
        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-medium mb-1">Name</label>
                <input type="text" value="{{ $user->name }}" class="w-full border p-2 rounded bg-gray-100" readonly>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Role</label>
                <select name="role" class="w-full border p-2 rounded" required>
                    <option value="superadmin" @selected($user->role === 'superadmin')>Super Admin</option>
                    <option value="admin" @selected($user->role === 'admin')>Admin</option>
                    <option value="user" @selected($user->role === 'user')>User</option>
                </select>
            </div>

            <div class="flex gap-2 justify-center">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Update</button>
                <a href="{{ route('users.index') }}" class="text-gray-600 px-4 py-2">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>