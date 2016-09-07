<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class AttributesController extends CrudController
{

    public function all($entity)
    {
        parent::all($entity);


        $this->filter = \DataFilter::source(new \App\Attributes());
        $this->filter->add('name', 'Name', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('type', 'Type');
        $this->grid->add('code','Code');
        $this->grid->add('frontend_name', 'Frontend name');
        $this->grid->add('backend_name', 'Backend name');
        $this->grid->add('is_require', 'Is require');
        $this->addStylesToGrid();


        return $this->returnView();
    }

    public function edit($entity)
    {

        parent::edit($entity);

        $this->edit = \DataEdit::source(new \App\Attributes());

        $this->edit->label('Edit kino attributes');

        $this->edit->add('type', 'Type', 'text')->rule('required');
        $this->edit->add('code', 'Code', 'text')->rule('required');
        $this->edit->add('frontend_name', 'Frontend name', 'text')->rule('required');
        $this->edit->add('backend_name', 'Backend name', 'text')->rule('required');
        $this->edit->add('is_require', 'Is require', 'text')->rule('required');


        return $this->returnEditView();
    }

}
