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
     * @Route("/", name="admin_list")
     */
    public function indexAction()
    {
        $admins = $this->getDoctrine()->getManager()->getRepository('AppBundle:Admin')->findAll();

        return $this->render('AppBundle:Admin:index.html.twig', [
            'admins' => $admins
        ]);
    }

    /**
     * @return mixed
     *
     * @Route("/add" , name="admin_add")
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

    /**
     * @Route("/admin/delete/{id}", name="admin_delete")
     */
    public function deleteAction($id)
    {
        $db = $this->getDoctrine()->getManager();

        $admin = $db->getRepository('AppBundle:Admin')->find($id);

        $db->remove($admin);
        $db->flush();

        return $this->redirectToRoute('admin_list');
    }
}