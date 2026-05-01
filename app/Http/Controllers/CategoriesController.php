<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    /**
     * getCategories
     */
    public static function getCategories(Request $request)
    {
        $categories = [
        [
            'title' => 'Ντουλάπες 111',
            'image' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6',
        ],
        [
            'title' => 'Κουζίνες 222',
            'image' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d',
        ],
        [
            'title' => 'Γυψοσανίδες 333',
            'image' => 'https://images.unsplash.com/photo-1599423300746-b62533397364',
        ],
        ];
        return $categories;
    }


}
