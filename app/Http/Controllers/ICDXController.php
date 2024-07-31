<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Gate;
use App\Models\ICDX;
use Illuminate\Support\Facades\Crypt;

class ICDXController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(\Auth::user()->can('manage invoice')) {

            $query = ICDX::query();

            if ($request->ajax()) {
                return DataTables::of($query)

                ->addColumn('actions', function ($icdx) {
                    $actions = '';

                    // Show Invoice
                    if (Gate::check('show invoice')) {
                        $actions .= '<div class="action-btn bg-info ms-2">
                                        <a href="' . route('users.show', [Crypt::encrypt($icdx->id)]) . '"
                                            class="mx-3 btn btn-sm align-items-center"
                                            data-bs-toggle="tooltip" title="' . __('Show') . '"
                                            data-original-title="' . __('Detail') . '">
                                            <i class="ti ti-eye text-white"></i>
                                        </a>
                                    </div>';
                    }

                    return $actions;

                })
                ->rawColumns(['actions'])
                ->make(true);
            }

            return view('ICDX.index');
        } else {
            return redirect()->back()->with('error', __('Permission Denied.'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
