<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Job extends Model
{
    /** @use HasFactory<\Database\Factories\JobFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'title', 
        'description', 
        'location', 
        'salary', 
        'company_id', 
        'category_id',
        'user_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
