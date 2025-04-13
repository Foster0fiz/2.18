<?php 
namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Video;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $posts = Post::count();
        $videos = Video::count();

        return view('dashboard', compact('posts', 'videos'));
    }
}
