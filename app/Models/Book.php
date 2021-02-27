<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'description', 'cover', 'genre_id'];

    public function deleteCover()
    {
        Storage::delete($this->cover);
    }

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

}
