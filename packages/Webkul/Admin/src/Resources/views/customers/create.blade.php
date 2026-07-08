<x-admin::layouts>
    <x-slot:title>Create Customer</x-slot>

    <div class="flex flex-col gap-4">
        <!-- Header -->
        <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
            <div class="flex flex-col gap-2">
                <div class="flex gap-x-1 text-xs text-gray-600 dark:text-gray-300">
                    <a href="{{ route('admin.dashboard.index') }}" class="hover:underline">Dashboard</a>
                    <span>/</span>
                    <a href="{{ route('admin.customers.index') }}" class="hover:underline">Customers</a>
                    <span>/</span>
                    <span class="text-gray-800 dark:text-white font-medium">Create</span>
                </div>
                <div class="text-xl font-bold dark:text-white">Create Customer</div>
            </div>
            <div class="flex items-center gap-x-2.5">
                <a href="{{ route('admin.customers.index') }}"
                   class="rounded-md border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    ← Back
                </a>
                <button type="submit" form="customer-form" class="primary-button">Save Customer</button>
            </div>
        </div>

        @if($errors->any())
            <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 dark:border-red-800 dark:bg-red-900/20">
                <ul class="list-inside list-disc text-sm text-red-600 dark:text-red-400 space-y-1">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
            </div>
        @endif

        <form id="customer-form" action="{{ route('admin.customers.store') }}" method="POST">
            @csrf
            <div class="flex gap-4 max-xl:flex-wrap">
                <!-- Left -->
                <div class="flex flex-1 flex-col gap-4">
                    <div class="box-shadow rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-900">
                        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">Contact Details</p>
                        <div class="grid grid-cols-2 gap-4 max-sm:grid-cols-1">
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Full Name <span class="text-red-500">*</span></label>
                                <input type="text" name="full_name" value="{{ old('full_name') }}" required
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Phone</label>
                                <input type="text" name="phone" value="{{ old('phone') }}"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Company</label>
                                <input type="text" name="company" value="{{ old('company') }}"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                        </div>
                        <div class="mt-4 flex flex-col gap-1">
                            <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Address</label>
                            <textarea name="address" rows="3"
                                class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">{{ old('address') }}</textarea>
                        </div>
                    </div>
                </div>

                <!-- Right -->
                <div class="flex w-80 max-w-full flex-col gap-4 max-sm:w-full">
                    <div class="box-shadow rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-900">
                        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">Additional Info</p>
                        <div class="flex flex-col gap-3">
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Registration Type</label>
                                <select name="registration_type"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                                    <option value="converted" @selected(old('registration_type','converted')=='converted')>Converted Lead</option>
                                    <option value="direct" @selected(old('registration_type')=='direct')>Direct</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Linked Lead</label>
                                <select name="lead_id"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                                    <option value="">— None —</option>
                                    @foreach($leads as $lead)
                                        <option value="{{ $lead->id }}" @selected(old('lead_id')==$lead->id)>{{ $lead->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Hire / Join Date</label>
                                <input type="date" name="hire_date" value="{{ old('hire_date') }}"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-admin::layouts>
