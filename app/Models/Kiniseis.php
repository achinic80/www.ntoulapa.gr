<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Kiniseis extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'sillogos_kiniseis';

    // Define the primary key (optional, as Laravel assumes 'id' by default)
    protected $primaryKey = 'ID';

    // Disable automatic timestamps if your table doesn't have `created_at` and `updated_at` columns
    public $timestamps = false;

    // Define which attributes can be mass-assigned (for creating or updating records)
    protected $fillable = [
        'ck_date',
        'ck_datenum',
        'ck_cussupcode',
        'ck_parastatiko',
        'ck_aitiologia',
        'ck_poso',
        'ck_kk',
        'ck_user',
        'ck_cussup',
        'ck_year',
    ];

    protected $casts = [
        'ck_poso' => 'decimal:2', // Ensure `ck_Poso` is treated as a decimal with two decimal places
        'ck_datenum' => 'integer',
        'ck_year' => 'integer',
    ];

    public function getFormattedDateAttribute()
    {
        return $this->ck_date ? \Carbon\Carbon::parse($this->ck_date)->format('d/m/Y') : null;
    }

    public function getFormattedPosoAttribute()
    {
        return number_format($this->ck_poso, 2);
    }

    public function ck_cussupcode()
    {
    return $this->belongsTo(Meli::class);
    }
}