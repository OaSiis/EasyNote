<?php // src/AppBundle/Controller/StudentController.php
namespace AppBundle\Controller;

use AppBundle\Entity\Admin;
use AppBundle\Form\AdminType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Controller\RegistrationController as BaseController;

/**
 * Class AdminController
 */
class AdminController extends BaseController
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

    /**
     * @return mixed
     *
     * @Route("/admin/add" , name="admin_add")
     */
    public function addAction(Request $request)
    {
        $admin = new Admin();
        $form = $this->createForm(new AdminType(), $admin);
        if ($request->isMethod('POST')
            && $form->handleRequest($request)
            && $form->isValid()) {

            $admin
                ->setEnabled(1)
                ->setRoles(['ROLE_SUPER_ADMIN'])
            ;
            $this->get('fos_user.user_manager')->updateUser($admin);

            return $this->redirectToRoute('admin_list');
        }
        return $this->render('AppBundle:Admin:add.html.twig', [
            'form' => $form->createView()
        ]);
    }
}