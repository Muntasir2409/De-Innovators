<x-base-layout>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-800">Admin Dashboard</h1>
        <p class="mb-6">Welcome to the admin panel. Here you can manage users.</p>
        @if(session('success'))
            <div class="p-4 mb-4 text-green-700 bg-green-200 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form method="GET" action="{{ route('admin.users') }}" class="mb-6">
            <div class="flex items-center space-x-4">
                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Search by name"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400"
                >
                <button
                    type="submit"
                    class="bg-green-700 text-white px-4 py-2 rounded-lg hover:bg-green-800 transition"
                >
                    Search
                </button>
            </div>
        </form>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full border-collapse">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 text-left">Name</th>
                        <th class="px-4 py-2 text-left">Email</th>
                        <th class="px-4 py-2 text-left">Role</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">
                                <form action="{{ route('admin.users.updateRole', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <select name="role"
                                            onchange="this.form.submit()"
                                            class="w-full px-2 py-1 border rounded focus:outline-none focus:ring-2 focus:ring-yellow-400">
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="editor" {{ $user->role == 'editor' ? 'selected' : '' }}>Editor</option>
                                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-2 text-center">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-base-layout>
