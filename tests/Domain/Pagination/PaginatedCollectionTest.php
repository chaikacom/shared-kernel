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

        $this->assertEquals($items, $pagination->items(), 'Items');
        $this->assertEquals($offset, $pagination->offset(), 'Offset');
        $this->assertEquals($limit, $pagination->limit(), 'Limit');
        $this->assertEquals($total, $pagination->total(), 'Total');
        $this->assertEquals($expectedCount, $pagination->count(), 'Count');
        $this->assertEquals($expectedNextOffset, $pagination->nextOffset(), 'Next offset');
        $this->assertEquals($expectedHasMore, $pagination->hasMore(), 'Has more');
        $this->assertEquals($expectedPage, $pagination->page(), 'Page');
        $this->assertEquals($expectedPages, $pagination->pages(), 'Pages');
        $this->assertEquals($expectedIsLastPage, $pagination->isLastPage(), 'Is last page?');
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

        $this->assertEquals($items, $pagination->items(), 'Items');
        $this->assertEquals($offset, $pagination->offset(), 'Offset');
        $this->assertEquals($limit, $pagination->limit(), 'Limit');
        $this->assertEquals($total, $pagination->total(), 'Total');
        $this->assertEquals($expectedCount, $pagination->count(), 'Count');
        $this->assertEquals($expectedNextOffset, $pagination->nextOffset(), 'Next offset');
        $this->assertEquals($expectedHasMore, $pagination->hasMore(), 'Has more');
        $this->assertEquals($expectedPage, $pagination->page(), 'Page');
        $this->assertEquals($expectedPages, $pagination->pages(), 'Pages');
        $this->assertEquals($expectedIsLastPage, $pagination->isLastPage(), 'Is last page?');
    }

    public function validValues()
    {
        // items, total, offset, limit, expectedCount, expectedNextOffset, expectedHasMore,
        // expectedPage, expectedPages, expectedIsLastPage
        return [
            [[0],                          10,    0,  10,   1,   10, false,  1,  1, true],
            [range(0, 1),        100,    0,   2,   2,    2, true,   1, 50, false],
            [range(0, 9),        100,    1,  10,  10,   11, true,   1, 10, false],
            [range(0, 9),        100,   90,  10,  10,  100, false, 10, 10, true],
            [range(2400, 2683), 2684, 2400, 284, 284, 2684, false, 10, 10, true],
            [range( 0, 24),       75,    0,  25,  25,   25, true,   1,  3, false],
            [range(25, 49),       75,   25,  25,  25,   50, true,   2,  3, false],
            [range(50, 74),       75,   50,  25,  25,   75, false,  3,  3, true],
        ];
    }
}