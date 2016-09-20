Symfony Form Validation Issue Test/Proof of Concept
==========

Something changed in v2.8.10 that caused the form validation to act differently.
 The main block of code is in src/AppBundle/Controller/DefaultController.php, 
 [lines 31 to 37](https://github.com/darrylhein/symfony_form_validation_issue_2.8/blob/master/src/AppBundle/Controller/DefaultController.php#L31) where the form "fake" submitted. 
