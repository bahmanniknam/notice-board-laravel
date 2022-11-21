<?php

namespace App\Services\Notice\Models;

use App\Models\User;
use Database\Factories\NoticeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'content', 'user_id'];

    protected static function newFactory()
    {
        return NoticeFactory::new();
    }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
