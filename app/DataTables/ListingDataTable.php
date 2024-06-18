<?php

namespace App\DataTables;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ListingDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query->with('category', 'location')))
            ->addColumn('action', function ($query) {
                $edit = '<a href="' . route('admin.listing.edit', $query->id) . '" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>';
                $delete = '<a href="' . route('admin.listing.destroy', $query->id) . '" class="btn btn-danger btn-sm delete-item"><i class="fas fa-trash"></i></a>';
                $more = '<div class="btn-group dropleft">
                      <button type="button" class="btn btn-dark btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fas fa-cog"></i>
                      </button>
                      <div class="dropdown-menu dropleft " x-placement="left-start" style="position: absolute; transform: translate3d(-202px, 0px, 0px); top: 0px; left: 0px; will-change: transform;">
                        <a class="dropdown-item" href="' . route('admin.listing-image-galery.index', ['id' => $query->id]) . '">Image Galery</a>
                        <a class="dropdown-item" href="' . route('admin.listing-video-galery.index', ['id' => $query->id]) . '">Video Galery</a>
                      </div>
                    </div>';

                return $edit . ' &nbsp; ' . $delete . ' &nbsp; ' . $more;
            })
            ->addColumn('category', function ($query) {
                return '<center>' . $query->category->name . '</center>';
            })
            ->addColumn('location', function ($query) {
                return '<center>' . $query->location->name . '</center>';
            })
            ->addColumn('status', function ($query) {
                if ($query->status === 1) {
                    return '<span class="badge badge-success">Active</span>';
                } else {
                    return '<span class="badge badge-danger">Inactive</span>';
                }
            })
            ->rawColumns(['category', 'location', 'status', 'action'])
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Listing $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('listing-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id')
                ->addClass('text-center align-middle'),
            Column::make('title')
                ->addClass('text-center align-middle'),
            Column::make('category')
                ->addClass('text-center align-middle'),
            Column::make('location')
                ->addClass('text-center align-middle'),
            Column::make('status')
                ->addClass('text-center align-middle'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-center align-middle'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Listing_' . date('YmdHis');
    }
}
