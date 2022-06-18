<?php

namespace App\DataTables;

use App\Models\ProductCoupon;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ProductCouponDatatable extends DataTable
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
            ->addColumn('action', 'admin.product_coupons.action.buttons')
            ->editColumn('created_at', function (ProductCoupon $coupon) {
                return $coupon->created_at->toFormattedDateString();
            })
            ->editColumn('updated_at', function (ProductCoupon $coupon) {
                return $coupon->updated_at->toFormattedDateString();
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ProductCouponDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ProductCoupon $model)
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
            ->setTableId('productcoupondatatable-table')
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
            Column::make('code'),
            Column::make('type'),
            Column::make('value'),
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
        return 'ProductCoupon_' . date('YmdHis');
    }
}
