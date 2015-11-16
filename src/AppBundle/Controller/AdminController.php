<?php // src/AppBundle/Controller/StudentController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Student;
use AppBundle\Form\StudentType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AdminController
 */
class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin_list")
     */
    public function indexAction()
    {
        $students = $this->getDoctrine()->getManager()->getRepository('AppBundle:Student')->findAll();
        $exams = $this->getDoctrine()->getManager()->getRepository('AppBundle:Exam')->findAll();
        $grades = $this->getDoctrine()->getManager()->getRepository('AppBundle:Grade')->findAll();

        return $this->render('AppBundle:Admin:index.html.twig', [
            'students' => $students,
            'exams' => $exams,
            'grades' => $grades
        ]);
    }
}