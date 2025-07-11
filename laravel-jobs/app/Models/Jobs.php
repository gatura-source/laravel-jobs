<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    /** @use HasFactory<\Database\Factories\JobsFactory> */
    use HasFactory;

    protected $table = 'offered_jobs';

    public static function getExperienceLevels(): array
    {
        return [
            'entry' => 'Entry Level',
            'mid' => 'Mid Level',
            'senior' => 'Senior Level',
            'expert' => 'Expert Level',
        ];
    }

    public static function getCategories(): array
    {
        return [
            'engineering' => 'Engineering',
            'marketing' => 'Marketing',
            'sales' => 'Sales',
            'design' => 'Design',
            'it' => 'IT',
            'hr' => 'Human Resources',
            'finance' => 'Finance',
            'customer_service' => 'Customer Service',
        ];
    }
}
