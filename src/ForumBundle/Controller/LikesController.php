<?php

namespace ForumBundle\Controller;

use ForumBundle\Entity\Likes;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LikesController extends Controller
{
    /**
     * Lists all comment entities.
     *
     */
    public function listLikesAction()
    {

        $likes=$this->getDoctrine()->getRepository('ForumBundle:Likes')->findAll();

        if (!count($likes)){
            $response=array(

                'code'=>1,
                'message'=>'No likes found!',
                'errors'=>null,
                'result'=>null

            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }


        $data=$this->get('jms_serializer')->serialize($likes,'json');

        $response=array(

            'code'=>0,
            'message'=>'success',
            'errors'=>null,
            'result'=>json_decode($data)

        );

        return new JsonResponse($response,200);


    }
    /**
     * Creates a new likes entity.
     *
     */
    public function addLikesAction(Request $request)
    {

        $data=$request->getContent();

        $likes=$this->get('jms_serializer')->deserialize($data,'ForumBundle\Entity\Likes','json');


        if (!empty($reponse)){
            return new JsonResponse($reponse, Response::HTTP_BAD_REQUEST);
        }

        $em=$this->getDoctrine()->getManager();
        $em->persist($likes);
        $em->flush();


        $response=array(

            'code'=>0,
            'message'=>'like created!',
            'errors'=>null,
            'result'=>null

        );

        return new Response($response,Response::HTTP_CREATED);



    }

    /**
     * Finds and displays a post entity.
     *
     */
    public function getLikeByIdAction(Likes $like)
    {
        $data=$this->get('jms_serializer')->serialize($like,'json');
        $response = new Response($data);
        return $response;

    }

    /**
     * Deletes a post entity.
     *
     */
    public function deleteLikeAction($id)
    {
        $like=$this->getDoctrine()->getRepository('ForumBundle:Likes')->find($id);

        if (empty($like)) {

            $response=array(

                'code'=>1,
                'message'=>'like Not found !',
                'errors'=>null,
                'result'=>null

            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }

        $em=$this->getDoctrine()->getManager();
        $em->remove($like);
        $em->flush();
        $response=array(

            'code'=>0,
            'message'=>'like deleted !',
            'errors'=>null,
            'result'=>null

        );


        return new JsonResponse($response,200);



    }


}
