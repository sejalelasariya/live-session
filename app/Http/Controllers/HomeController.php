<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class HomeController extends Controller
{
    public function index() 
    {
    	$posts = Blog::latest()->paginate(10); // Fetch 10 posts per page

        return view('home.index', compact('posts'));
    }
}