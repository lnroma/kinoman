<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use \Serverfireteam\Panel\CrudController;

use Illuminate\Http\Request;

class KinoController extends CrudController
{

    public function all($entity)
    {
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

    public function edit($entity)
    {

        $this->edit = \DataEdit::source(new \App\Kino());

        $this->edit->label('Edit kino');

        $this->edit->add('name', 'Название фильма', 'text')->rule('required');
        $this->edit->add('url_key', 'Ключ url', 'text')->rule('required');

        $this->edit->add('short_description', 'Короткое описание', 'textarea')->rule('required');
        $this->edit->add('description', 'Описание', 'redactor')->rule('required');

        $this
            ->edit
            ->add('src', 'Фаил фильма', 'text');

        $this
            ->edit
            ->add('src_tumb', 'Аватар фильма', 'image')
            ->move('uploads/images/');

        $this->edit->add('raiting', 'Рейтинг', 'text');

        $category = new \App\category();
        $options = array();
        foreach ($category->all(array('name','id'))->toArray() as $_options) {
            $options[$_options['id']] = $_options['name'];
        }
        $this->edit
            ->add('category_idsn', 'Категории', 'multiselect')
            ->options(
                $options
            );

        $this->edit->add('published', 'Опубликован ли', 'checkbox');

        return $this->returnEditView();
    }

}
