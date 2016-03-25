<?php

namespace GO\DCodesBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DCodesControllerTest extends WebTestCase
{
    /**
     * Tests index page
     */
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertContains('generator', $client->getResponse()->getContent());
    }

    /**
     * Tests json response
     */
    public function testGetCodes()
    {
        $client = static::createClient();
        $client->request(
            'POST',
            '/api/getCodes',
            array(),
            array(),
            array('CONTENT_TYPE' => 'application/json'),
            '{"length":10, "count":2}'
        );

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertSame('application/json', $client->getResponse()->headers->get('Content-Type'));
        $this->assertNotEmpty($client->getResponse()->getContent());
    }
}
