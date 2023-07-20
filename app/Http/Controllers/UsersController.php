<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use JeroenNoten\LaravelAdminLte\View\Components\Tool\Datatable;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Validator;

class UsersController extends BaseController
{

    public function __construct()
    {
        $this->resources = 'users.';
        parent::__construct();
        $this->route = 'users.';
        // $this->blood_group = config('blood_group.blood_group_types');
        // $this->ages = config('ageRange.age_range');
        // $this->genders = config('gender.genders');
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::all();
            return Datatables::of($data)
                ->addIndexColumn()

                ->editColumn('name', function ($row) {
                    return $row->name ?? '-';
                })
                ->editColumn('email', function ($row) {
                    return $row->email ?? '-';
                })
                ->editColumn('action', function ($row) {
                    return view('templates.index_actions', ['route' => "users.", 'id' => $row->id,]);
                })
                // ->rawColumns(['checkbox'])
                ->make(true);
        }
        $info = $this->crudInfo();
        return view($this->indexResource(), $info);
    }


    public function create()
    {
        $info = $this->crudInfo();
        return view($this->createResource(), $info);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = $request->all();
        $staff = new User($data);
        $staff->save();
        return redirect()->route($this->indexRoute())->with('success', 'User Added Successfully..');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $info = $this->crudInfo();
        $info['item'] = User::findOrFail($id);
        $info['hideEdit'] = true;
        return view($this->showResource(), $info);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $info = $this->crudInfo();
        $info['item'] = User::findOrFail($id);
        return view($this->editResource(), $info);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $user = User::findOrFail($id);
        $user->update($data);
        return redirect()->route($this->indexRoute())->with('success', 'User Update Successfully..');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route($this->indexRoute())->with('success', 'Staff Deleted Successfully.');
    }
}
