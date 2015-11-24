<?php


namespace AppBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class APIController
 */
class APIController extends FOSRestController
{
    /**
     * @Route("/students", name="api_students")
     */
    public function getStudentsAction()
    {
        $data = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Student')
            ->findAll();
        $view = $this->view($data, 200)
        ;

        return $this->handleView($view);
    }

    /**
     * @Route("/exams", name="api_exams")
     */
    public function getExamsAction()
    {
        $data = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Exam')
            ->findAll();
        $view = $this->view($data, 200)
        ;

        return $this->handleView($view);
    }

    /**
 * @Route("/grades", name="api_grades")
 */
    public function getGradesAction()
    {
        $data = $this->getDoctrine()->getManager()
            ->getRepository('AppBundle:Grade')
            ->findAll();
        $view = $this->view($data, 200)
        ;

        return $this->handleView($view);
    }

    /**
     * @Route("/students/{id}", name="api_students_id", defaults={"id"=null}, requirements={"id"="\d+"})
     */
    public function getStudentAction($id)
    {
        $student = $this->getDoctrine()->getManager()->getRepository('AppBundle:Student')->find($id);
        $data = $student->getGrade();
        $view = $this->view($data, 200)
        ;

        return $this->handleView($view);
    }
}