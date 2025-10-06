<?php
namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home() {
        $projects = Project::latest()->take(5)->get();
        return view('frontend.home', compact('projects'));
    }

    public function about() { return view('frontend.about'); }

    public function portfolio() {
        $projects = Project::all();
        return view('frontend.portfolio', compact('projects'));
    }

    public function contact() { return view('frontend.contact'); }
}
