<?php

namespace App\DataTables;

use App\DataTables\Services\BaseDataTable;
use App\Models\Skill;

class SkillDataTable extends BaseDataTable
{
    public function dataTable()
    {
        return $this->initiateDataTable($this->query())
            ->addColumn('dt_image', function (Skill $skill) {
                return view('components.datatables.image', [
                    'src' => $skill->icon,
                ]);
            })
            ->addColumn('dt_is_visible', function (Skill $skill) {
                return view('components.datatables.is-visible', [
                    'is_visible' => $skill->is_visible,
                ]);
            });
    }

    protected function getEditRoute($item)
    {
        return route('dashboard.skills.edit', ['skill' => $item->id]);
    }

    protected function getDeleteRoute($item)
    {
        return route('dashboard.skills.destroy', ['skill' => $item->id]);
    }

    public function query()
    {
        return Skill::query();
    }
}
