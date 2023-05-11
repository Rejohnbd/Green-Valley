<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Venture;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Support\Str;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        $data = Project::with('venture')->orderBy('id', 'DESC')->get();
        return Inertia::render('Project/List', [
            'projects' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        $data = Venture::orderBy('id', 'DESC')->get();
        return Inertia::render('Project/Add', [
            'ventures' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {

        $request->request->add(['project_name_slug' => Str::slug($request->project_name)]);
        Project::create($request->validate([
            'venture_id' => 'required',
            'project_name' => 'required',
            'project_name_slug' => 'required',
            'number_of_plot' => 'required',
            'square_feet_price' => 'required',
            'sales_status' => 'required',
        ]));
        return Redirect::route('projects.index')->with(['status' => 'success', 'message' => 'Project Created Successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
