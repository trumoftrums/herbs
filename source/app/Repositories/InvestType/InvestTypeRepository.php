<?php

namespace Vanguard\Repositories\InvestType;
interface InvestTypeRepository
{
    /**
     * Create $key => $value array for all available countries.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function getAll($status = null);
    public function getTypebyID($id = null,$toArray =false);
    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function paginate($perPage, $search = null, $status = null);
}