<?php

namespace Webkul\Admin\Http\Controllers\FollowUp;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Webkul\Admin\Http\Controllers\Controller;
use Webkul\Admin\Models\FollowUp;
use Webkul\Lead\Repositories\LeadRepository;
use Webkul\User\Repositories\UserRepository;

class FollowUpController extends Controller
{
    public function __construct(
        protected LeadRepository $leadRepository,
        protected UserRepository $userRepository
    ) {}

    public function index(): View
    {
        $followUps = FollowUp::with(['lead', 'user'])->latest('follow_up_date')->paginate(15);
        return view('admin::follow-ups.index', compact('followUps'));
    }

    public function create(): View
    {
        $leads = $this->leadRepository->all();
        $users = $this->userRepository->all();
        return view('admin::follow-ups.create', compact('leads', 'users'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'lead_id'            => 'required|exists:leads,id',
            'user_id'            => 'nullable|exists:users,id',
            'follow_up_date'     => 'required|date',
            'follow_up_type'     => 'required|in:call,email,meeting,other',
            'notes'              => 'nullable|string',
            'next_follow_up_date'=> 'nullable|date|after:follow_up_date',
            'status'             => 'required|in:pending,completed,cancelled,rescheduled',
        ]);

        $data['user_id'] = $data['user_id'] ?? auth()->guard('user')->id();

        FollowUp::create($data);

        session()->flash('success', 'Follow-up scheduled successfully.');
        return redirect()->route('admin.follow-ups.index');
    }

    public function edit(int $id): View
    {
        $followUp = FollowUp::findOrFail($id);
        $leads    = $this->leadRepository->all();
        $users    = $this->userRepository->all();
        return view('admin::follow-ups.edit', compact('followUp', 'leads', 'users'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $followUp = FollowUp::findOrFail($id);

        $data = $request->validate([
            'lead_id'            => 'required|exists:leads,id',
            'user_id'            => 'nullable|exists:users,id',
            'follow_up_date'     => 'required|date',
            'follow_up_type'     => 'required|in:call,email,meeting,other',
            'notes'              => 'nullable|string',
            'next_follow_up_date'=> 'nullable|date',
            'status'             => 'required|in:pending,completed,cancelled,rescheduled',
        ]);

        $followUp->update($data);

        session()->flash('success', 'Follow-up updated successfully.');
        return redirect()->route('admin.follow-ups.index');
    }

    public function destroy(int $id): RedirectResponse
    {
        FollowUp::findOrFail($id)->delete();
        session()->flash('success', 'Follow-up deleted successfully.');
        return redirect()->route('admin.follow-ups.index');
    }
}
