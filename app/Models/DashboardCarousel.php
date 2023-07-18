<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DashboardCarousel extends Model
{
    protected $table = 'dashboard_carousels';

    protected $fillable = [
        'title',
        'photo_url',
        'sort',
        'client_id',
    ];
    use HasFactory;

    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Client::class);
    }
}
