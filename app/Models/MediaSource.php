<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaSource extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;


    protected $table = 'ms_mediasource';

    protected $primaryKey = 'ID';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'SourceName',
        'SourceDescription',
        'CompanyID',
        'ListSourceURL',
        'ListSourceFeed',
        'Language',
        'SourceType',
        'PromptID',
        'ContributorID',
        'Interval',
        'rss_ai',
        'rssClassContentName'
    ];

 



}
