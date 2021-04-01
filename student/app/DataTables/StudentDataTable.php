<?php

namespace App\DataTables;

use App\Models\Students;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class StudentDataTable extends DataTable
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
            ->addColumn('action', 'student.action');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Student $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Students $model)
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
                    ->setTableId('student-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orderBy(1);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id' => [
                'searchable' => true,
                'title' => "Student id",
                'orderable' => true,
            ],
            'firstname' => [
                'searchable' => true,
                'title' => "First Name",
                'orderable' => true,
            ],
            'regno' => [
                'searchable' => true,
                'title' => "Register No",
                'orderable' => true,
            ],
            'age' => [
                'searchable' => true,
                'title' => "Age",
                'orderable' => true,
            ],
            'gender' => [
                'searchable' => true,
                'title' => "Gender",
                'orderable' => true,
            ],
            'department' => [
                'searchable' => true,
                'title' => "Department",
                'orderable' => true,
            ],
            'email' => [
                'searchable' => true,
                'title' => "Email",
                'orderable' => true,
            ],
            'phono' => [
                'searchable' => true,
                'title' => "Phono",
                'orderable' => true,
            ],
            'address' => [
                'searchable' => true,
                'title' => "Address",
                'orderable' => true,
            ],
            'image' => [
                'searchable' => true,
                'title' => "Image",
                'orderable' => true,
            ],
            // [
            //     "name"=> "image",
            //     "data"=> "image",
            //     "render"=> function (data, type, full, meta) {
            //         return "<img src=\"" + data + "\" height=\"50\"/>";
            //     },
            //     "title"=> "Image",
            //     "orderable"=> true,
            //     "searchable"=> true
            // ]
            
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Student_' . date('YmdHis');
    }
}
