<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\HnItem;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;

class HnItemController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new HnItem(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('desc');
            $grid->column('desc_min');
            $grid->column('type');
            $grid->column('link');
            $grid->column('bak_link');
            $grid->column('qrcode');
            $grid->column('official_link');
            $grid->column('language');
            $grid->column('country');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new HnItem(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('desc');
            $show->field('desc_min');
            $show->field('type');
            $show->field('link');
            $show->field('bak_link');
            $show->field('qrcode');
            $show->field('official_link');
            $show->field('language');
            $show->field('country');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new HnItem(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('desc');
            $form->text('desc_min');
            $form->text('type');
            $form->text('link');
            $form->text('bak_link');
            $form->text('qrcode');
            $form->text('official_link');
            $form->text('language');
            $form->text('country');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}