<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'adminprofile';
    protected $primaryKey = 'id';
    protected $fillable = ['admin_id','role','company','dob','country','experinece','image'];
    use HasFactory;
}
