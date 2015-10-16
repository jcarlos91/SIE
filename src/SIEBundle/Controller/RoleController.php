<?php

namespace SIEBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use SIEBundle\Entity\Roles;
use SIEBundle\Form\RolesType;

class RoleController extends Controller
{ 
    public function allAction(){
        $repository = $this->getDoctrine()->getRepository("SIEBundle:Roles");
        $roles = $repository->findAll();//trae todos los registros del repositorio

        return $this->render('SIEBundle:Roles:all.html.twig',array(
            "roles"=>$roles)
        );
    }

    public function editAction(Request $request, Roles $rol){
        $form = $this->createForm(new RolesType(), $rol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->getDoctrine()->getManager()->persist($rol);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('roles');
            } catch (\Exception $e) {
                throw new \Exception("Error Processing Request".$e->getMessage());                
            }
        }
        return $this->render('SIEBundle:Roles:editar.html.twig',array(
                'form'=>$form->createView(),
            )
        );
    }

    public function nuevoAction(Request $request){
    	$rol = new Roles();
    	$form = $this->createForm(new RolesType(), $rol);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            try {
                $this->getDoctrine()->getManager()->persist($rol);
                $this->getDoctrine()->getManager()->flush();
                return $this->redirect($this->generateURL('roles_new'));
            } catch (\Exception $e) {
                throw new \Exception("Error Processing Request".$e->getMessage());              
            }
        }

    	return $this->render('SIEBundle:Roles:nuevo.html.twig',array(
    		'form'=>$form->createView(),
    		)
    	);
    }
}