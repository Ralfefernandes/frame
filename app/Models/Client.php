<?php

namespace App\Models;

//use App\Traits\ClientAttributeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
    protected $table = 'clients';

//    use ClientAttributeTrait;

    use HasFactory;

    protected $fillable = [
        'name', 'primary_color', 'second_color','logo', 'collect_email', 'consent_for_questions', 'url'
    ];



    public function frames()
    {
        return $this->hasMany(Frame::class, 'client_id', 'id');
    }
    public static function generateUniqueURL()
    {
        $url = Str::random(16);
        while (static::where('url', $url)->exists()) {
            // If the generated URL already exists, generate a new one
            $url = Str::random(16);
        }
        return $url;
    }
}
