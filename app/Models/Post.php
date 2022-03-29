<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //protected $fillable = ['title','slug','excerpt','body'];

    protected $guarded = []; //CAUTION!! Take care of mass assignment.

    //For eager loading relationships to avoid the N+1 problem
    protected $with = ['author','category'];

    /**
    * To retrieve a model by slug rather than default id
    */
    public function getRouteKeyName(){
        return 'slug';
        //return 'id';
    }

    /**
    * The relationships
    */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query,array $filters){
        //dd($filters);
        $query->when($filters['search'] ?? false , fn($query,$search) =>
            $query->where(fn($query) =>
                $query->where('body','like','%'.$search.'%')
                    ->orWhere('title','like','%'.$search.'%'))
        );

        $query->when($filters['category'] ?? false , fn($query,$category) =>
           $query->whereHas('category',fn($query) => $query->where('slug',$category))
        );

        $query->when($filters['author'] ?? false, fn($query,$author) =>
            $query->whereHas('author',fn($query) => $query->where('username',$author))
        );

    }
}
