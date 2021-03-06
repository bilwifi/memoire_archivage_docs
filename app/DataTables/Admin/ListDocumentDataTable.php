<?php

namespace App\DataTables\Admin;

use App\Models\Document;
use Yajra\DataTables\Services\DataTable;

class ListDocumentDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->addColumn('action', function($query){
                return '<a href="'.route('view_document',$query->iddocuments).'" class="btn btn-primary"><i class="fa fa-eye"></i></a>'
                    .
                    ' <a href="'.route('admin.destroy_document',$query->iddocuments).'" class="btn btn-danger"><i class="fa fa-trash"></i></a>'
                ; 
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Document $model)
    {
        return $model::get();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->addAction(['width' => '120px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            // 'iddocuments',
            'titre',
            'description',
            // 'created_at',
            // 'updated_at'
        ];
    }

    protected function getBuilderParameters(){
        return [
            'dom' => 'ftp',
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Departement/ListDocument_' . date('YmdHis');
    }
}
