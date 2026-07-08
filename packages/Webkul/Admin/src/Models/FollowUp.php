<?php

namespace Webkul\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\Lead\Models\Lead;
use Webkul\User\Models\User;

class FollowUp extends Model
{
    protected $table = 'follow_ups';

    protected $fillable = [
        'lead_id',
        'user_id',
        'follow_up_date',
        'follow_up_type',
        'notes',
        'next_follow_up_date',
        'status',
    ];

    protected $casts = [
        'follow_up_date'      => 'datetime',
        'next_follow_up_date' => 'datetime',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'lead_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
