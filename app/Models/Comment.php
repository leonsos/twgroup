<?php

namespace App\Models;

use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    use Loggable;
    protected $fillable = ['content','task_id'];
    public function task()
    {
        return $this->belongsTo(Task::class);
    }

}
