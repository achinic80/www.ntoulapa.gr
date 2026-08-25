<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Products extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'products';

    // Define the primary key (optional, as Laravel assumes 'id' by default)
    protected $primaryKey = 'ID';

    // Disable automatic timestamps if your table doesn't have `created_at` and `updated_at` columns
    public $timestamps = false;

    // Define which attributes can be mass-assigned (for creating or updating records)
    protected $fillable = [
        'cat1',
        'cat2',
        'manufacturer',
        'model',
        'img1',
        'price1',
        'notes1',
        'enabled_chk',
        'bitrina_chk',
        'prosfora_chk',
        'new_chk',
        'top_chk',
        'sort_id',
        'notes',
    ];


//     `p_id` int NOT NULL DEFAULT '0',
//   `Factory_code` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `cat1` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `cat2` varchar(60) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `manufacturer` varchar(90) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `model` varchar(90) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `img1` varchar(120) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `price1` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `price2` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `price3` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `delivery` varchar(80) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `notes1` blob,
//   `similar` varchar(90) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `enabled_chk` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `bitrina_chk` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `prosfora_chk` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `new_chk` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `top_chk` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `sort_id` int DEFAULT NULL,
//   `ext1` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
//   `img2` varchar(255) COLLATE utf8mb3_bin DEFAULT '',
//   `img3` varchar(255) COLLATE utf8mb3_bin DEFAULT '',
//   `img4` varchar(255) COLLATE utf8mb3_bin DEFAULT '',
//   `img5` varchar(255) COLLATE utf8mb3_bin DEFAULT ''

    // Define which attributes are cast to specific types (e.g., date fields)
    protected $casts = [
        'diegrameno' => 'integer',
    ];


}