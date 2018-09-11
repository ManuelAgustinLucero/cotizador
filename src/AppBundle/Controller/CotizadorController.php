<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cotizador;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
/**
 * Cotizador controller.
 *
 * @Route("admin/cotizador")
 */
class CotizadorController extends Controller
{
    /**
     * Lists all cotizador entities.
     *
     * @Route("/", name="admin_cotizador_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cotizadors = $em->getRepository('AppBundle:Cotizador')->findAll();

        return $this->render('cotizador/index.html.twig', array(
            'cotizadors' => $cotizadors,
        ));
    }

    /**
     * Creates a new cotizador entity.
     *
     * @Route("/new", name="admin_cotizador_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cotizador = new Cotizador();
        $form = $this->createForm('AppBundle\Form\CotizadorType', $cotizador);
        $form->get('createdAt')->setData( new \DateTime('now'));
        $form->get('updateAt')->setData( new \DateTime('now'));

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cotizador);
            $em->flush();

            return $this->redirectToRoute('admin_cotizador_show', array('id' => $cotizador->getId()));
        }

        return $this->render('cotizador/new.html.twig', array(
            'cotizador' => $cotizador,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cotizador entity.
     *
     * @Route("/{id}", name="admin_cotizador_show")
     * @Method("GET")
     */
    public function showAction(Cotizador $cotizador)
    {
        $deleteForm = $this->createDeleteForm($cotizador);

        return $this->render('cotizador/show.html.twig', array(
            'cotizador' => $cotizador,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cotizador entity.
     *
     * @Route("/{id}/edit", name="admin_cotizador_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cotizador $cotizador)
    {
        $deleteForm = $this->createDeleteForm($cotizador);
        $editForm = $this->createForm('AppBundle\Form\CotizadorType', $cotizador);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_cotizador_edit', array('id' => $cotizador->getId()));
        }

        return $this->render('cotizador/edit.html.twig', array(
            'cotizador' => $cotizador,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cotizador entity.
     *
     * @Route("/{id}", name="admin_cotizador_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cotizador $cotizador)
    {
        $form = $this->createDeleteForm($cotizador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cotizador);
            $em->flush();
        }

        return $this->redirectToRoute('admin_cotizador_index');
    }

    /**
     * Creates a form to delete a cotizador entity.
     *
     * @param Cotizador $cotizador The cotizador entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cotizador $cotizador)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_cotizador_delete', array('id' => $cotizador->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }




}
