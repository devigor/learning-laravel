<?php

namespace App\Services;

use App\DTO\{
    CreateSupportDTO,
    UpdateSupportDTO};
use App\Repositories\SupportRepositoryInterface;
use stdClass;

class SupportService
{
    public function __construct(
        protected SupportRepositoryInterface $repository
    ) {}

    public function store(CreateSupportDTO $support): stdClass
    {
        return $this->repository->store($support);
    }

    public function update(UpdateSupportDTO $support): stdClass|null
    {
        return $this->repository->update($support);
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
