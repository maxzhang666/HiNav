<?php

namespace App\Admin\Repositories;

use App\Models\HnMenu as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class HnMenu extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
