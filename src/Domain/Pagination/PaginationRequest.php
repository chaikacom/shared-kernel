<?php

namespace Chaika\SharedKernel\Domain\Pagination;

use Chaika\SharedKernel\Domain\Exception\InvalidArgumentException;

class PaginationRequest
{
    private $offset;
    private $limit;

    private function __construct(int $offset, int $limit)
    {
        if ($offset < 0) {
            throw new InvalidArgumentException('Offset parameter must be greater or equals to 0');
        }

        if ($limit < 1) {
            throw new InvalidArgumentException('Limit parameter must be greater or equals to 1');
        }

        $this->offset = $offset;
        $this->limit = $limit;
    }

    /**
     * @param int $page
     * @param int $limit
     * @return static
     * @throws InvalidArgumentException
     */
    public static function makeByPage(int $page, int $limit): self
    {
        if ($page < 1) {
            throw new InvalidArgumentException('Page parameter must be greater or equals to 1');
        }

        return new self(
            ($page - 1) * $limit,
            $limit
        );
    }

    public static function makeByOffset(int $offset, int $limit): self
    {
        return new self($offset, $limit);
    }

    public function offset(): int
    {
        return $this->offset;
    }

    public function limit(): int
    {
        return $this->limit;
    }
}