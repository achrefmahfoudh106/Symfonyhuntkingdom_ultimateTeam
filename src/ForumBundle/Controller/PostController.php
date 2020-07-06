<?php

namespace ForumBundle\Controller;

use ForumBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Post controller.
 *
 */
class PostController extends Controller
{
    /**
     * Lists all post entities.
     *
     */


    /**
     * Creates a new post entity.
     *
     */
    public function addPostAction(Request $request)
    {

        $data=$request->getContent();

        $post=$this->get('jms_serializer')->deserialize($data,'ForumBundle\Entity\Post','json');


        if (!empty($reponse)){
            return new JsonResponse($reponse, Response::HTTP_BAD_REQUEST);
        }

        $em=$this->getDoctrine()->getManager();
        $em->persist($post);
        $em->flush();


        $response=array(

            'code'=>0,
            'message'=>'Post created!',
            'errors'=>null,
            'result'=>null

        );

        return new JsonResponse($response,Response::HTTP_CREATED);



    }

    /**
     * Finds and displays a post entity.
     *
     */


    /**
     * Displays a form to edit an existing post entity.
     *
     */


    /**
     * Deletes a post entity.
     *
     */



}
