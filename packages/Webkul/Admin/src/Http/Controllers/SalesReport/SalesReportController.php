<?php

namespace Webkul\Admin\Http\Controllers\SalesReport;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\Models\SalesReport;
use Webkul\User\Repositories\UserRepository;

class SalesReportController extends Controller
{
    public function __construct(protected UserRepository $userRepository) {}

    public function index(): View
    {
        $reports = SalesReport::with('user')->latest('report_month')->paginate(15);
        return view('admin::sales-reports.index', compact('reports'));
    }

    public function create(): View
    {
        $users = $this->userRepository->all();
        return view('admin::sales-reports.create', compact('users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'user_id'             => 'nullable|exists:users,id',
            'total_leads'         => 'required|integer|min:0',
            'converted_customers' => 'required|integer|min:0',
            'revenue_generated'   => 'required|numeric|min:0',
            'report_month'        => 'required|date_format:Y-m',
        ]);

        $data['user_id']        = $data['user_id'] ?? auth()->guard('user')->id();
        $data['generated_date'] = now();

        SalesReport::create($data);

        session()->flash('success', 'Sales report saved successfully.');
        return redirect()->route('admin.sales-reports.index');
    }

    /**
     * Auto-generate a report for the selected month from live DB data.
     */
    public function generate(Request $request): RedirectResponse
    {
        $month = $request->validate([
            'report_month' => 'required|date_format:Y-m',
        ])['report_month'];

        [$year, $mon] = explode('-', $month);

        $totalLeads = DB::table('leads')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $mon)
            ->count();

        $converted = DB::table('customers')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $mon)
            ->count();

        $revenue = DB::table('quotes')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $mon)
            ->sum('grand_total') ?? 0;

        SalesReport::create([
            'user_id'             => auth()->guard('user')->id(),
            'total_leads'         => $totalLeads,
            'converted_customers' => $converted,
            'revenue_generated'   => $revenue,
            'report_month'        => $month,
            'generated_date'      => now(),
        ]);

        session()->flash('success', "Sales report for {$month} generated automatically.");
        return redirect()->route('admin.sales-reports.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        SalesReport::findOrFail($id)->delete();
        session()->flash('success', 'Report deleted.');
        return redirect()->route('admin.sales-reports.index');
    }
}
