<?php

namespace Vanguard\Repositories\News;
interface NewsRepository
{
    /**
     * Create $key => $value array for all available countries.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function paginate($perPage, $search = null, $status = null);
    public function getLastest($num =3,$type =null,$cat = null);
}