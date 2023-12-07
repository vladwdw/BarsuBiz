<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HudredIdeas extends Model
{
    use HasFactory;
    protected $table = 'hudred_ideas';
    public function user()
    {
        
        return $this->belongsTo(User::class,'user_id');
    }
}
