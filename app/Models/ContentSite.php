<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentSite extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;


    protected $table = 'ms_contentsite';

    protected $primaryKey = 'ID';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'Name',
        'ContentPublisherID',
        'Language'
    ];

 

}