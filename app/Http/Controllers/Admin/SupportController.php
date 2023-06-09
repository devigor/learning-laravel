<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupportRequest;
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

    public function store(StoreSupportRequest $request)
    {
        $data = $request->all();
        $data['status'] = 'a';

        // insert on db
        Support::create($data);

        return redirect()->route('supports.index');
    }

    public function edit(Support $support, string|int $id)
    {
        if (!$support = $support->where('id', $id)->first()) {
            return back();
        }

        return view('admin.supports.edit', compact('support'));
    }

    public function update(StoreSupportRequest $request, Support $support, string|int $id)
    {
        if (!$support = $support->find($id)) {
            return back();
        }

        $support->update($request->only(['subject', 'body']));

        return redirect()->route('supports.index');
    }

    public function destroy(Support $support, string|int $id)
    {
        if (!$support = $support->find($id)) {
            return back();
        }

        $support->delete();

        return redirect()->route('supports.index');
    }
}
