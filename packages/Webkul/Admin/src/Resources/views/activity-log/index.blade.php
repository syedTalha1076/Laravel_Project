<x-admin::layouts>
    <x-slot:title>Activity Log</x-slot>

    <div class="flex flex-col gap-4">
        <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
            <div class="flex flex-col gap-2">
                <div class="flex gap-x-1 text-xs text-gray-600 dark:text-gray-300">
                    <a href="{{ route('admin.dashboard.index') }}" class="hover:underline">Dashboard</a>
                    <span>/</span>
                    <span class="font-medium text-gray-800 dark:text-white">Activity Log</span>
                </div>
                <div class="text-xl font-bold dark:text-white">Activity Log</div>
            </div>
            <form action="{{ route('admin.activity-log.clear') }}" method="POST" onsubmit="return confirm('Clear ALL log entries permanently?')">
                @csrf
                <button type="submit"
                    class="rounded-md border border-red-200 bg-red-50 px-4 py-2 text-sm font-semibold text-red-600 hover:bg-red-100 dark:border-red-800 dark:bg-red-900/20 dark:text-red-400 dark:hover:bg-red-900/40 transition-colors">
                    🗑 Clear All Logs
                </button>
            </form>
        </div>

        @if(session('success'))
            <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif

        <!-- Filter Bar -->
        <div class="box-shadow rounded-lg border border-gray-200 bg-white p-3 dark:border-gray-800 dark:bg-gray-900">
            <form method="GET" class="flex items-end gap-3 flex-wrap">
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Filter by Type</label>
                    <select name="type" onchange="this.form.submit()"
                        class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        <option value="">— All Types —</option>
                        @foreach($types as $t)
                            <option value="{{ $t }}" @selected(request('type')==$t)>{{ ucfirst($t) }}</option>
                        @endforeach
                    </select>
                </div>
                @if(request('type'))
                    <a href="{{ route('admin.activity-log.index') }}"
                       class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 transition-colors">
                        ✕ Clear
                    </a>
                @endif
            </form>
        </div>

        <!-- Table -->
        <div class="box-shadow rounded-lg border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
            @if($logs->count())
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-800">
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">User</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Type</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Description</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">IP Address</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Date & Time</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($logs as $log)
                                @php
                                    $typeColors = [
                                        'login'  => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
                                        'logout' => 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400',
                                        'create' => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                                        'update' => 'bg-orange-100 text-orange-700 dark:bg-orange-900/30 dark:text-orange-400',
                                        'delete' => 'bg-red-100 text-red-700 dark:bg-red-900/30 dark:text-red-400',
                                        'view'   => 'bg-purple-100 text-purple-700 dark:bg-purple-900/30 dark:text-purple-400',
                                    ];
                                    $colorClass = $typeColors[$log->activity_type] ?? 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400';
                                @endphp
                                <tr class="border-b border-gray-100 transition-colors hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-800/50">
                                    <td class="px-4 py-3 font-medium text-gray-800 dark:text-white">
                                        {{ optional($log->user)->name ?? 'System' }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $colorClass }}">
                                            {{ ucfirst($log->activity_type) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-gray-600 dark:text-gray-400 max-w-xs truncate">
                                        {{ $log->description ?: '—' }}
                                    </td>
                                    <td class="px-4 py-3 font-mono text-xs text-gray-500 dark:text-gray-500">
                                        {{ $log->ip_address ?: '—' }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 dark:text-gray-500">
                                        {{ $log->activity_date->format('d M Y H:i:s') }}
                                    </td>
                                    <td class="px-4 py-3">
                                        <form action="{{ route('admin.activity-log.delete', $log->id) }}" method="POST" onsubmit="return confirm('Delete this entry?')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="rounded-md border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-medium text-red-600 hover:bg-red-100 dark:border-red-800 dark:bg-red-900/20 dark:text-red-400 transition-colors">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @if($logs->hasPages())
                    <div class="border-t border-gray-200 px-4 py-3 dark:border-gray-800">{{ $logs->links() }}</div>
                @endif
            @else
                <div class="flex flex-col items-center justify-center gap-3 py-16">
                    <div class="text-6xl">📋</div>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-300">No Activity Logs Yet</p>
                    <p class="text-sm text-gray-500 dark:text-gray-500">User actions will appear here automatically.</p>
                </div>
            @endif
        </div>
    </div>
</x-admin::layouts>
