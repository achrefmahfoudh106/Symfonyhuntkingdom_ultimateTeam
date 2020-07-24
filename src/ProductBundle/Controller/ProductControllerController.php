<?php

namespace ProductBundle\Controller;

use ProductBundle\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductControllerController extends Controller{
  public function listProductAction()
{

    $products=$this->getDoctrine()->getRepository('ProductBundle:Product')->findAll();

    if (!count($products)){
        $response=array(

            'code'=>1,
            'message'=>'No products found!',
            'errors'=>null,
            'result'=>null

        );


        return new JsonResponse($response, Response::HTTP_NOT_FOUND);
    }


    $data=$this->get('jms_serializer')->serialize($products,'json');

    $response=array(

        'code'=>0,
        'message'=>'success',
        'errors'=>null,
        'result'=>json_decode($data)

    );

    return new JsonResponse($response,200);


}

    /**
     * Creates a new post entity.
     *
     */
    public function addProductAction(Request $request)
{

    $data=$request->getContent();

    $Product=$this->get('jms_serializer')->deserialize($data,'ProductBundle\Entity\Product','json');


    if (!empty($reponse)){
        return new JsonResponse($reponse, Response::HTTP_BAD_REQUEST);
    }

    $em=$this->getDoctrine()->getManager();
    $em->persist($Product);
    $em->flush();


    $response=array(

        'code'=>0,
        'message'=>'Product created!',
        'errors'=>null,
        'result'=>null

    );

    return new Response($response,Response::HTTP_CREATED);



}

    /**
     * Finds and displays a post entity.
     *
     */
    public function getProductByIdAction(Product $Product)
{
    $data=$this->get('jms_serializer')->serialize($Product,'json');
    $response = new Response($data);
    return $response;

}

    /**
     * Displays a form to edit an existing post entity.
     *
     */
     public function editProductAction(Request $request,$id)
{

    $doctrine=$this->getDoctrine();
    $manger=$doctrine->getManager();
    $Product=$doctrine->getRepository("ProductBundle:Product")->find($id);
    $data=$request->getContent();

    $entity=$this->get('jms_serializer')->deserialize($data,'ProductBundle\Entity\Product','json');

    $Product->setName($entity->getName());
    $Product->setDescription($entity->getDescription());
    $Product->setImage($entity->getImage());

    $manger->persist($Product);
    $manger->flush();

    return new  JsonResponse(['message'=>'success'],200);

}
    /**
     * Deletes a post entity.
     *
     */
    public function deleteProductAction($id)
{
    $Product=$this->getDoctrine()->getRepository('ProductBundle:Product')->find($id);

    if (empty($Product)) {

        $response=array(

            'code'=>1,
            'message'=>'Product Not found !',
            'errors'=>null,
            'result'=>null

        );


        return new JsonResponse($response, Response::HTTP_NOT_FOUND);
    }

    $em=$this->getDoctrine()->getManager();
    $em->remove($Product);
    $em->flush();
    $response=array(

        'code'=>0,
        'message'=>'Product deleted !',
        'errors'=>null,
        'result'=>null

    );


    return new JsonResponse($response,200);



}


}
