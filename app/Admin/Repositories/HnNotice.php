<?php

namespace App\Admin\Repositories;

use App\Models\HnNotice as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class HnNotice extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
