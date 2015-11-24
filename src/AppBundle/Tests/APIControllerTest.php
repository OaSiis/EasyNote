<?php
/**
 */

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
class ApiControllerTest extends WebTestCase
{
    public function test_it_lists_students()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/students');
        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            ));
    }
    public function test_it_lists_grades()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/grades');
        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            ));
    }
    public function test_it_lists_exams()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/api/exams');
        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            ));
    }
}