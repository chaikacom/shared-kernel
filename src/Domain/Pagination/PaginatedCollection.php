<?php

namespace Chaika\SharedKernel\Domain\Pagination;

use Chaika\SharedKernel\Domain\Exception\InvalidValueException;

/**
 * @template T
 */
class PaginatedCollection
{
    /**
     * @var T[]
     */
    private $items;
    private $total;
    private $offset;
    private $limit;

    /**
     * @param T[] $items
     * @param int $total
     * @param int|null $offset
     * @param int|null $limit
     */
    private function __construct(array $items, int $total, ?int $offset = null, ?int $limit = null)
    {
        $this->items = $items;
        $this->total = $total;
        $this->offset = $offset;
        $this->limit = $limit;
    }

    public static function make(array $items, int $total, int $offset, int $limit): self
    {
        return new self($items, $total, $offset, $limit);
    }

    public static function makeByRequest(array $items, int $total, PaginationRequest $request): self
    {
        return new self($items, $total, $request->offset(), $request->limit());
    }

    /**
     * @return T[]
     */
    public function items(): array
    {
        return $this->items;
    }

    public function total(): int
    {
        return $this->total;
    }

    public function offset(): ?int
    {
        return $this->offset;
    }

    public function nextOffset(): int
    {
        return $this->offset + $this->limit;
    }

    public function hasMore(): bool
    {
        return ($this->offset + $this->limit) < $this->total;
    }

    public function limit(): ?int
    {
        return $this->limit;
    }

    public function count(): int
    {
        return count($this->items);
    }

    /**
     * @return int
     * @throws InvalidValueException
     */
    public function page(): int
    {
        $this->checkRequiredPageParams();
        return ceil(($this->offset + $this->limit - 1) / $this->limit);
    }

    /**
     * @return int
     * @throws InvalidValueException
     */
    public function pages(): int
    {
        $this->checkRequiredPageParams();
        return ceil($this->total / $this->limit);
    }

    /**
     * @return bool
     * @throws InvalidValueException
     */
    public function isLastPage(): bool
    {
        if ($this->offset === null || $this->limit === null) {
            return $this->count() === $this->limit();
        }

        return $this->page() >= $this->pages();
    }

    /**
     * @throws InvalidValueException
     */
    private function checkRequiredPageParams()
    {
        if ($this->offset === null) {
            throw new InvalidValueException('Offset parameter can\'t be null');
        }

        if ($this->limit === null) {
            throw new InvalidValueException('Limit parameter can\'t be null');
        }
    }
}