<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProjectsController extends Controller
{
    /**
     * getProjects
     */
    public static function getProjects(Request $request)
    {
        $projects = [
        [
            'perigrafi' => 'Συρόμενη ντουλάπα με καθρέφτη 5555',
            'perioxi' => 'Θεσσαλονίκη',
            'timi' => '3.150',
            'image' => 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6',
        ],
        [
            'perigrafi' => 'Συρόμενη ντουλάπα με καθρέφτη',
            'perioxi' => 'Αθήνα',
            'timi' => '2.150',
            'image' => 'https://images.unsplash.com/photo-1600585154526-990dced4db0d',
        ],
        [
            'perigrafi' => 'Ψευδοροφή με ambient φωτισμό',
            'perioxi' => 'Πάτρα',
            'timi' => '1.150',
            'image' => 'https://images.unsplash.com/photo-1599423300746-b62533397364',
        ],
        ];

        return $projects;
    }


}
