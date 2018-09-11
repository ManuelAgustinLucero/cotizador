<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\Cotizador;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use JMS\Serializer\SerializationContext;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        if ($this->getUser()){
            return $this->render('default/index.html.twig',array());
        }else{
            return $this->redirectToRoute('fos_user_security_login');

        }

    }
    /**
     * Lists all cotizador entities.
     *
     * @Route("/api/getAll", name="admin_cotizador_json")
     * @Method("POST")
     */
    public function apiAction(Request $request)
    {
        $data = $request->request->all();
        $em = $this->getDoctrine()->getManager();
        $cotizadors = $em->getRepository('AppBundle:Cotizador')->findBy( ['modelo' =>$data["modelo"],'categoria' =>$data["categoria"],'marca' =>$data["marca"]]);
        if ($cotizadors){
            $result = $this->get('jms_serializer')->serialize($cotizadors, 'json', SerializationContext::create()->setGroups(array('cotizador_index')));
            return new Response($result);
        }else{
            return new JsonResponse("No se encuentra nada cargado con esos filtros");

        }

    }


    /**
     * Lists all cotizador entities.
     *
     * @Route("/api/getSelectModel/{marcaId}", name="admin_selectModel_json")
     * @Method("GET")
     */
    public function getSelectModelAction($marcaId)
    {
        $em = $this->getDoctrine()->getManager();
        if ($marcaId=="All"){
            $modelo = $em->getRepository('AppBundle:Modelo')->findAll();
        }else{
            $modelo = $em->getRepository('AppBundle:Modelo')->findBy( ['marca' =>$marcaId]);
        }
        $modelo = $this->get('jms_serializer')->serialize($modelo, 'json', SerializationContext::create()->setGroups(array('modelo_index')));
        return new Response ( $modelo);
    }


    /**
     * Lists all cotizador entities.
     *
     * @Route("/api/getSelectCategoria/{modeloId}", name="admin_selectCategoria_json")
     * @Method("GET")
     */
    public function getSelectCategoriaAction($modeloId)
    {
        $em = $this->getDoctrine()->getManager();
        if ($modeloId=="All"){
            $categoria = $em->getRepository('AppBundle:Categoria')->findAll();
        }else{
            $categoria = $em->getRepository('AppBundle:Categoria')->findBy( ['modelo' =>$modeloId]);
        }
        $categoria = $this->get('jms_serializer')->serialize($categoria, 'json', SerializationContext::create()->setGroups(array('categoria_index')));
        return new Response ( $categoria);

    }


    /**
     * Lists all cotizador entities.
     *
     * @Route("/api/getSelectMarca", name="admin_selectMarca_json")
     * @Method("GET")
     */
    public function getSelectMarcaAction()
    {
        $em = $this->getDoctrine()->getManager();
        $marca = $em->getRepository('AppBundle:Marca')->findAll();
        $marca = $this->get('jms_serializer')->serialize($marca, 'json', SerializationContext::create()->setGroups(array('marca_index')));
        return new Response ( $marca);

    }
}
