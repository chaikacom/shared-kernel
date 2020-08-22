<?php

namespace Chaika\SharedKernel\Tests\Domain\Pagination;

use Chaika\SharedKernel\Domain\Exception\InvalidArgumentException;
use Chaika\SharedKernel\Domain\Pagination\PaginationRequest;
use PHPUnit\Framework\TestCase;

class PaginationRequestTest extends TestCase
{
    /** @dataProvider validOffsetValues */
    public function testCanBeCreatedFromValidOffsetValue(int $offset, int $limit)
    {
        $pagination = PaginationRequest::makeByOffset($offset, $limit);

        $this->assertInstanceOf(
            PaginationRequest::class,
            $pagination
        );

        $this->assertEquals($offset, $pagination->offset());
        $this->assertEquals($limit, $pagination->limit());
    }

    /** @dataProvider validPageValues */
    public function testCanBeCreatedFromValidPageValue(int $page, int $limit, int $offset)
    {
        $pagination = PaginationRequest::makeByPage($page, $limit);

        $this->assertInstanceOf(
            PaginationRequest::class,
            $pagination
        );

        $this->assertEquals($offset, $pagination->offset());
        $this->assertEquals($limit, $pagination->limit());
    }

    public function validOffsetValues()
    {
        // page, limit
        return [
            [0, 30],
            [100, 50],
        ];
    }

    public function validPageValues()
    {
        // page, limit, offset
        return [
            [1, 30, 0],
            [2, 30, 30],
            [3, 30, 60],
            [1, 10, 0],
            [2, 10, 10],
            [3, 10, 20]
        ];
    }

    public function testCannotBeCreatedFromInvalidOffsetValue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Offset parameter must be greater or equals to 0');
        PaginationRequest::makeByOffset(-1, 30);
    }

    public function testCannotBeCreatedFromInvalidPageValue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Page parameter must be greater or equals to 1');
        PaginationRequest::makeByPage(0, 30);
    }

    public function testCannotBeCreatedFromInvalidLimitValue()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Limit parameter must be greater or equals to 1');
        PaginationRequest::makeByPage(1, 0);
    }
}