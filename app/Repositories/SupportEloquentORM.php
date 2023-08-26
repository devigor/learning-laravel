<?php

namespace App\Repositories;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Models\Support;
use stdClass;

class SupportEloquentORM implements SupportRepositoryInterface
{
    public function __construct(
        protected Support $model
    ) {}

    public function store(CreateSupportDTO $support): stdClass
    {
        $supportCreate = $this->model->create((array) $support);

        return (object) $supportCreate->toArray();
    }

    public function getAll(string $filter = null): array
    {
        return $this->model
                    ->where(function ($query) use ($filter) {
                        if ($filter) {
                            $query->where('subject', $filter);
                            $query-orWhere('body', 'like', "%{$filter}%");
                        }
                    })
                    ->get()
                    ->toArray();
    }

    public function update(UpdateSupportDTO $support): ?stdClass
    {
        $supportUpdate = $this->model->find($support->id);

        if (!$supportUpdate) {
            return null;
        }

        $supportUpdate->update((array) $support);

        return (object) $supportUpdate->toArray();
    }

    public function findOne(string $id): ?stdClass
    {
        $support = $this->model->find($id);

        if (!$support) {
            return null;
        }

        return (object) $support->toArray();
    }

    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }

}
