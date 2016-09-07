<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class categoryController extends CrudController
{

    public function all($entity)
    {
        parent::all($entity);


        $this->filter = \DataFilter::source(new \App\category());
        $this->filter->add('name', 'Name', 'text');
        $this->filter->submit('search');
        $this->filter->reset('reset');
        $this->filter->build();

        $this->grid = \DataGrid::source($this->filter);
        $this->grid->add('name', 'Name');
        $this->grid->add('title', 'Title');
        $this->grid->add('description', 'Description');
        $this->grid->add('seo_title', 'Seo title');
        $this->grid->add('seo_description', 'Seo description');
        $this->addStylesToGrid();


        return $this->returnView();
    }

    public function edit($entity)
    {

        parent::edit($entity);


        $this->edit = \DataEdit::source(new \App\category());

        $this->edit->label('Edit Category');

        $this->edit->add('name', 'Name', 'text')->rule('required');
        $this->edit->add('url_key', 'Url key', 'text')->rule('required');
        $this->edit->add('title', 'Title', 'text')->rule('required');
        $this->edit->add('description', 'Description', 'text')->rule('required');
        $this->edit
            ->add('seo_title', 'Seo title', 'text')
            ->rule('required');
        $this->edit
            ->add('seo_description', 'Seo description', 'text')
            ->rule('required');

        return $this->returnEditView();
    }
}
