<?php

namespace App\Http\Livewire;


class ExcelImporter extends Component
{
      public $rows;

        public function importData( $rows ){
        // Set rows attribute first
        $this->rows = $rows;

        // Now pass or fail
        $this->validate();

        // Don't send back rows in response
        $this->rows = [];



        ImportExcelDataJob::dispatch( $rows );
        $this->dispatchBrowserEvent('import-processing');
        try{
            //$this->validate()
          }catch(\Illuminate\Validation\ValidationException $e){
            $this->rows = []; // Don't send back rows in response
            foreach( $e->validator->errors()->all() as $error  ) 
              Log::info( 'found error'.$error );
            throw $e;
          }
    }
        

    /* \app\Http\Livewire\ExcelImporter  */
    protected $rules = [
        'rows.*.0' => 'required|numeric'
    ];
  

}
