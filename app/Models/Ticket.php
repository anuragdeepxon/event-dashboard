<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    public $table = 'tickets';

    public $fillable = [
        'event_id',
        'ticket_number',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'event_id' => 'integer',
        'ticket_number' => 'integer',
        'price' => 'float'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'event_id' => 'nullable',
        'ticket_number' => 'nullable',
        'price' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function events()
    {
        return $this->belongsTo(\App\Models\Event::class, 'id', 'event_id');
    }
}
