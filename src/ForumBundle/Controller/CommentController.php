<?php

namespace ForumBundle\Controller;

use ForumBundle\Entity\Comment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CommentController extends Controller
{
    /**
     * Lists all comment entities.
     *
     */
    public function listCommentAction()
    {

        $comments=$this->getDoctrine()->getRepository('ForumBundle:Comment')->findAll();

        if (!count($comments)){
            $response=array(

                'code'=>1,
                'message'=>'No comments found!',
                'errors'=>null,
                'result'=>null

            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }


        $data=$this->get('jms_serializer')->serialize($comments,'json');

        $response=array(

            'code'=>0,
            'message'=>'success',
            'errors'=>null,
            'result'=>json_decode($data)

        );

        return new JsonResponse($response,200);


    }

    /**
     * Creates a new comment entity.
     *
     */
    public function addCommentAction(Request $request)
    {

        $data=$request->getContent();

        $comment=$this->get('jms_serializer')->deserialize($data,'ForumBundle\Entity\Comment','json');


        if (!empty($reponse)){
            return new JsonResponse($reponse, Response::HTTP_BAD_REQUEST);
        }

        $em=$this->getDoctrine()->getManager();
        $em->persist($comment);
        $em->flush();


        $response=array(

            'code'=>0,
            'message'=>'Comment created!',
            'errors'=>null,
            'result'=>null

        );

        return new Response($response,Response::HTTP_CREATED);



    }


    public function editCommentAction(Request $request,$id)
    {

        $doctrine=$this->getDoctrine();
        $manger=$doctrine->getManager();
        $comment=$doctrine->getRepository("ForumBundle:Comment")->find($id);
        $data=$request->getContent();

        $entity=$this->get('jms_serializer')->deserialize($data,'ForumBundle\Entity\Comment','json');

        $comment->setText($entity->getText());
        $comment->setCreatedAt($entity->getCreatedAt());
        $comment->setUpdatedAt($entity->getUpdatedAt());


        $manger->persist($comment);
        $manger->flush();

        return new  JsonResponse(['message'=>'success'],200);

    }

    /**
     * Finds and displays a post entity.
     *
     */
    public function getCommentByIdAction(Comment $comment)
    {
        $data=$this->get('jms_serializer')->serialize($comment,'json');
        $response = new Response($data);
        return $response;

    }

    /**
     * Deletes a post entity.
     *
     */
    public function deleteCommentAction($id)
    {
        $comment=$this->getDoctrine()->getRepository('ForumBundle:Comment')->find($id);

        if (empty($comment)) {

            $response=array(

                'code'=>1,
                'message'=>'comment Not found !',
                'errors'=>null,
                'result'=>null

            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }

        $em=$this->getDoctrine()->getManager();
        $em->remove($comment);
        $em->flush();
        $response=array(

            'code'=>0,
            'message'=>'comment deleted !',
            'errors'=>null,
            'result'=>null

        );


        return new JsonResponse($response,200);



    }


}
