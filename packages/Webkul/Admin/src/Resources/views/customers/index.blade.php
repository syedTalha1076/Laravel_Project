<x-admin::layouts>
    <x-slot:title>Customers</x-slot>

    <div class="flex flex-col gap-4">
        <!-- Header -->
        <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
            <div class="flex flex-col gap-2">
                <div class="flex gap-x-1 text-xs text-gray-600 dark:text-gray-300">
                    <a href="{{ route('admin.dashboard.index') }}" class="hover:underline">Dashboard</a>
                    <span>/</span>
                    <span class="text-gray-800 dark:text-white font-medium">Customers</span>
                </div>
                <div class="text-xl font-bold dark:text-white">Customers</div>
            </div>
            <div class="flex items-center gap-x-2.5">
                <a href="{{ route('admin.customers.create') }}" class="primary-button">
                    + New Customer
                </a>
            </div>
        </div>

        <!-- Flash -->
        @if(session('success'))
            <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table Card -->
        <div class="box-shadow rounded-lg border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
            @if($customers->count())
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-800">
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Name</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Email</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Phone</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Company</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Type</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Linked Lead</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Created</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $c)
                                <tr class="border-b border-gray-100 hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-800/50 transition-colors">
                                    <td class="px-4 py-3 font-medium text-gray-800 dark:text-white">{{ $c->full_name }}</td>
                                    <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $c->email ?: '—' }}</td>
                                    <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $c->phone ?: '—' }}</td>
                                    <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $c->company ?: '—' }}</td>
                                    <td class="px-4 py-3">
                                        <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-semibold
                                            {{ $c->registration_type === 'converted'
                                                ? 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400'
                                                : 'bg-orange-100 text-orange-700 dark:bg-orange-900/30 dark:text-orange-400' }}">
                                            {{ ucfirst($c->registration_type) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ optional($c->lead)->title ?? '—' }}</td>
                                    <td class="px-4 py-3 text-gray-500 dark:text-gray-500 text-xs">{{ $c->created_at->format('d M Y') }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('admin.customers.edit', $c->id) }}"
                                               class="rounded-md border border-gray-200 bg-white px-3 py-1.5 text-xs font-medium text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 transition-colors">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.customers.delete', $c->id) }}" method="POST"
                                                  onsubmit="return confirm('Delete this customer?')">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="rounded-md border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-medium text-red-600 hover:bg-red-100 dark:border-red-800 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/40 transition-colors">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($customers->hasPages())
                    <div class="border-t border-gray-200 px-4 py-3 dark:border-gray-800">
                        {{ $customers->links() }}
                    </div>
                @endif
            @else
                <div class="flex flex-col items-center justify-center gap-3 py-16">
                    <div class="text-6xl">👤</div>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-300">No Customers Yet</p>
                    <p class="text-sm text-gray-500 dark:text-gray-500">Create your first customer to get started.</p>
                    <a href="{{ route('admin.customers.create') }}" class="primary-button mt-2">+ New Customer</a>
                </div>
            @endif
        </div>
    </div>
</x-admin::layouts>
