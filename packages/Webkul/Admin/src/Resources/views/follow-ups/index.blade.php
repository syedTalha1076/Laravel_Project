<x-admin::layouts>
    <x-slot:title>Follow-Ups</x-slot>

    <div class="flex flex-col gap-4">
        <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
            <div class="flex flex-col gap-2">
                <div class="flex gap-x-1 text-xs text-gray-600 dark:text-gray-300">
                    <a href="{{ route('admin.dashboard.index') }}" class="hover:underline">Dashboard</a>
                    <span>/</span>
                    <span class="font-medium text-gray-800 dark:text-white">Follow-Ups</span>
                </div>
                <div class="text-xl font-bold dark:text-white">Follow-Ups</div>
            </div>
            <a href="{{ route('admin.follow-ups.create') }}" class="primary-button">+ Schedule Follow-Up</a>
        </div>

        @if(session('success'))
            <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif

        <div class="box-shadow rounded-lg border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
            @if($followUps->count())
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-800">
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Lead</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Type</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Assigned To</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Follow-Up Date</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Next Date</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Status</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Notes</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($followUps as $f)
                                @php
                                    $statusClasses = [
                                        'pending'     => 'bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400',
                                        'completed'   => 'bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400',
                                        'cancelled'   => 'bg-gray-100 text-gray-600 dark:bg-gray-800 dark:text-gray-400',
                                        'rescheduled' => 'bg-orange-100 text-orange-700 dark:bg-orange-900/30 dark:text-orange-400',
                                    ];
                                    $typeIcons = ['call'=>'📞','email'=>'📧','meeting'=>'🤝','other'=>'📌'];
                                @endphp
                                <tr class="border-b border-gray-100 transition-colors hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-800/50">
                                    <td class="px-4 py-3 font-medium text-gray-800 dark:text-white">{{ optional($f->lead)->title ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ ($typeIcons[$f->follow_up_type] ?? '📌') . ' ' . ucfirst($f->follow_up_type) }}</td>
                                    <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ optional($f->user)->name ?? '—' }}</td>
                                    <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ $f->follow_up_date->format('d M Y H:i') }}</td>
                                    <td class="px-4 py-3 text-gray-500 dark:text-gray-500 text-xs">{{ $f->next_follow_up_date ? $f->next_follow_up_date->format('d M Y') : '—' }}</td>
                                    <td class="px-4 py-3">
                                        <span class="inline-flex rounded-full px-2.5 py-0.5 text-xs font-semibold {{ $statusClasses[$f->status] ?? '' }}">
                                            {{ ucfirst($f->status) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-gray-500 dark:text-gray-500 text-xs max-w-xs truncate">{{ $f->notes ?: '—' }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('admin.follow-ups.edit', $f->id) }}"
                                               class="rounded-md border border-gray-200 bg-white px-3 py-1.5 text-xs font-medium text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 transition-colors">
                                                Edit
                                            </a>
                                            <form action="{{ route('admin.follow-ups.delete', $f->id) }}" method="POST" onsubmit="return confirm('Delete this follow-up?')">
                                                @csrf @method('DELETE')
                                                <button type="submit"
                                                    class="rounded-md border border-red-200 bg-red-50 px-3 py-1.5 text-xs font-medium text-red-600 hover:bg-red-100 dark:border-red-800 dark:bg-red-900/20 dark:text-red-400 transition-colors">
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
                @if($followUps->hasPages())
                    <div class="border-t border-gray-200 px-4 py-3 dark:border-gray-800">{{ $followUps->links() }}</div>
                @endif
            @else
                <div class="flex flex-col items-center justify-center gap-3 py-16">
                    <div class="text-6xl">📞</div>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-300">No Follow-Ups Scheduled</p>
                    <p class="text-sm text-gray-500 dark:text-gray-500">Schedule your first follow-up to stay on top of leads.</p>
                    <a href="{{ route('admin.follow-ups.create') }}" class="primary-button mt-2">+ Schedule Follow-Up</a>
                </div>
            @endif
        </div>
    </div>
</x-admin::layouts>
