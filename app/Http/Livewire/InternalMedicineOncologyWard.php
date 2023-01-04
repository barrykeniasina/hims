<?php

namespace App\Http\Livewire;

use App\Models\Visit;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class InternalMedicineOncologyWard extends PowerGridComponent
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
    * @return Builder<\App\Models\Visit>
    */
    public function datasource(): Builder
    {
        return Visit::query()        
        ->join('departments','visits.department_id','=','departments.id')
        ->join('patients','visits.patient_id','=','patients.id')
        ->join('users','visits.entered_by','=','users.id')
        //->join('wards','wards.department_id','=','departments.id')
        ->where('departments.id','=','4')
        //->where('wards.ward_detail','=','Diabetic Clinic')
        ->where('visits.ward','=','Oncology')
        ->select('visits.id','visits.ward','patients.fname','visits.visitdate','users.name','visits.category','visits.created_at as created','visits.updated_at as updated','visits.triage')
        ->orderBy('visits.created_at','DESC')
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
        ->addColumn('id')
        ->addColumn('visitdate')
        ->addColumn('fname')
        ->addColumn('category')
        ->addColumn('created', fn (Visit $model) => Carbon::parse($model->created)->diffForHumans())
        ->addColumn('triage')
        ->addColumn('ward');    }

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
            Column::make('VISITDATE', 'visitdate')
                ->searchable()
                ->sortable()
                ->makeInputDatePicker(),

            Column::make('PATIENT', 'fname')
            ->sortable()
            ->searchable()
            ->makeInputText(),

            Column::make('CATEGORY', 'category')
                ->sortable()
                ->searchable()
                ->makeInputText(),

            Column::make('Visit window', 'created')
                ->sortable()
                ->searchable()
                ->makeInputText(),   
                
                Column::make('TRIAGE', 'triage')
                ->sortable()
                ->searchable()
                ->makeInputText(),

                Column::make('CURRENT WARD', 'ward')
                ->sortable()
                ->searchable()
                ->makeInputText(),   

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
     * PowerGrid Visit Action Buttons.
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
            ->route('internal_medicine.edit', ['id']),
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
     * PowerGrid Visit Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($visit) => $visit->id === 1)
                ->hide(),
        ];
    }
    */
}
