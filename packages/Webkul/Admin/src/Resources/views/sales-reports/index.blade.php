<x-admin::layouts>
    <x-slot:title>Sales Reports</x-slot>

    <div class="flex flex-col gap-4">
        <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
            <div class="flex flex-col gap-2">
                <div class="flex gap-x-1 text-xs text-gray-600 dark:text-gray-300">
                    <a href="{{ route('admin.dashboard.index') }}" class="hover:underline">Dashboard</a>
                    <span>/</span>
                    <span class="font-medium text-gray-800 dark:text-white">Sales Reports</span>
                </div>
                <div class="text-xl font-bold dark:text-white">Sales Reports</div>
            </div>
            <div class="flex items-center gap-x-2.5">
                <button onclick="document.getElementById('gen-panel').classList.toggle('hidden')"
                    class="rounded-md border border-green-300 bg-green-50 px-4 py-2 text-sm font-semibold text-green-700 hover:bg-green-100 dark:border-green-700 dark:bg-green-900/20 dark:text-green-400 dark:hover:bg-green-900/40 transition-colors">
                    ⚡ Auto-Generate
                </button>
                <a href="{{ route('admin.sales-reports.create') }}" class="primary-button">+ Manual Report</a>
            </div>
        </div>

        @if(session('success'))
            <div class="rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700 dark:border-green-800 dark:bg-green-900/20 dark:text-green-400">
                {{ session('success') }}
            </div>
        @endif

        <!-- Auto-Generate Panel -->
        <div id="gen-panel" class="hidden box-shadow rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-900">
            <p class="mb-3 text-sm font-semibold text-gray-700 dark:text-gray-300">⚡ Auto-Generate from Live Data</p>
            <form action="{{ route('admin.sales-reports.generate') }}" method="POST" class="flex items-end gap-4 flex-wrap">
                @csrf
                <div class="flex flex-col gap-1">
                    <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Select Month</label>
                    <input type="month" name="report_month" value="{{ now()->format('Y-m') }}" required
                        class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                </div>
                <button type="submit"
                    class="rounded-md border border-green-300 bg-green-50 px-4 py-2 text-sm font-semibold text-green-700 hover:bg-green-100 dark:border-green-700 dark:bg-green-900/20 dark:text-green-400 transition-colors">
                    Generate Report
                </button>
            </form>
        </div>

        <!-- Table -->
        <div class="box-shadow rounded-lg border border-gray-200 bg-white dark:border-gray-800 dark:bg-gray-900">
            @if($reports->count())
                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-200 dark:border-gray-800">
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Month</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Sales Person</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-600 dark:text-gray-300">Total Leads</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-600 dark:text-gray-300">Converted</th>
                                <th class="px-4 py-3 text-right font-semibold text-gray-600 dark:text-gray-300">Revenue</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Generated</th>
                                <th class="px-4 py-3 text-left font-semibold text-gray-600 dark:text-gray-300">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $r)
                                <tr class="border-b border-gray-100 transition-colors hover:bg-gray-50 dark:border-gray-800 dark:hover:bg-gray-800/50">
                                    <td class="px-4 py-3 font-bold text-gray-800 dark:text-white">{{ $r->report_month }}</td>
                                    <td class="px-4 py-3 text-gray-600 dark:text-gray-400">{{ optional($r->user)->name ?? 'N/A' }}</td>
                                    <td class="px-4 py-3 text-right text-gray-600 dark:text-gray-400">{{ number_format($r->total_leads) }}</td>
                                    <td class="px-4 py-3 text-right">
                                        <span class="inline-flex rounded-full bg-blue-100 px-2.5 py-0.5 text-xs font-semibold text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">
                                            {{ number_format($r->converted_customers) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 text-right font-bold text-green-600 dark:text-green-400">
                                        ${{ number_format($r->revenue_generated, 2) }}
                                    </td>
                                    <td class="px-4 py-3 text-xs text-gray-500 dark:text-gray-500">{{ $r->generated_date->format('d M Y H:i') }}</td>
                                    <td class="px-4 py-3">
                                        <form action="{{ route('admin.sales-reports.delete', $r->id) }}" method="POST" onsubmit="return confirm('Delete this report?')">
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
                @if($reports->hasPages())
                    <div class="border-t border-gray-200 px-4 py-3 dark:border-gray-800">{{ $reports->links() }}</div>
                @endif
            @else
                <div class="flex flex-col items-center justify-center gap-3 py-16">
                    <div class="text-6xl">📊</div>
                    <p class="text-lg font-semibold text-gray-700 dark:text-gray-300">No Sales Reports Yet</p>
                    <p class="text-sm text-gray-500 dark:text-gray-500">Use Auto-Generate to create one from your live data.</p>
                    <button onclick="document.getElementById('gen-panel').classList.remove('hidden')" class="primary-button mt-2">⚡ Auto-Generate</button>
                </div>
            @endif
        </div>
    </div>
</x-admin::layouts>
