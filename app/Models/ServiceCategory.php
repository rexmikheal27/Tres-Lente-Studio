<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $fillable = ['name', 'type', 'is_active',];
    
    protected $casts = [
        'is_active' => 'boolean',
    ];
    
    public function inquiries()
    {
        return $this->hasMany(ClientInquiry::class);
    }
}