<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;


    protected $table = 'ms_company';

    protected $primaryKey = 'ID';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'Name',
        'BillingVATID',
        'BillingDOY',
        'BillingCompanyName',
        'BillingAddress1',
        'BillingAddress2',
        'BillingCity',
        'BillingCountry',
        'BillingPhone',
        'BillingBankAccount',
        'MotherCompanyID'
    ];
}