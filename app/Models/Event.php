<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    public $table = 'events';

    public $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'organizer'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
        'organizer' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'nullable',
        'description' => 'nullable',
        'start_date' => 'nullable',
        'end_date' => 'nullable',
        'organizer' => 'nullable'
    ];

    // /**
    //  * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    //  **/
    // public function user()
    // {
    //     return $this->belongsTo(\App\Models\User::class, 'id', 'user_id');
    // }
}
