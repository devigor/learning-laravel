<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupportRequest;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Services\SupportService;

class SupportController extends Controller
{

    public function __construct(protected SupportService $service) {}

    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter);
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
        $this->service->store(CreateSupportDTO::makeFromRequest($request));

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

        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));
        if (!$support) {
            return back();
        }

        return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('supports.index');
    }
}
