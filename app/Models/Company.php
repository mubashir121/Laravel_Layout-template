<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = [
        'comp_name',
        'comp_email',
        'comp_phone',
        'comp_address',
    ];
  
    public function employ(){
        return $this->hasMany(Employ::class,'company_id');
    }
    public static function boot() {
        parent::boot();
        self::deleting(function($company) {
            $company->employ()->each(function($employ) {
                $employ->delete();
            });
        });
    }
}
