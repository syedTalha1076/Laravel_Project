<?php

namespace Webkul\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Lead\Models\Lead;
use Webkul\User\Models\User;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'lead_id',
        'full_name',
        'email',
        'phone',
        'company',
        'address',
        'registration_type',
        'hire_date',
        'created_by',
    ];

    protected $casts = [
        'hire_date' => 'date',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function followUps()
    {
        return $this->hasManyThrough(FollowUp::class, Lead::class, 'id', 'lead_id', 'lead_id', 'id');
    }
}
