<?php

namespace App\Tests\Service;

use App\Repository\NumberRepository;
use App\Service\CalculateService;
use PHPUnit\Framework\TestCase;
use Prophecy\PhpUnit\ProphecyTrait;

class CalculateServiceTest extends TestCase
{
    use ProphecyTrait;
    protected function setUp(): void
    {
        $this->numberRepository = $this->prophesize(NumberRepository::class);
        $this->service = new CalculateService($this->numberRepository->reveal());
    }

    public function testTwoPlusTwoShouldReturnFour()
    {
        $result = $this->service->add(2, 2);

        $this->assertEquals(4, $result);
    }

    public function testShouldAddTwo()
    {
        $this->numberRepository->getTwo()->willReturn(2);
        $result = $this->service->addTwo(2);

        $this->assertEquals(4, $result);
    }
}
