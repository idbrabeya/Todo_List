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
        'start_date',
        'end_date'
    ];
    public function todorelationtotask(){
        return $this->belongsTo(TodoList::class,'todo_id','id');
    }
}
