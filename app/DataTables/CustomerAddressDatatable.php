<?php

namespace App\DataTables;

use App\Models\UserAddress;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CustomerAddressDatatable extends DataTable
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
            ->addColumn('action', 'admin.customer_addresses.action.buttons')
            ->editColumn('created_at', function (UserAddress $userAddress) {
                return $userAddress->created_at->toFormattedDateString();
            })
            ->editColumn('updated_at', function (UserAddress $userAddress) {
                return $userAddress->updated_at->toFormattedDateString();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\CustomerAddressDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(UserAddress $model)
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
                    ->setTableId('customeraddressdatatable-table')
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
            Column::make('id'),
            Column::make('email'),
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
        return 'CustomerAddress_' . date('YmdHis');
    }
}
