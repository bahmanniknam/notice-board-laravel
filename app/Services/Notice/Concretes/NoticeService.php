<?php

namespace App\Services\Notice\Concretes;

use App\Services\Notice\Models\Notice;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * NoticeService
 */
class NoticeService
{
    /**
     * Return All notices
     *
     * @return Builder[]|Collection
     */
    public function all()
    {
        return Notice::with('user')->get();
    }

    /**
     * Paginate users
     *
     * @param int $count
     * @return LengthAwarePaginator
     */
    public function paginate(int $count = 5): LengthAwarePaginator
    {
        return Notice::with('user')->paginate($count);
    }

    /**
     * Store new Notice
     *
     * @param $data
     * @return Notice
     */
    public function store($data): Notice
    {
        return Notice::create($data);
    }

    /**
     * Find one notice
     *
     * @param $id
     * @return Notice
     * @throws ModelNotFoundException
     */
    public function findOrFail($id): Notice
    {
        return Notice::findOrFail($id);
    }

    /**
     * Update one notice
     *
     * @param $data
     * @param $id
     * @return Notice
     */
    public function update($data, $id): Notice
    {
        $notice = $this->findOrFail($id);
        $notice->update($data);

        return $notice;
    }

    /**
     * Delete one notice
     *
     * @param $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function destory($id)
    {
        $notice = $this->findOrFail($id);

        return $notice->delete();
    }
}
