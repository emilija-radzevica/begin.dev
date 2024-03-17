<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'affiliation', 
        'category', 
        'universe', 
        'summary', 
        'tags', 
        'image', 
        'physicalDescription', 
        'history', 
        'user_id'
    ];

    public function scopeFilter($query, array $filters) {
        if($filters['tag'] ?? false) {
            $query->where('tags', 'like', '%' . request('tag') . '%');
        }
        if($filters['affiliation'] ?? false) {
            $query->where('affiliation', '=', request('affiliation'));
        }
        if($filters['category'] ?? false) {
            $query->where('category', '=', request('category'));
        }
        if($filters['search'] ?? false) {
            $query->where('name', 'like', '%' . request('search') . '%')
                ->orWhere('summary', 'like', '%' . request('search') . '%')
                ->orWhere('tags', 'like', '%' . request('search') . '%')
                ->orWhere('category', 'like', '%' . request('search') . '%');
        }
        
    }

    //defines relationship with user  (post belongs to a user)
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function characterInfo() : HasOne {
        return $this->hasOne(Character::class);
    }
    public function locationInfo() : HasOne {
        return $this->hasOne(Location::class);
    }
    public function itemInfo() : HasOne {
        return $this->hasOne(Item::class);
    }
    public function cultureInfo() : HasOne{
        return $this->hasOne(Culture::class);
    }
    public function specieInfo() : HasOne {
        return $this->hasOne(Specie::class);
    }
}
