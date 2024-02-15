<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kelas()
    {

        return $this->belongsTo(Kelas::class,'kelas_id');
    }

    public function user()
    {

        return $this->belongsTo(User::class,'user_id','id');
    }

    public function extra()
    {

        return $this->belongsTo(ExtraCuricular::class,'extra_id','id');
    }
}

