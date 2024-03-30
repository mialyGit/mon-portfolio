<?php

namespace App\DataTables;

use App\DataTables\Services\BaseDataTable;
use App\Models\Media;

class MediaDataTable extends BaseDataTable
{
    public function dataTable()
    {
        return $this->initiateDataTable($this->query())
            ->editColumn('size', function (Media $media) {
                return $media->readableSize(2);
            })
            ->addColumn('dt_image', function (Media $media) {
                return view('components.datatables.image', [
                    'src' => $media->image,
                ]);
            });
    }

    public function rawColumns()
    {
        return ['image'];
    }

    protected function getEditRoute($item)
    {
        return route('dashboard.medias.edit', ['media' => $item->id]);
    }

    protected function getDeleteRoute($item)
    {
        return route('dashboard.medias.destroy', ['media' => $item->id]);
    }

    public function query()
    {
        return Media::query();
    }
}
