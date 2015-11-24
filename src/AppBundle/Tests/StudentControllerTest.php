<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StudentControllerTest extends WebTestCase
{
    public function test_it_lists_students()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form();

        // set some values
        $form['_username'] = 'admin';
        $form['_password'] = 'admin';

        // submit the form
        $client->submit($form);

        $crawler = $client->request('GET', '/admin/student');

        $this->assertContains('Students list', $client->getResponse()->getContent());
    }

    public function test_it_add_students()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form();

        // set some values
        $form['_username'] = 'admin';
        $form['_password'] = 'admin';

        // submit the form
        $client->submit($form);

        $crawler = $client->request('GET', '/admin/student/add');

        $form = $crawler->selectButton('save')->form(array_merge(array(
            'appbundle_student[email]' => 'John@Doe.fr',
            'appbundle_student[firstName]' => 'John',
            'appbundle_student[lastName]' => 'Doe',
        )));

        // submit the form
        $client->submit($form);
        $client->followRedirect();

        $this->assertContains('John - Doe', $client->getResponse()->getContent());
    }

    public function test_it_delete_students()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form();
        // set some values
        $form['_username'] = 'admin';
        $form['_password'] = 'admin';
        // submit the form
        $client->submit($form);

        $crawler = $client->request('GET', '/admin/student');

        $link = $crawler->selectLink('Obliterate')->link();
        $client->click($link);

        $client->followRedirect();

        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}