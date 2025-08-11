<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Video;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'totalVideos' => Video::count(),
            'totalCategories' => Category::count(),
            'recentVideos' => Video::latest()->take(4)->get(),
            'categories' => Category::withCount('videos')->get()
        ];

        return view('welcome', $data);
    }
}
