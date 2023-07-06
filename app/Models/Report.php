<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lead()
    {
        return $this->belongsTo(Lead::class, 'leads_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'counselor_id');
    }
    public function remark()
    {
        return $this->belongsTo(Remarks::class,'remarks_id');
    }
}
