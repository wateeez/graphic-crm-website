<?php
namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::all();
        return view('admin.projects', compact('projects'));
    }

    public function create() { return view('admin.projects'); }

    public function store(Request $request) {
        $data = $request->validate([
            'title'=>'required', 'description'=>'required', 'image'=>'nullable|image'
        ]);
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        Project::create($data);
        return redirect()->route('projects.index')->with('success','Project added!');
    }

    public function edit(Project $project){ return view('admin.projects', compact('project')); }

    public function update(Request $request, Project $project){
        $data = $request->validate([
            'title'=>'required', 'description'=>'required', 'image'=>'nullable|image'
        ]);
        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('images', 'public');
        }
        $project->update($data);
        return redirect()->route('projects.index')->with('success','Project updated!');
    }

    public function destroy(Project $project){
        $project->delete();
        return redirect()->route('projects.index')->with('success','Project deleted!');
    }
}
