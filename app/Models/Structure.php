<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Structure extends Model
{
    use HasFactory;
    protected $table = 'structures';

    protected $fillable = [
        'name',
        'structure_parent',
        'path'
    ];

    protected static function boot(){
        parent::boot();
        static::creating(function($structure){
            $structureParent = $structure->parent;
            Storage::makeDirectory($structureParent->path .'/'. $structure->name);
            $structure->path = $structureParent->path .'/'. $structure->name;
            $structure->uuid = (string) Str::uuid();
        });

        static::deleting(function($structure){
            Storage::deleteDirectory($structure->path);
        });
    }

    public function parent(){
        return $this->hasOne(Structure::class,'id','structure_parent');
    }

    public function childs(){
        return $this->hasMany(Structure::class,'structure_parent','id');
    }
}
