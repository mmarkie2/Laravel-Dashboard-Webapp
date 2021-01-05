<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserToPrimaryDashboard extends Model
{
   // protected $table = '_user_to_primary_dashboard';
    protected $fillable = ['dashboard_id'];
    use HasFactory;
}
