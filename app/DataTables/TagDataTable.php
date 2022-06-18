<?php

namespace App\DataTables;

use App\Models\Tag;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class TagDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'admin.tags.action.buttons')
            ->editColumn('status', function (Tag $tag) {
                return $tag->status();
            })
            ->editColumn('created_at', function (Tag $tag) {
                return $tag->created_at->toFormattedDateString();
            })
            ->editColumn('updated_at', function (Tag $tag) {
                return $tag->updated_at->toFormattedDateString();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Tag $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Tag $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('tag-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'dom' => 'Blfrtip',
                'responsive' => true,
                'autoWidth' => false,
                'lengthMenu' => [[10, 25, -1], [10, 25, 'All Record']],
                'buttons' => ['excel', 'csv', 'pdf', 'reset'],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('id')
                ->className('text-secondary text-sm font-weight-bolder opacity-1'),
            Column::make('name'),
            Column::make('status'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(110)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Tag_' . date('YmdHis');
    }
}
