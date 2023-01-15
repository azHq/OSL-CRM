<?php

namespace App\Models;

use App\Helper\NewLog;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'start',
        'end',
        'details',
        'assignee_id',
        'status'
    ];

    protected $append = ['color'];

    protected static function booted()
    {
        static::addGlobalScope('rolewise', function ($query) {
            if (!Auth::user()->hasRole('super-admin'))
                $query->where('assignee_id', Auth::user()->id);
        });

        self::created(function ($task) {
            NewLog::create('New Task Assigned', 'A new task "' . $task->name . '" has been assigned to ' . $task->assignee->name . '.');
        });

        self::updated(function ($task) {
            $updatedFields = '';
            foreach ($task->getDirty() as $key => $value) {
                $updatedFields .= (' ' . $key . ',');
            }
            NewLog::create('Task Updated', 'Task "' . $task->name . '" has been updated. Changed fields are' . $updatedFields . '.');
        });

        self::deleted(function ($task) {
            NewLog::create('Task Deleted', 'Task "' . $task->name . '" has been deleted.');
        });
    }

    public function assignee()
    {
        return $this->belongsTo(User::class, 'assignee_id');
    }

    public function getColorAttribute()
    {
        switch ($this->status) {
            case 'Pending':
                return '#000';
                break;
            case 'Resolved':
                return 'green';
                break;
            case 'Canceled':
                return 'red';
                break;
            default:
                return '#000';
                break;
        }
    }
}
