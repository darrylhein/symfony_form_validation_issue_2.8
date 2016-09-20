<?php

namespace AppBundle\Validation;

use Symfony\Component\Form\FormInterface;

class TestValidationGroupResolver
{
    /**
     * @param FormInterface $form
     * @return array
     */
    public function __invoke(FormInterface $form)
    {
        $groups = ['test_group'];
        //
        // /** @var \AppBundle\Entity\FundSubmission $fund */
        // $fund = $form->getData();
        //
        // // if the fund is being submitted,
        // // add additional validation groups per form/step
        // if ($fund->isSubmitting()) {
        //     switch ($form->getName()) {
        //         case 'fund_submission_step1_form' :
        //             $groups[] = 'submitting_step1';
        //             if (!$fund->isStartImmediately()) {
        //                 $groups[] = 'submitting_step1_with_start_date';
        //             }
        //             break;
        //         case 'fund_submission_step2_form' :
        //             $groups[] = 'submitting_step2';
        //             break;
        //         case 'fund_submission_step3_form' :
        //             $groups[] = 'submitting_step3';
        //             break;
        //         case 'fund_submission_step4_form' :
        //             $groups[] = 'submitting_step4';
        //             break;
        //         case 'fund_submission_step5_form' :
        //             $groups[] = 'submitting_step5';
        //             break;
        //     }
        //
        // } else {
        //     switch ($form->getName()) {
        //         case 'fund_submission_step1_form' :
        //             $groups[] = 'step1';
        //             if (!$fund->isStartImmediately()) {
        //                 $groups[] = 'step1_with_start_date';
        //             }
        //             break;
        //         case 'fund_submission_step2_form' :
        //             $groups[] = 'step2';
        //             break;
        //         case 'fund_submission_step3_form' :
        //             $groups[] = 'step3';
        //             break;
        //         case 'fund_submission_step4_form' :
        //             $groups[] = 'step4';
        //             break;
        //         case 'fund_submission_step5_form' :
        //             $groups[] = 'step5';
        //             break;
        //     }
        // }

        return $groups;
    }
}