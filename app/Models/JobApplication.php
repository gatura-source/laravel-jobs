<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class JobApplication extends Model
{
    /** @use HasFactory<\Database\Factories\JobApplicationFactory> */
    use HasFactory;

    protected $fillable = ['user_id', 'jobs_id', 'expected_salary', 'cv_filepath'];

    public function job(): BelongsTo
    {
        return $this->belongsTo(Jobs::class, 'jobs_id');

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);

    }
}
