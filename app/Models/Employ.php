<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employ extends Model
{
    use HasFactory;
    protected $table = 'employs';
    protected $fillable = [
        'emp_name',
        'email',
        'phone',
        'address',
        'gender',
        'company_id',
    ];
    public function company(){
        return $this->belongsTo(Company::class,'company_id');
    }
  
}
