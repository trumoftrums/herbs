<?php

namespace Vanguard\Repositories\BienDong;
interface BienDongRepository
{
    /**
     * Create $key => $value array for all available countries.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function getByDate($date = null);

    public function create(array $data);

    public function update(array $data, $id);

    public function delete($id);

    public function paginate($perPage, $search = null, $status = null);
}