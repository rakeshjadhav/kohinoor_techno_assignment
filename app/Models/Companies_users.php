<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Companies_users extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'Companies_users';
    
    protected $fillable = [
        'company_id',
        'user_id'
    ];

    public function userDetails()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
