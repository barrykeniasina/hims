<?php

namespace App\Http\Livewire;

use App\Models\Visit_admission;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class InternalMedicineOutgoingRequest extends PowerGridComponent
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
            'visit_admissions.created_at as created',
            'visit_admissions.approved'            
            )
            
            ->where('departments.id','!=',4)
            ->orderby('visit_admissions.created_at','DESC')

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
        return [];
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
            ->addColumn('ward_from')
            ->addColumn('ward_to')
            ->addColumn('department_desc')
            ->addColumn('remarks')
            ->addColumn('created', fn (Visit_admission $model) => Carbon::parse($model->created)->diffForHumans())
            ->addColumn('approved')

            ;
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

            Column::make('REFERED FROM', 'ward_from'),

            Column::make('REFERED TO', 'ward_to'),

            Column::make('Department', 'department_desc'),

            Column::make('REQUEST WINDOW', 'created')
                ->sortable(),

                  

            Column::make('APPROVED', 'approved')

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

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('visit_admission.edit', ['visit_admission' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('visit_admission.destroy', ['visit_admission' => 'id'])
               ->method('delete')
        ];
    }
    */

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
