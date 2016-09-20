<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Test;
use AppBundle\Form\Type\TestFormType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $entity = new Test();

        $form = $this->createForm(TestFormType::class, $entity, [
            // 'action' => $this->generateUrl('hom'),
            // 'method' => 'POST',
        ]);

        $form->handleRequest($request);

        // submit without any data (essentially change nothing)
        // but don't clear missing
        // include csrf token otherwise it will produce a CSRF error
        if (!$form->isSubmitted()) {
            $formConfig = $form->getConfig();
            $formName = $form->getName();
            $token = $formConfig->getOption('csrf_provider')
                ->getToken($formName)
                ->getValue();

            // generate the "fake" data for the form
            // based on the existing data in the form
            // also add the CSRF token so we don't get a CSRF error
            $fakeData = ['_token' => $token];
            foreach ($form as $key => $value) {
                $fakeData[$key] = $value->getViewData();
            }

            $form->submit($fakeData, false);
        }

        $violationList = $this->get('validator')
            ->validate($entity, null, ['test_group']);

        $form2 = $this->createForm(TestFormType::class, $entity, [
            'action' => $this->generateUrl('submit'),
            'method' => 'POST',
        ]);

        return $this->render('default/index.html.twig', [
            'is_valid'       => $form->isValid(),
            'violation_list' => $violationList,
            'form'           => $form2->createView(),
        ]);
    }

    /**
     * @Route("/submit", name="submit")
     */
    public function submitAction(Request $request)
    {
        $entity = new Test();

        $form = $this->createForm(TestFormType::class, $entity, [
            'action' => $this->generateUrl('submit'),
            'method' => 'POST',
        ]);

        $form->handleRequest($request);

        $violationList = $this->get('validator')
            ->validate($entity, null, ['test_group']);

        return $this->render('default/index.html.twig', [
            'is_valid'       => $form->isValid(),
            'violation_list' => $violationList,
            'form'           => $form->createView(),
        ]);
    }
}
