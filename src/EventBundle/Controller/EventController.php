<?php

namespace EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class EventController extends Controller
{


    public function listEventAction()
    {

        $event=$this->getDoctrine()->getRepository('EventBundle:Event')->findAll();

        if (!count($event)){
            $response=array(

                'code'=>1,
                'message'=>'No products found!',
                'errors'=>null,
                'result'=>null

            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }


        $data=$this->get('jms_serializer')->serialize($event,'json');

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
    public function addEventAction(Request $request)
    {

        $data=$request->getContent();

        $event=$this->get('jms_serializer')->deserialize($data,'EventBundle\Entity\Event','json');


        if (!empty($reponse)){
            return new JsonResponse($reponse, Response::HTTP_BAD_REQUEST);
        }

        $em=$this->getDoctrine()->getManager();
        $em->persist($event);
        $em->flush();


        $response=array(

            'code'=>0,
            'message'=>'event created!',
            'errors'=>null,
            'result'=>null

        );

        return new Response($response,Response::HTTP_CREATED);



    }

    /**
     * Finds and displays a post entity.
     *
     */
    public function getEventByIdAction(event $event)
    {
        $data=$this->get('jms_serializer')->serialize($event,'json');
        $response = new Response($data);
        return $response;

    }

    /**
     * Displays a form to edit an existing post entity.
     *
     */
    public function editEventAction(Request $request,$id)
    {

        $doctrine=$this->getDoctrine();
        $manger=$doctrine->getManager();
        $event=$doctrine->getRepository("EventBundle:Event")->find($id);
        $data=$request->getContent();

        $entity=$this->get('jms_serializer')->deserialize($data,'EventBundle\Entity\Event','json');

        $event->setName($entity->getName());
        $event->setDescription($entity->getDescription());
        $event->setImage($entity->getImage());

        $manger->persist($event);
        $manger->flush();

        return new  JsonResponse(['message'=>'success'],200);

    }
    /**
     * Deletes a post entity.
     *
     */
    public function deleteEventAction($id)
    {
        $event=$this->getDoctrine()->getRepository('EventBundle:Event')->find($id);

        if (empty($event)) {

            $response=array(

                'code'=>1,
                'message'=>'Event Not found !',
                'errors'=>null,
                'result'=>null

            );


            return new JsonResponse($response, Response::HTTP_NOT_FOUND);
        }

        $em=$this->getDoctrine()->getManager();
        $em->remove($event);
        $em->flush();
        $response=array(

            'code'=>0,
            'message'=>'Event deleted !',
            'errors'=>null,
            'result'=>null

        );


        return new JsonResponse($response,200);



    }


}






