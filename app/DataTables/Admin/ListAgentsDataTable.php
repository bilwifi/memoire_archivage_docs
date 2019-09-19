<?php

namespace App\DataTables\Admin;

use App\Models\User;
use Yajra\DataTables\Services\DataTable;

class ListAgentsDataTable extends DataTable
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
                return '<a href="'.'d'.'" class="btn btn-primary"><i class="fa fa-edit"></i></a>'
                    .
                    ' <a href="'.route('admin.destroy_agent',$query->idusers).'" class="btn btn-danger"><i class="fa fa-trash"></i></a>'
                ; 
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model::JoinDepartement()->get();
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
                    ->addAction(['width' => '100px'])
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
            // 'id',
            'nom',
            'postnom',
            'prenom',
            'pseudo',
            'lib'=>['title'=>'Departement']
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
        return 'Admin/ListAgents_' . date('YmdHis');
    }
}
