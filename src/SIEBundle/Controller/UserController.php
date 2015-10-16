<?php

namespace SIEBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SIEBundle\Entity\User;
use SIEBundle\Entity\Empleado;
use SIEBundle\Form\UserType;
class UserController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SIEBundle:Default:index.html.twig', array('name' => $name));
    }

    public function nuevoAction(Request $request, Empleado $employee){
    	$repository = $this->getDoctrine()->getRepository("SIEBundle:Empleado");
        //$empleado = $repository->find($id);//trae todos los registros del repositorio$user = new User();
        $user = new User();
    	$form = $this->createForm(new UserType(), $user);
    	$form->handleRequest($request);
    	if($form->isSubmitted() && $form->isValid()){
            try {
            	$postData = $request->request->all();
            	$pass = $postData['pass'];
            	$factory = $this->get('security.encoder_factory');
            	$encoder = $factory->getEncoder($user);
				$password = $encoder->encodePassword($pass, $user->getSalt(md5(time())));
				$user->setPassword($password);
                $user->setEmpleado($employee);
                $this->getDoctrine()->getManager()->persist($user);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirect($this->generateURL('empleados_new'));
            } catch (\Exception $e) {
                throw new \Exception("Error Processing Request".$e->getMessage());              
            }
        }
    	return $this->render('SIEBundle:User:nuevo.html.twig',array(
    			'form'=>$form->createView()
    		)
    	);
    }

    public function usersAction(){
        $repository = $this->getDoctrine()->getRepository("SIEBundle:User");
        $users = $repository->findAll();//trae todos los registros del repositorio

        return $this->render('SIEBundle:User:all.html.twig',array(
            "users"=>$users)
        );
    }

    public function userAction($id){
        $repository = $this->getDoctrine()->getRepository("SIEBundle:User");
        $user = $repository->find($id);//trae todos los registros del repositorio

        return $this->render('SIEBundle:User:detalle.html.twig',array(
            "user"=>$user)
        );
    }

    public function updateAction(Request $request, User $user){
        $form = $this->createForm(new UserType(), $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            try{
                $this->getDoctrine()->getManager()->persist($user);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('users');
            }catch(\Exception $e){
                throw new \Exception("Error al actualizar los datos. ".$e->getMessage());
            }
        }

        return $this->render('SIEBundle:User:update.html.twig',array(
            "user" => $user,
            'form'   => $form->createView()
        ));
    }
}
