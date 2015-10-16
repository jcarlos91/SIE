<?php 
namespace SIEBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContext;
use SIEBundle\Entity\Empleado;
use SIEBundle\Form\EmpleadoType;

class EmpleadoController extends Controller{

	public function nuevoAction(Request $request){
		$empleado = new Empleado();
		$form = $this->createForm(new EmpleadoType(), $empleado);
		$form->handleRequest($request);

		if($form->isValid() && $form->isSubmitted()){
			try {
				$this->getDoctrine()->getManager()->persist($empleado);
                $this->getDoctrine()->getManager()->flush();
                $id = $empleado->getId();
                return $this->redirectToRoute('user_new',array('id'=>$id));
			} catch (\Exception $e) {
				throw new \Exception("Error Processing Request". $e->getMessage());				
			}
		}
		return $this->render('SIEBundle:Empleados:nuevo.html.twig',array(
				'form'=>$form->createView()
			)
		);
	}

}