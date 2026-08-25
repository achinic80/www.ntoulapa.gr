<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MenusController extends Controller
{
    /**
     * getCategories
     */
    public static function getFooterMenuChoices(Request $request)
    {
        $FooterMenuChoices = [
        [
            'title' => 'Footer Ντουλάπες 111',
            'image' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6',
        ],
        [
            'title' => 'Footer Κουζίνες 222',
            'image' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d',
        ],
        [
            'title' => 'Footer Γυψοσανίδες 333',
            'image' => 'https://images.unsplash.com/photo-1599423300746-b62533397364',
        ],
        [
            'title' => 'Footer Ντουλάπες 111',
            'image' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6',
        ],
        [
            'title' => 'Footer Κουζίνες 222',
            'image' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d',
        ],
        [
            'title' => 'Footer Γυψοσανίδες 333',
            'image' => 'https://images.unsplash.com/photo-1599423300746-b62533397364',
        ],
        [
            'title' => 'Footer Ντουλάπες 111',
            'image' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6',
        ],
        [
            'title' => 'Footer Κουζίνες 222',
            'image' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d',
        ],
        [
            'title' => 'Footer Γυψοσανίδες 333',
            'image' => 'https://images.unsplash.com/photo-1599423300746-b62533397364',
        ],                
        ];
        return $FooterMenuChoices;
    }


}
