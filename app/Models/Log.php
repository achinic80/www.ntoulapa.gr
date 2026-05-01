<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;


    protected $table = 'ms_log';

    protected $primaryKey = 'ID';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'Password',
        'LogDate',
        'LogWhat',
        'LogFile',
        'LogFunction',
        'LogMessage'
    ];
}