<x-admin::layouts>
    <x-slot:title>New Sales Report</x-slot>

    <div class="flex flex-col gap-4">
        <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
            <div class="flex flex-col gap-2">
                <div class="flex gap-x-1 text-xs text-gray-600 dark:text-gray-300">
                    <a href="{{ route('admin.dashboard.index') }}" class="hover:underline">Dashboard</a>
                    <span>/</span>
                    <a href="{{ route('admin.sales-reports.index') }}" class="hover:underline">Sales Reports</a>
                    <span>/</span>
                    <span class="font-medium text-gray-800 dark:text-white">Create</span>
                </div>
                <div class="text-xl font-bold dark:text-white">New Sales Report</div>
            </div>
            <div class="flex items-center gap-x-2.5">
                <a href="{{ route('admin.sales-reports.index') }}"
                   class="rounded-md border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    ← Back
                </a>
                <button type="submit" form="sales-report-form" class="primary-button">Save Report</button>
            </div>
        </div>

        @if($errors->any())
            <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 dark:border-red-800 dark:bg-red-900/20">
                <ul class="list-inside list-disc space-y-1 text-sm text-red-600 dark:text-red-400">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
            </div>
        @endif

        <form id="sales-report-form" action="{{ route('admin.sales-reports.store') }}" method="POST">
            @csrf
            <div class="flex gap-4 max-xl:flex-wrap">
                <div class="flex flex-1 flex-col gap-4">
                    <div class="box-shadow rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-900">
                        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">Report Details</p>
                        <div class="grid grid-cols-2 gap-4 max-sm:grid-cols-1">
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Report Month <span class="text-red-500">*</span></label>
                                <input type="month" name="report_month" value="{{ old('report_month', now()->format('Y-m')) }}" required
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Sales Person</label>
                                <select name="user_id"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                                    <option value="">— Self —</option>
                                    @foreach($users as $u)
                                        <option value="{{ $u->id }}" @selected(old('user_id')==$u->id)>{{ $u->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Total Leads <span class="text-red-500">*</span></label>
                                <input type="number" min="0" name="total_leads" value="{{ old('total_leads', 0) }}" required
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Converted Customers <span class="text-red-500">*</span></label>
                                <input type="number" min="0" name="converted_customers" value="{{ old('converted_customers', 0) }}" required
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                            <div class="flex flex-col gap-1 col-span-2 max-sm:col-span-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Revenue Generated <span class="text-red-500">*</span></label>
                                <input type="number" step="0.01" min="0" name="revenue_generated" value="{{ old('revenue_generated', 0) }}" required
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-admin::layouts>
