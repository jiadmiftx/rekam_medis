<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Gate;
use App\Models\Obat;
use Illuminate\Support\Facades\Crypt;
use Auth;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(\Auth::user()->can('manage invoice')) {

            $query = Obat::query();

            if ($request->ajax()) {
                return DataTables::of($query)

                ->addColumn('actions', function ($obat) {
                    $actions = '';

                    // Show Invoice
                    if (Gate::check('show invoice')) {
                        $actions .= '<div class="action-btn bg-info ms-2">
                                        <a href="' . route('users.show', [Crypt::encrypt($obat->id)]) . '"
                                            class="mx-3 btn btn-sm align-items-center"
                                            data-bs-toggle="tooltip" title="' . __('Show') . '"
                                            data-original-title="' . __('Detail') . '">
                                            <i class="ti ti-eye text-white"></i>
                                        </a>
                                    </div>';
                    }

                    // Edit Invoice
                    if (Gate::check('edit invoice')) {
                        $actions .= '<div class="action-btn bg-primary ms-2">
                                        <a href="' . route('users.edit', [Crypt::encrypt($obat->id)]) . '"
                                            class="mx-3 btn btn-sm align-items-center"
                                            data-bs-toggle="tooltip" title="' . __('Edit') . '"
                                            data-original-title="' . __('Edit') . '">
                                            <i class="ti ti-pencil text-white"></i>
                                        </a>
                                    </div>';
                    }

                    // Delete Invoice
                    if (Auth::user()->can('delete invoice')) {
                        $actions .= '<div class="action-btn bg-danger ms-2">
                                        <form method="POST" action="' . route('obat.destroy', $obat->id) . '" id="delete-form-' . $obat->id . '">
                                            ' . csrf_field() . '
                                            ' . method_field('DELETE') . '
                                            <a href="#"
                                                class="mx-3 btn btn-sm align-items-center bs-pass-para"
                                                data-bs-toggle="tooltip"
                                                title="' . __('Delete') . '"
                                                data-original-title="' . __('Delete') . '"
                                                data-confirm="' . __('Are You Sure?') . '|' . __('This action can not be undone. Do you want to continue?') . '"
                                                data-confirm-yes="document.getElementById(\'delete-form-' . $obat->id . '\').submit();">
                                                <i class="ti ti-trash text-white"></i>
                                            </a>
                                        </form>
                                    </div>';
                    }


                    return $actions;

                })
                ->rawColumns(['actions'])
                ->make(true);
            }

            return view('obat.index');
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
