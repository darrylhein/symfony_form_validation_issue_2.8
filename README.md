Symfony Form Validation Issue Test/Proof of Concept
==========

Something changed in v2.8.10 that caused the form validation to act differently.
 The main block of code is in src/AppBundle/Controller/DefaultController.php, 
 [lines 31 to 37](https://github.com/darrylhein/symfony_form_validation_issue_2.8/blob/master/src/AppBundle/Controller/DefaultController.php#L31) where the form "fake" submitted. 
 
- [Controller](https://github.com/darrylhein/symfony_form_validation_issue_2.8/blob/master/src/AppBundle/Controller/DefaultController.php)
- [Entity](https://github.com/darrylhein/symfony_form_validation_issue_2.8/blob/master/src/AppBundle/Entity/Test.php)
- [Form](https://github.com/darrylhein/symfony_form_validation_issue_2.8/blob/master/src/AppBundle/Form/Type/TestFormType.php) 
- [View](https://github.com/darrylhein/symfony_form_validation_issue_2.8/blob/master/app/Resources/views/default/index.html.twig)

In 2.8.9:

- Submitted: `false`
- Form is valid: `false`
- Violation list: 1 item

In 2.8.10+:

- Submitted: `false`
- Form is valid: `true`
- Violation list: 1 item
