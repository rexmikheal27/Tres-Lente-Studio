<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientInquiry extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'client_id',
        'service_category_id',
        'message',
        'status',
        'admin_notes'
    ];
    
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }
}