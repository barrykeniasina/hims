<?php

namespace App\Http\Livewire;

use App\Models\Visit_admission;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class EmergencyAcuteWard extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
    * PowerGrid datasource.
    *
    * @return Builder<\App\Models\Visit_admission>
    */
    public function datasource(): Builder
    {
        return Visit_admission::query()
        ->join('users as b', 'visit_admissions.admission_by','=', 'b.id')
        ->join('users as c', 'visit_admissions.user_id','=', 'c.id')
        ->join('wards as d','visit_admissions.refered_from','=','d.id') 
        ->join('wards as e','visit_admissions.ward_id','=','e.id')   
        ->join('visits','visit_admissions.visit_id','=','visits.id') 
        ->join('patients','visits.patient_id','=','patients.id')    
        ->join('departments','e.department_id','=','departments.id') 
        ->join('beds','visit_admissions.bed_id','=','beds.id')     
        ->select(
  
            'departments.department_desc',
            'visit_admissions.id',
            'visit_admissions.type as type',
            'b.name as admission_by',
            'c.name as doctor_incharge',
            'd.ward_detail as ward_from',
            'e.ward_detail as ward_to',
            'visit_admissions.transport as transport',
            'visit_admissions.remarks as remarks',
            'patients.fname',
            'visit_admissions.updated_at as updated',
            'visit_admissions.approved',
            'beds.code as bed'

            
            )
            ->where('departments.department_desc','=','Emergency')
            ->where('e.ward_detail','=','Acute')
            ->where('visit_admissions.approved','=','Yes')
            ->orderby('visit_admissions.updated_at','DESC')
        ;
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [

            'Patient' => [ 
                'fname', 
            ],

            'Ward' => [ 
                'ward_detail', 
            ],
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
        ->addColumn('type')
        ->addColumn('fname')
        ->addColumn('bed')
        ->addColumn('ward_to')
        ->addColumn('updated', fn (Visit_admission $model) => Carbon::parse($model->updated)->diffForHumans());
        }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

     /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('TYPE', 'type')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('PATIENT', 'fname')
            ->sortable()
            ->searchable()
            ->makeInputText(),

            Column::make('BED', 'bed')
            ->sortable()
            ->searchable()
            ->makeInputText(),

            Column::make('REFERED TO', 'ward_to'),


            Column::make('Approved Window', 'updated')
                ->sortable(),

        ]
;
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

     /**
     * PowerGrid Visit_admission Action Buttons.
     *
     * @return array<int, Button>
     */

    
    public function actions(): array
    {
       return [
        Button::add('Edit')
        ->caption('Manage')
        ->target('')
            ->class('btn btn-warning btn-sm')
            ->route('emergency.visit.edit', ['id']),
        ];
    }
    

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

     /**
     * PowerGrid Visit_admission Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($visit_admission) => $visit_admission->id === 1)
                ->hide(),
        ];
    }
    */
}
