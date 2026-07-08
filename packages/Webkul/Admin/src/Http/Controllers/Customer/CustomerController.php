<?php

namespace Webkul\Admin\Http\Controllers\Customer;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\Models\Customer;
use Webkul\Lead\Repositories\LeadRepository;

class CustomerController extends Controller
{
    public function __construct(protected LeadRepository $leadRepository) {}

    public function index(): View
    {
        $customers = Customer::with(['lead', 'creator'])->latest()->paginate(15);
        return view('admin::customers.index', compact('customers'));
    }

    public function create(): View
    {
        $leads = $this->leadRepository->all();
        return view('admin::customers.create', compact('leads'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'lead_id'           => 'nullable|exists:leads,id',
            'full_name'         => 'required|string|max:255',
            'email'             => 'nullable|email|max:255',
            'phone'             => 'nullable|string|max:30',
            'company'           => 'nullable|string|max:255',
            'address'           => 'nullable|string',
            'registration_type' => 'required|in:converted,direct',
            'hire_date'         => 'nullable|date',
        ]);

        $data['created_by'] = auth()->guard('user')->id();

        Customer::create($data);

        session()->flash('success', 'Customer created successfully.');
        return redirect()->route('admin.customers.index');
    }

    public function edit(int $id): View
    {
        $customer = Customer::findOrFail($id);
        $leads    = $this->leadRepository->all();
        return view('admin::customers.edit', compact('customer', 'leads'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $customer = Customer::findOrFail($id);

        $data = $request->validate([
            'lead_id'           => 'nullable|exists:leads,id',
            'full_name'         => 'required|string|max:255',
            'email'             => 'nullable|email|max:255',
            'phone'             => 'nullable|string|max:30',
            'company'           => 'nullable|string|max:255',
            'address'           => 'nullable|string',
            'registration_type' => 'required|in:converted,direct',
            'hire_date'         => 'nullable|date',
        ]);

        $customer->update($data);

        session()->flash('success', 'Customer updated successfully.');
        return redirect()->route('admin.customers.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        Customer::findOrFail($id)->delete();
        session()->flash('success', 'Customer deleted successfully.');
        return redirect()->route('admin.customers.index');
    }
}
