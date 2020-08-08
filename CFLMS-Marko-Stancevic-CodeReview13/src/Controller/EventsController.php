<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Events;

class EventsController extends AbstractController
{
  /**
    * @Route("/", name="home_page")
    */
   public function showAction()
   {
       // Here we will use getDoctrine to use doctrine and we will select the entity that we want to work with and we used findAll() to bring all the information from it and we will save it inside a variable named todos and the type of the result will be an array
       $events = $this->getDoctrine()->getRepository('App:Events')->findAll();
     
       return $this->render('events/index.html.twig', array('events'=>$events));
      // we send the result (the variable that have the result of bringing all info from our database) to the index.html.twig page
   }

    /**
    * @Route("/create", name="create_page")
    */
   public function createAction(Request $request)
   {
       // Here we create an object from the class that we made
       $event = new Events;
      /* Here we will build a form using createFormBuilder and inside this function we will put our object and then we write add then we select the input type then an array to add an attribute that we want in our input field */
       $form = $this->createFormBuilder($event)->add('name', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('date', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:15px')))
       ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('image', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('capacity', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('contact_email', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('contact_phone_number', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('address', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('URL', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('type', ChoiceType::class, array('choices'=>array('sport'=>'sport', 'lifestyle'=>'lifestyle', 'nutrition'=>'nutrition'),'attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))   
   		->add('save', SubmitType::class, array('label'=> 'Create Event', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-bottom:15px')))
       ->getForm();
       $form->handleRequest($request);
       

       /* Here we have an if statement, if we click submit and if  the form is valid we will take the values from the form and we will save them in the new variables */
       if($form->isSubmitted() && $form->isValid())
       {
           //fetching data

           // taking the data from the inputs by the name of the inputs then getData() function
           $name = $form['name']->getData();
           $date = $form['date']->getData();
           $description = $form['description']->getData();
           $image = $form['image']->getData();
           $capacity = $form['capacity']->getData();
           $contact_email = $form['contact_email']->getData();
           $contact_phone_number = $form['contact_phone_number']->getData();
           $address = $form['address']->getData();
           $URL = $form['URL']->getData();
           $type = $form['type']->getData();

            /* these functions we bring from our entities, every column have a set function and we put the value that we get from the form */
           $event->setName($name);
           $event->setDate($date);
           $event->setDescription($description);
           $event->setImage($image);
           $event->setCapacity($capacity);
           $event->setContactEmail($contact_email);
           $event->setContactPhoneNumber($contact_phone_number);
           $event->setAddress($address);
           $event->setURL($URL);
           $event->setType($type);

           $mem = $this->getDoctrine()->getManager();
           $mem->persist($event);
           $mem->flush();
           $this->addFlash(
                   'notice',
                   'Event Added'
                   );
           return $this->redirectToRoute('home_page');
       }
        /* now to make the form we will add this line form->createView() and now you can see the form in create.html.twig file  */
       return $this->render('events/create.html.twig', array('form' => $form->createView()));
   }









     /**
     * @Route("/edit/{id}", name="edit_page")
     */
    public function editAction($id, Request $request)
    {
    	$event = $this->getDoctrine()->getRepository('App:Events')->find($id);
    	// $now = new\DateTime('now');

    	   $event->setName($event->getName());
           $event->setDate($event->getDate());
           $event->setDescription($event->getDescription());
           $event->setImage($event->getImage());
           $event->setCapacity($event->getCapacity());
           $event->setContactEmail($event->getContactEmail());
           $event->setContactPhoneNumber($event->getContactPhoneNumber());
           $event->setAddress($event->getAddress());
           $event->setURL($event->getURL());
           $event->setType($event->getType());

        /* Here we will build a form using createFormBuilder and inside this function we will put our object and then we write add then we select the input type then an array to add an attribute that we want in our input field */
       $form = $this->createFormBuilder($event)->add('name', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('date', DateTimeType::class, array('attr' => array('style'=>'margin-bottom:15px')))
       ->add('description', TextareaType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('image', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('capacity', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('contact_email', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('contact_phone_number', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('address', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('URL', TextType::class, array('attr' => array('class'=> 'form-control', 'style'=>'margin-bottom:15px')))
       ->add('type', ChoiceType::class, array('choices'=>array('sport'=>'sport', 'lifestyle'=>'lifestyle', 'nutrition'=>'nutrition'),'attr' => array('class'=> 'form-control', 'style'=>'margin-botton:15px')))   
   		->add('save', SubmitType::class, array('label'=> 'Update Event', 'attr' => array('class'=> 'btn-primary', 'style'=>'margin-bottom:15px')))
       ->getForm();
       $form->handleRequest($request);
       /* Here we have an if statement, if we click submit and if  the form is valid we will take the values from the form and we will save them in the new variables */
       if($form->isSubmitted() && $form->isValid())
       {
           //fetching data

           // taking the data from the inputs by the name of the inputs then getData() function
           $name = $form['name']->getData();
           $date = $form['date']->getData();
           $description = $form['description']->getData();
           $image = $form['image']->getData();
           $capacity = $form['capacity']->getData();
           $contact_email = $form['contact_email']->getData();
           $contact_phone_number = $form['contact_phone_number']->getData();
           $address = $form['address']->getData();
           $URL = $form['URL']->getData();
           $type = $form['type']->getData();

           $mem = $this->getDoctrine()->getManager();

           $event = $mem->getRepository('App:Events')->find($id);

           $event->setName($name);
           $event->setDate($date);
           $event->setDescription($description);
           $event->setImage($image);
           $event->setCapacity($capacity);
           $event->setContactEmail($contact_email);
           $event->setContactPhoneNumber($contact_phone_number);
           $event->setAddress($address);
           $event->setURL($URL);
           $event->setType($type);

           $mem->flush();
           $this->addFlash(
                   'notice',
                   'Event Updated'
                   );
           return $this->redirectToRoute('home_page');
       }
      /* now to make the form we will add this line form->createView() and now you can see the form in create.html.twig file  */
       return $this->render('events/edit.html.twig', array('event'=>$event, 'form' => $form->createView()));
    }

     /**
     * @Route("/details/{id}", name="details_page")
     */
    public function detailsAction($id)
    {
    	$event = $this->getDoctrine()->getRepository('App:Events')->find($id);
        return $this->render('events/details.html.twig', array("event"=>$event));
    }

       /**
     * @Route("/delete/{id}", name="deletePage")
     */
    public function deleteAction($id)
    {
    	   $mem = $this->getDoctrine()->getManager();
           $event = $mem->getRepository('App:Events')->find($id);
           $mem->remove($event);
            $mem->flush();
           $this->addFlash(
                   'notice',
                   'Event Deleted'
                   );
            return $this->redirectToRoute('home_page');
    }
}

// SELECT => getDoctrine()->getRepository, other action->getDoctrine()->getManager;
