<?php

namespace App\Repositories;

use App\DTO\{
    CreateSupportDTO,
    UpdateSupportDTO};
use stdClass;

interface SupportRepositoryInterface
{
    public function store(CreateSupportDTO $support): stdClass;
    public function getAll(string $filter = null): array;
    public function update(UpdateSupportDTO $support): stdClass|null;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
}
