<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Support $support)
    {
        $supports = $support->all();
        return view('admin.supports.index', compact('supports'));
    }

    public function show(string|int $id)
    {
        // Support::find($id)
        // Support::where('id', $id)->first()
        // Support::where('id', '!=', $id)
        $support = Support::find($id);

        if (!$support) {
            return back();
        }

        return view('admin.supports.show', compact("support"));
    }

    public function create()
    {
        return view('admin.supports.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['status'] = 'a';

        // insert on db
        Support::create($data);

        return redirect()->route('supports.index');
    }
}
