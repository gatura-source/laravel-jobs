<?php

namespace App\Http\Controllers;
use App\Models\JobApplication;

use Illuminate\Http\Request;

class MyApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        return view(
            'my_applications.index',
            [
                'applications' => auth()->user()->jobApplications()
                    ->with([
                        'job' => fn($query) => $query->withCount('jobApplications')
                            ->withAvg('jobApplications', 'expected_salary'),
                        'job.employer'
                    ])
                    ->latest()->get()
            ]
        );
    }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(JobApplication $my_application): mixed
    {
        // dd($my_application);
        try{
            if($my_application->delete()){
                return redirect()->route('my_applications.index')->with('success', 'Application withdrawn successfully');
            }
            return redirect()->route('my_applications.index')->with('error','Error Withdrawing Application');
        }catch(\Exception $e)
        {
            return redirect()->route('my_applications.index')->with('error', $e->getMessage());
        }
    }
}