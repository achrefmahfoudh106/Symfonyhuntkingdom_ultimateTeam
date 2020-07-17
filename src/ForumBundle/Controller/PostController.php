<?php

namespace ForumBundle\Controller;

use AppBundle\AppBundle;
use ForumBundle\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Post controller.
 *
 */
class PostController extends Controller
{

    public function listPostAction()
    {

        $posts=$this->getDoctrine()->getRepository('ForumBundle:Post')->findAll();

        if (!count($posts)){
            $response=array(

                'code'=>1,
                'message'=>'No posts found!',
                'errors'=>null,
                'result'=>null

            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }


        $data=$this->get('jms_serializer')->serialize($posts,'json');

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

        return new Response($response,Response::HTTP_CREATED);



    }

    /**
     * Finds and displays a post entity.
     *
     */
    public function getPostByIdAction(Post $post)
    {
        $data=$this->get('jms_serializer')->serialize($post,'json');
        $response = new Response($data);
        return $response;

    }

    /**
     * Displays a form to edit an existing post entity.
     *
     */
     public function editPostAction(Request $request,$id)
     {

     $doctrine=$this->getDoctrine();
     $manger=$doctrine->getManager();
     $post=$doctrine->getRepository("ForumBundle:Post")->find($id);
     $data=$request->getContent();

         $entity=$this->get('jms_serializer')->deserialize($data,'ForumBundle\Entity\Post','json');

         $post->setName($entity->getName());
         $post->setDescription($entity->getDescription());
         $post->setImage($entity->getImage());

         $manger->persist($post);
         $manger->flush();

         return new  JsonResponse(['message'=>'success'],200);

     }
    /**
     * Deletes a post entity.
     *
     */
    public function deletePostAction($id)
    {
        $post=$this->getDoctrine()->getRepository('ForumBundle:Post')->find($id);

        if (empty($post)) {

            $response=array(

                'code'=>1,
                'message'=>'post Not found !',
                'errors'=>null,
                'result'=>null

            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }

        $em=$this->getDoctrine()->getManager();
        $em->remove($post);
        $em->flush();
        $response=array(

            'code'=>0,
            'message'=>'post deleted !',
            'errors'=>null,
            'result'=>null

        );


        return new JsonResponse($response,200);



    }


}
