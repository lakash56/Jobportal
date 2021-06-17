<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Job extends Model
{
    use HasFactory;

   /*  protected $guarded =[]; */
   protected $fillable =[
        'user_id',
        'company_id',
        'title',
        'slug',
        'description',
        'roles',
        'category_id',
        'position',
        'address',
        'type',
        'status',
        'last_date'
   ];

    public function getRouteKeyName()
    {
        return'slug';
}
    public function company(){
        return $this->belongsTo('App\Models\Company');
    }

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function checkApplication(){
        return DB::table('job_user')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
    }

    /**
     * Get the category that owns the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function favourites(){
        return $this->belongsToMany(Job::class,'favourites','job_id','user_id')->withTimestamps();
    }

    public function checkSaved(){
        return DB::table('favourites')->where('user_id',auth()->user()->id)->where('job_id',$this->id)->exists();
    }
}
