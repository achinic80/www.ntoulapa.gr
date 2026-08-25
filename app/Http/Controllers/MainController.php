<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\WorkersController;
use App\Http\Controllers\MenusController;

class MainController extends Controller
{
    /**
     * main
     */
    public function main(Request $request)
    {
        $data['categories'] = CategoriesController::getCategories($request);
        $data['projects'] = ProjectsController::getProjects($request);
        $data['workers'] = WorkersController::getWorkers($request);
        $data['footermenuchoices'] = MenusController::getFooterMenuChoices($request);
        $html = view('ntoulapa.main', [])->with('data', $data)->render();
        return $html;
    }


}
