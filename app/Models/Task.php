<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_id',
        'name',
    ];

    // untuk table yang disambungkan juga membuat method dengan nama table, tp tanpa s/es
    public function project()
    {
        // untuk table yang disambungkan gunakan belongsTo
        return $this->belongsTo(Project::class);
    }
}
