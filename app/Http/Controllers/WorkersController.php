<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class WorkersController extends Controller
{
    /**
     * getWorkers
     */
    public static function getWorkers(Request $request)
    {
        $workers = [
        [
            'eponimia' => 'Ξυλουργείο Παπαδόπουλος',
            'perioxi' => 'Θεσσαλονίκη',
            'rank' => '3.1',
            'image' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6',
        ],
        [
            'eponimia' => 'Kitchen Design Studio',
            'perioxi' => 'Αθήνα',
            'rank' => '4.7',
            'image' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d',
        ],
        [
            'eponimia' => 'Drywall Experts',
            'perioxi' => 'Πάτρα',
            'rank' => '3.3',
            'image' => 'https://images.unsplash.com/photo-1599423300746-b62533397364',
        ],
         [
            'eponimia' => 'Ξυλουργείο Παπαδόπουλος',
            'perioxi' => 'Θεσσαλονίκη',
            'rank' => '3.1',
            'image' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6',
        ],
        [
            'eponimia' => 'Kitchen Design Studio',
            'perioxi' => 'Αθήνα',
            'rank' => '4.7',
            'image' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d',
        ],
        [
            'eponimia' => 'Drywall Experts',
            'perioxi' => 'Πάτρα',
            'rank' => '3.3',
            'image' => 'https://images.unsplash.com/photo-1599423300746-b62533397364',
        ],
     [
            'eponimia' => 'Ξυλουργείο Παπαδόπουλος',
            'perioxi' => 'Θεσσαλονίκη',
            'rank' => '3.1',
            'image' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6',
        ],
        [
            'eponimia' => 'Kitchen Design Studio',
            'perioxi' => 'Αθήνα',
            'rank' => '4.7',
            'image' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d',
        ],
        [
            'eponimia' => 'Drywall Experts',
            'perioxi' => 'Πάτρα',
            'rank' => '3.3',
            'image' => 'https://images.unsplash.com/photo-1599423300746-b62533397364',
        ],
        ];

        return $workers;
    }


}
