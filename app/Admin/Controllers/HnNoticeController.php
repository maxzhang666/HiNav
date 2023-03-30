<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\HnNotice;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;

class HnNoticeController extends AdminController
{

    protected $title = '公告管理';
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new HnNotice(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('content');
            $grid->column('publish_date', '发布时间');
            $grid->column('views', '浏览');
            $grid->column('likes', '点赞');
            $grid->column('link', '链接');
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
        return Show::make($id, new HnNotice(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('content');
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
        return Form::make(new HnNotice(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->textarea('content');
            $form->date('publish_date')->default(date('Y-m-d'));
            $form->text('link', '链接')->help('可选，不填则不跳转');


            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
