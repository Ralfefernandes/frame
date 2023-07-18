<?php

namespace App\Models;

//use App\Traits\ClientAttributeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
//    use ClientAttributeTrait;

    use HasFactory;

    protected $fillable = [
        'name', 'logo', 'primary_color', 'second_color', 'collect_email', 'consent_for_questions'
    ];



    public function frames()
    {
        return $this->hasMany(Frame::class, 'client_id', 'id');
    }

}
