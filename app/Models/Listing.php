<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    //Inorder to prevent mass assignment error we use fillable property to specify which fields are allowed to be mass assigned
    // protected $fillable=['title','company','location','website','email','tags','description'];    
    
    public function scopeFilter($query, array $filters){
        
        //tag search
        //If filter tag is not false proceed the rest(If there's a tag then proceed)
        if ($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        
        // search bar
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . request('search') . '%')
            ->orWhere('location', 'like', '%' . request('search') . '%')
            ->orWhere('tags', 'like', '%' . request('search') . '%');
        }
    }

    //Relationship between user and listing
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}