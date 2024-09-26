<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use App\Http\Requests\StoreCrudRequest;
use App\Http\Requests\UpdateCrudRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;


class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $viewBlade = $request->query('viewBlade');
        // \Log::info('viewBlade received: ' . $viewBlade);

        switch ($viewBlade) {
            case 'officeDataTable':
                return view('crud.index');
            default:
                return view('crud.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCrudRequest $request): JsonResponse
    {
        $crud = Crud::create($request->validated());

        if ($crud) {
            // Successful creation
            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'reload' => true,
                    'component' => 'officeDataTable',
                    'redirect' => route('cruds.index'),
                ]);
            }
        }

        // Failure response for both AJAX and non-AJAX
        return response()->json([
            'success' => false,
            'message' => 'Something went wrong!'
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Crud $crud)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Crud $crud)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCrudRequest $request, Crud $crud)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Crud $crud)
    {
        //
    }
}
