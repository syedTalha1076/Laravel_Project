<?php

namespace Webkul\Admin\Models;

use Illuminate\Database\Eloquent\Model;
use Webkul\User\Models\User;

class SalesReport extends Model
{
    protected $table = 'sales_reports';

    protected $fillable = [
        'user_id',
        'total_leads',
        'converted_customers',
        'revenue_generated',
        'report_month',
        'generated_date',
    ];

    protected $casts = [
        'revenue_generated' => 'decimal:2',
        'generated_date'    => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
