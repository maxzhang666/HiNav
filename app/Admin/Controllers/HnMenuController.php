<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\HnMenu;
use App\Extensions\Constants;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;

class HnMenuController extends AdminController
{

    protected $title = '菜单管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new HnMenu(), function (Grid $grid) {

            $grid->column('id')->sortable();
            $grid->column('sort', '排序')->editable()->sortable();
            $grid->column('name');
            $grid->column('pid')->select(\App\Models\HnMenu::GetRoots(), true)->width(160);// using(\App\Models\HnMenu::GetRoots())->editable();
            $grid->column('link');
            $grid->column('type')->using(Constants::Menu_Type);
            $grid->column('icon');
            //$grid->column('created_at')->sortable();
            //$grid->column('updated_at')->sortable();

            $grid->disableEditButton();
            $grid->disableViewButton();
            $grid->enableDialogCreate();
            $grid->showQuickEditButton();

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
        return Show::make($id, new HnMenu(), function (Show $show) {
//            $show->field('id');
            $show->field('name');
            $show->field('pid')->using(\App\Models\HnMenu::GetRoots());
            $show->field('link');
            $show->field('type')->using(Constants::Menu_Type);
            $show->field('icon');
//            $show->field('created_at');
//            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new HnMenu(), function (Form $form) {
            $form->text('name');
            $form->select('pid')->options(function ($id) {
                return \App\Models\HnMenu::GetRoots($id);
            });
            $form->text('link')->default("#");
            $form->select('type')->options(Constants::Menu_Type);
            $form->icon('icon');
            $form->number('sort')->default(0)->min(0)->max(10000);
        });
    }
}
