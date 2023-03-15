<?php

namespace App\Extensions;

trait FormSaver
{

    protected $dataKeys = [];

    /**
     * The data of the form.
     *
     * @return array
     */
    public function default(): array
    {
        $data = [];

        foreach ($this->dataKeys as $key) {
            $data[$key] = admin_setting($key);
        }
        return $data;
    }

    /**
     * Handle the form request.
     *
     * @param array $input
     *
     * @return mixed
     */
    public function handle(array $input)
    {
        admin_setting($input);
        //ddd($input);
        return $this
            ->response()
            ->success('设置成功')
            ->refresh();
    }
}
