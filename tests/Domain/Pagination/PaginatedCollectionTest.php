<?php

namespace Chaika\SharedKernel\Tests\Domain\Pagination;

use Chaika\SharedKernel\Domain\Pagination\PaginatedCollection;
use Chaika\SharedKernel\Domain\Pagination\PaginationRequest;
use PHPUnit\Framework\TestCase;

class PaginatedCollectionTest extends TestCase
{
    /** @dataProvider validValues */
    public function testMake(
        array $items,
        int $total,
        int $offset,
        int $limit,
        int $expectedCount,
        int $expectedNextOffset,
        bool $expectedHasMore,
        int $expectedPage,
        int $expectedPages,
        bool $expectedIsLastPage
    ) {
        $pagination = PaginatedCollection::make($items, $total, $offset, $limit);

        $this->assertInstanceOf(
            PaginatedCollection::class,
            $pagination
        );

        $this->assertEquals($items, $pagination->items());
        $this->assertEquals($offset, $pagination->offset());
        $this->assertEquals($limit, $pagination->limit());
        $this->assertEquals($total, $pagination->total());
        $this->assertEquals($expectedCount, $pagination->count());
        $this->assertEquals($expectedNextOffset, $pagination->nextOffset());
        $this->assertEquals($expectedHasMore, $pagination->hasMore());
        $this->assertEquals($expectedPage, $pagination->page());
        $this->assertEquals($expectedPages, $pagination->pages());
        $this->assertEquals($expectedIsLastPage, $pagination->isLastPage());
    }

    /** @dataProvider validValues */
    public function testMakeByRequest(
        array $items,
        int $total,
        int $offset,
        int $limit,
        int $expectedCount,
        int $expectedNextOffset,
        bool $expectedHasMore,
        int $expectedPage,
        int $expectedPages,
        bool $expectedIsLastPage
    ) {
        $pagination = PaginatedCollection::makeByRequest($items, $total, PaginationRequest::makeByOffset($offset, $limit));

        $this->assertInstanceOf(
            PaginatedCollection::class,
            $pagination
        );

        $this->assertEquals($items, $pagination->items());
        $this->assertEquals($offset, $pagination->offset());
        $this->assertEquals($limit, $pagination->limit());
        $this->assertEquals($total, $pagination->total());
        $this->assertEquals($expectedCount, $pagination->count());
        $this->assertEquals($expectedNextOffset, $pagination->nextOffset());
        $this->assertEquals($expectedHasMore, $pagination->hasMore());
        $this->assertEquals($expectedPage, $pagination->page());
        $this->assertEquals($expectedPages, $pagination->pages());
        $this->assertEquals($expectedIsLastPage, $pagination->isLastPage());
    }

    public function validValues()
    {
        // items, total, offset, limit,
        // expectedCount, expectedNextOffset, expectedHasMore,
        // expectedPage, expectedPages, expectedIsLastPage
        return [
            [[0],                   10, 0, 10, 1, 10, true, 1, 1, true],
            [range(0, 1), 100, 0, 2, 2, 2, false, 1, 50, false],
            [range(0, 9), 100, 1, 10, 10, 11, false, 1, 10, false],
            [range(0, 9), 100, 90, 10, 10, 100, true, 10, 10, true],
        ];
    }
}