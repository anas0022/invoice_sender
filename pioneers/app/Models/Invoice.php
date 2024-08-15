<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'clients_company_name',
        'attention_clients_name',
        'street_number_and_name_or_po_box',
        'state_and_post_code',
        'country',
        'invoice_date',
        'invoice_number',
        'reference_po',
        'your_company_name',
        'your_street_number_and_name',
        'your_state_and_post_code',
        'total',
        'hours_worked',
        'wage_per_hour',
        'admin_time',
        'planning_time',
        'total_hour',
        'wage_owed',
        'items'
    ];

    protected $casts = [
        'items' => 'array',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
