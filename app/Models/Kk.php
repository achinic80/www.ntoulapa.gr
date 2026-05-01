<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Kk extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'sillogos_kk';

    // Define the primary key (optional, as Laravel assumes 'id' by default)
    protected $primaryKey = 'ID';

    // Disable automatic timestamps if your table doesn't have `created_at` and `updated_at` columns
    public $timestamps = false;

    // Define which attributes can be mass-assigned (for creating or updating records)
    protected $fillable = [
        'kk',
        'txt',
        'description',
        'year'

    ];


}