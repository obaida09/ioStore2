<?php

namespace App\DataTables;

use App\Models\ShippingCompany;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ShippingCompanyDatatable extends DataTable
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
            ->addColumn('action', 'admin.shipping_companies.action.buttons')
            ->addColumn('fast', function (ShippingCompany $shipping) {
                return $shipping->fast();
            })
            ->addColumn('country_count', function (ShippingCompany $shipping) {
                return $shipping->countries->count();
            })
            ->editColumn('status', function (ShippingCompany $shipping) {
                return $shipping->status();
            })
            ->editColumn('created_at', function (ShippingCompany $shipping) {
                return $shipping->created_at->toFormattedDateString();
            })
            ->editColumn('updated_at', function (ShippingCompany $shipping) {
                return $shipping->updated_at->toFormattedDateString();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ShippingCompanyDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ShippingCompany $model)
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
                    ->setTableId('shippingcompanydatatable-table')
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
            Column::make('name'),
            Column::make('code'),
            Column::make('fast'),
            Column::make('cost'),
            Column::make('country_count'),
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
        return 'ShippingCompany_' . date('YmdHis');
    }
}
