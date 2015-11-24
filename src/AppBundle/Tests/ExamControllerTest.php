<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExamControllerTest extends WebTestCase
{
    public function test_it_lists_exams()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form();

        // set some values
        $form['_username'] = 'admin';
        $form['_password'] = 'admin';

        // submit the form
        $client->submit($form);

        $client->request('GET', '/admin/exam');

        // Ce test est idiot. Améliorez-le !
        $this->assertContains('Exams list', $client->getResponse()->getContent());
    }

    public function test_it_add_exams()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form();

        // set some values
        $form['_username'] = 'admin';
        $form['_password'] = 'admin';

        // submit the form
        $client->submit($form);

        $crawler = $client->request('GET', '/admin/exam/add');

        $form = $crawler->selectButton('save')->form();
        // set some values
        $form['appbundle_exam[name]'] = 'Symfony 2';
        $form['appbundle_exam[description]'] = 'Best framework';

        // submit the form
        $client->submit($form);
        $client->followRedirect();

        // Ce test est idiot. Améliorez-le !
        $this->assertContains('Symfony 2', $client->getResponse()->getContent());
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

        $crawler = $client->request('GET', '/admin/exam');

        $link = $crawler->selectLink('Obliterate')->link();
        $client->click($link);

        $client->followRedirect();

        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}