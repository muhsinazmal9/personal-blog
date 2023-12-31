<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory; //, SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'thumbnail_image',
        'category_id',
        'user_id',
    ];


    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class)
                    ->withDefault([
                        'name' => 'Uncategorized'
                    ]);
    }


    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }
}
