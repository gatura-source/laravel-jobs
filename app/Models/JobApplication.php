<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Jobs;

class JobApplication extends Model
{
    /** @use HasFactory<\Database\Factories\JobApplicationFactory> */
    use HasFactory;

    public function job(): BelongsTo
    {
        return $this->belongsTo(Jobs::class);

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);

    }
}
