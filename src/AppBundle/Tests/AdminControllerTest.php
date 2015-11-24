<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function test_it_fail_admin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form();

        // set some values
        $form['_username'] = '';
        $form['_password'] = '';

        // submit the form
        $client->submit($form);
        $client->followRedirect();

        // Redirection page login
        $this->assertContains('/login', $client->getResponse()->getContent());
    }

    public function test_it_security_admin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/admin');

        $client->followRedirect();

        // Redirection page login
        $this->assertContains('/login', $client->getResponse()->getContent());
    }

    public function test_it_login_admin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form();

        // set some values
        $form['_username'] = 'admin';
        $form['_password'] = 'admin';

        // submit the form
        $client->submit($form);
        $client->followRedirect();

        // Redirection page admin
        $this->assertContains('/admin', $client->getResponse()->getContent());
    }

    public function test_it_list_admin()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form();

        // set some values
        $form['_username'] = 'admin';
        $form['_password'] = 'admin';

        // submit the form
        $client->submit($form);
        $client->followRedirect();

        // List des admins
        $this->assertContains('admin', $client->getResponse()->getContent());
    }
}