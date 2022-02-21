<?php


namespace App\Services;


class Service
{

    protected $data;
    public function handlePaginate($data, $name = 'data')
    {
        if($data) {
            return [
                $name       => $data->items(),
                'last_page' => $data->lastPage(),
            ];
        } else return null;
    }
}
