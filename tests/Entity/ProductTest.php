<?php

declare(strict_types=1);

namespace Recruitment\Tests\Entity;

use PHPUnit\Framework\TestCase;
use Recruitment\Entity\Product;

class ProductTest extends TestCase
{
    /**
     * @test
     * @expectedException \Recruitment\Entity\Exception\InvalidUnitPriceException
     */
    public function itThrowsExceptionForInvalidUnitPrice(): void
    {
        $product = new Product();
        $product->setUnitPrice(0);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     */
    public function itThrowsExceptionForInvalidMinimumQuantity(): void
    {
        $product = new Product();
        $product->setMinimumQuantity(0);
    }

    /**
     * @test
     * @dataProvider getInvalidTaxes
     * @expectedException \Recruitment\Entity\Exception\InvalidTaxException
     */
    public function itThrowsExceptionWhenSettingWrongTax(int $tax): void
    {
        $product = new Product();
        $product->setTax($tax);

    }


    /**
     * @test
     * @dataProvider getValidTaxes
     */
    public function itAcceptsValidTaxValues(int $tax): void
    {
        $product = new Product();
        $product->setTax($tax);
        $this->assertEquals($tax, $product->getTax());
    }

    public function getValidTaxes(): array
    {
        return [
            [0],
            [5],
            [8],
            [23],
        ];
    }

    public function getInvalidTaxes(): array
    {
        return [
            [PHP_INT_MIN],
            [-1],
            [1],
            [PHP_INT_MAX],
        ];
    }
}
