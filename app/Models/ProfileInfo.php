<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfileInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'bio',
        'avatar',
        'address_1',
        'address_2'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
