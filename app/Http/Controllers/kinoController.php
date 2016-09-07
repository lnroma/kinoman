<?php 

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class kinoController extends CrudController{

    public function all($entity){
        parent::all($entity); 

			$this->filter = \DataFilter::source(new \App\Kino());
			$this->filter->add('name', 'Name', 'text');
			$this->filter->submit('search');
			$this->filter->reset('reset');
			$this->filter->build();

			$this->grid = \DataGrid::source($this->filter);
			$this->grid->add('name', 'Name');
			$this->grid->add('short_description', 'Short Description');
			$this->grid->add('description', 'Description');
			$this->grid->add('created_at', 'Created at');
			$this->grid->add('published', 'Is visible');
			$this->addStylesToGrid();


        return $this->returnView();
    }
    
    public function  edit($entity){
        
			$this->edit = \DataEdit::source(new \App\Kino());

			$this->edit->label('Edit kino');

			$this->edit->add('name', 'Name', 'text')->rule('required');
		
			$this->edit->add('short_description', 'Short description', 'textarea')->rule('required');
			$this->edit->add('description', 'Description', 'textarea')->rule('required');

			/** custom attributes */
			$attributes = new \App\Attributes();

			foreach ($attributes->all() as $_attr) {
				$value = $_attr->getAttributes();
				$this->edit->add($value['code'],$value['backend_name'],$value['type']);
			}

			$this->edit->add('published', 'Published', 'checkbox');

//        return $this->returnEditView();
		die('13');
    }

}
