<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\HnItem;
use App\Extensions\Constants;
use App\Models\HnMenu;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;

class HnItemController extends AdminController
{
    protected $description = [
        'index' => '列表-不可选有子级的分类作为网址分类',
        'show' => '详情',
        'edit' => '编辑-不可选有子级的分类作为网址分类',
        'create' => '创建',
    ];

    protected $title = '网址管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new HnItem(), function (Grid $grid) {


            $grid->column('id')->sortable();
            $grid->column('sort', '排序')->editable()->sortable();
            $grid->column('name');
            $grid->column('cat', '分类')->select(HnMenu::GetPids(-1, false))->width(200);
            $grid->column('desc_min', '一句话简介')->limit(20);
            $grid->column('type', '类型')->using(Constants::Data_HnItem_Type);
            $grid->column('icon', '图标')->display(function ($icon) {
                if (empty($icon)) {
                    return '自动';
                }
                return "<img src='$icon' width='50' height='50'>";
            });
            $grid->column('link');
            $grid->column('bak_link');
            $grid->column('qrcode');
            $grid->column('official_link');
            $grid->column('language');
            $grid->column('country');

            $grid->enableDialogCreate();
            $grid->showQuickEditButton();
            $grid->disableEditButton();
            $grid->disableViewButton();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('cat', '分类')->select(HnMenu::GetPids(-1, false));
            });

            $grid->simplePaginate();
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
            $form->select('cat', '分类')->options(HnMenu::GetPids(-1, false))->required();
            $form->text('desc');
            $form->text('desc_min');
            $form->radio('type', '导航类型')->options(Constants::Data_HnItem_Type)->default(1)
                ->when(3, function (Form $form) {
                    $form->text('qrcode');
                    $form->text('official_link');
                });
            $form->text('link');
            $form->text('icon')->help('留空则自动获取');
            $form->text('bak_link');

            $form->text('language')->default('中文');
            $form->text('country')->default('中国');
            $form->number('sort')->default(0);

//            $form->display('created_at');
//            $form->display('updated_at');
        });
    }
}
