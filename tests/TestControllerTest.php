<?php

declare(strict_types=1);

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

final class TestControllerTest extends WebTestCase
{
    public function testQueryParamsAreLostWhenUsingFormSubmit_ok(): void
    {
        $client = self::createClient();

        // in url
        $client->request('GET','/?foo=bar');

        // ok
        self::assertStringContainsString('YAY', $client->getResponse()->getContent());

        $client->submitForm('Submit');

        // still ok
        self::assertStringContainsString('YAY', $client->getResponse()->getContent());
    }

    public function testQueryParamsAreLostWhenUsingFormSubmit_not_ok(): void
    {
        $client = self::createClient();

        // as parameters
        $client->request('GET','/', ['foo' => 'bar']);

        // ok
        self::assertStringContainsString('YAY', $client->getResponse()->getContent());

        $client->submitForm('Submit');

        // not ok
        self::assertStringContainsString('YAY', $client->getResponse()->getContent());
    }
}
