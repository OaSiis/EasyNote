<?php

namespace AppBundle\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
class GradeControllerTest extends WebTestCase
{
    public function test_it_lists_grades()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form();
        $form['_username'] = 'admin';
        $form['_password'] = 'admin';

        $client->submit($form);

        $crawler = $client->request('GET', '/admin/grade');

        $this->assertContains('Grade list', $client->getResponse()->getContent());
    }
    public function test_it_add_grades()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form();
        $form['_username'] = 'admin';
        $form['_password'] = 'admin';

        $client->submit($form);

        $crawler = $client->request('GET', '/admin/grade/add');

        $form = $crawler->selectButton('save')->form();

        $form['appbundle_grade[gradeNumber]'] = "15";
        $form['appbundle_grade[student]']->getValue('John ');
        $form['appbundle_grade[exam]']->getValue('Symfony 2 ');

        $client->submit($form);
        $client->followRedirect();

        $this->assertContains('15', $client->getResponse()->getContent());
    }

    public function test_it_delete_grades()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/login');

        $form = $crawler->selectButton('_submit')->form();
        // set some values
        $form['_username'] = 'admin';
        $form['_password'] = 'admin';
        // submit the form
        $client->submit($form);

        $crawler = $client->request('GET', '/admin/grade');

        $link = $crawler->selectLink('Obliterate')->link();
        $client->click($link);

        $client->followRedirect();

        $this->assertTrue($client->getResponse()->isSuccessful());
    }
}