<?php

namespace App\Http\Controllers;
use App\Services\Data\SecurityDAO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Contracts\View\Factory;
use \Illuminate\Contracts\View\View;
use \Illuminate\Contracts\Foundation\Application;

class TestController extends Controller
{
    public function testProfile(): Factory|View|Application
    {
        return view("welcome");
    }
}
