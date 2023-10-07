<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function taskable()
    {
        return $this->morphTo();
    }

    public function markAsCompleted()
    {
        $this->status = 'completed';
        $this->save();
        return true;
    }
}
