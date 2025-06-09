<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $fillable = ['name', 'type', 'is_active', 'sort_order'];
    
    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];
    
    public function inquiries()
    {
        return $this->hasMany(ClientInquiry::class);
    }
}