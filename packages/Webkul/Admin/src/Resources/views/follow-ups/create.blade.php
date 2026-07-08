<x-admin::layouts>
    <x-slot:title>Schedule Follow-Up</x-slot>

    <div class="flex flex-col gap-4">
        <div class="flex items-center justify-between rounded-lg border border-gray-200 bg-white px-4 py-2 text-sm dark:border-gray-800 dark:bg-gray-900 dark:text-gray-300">
            <div class="flex flex-col gap-2">
                <div class="flex gap-x-1 text-xs text-gray-600 dark:text-gray-300">
                    <a href="{{ route('admin.dashboard.index') }}" class="hover:underline">Dashboard</a>
                    <span>/</span>
                    <a href="{{ route('admin.follow-ups.index') }}" class="hover:underline">Follow-Ups</a>
                    <span>/</span>
                    <span class="font-medium text-gray-800 dark:text-white">Create</span>
                </div>
                <div class="text-xl font-bold dark:text-white">Schedule Follow-Up</div>
            </div>
            <div class="flex items-center gap-x-2.5">
                <a href="{{ route('admin.follow-ups.index') }}"
                   class="rounded-md border border-gray-200 bg-white px-4 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700">
                    ← Back
                </a>
                <button type="submit" form="followup-form" class="primary-button">Save Follow-Up</button>
            </div>
        </div>

        @if($errors->any())
            <div class="rounded-lg border border-red-200 bg-red-50 px-4 py-3 dark:border-red-800 dark:bg-red-900/20">
                <ul class="list-inside list-disc space-y-1 text-sm text-red-600 dark:text-red-400">
                    @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                </ul>
            </div>
        @endif

        <form id="followup-form" action="{{ route('admin.follow-ups.store') }}" method="POST">
            @csrf
            <div class="flex gap-4 max-xl:flex-wrap">
                <div class="flex flex-1 flex-col gap-4">
                    <div class="box-shadow rounded-lg border border-gray-200 bg-white p-4 dark:border-gray-800 dark:bg-gray-900">
                        <p class="mb-4 text-base font-semibold text-gray-800 dark:text-white">Follow-Up Details</p>
                        <div class="grid grid-cols-2 gap-4 max-sm:grid-cols-1">
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Lead <span class="text-red-500">*</span></label>
                                <select name="lead_id" required
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                                    <option value="">— Select Lead —</option>
                                    @foreach($leads as $l)
                                        <option value="{{ $l->id }}" @selected(old('lead_id')==$l->id)>{{ $l->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Assigned To</label>
                                <select name="user_id"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                                    <option value="">— Self —</option>
                                    @foreach($users as $u)
                                        <option value="{{ $u->id }}" @selected(old('user_id')==$u->id)>{{ $u->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Follow-Up Date & Time <span class="text-red-500">*</span></label>
                                <input type="datetime-local" name="follow_up_date" value="{{ old('follow_up_date') }}" required
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Type <span class="text-red-500">*</span></label>
                                <select name="follow_up_type" required
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                                    <option value="call"    @selected(old('follow_up_type','call')=='call')>📞 Call</option>
                                    <option value="email"   @selected(old('follow_up_type')=='email')>📧 Email</option>
                                    <option value="meeting" @selected(old('follow_up_type')=='meeting')>🤝 Meeting</option>
                                    <option value="other"   @selected(old('follow_up_type')=='other')>📌 Other</option>
                                </select>
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Next Follow-Up Date</label>
                                <input type="date" name="next_follow_up_date" value="{{ old('next_follow_up_date') }}"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                            </div>
                            <div class="flex flex-col gap-1">
                                <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Status</label>
                                <select name="status"
                                    class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                                    <option value="pending"     @selected(old('status','pending')=='pending')>Pending</option>
                                    <option value="completed"   @selected(old('status')=='completed')>Completed</option>
                                    <option value="cancelled"   @selected(old('status')=='cancelled')>Cancelled</option>
                                    <option value="rescheduled" @selected(old('status')=='rescheduled')>Rescheduled</option>
                                </select>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-col gap-1">
                            <label class="text-xs font-semibold text-gray-600 dark:text-gray-300">Notes</label>
                            <textarea name="notes" rows="4"
                                class="rounded-md border border-gray-200 bg-white px-3 py-2 text-sm text-gray-800 focus:border-brandColor focus:outline-none dark:border-gray-700 dark:bg-gray-800 dark:text-white">{{ old('notes') }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-admin::layouts>
