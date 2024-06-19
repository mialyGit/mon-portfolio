<?php

namespace App\Http\Controllers\Dashboard;

use App\DataTables\SkillDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Skill\SaveSkillRequest;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index(Request $request, SkillDataTable $dataTable)
    {
        if ($request->ajax()) {
            return $dataTable->ajax();
        }

        return view('dashboard.skills.index');
    }

    public function create()
    {
        $skill = new Skill();

        return view('dashboard.skills.create', compact('skill'));
    }

    public function store(SaveSkillRequest $request, Skill $skill)
    {
        $data = $request->only(['name', 'icon']);
        $data['is_visible'] = $request->has('is_visible');
        $skill->create($data);

        return redirect()->route('dashboard.skills.index')->with('message', __('Added with success'));
    }

    public function edit(Request $request, Skill $skill)
    {
        return view('dashboard.skills.edit', compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $data = $request->only(['name', 'icon']);
        $data['is_visible'] = $request->boolean('is_visible');

        $skill->update($data);

        return redirect()->route('dashboard.skills.index')->with('message', __('Updated with success'));
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();

        return response()->json([
            'message' => __('Deleted successfully'),
        ]);
    }
}
