<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Meli extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'sillogos_people';

    // Define the primary key (optional, as Laravel assumes 'id' by default)
    protected $primaryKey = 'ID';

    // Disable automatic timestamps if your table doesn't have `created_at` and `updated_at` columns
    public $timestamps = false;

    // Define which attributes can be mass-assigned (for creating or updating records)
    protected $fillable = [
        'name',
        'surname',
        'fathername',
        'occupation',
        'dateofbirth',
        'dateofrecord',
        'category',
        'simetoxiseGS',
        'address1',
        'zip1',
        'city1',
        'phone1',
        'phone2',
        'address2',
        'zip2',
        'city2',
        'phone3',
        'phone4',
        'fax',
        'ipoloipo',
        'email',
        'bea',
        'ebea',
        'diegrameno',
        'dateofdelete',
        'apofasidelete',
        'logsxedio',
        'notes',
    ];

    // Define which attributes are cast to specific types (e.g., date fields)
    protected $casts = [
        'dateofbirth' => 'datetime',  // Automatically cast to Carbon instance
        'dateofrecord' => 'datetime',
        'dateofdelete' => 'datetime',
        'simetoxiseGS' => 'integer',
        'diegrameno' => 'integer',
    ];

    // Define any custom accessors or mutators as needed

    // Example accessor to format `dateofbirth` as `d/m/Y`
    public function getFormattedDateOfBirthAttribute()
    {
        return $this->dateofbirth ? \Carbon\Carbon::parse($this->dateofbirth)->format('d/m/Y') : null;
    }

    // Example accessor to format `dateofrecord` as `d/m/Y`
    public function getFormattedDateOfRecordAttribute()
    {
        return $this->dateofrecord ? \Carbon\Carbon::parse($this->dateofrecord)->format('d/m/Y') : null;
    }

}