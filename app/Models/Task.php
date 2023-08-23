<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TodoList;

class Task extends Model
{
    use HasFactory;
    protected $fillable=[
        'status',
        'prioriti',
        'todo_id',
        'user_id',
        'user_name',
        'task_name',
        'start_date',
        'end_date'
    ];
    public function todorelationtotask(){
        return $this->belongsTo(TodoList::class,'todo_id','id');
    }
    public function userrelationtotask(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
