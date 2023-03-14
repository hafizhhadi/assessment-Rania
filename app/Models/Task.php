<?php

namespace App\Models;

use App\Enums\TaskStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'uuid',
        'description',
        'status',
    ];

    protected $casts = [
        'status' => TaskStatusEnum::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeCompletedTask($query)
    {
        return $query->where('status', TaskStatusEnum::Done);
    }

    public function scopeInProgressTask($query)
    {
        return $query->where('status', TaskStatusEnum::InProgress);
    }

    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function getTaskCreatedAtDiffForHuman()
    {
        return $this->created_at->diffForHumans();
    }
}
