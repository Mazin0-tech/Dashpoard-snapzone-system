<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'question',
        'answer',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // Scope for active FAQs
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for general FAQs (without service)
    public function scopeGeneral($query)
    {
        return $query->whereNull('service_id');
    }
}