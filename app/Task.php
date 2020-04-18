<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id', 'phase', 'company_name', 'area', 'received_date', 'due_date', 'category', 'status', 'status_person_in_charge',
        'status_date', 'next', 'next_person_in_charge', 'next_date' 
        ];
        
    public function usertask()
    {
        return $this->belongsTo(User::class);
    }
}
