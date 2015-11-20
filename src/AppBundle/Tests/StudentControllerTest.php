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

        // Ce test est idiot. Améliorez-le !
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

        $form = $crawler->selectButton('save')->form();
        // set some values
        $form['appbundle_student[email]'] = 'test@test';
        $form['appbundle_student[firstName]'] = 'test';
        $form['appbundle_student[lastName]'] = 'test';

        // submit the form
        $client->submit($form);

        $crawler = $client->request('GET', '/admin/student');

        // Ce test est idiot. Améliorez-le !
        $this->assertContains('test - test', $client->getResponse()->getContent());
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

        $crawler = $client->request('GET', '/admin/student');

        // Ce test est idiot. Améliorez-le !
        $this->assertContains('test - test', $client->getResponse()->getContent());
    }
}