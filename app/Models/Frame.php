<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class Frame extends Model
{

    use HasFactory;

    protected $fillable = ['title', 'filename', 'photo_url', 'sort', 'client_id','edit'];

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }
    // ...

    /**
     * Get the column names of the frames table.
     *
     * @return array
     */
}
