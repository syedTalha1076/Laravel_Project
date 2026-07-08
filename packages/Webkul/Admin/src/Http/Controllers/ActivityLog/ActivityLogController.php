<?php

namespace Webkul\Admin\Http\Controllers\ActivityLog;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\Models\ActivityLog;

class ActivityLogController extends Controller
{
    public function index(Request $request): View
    {
        $query = ActivityLog::with('user')->latest('activity_date');

        if ($request->filled('type')) {
            $query->where('activity_type', $request->type);
        }

        $logs = $query->paginate(20)->withQueryString();

        $types = ActivityLog::select('activity_type')->distinct()->pluck('activity_type');

        return view('admin::activity-log.index', compact('logs', 'types'));
    }

    public function destroy(int $id): RedirectResponse
    {
        ActivityLog::findOrFail($id)->delete();
        session()->flash('success', 'Log entry deleted.');
        return redirect()->route('admin.activity-log.index');
    }

    public function clearAll(): RedirectResponse
    {
        ActivityLog::truncate();
        session()->flash('success', 'All activity logs cleared.');
        return redirect()->route('admin.activity-log.index');
    }

    /**
     * Static helper: log an action from anywhere in the app.
     */
    public static function log(string $type, string $description): void
    {
        try {
            ActivityLog::create([
                'user_id'       => auth()->guard('user')->id(),
                'activity_type' => $type,
                'description'   => $description,
                'activity_date' => now(),
                'ip_address'    => request()->ip(),
            ]);
        } catch (\Throwable $e) {
            // Never let logging crash the request.
        }
    }
}
