<?php

namespace Drupal\user_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for user_module routes.
 */
class UserModuleController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $userId = \Drupal::currentUser()->id(); 
    $account = \Drupal\user\Entity\User::load($userId); // pass your uid
    dump($account);

    //Working with AccountName
    // $name = $account->getUsername();/not works
    $userName = $account->get('name')->value;//works
    $userName2 = $account->getAccountName();
    dump($userName2);//works fine
    $account->setUsername('Sanket');
    $userName2 = $account->getAccountName();
    dump($userName2);

    //Working with email
    $email2= $account->getInitialEmail();
    dump($email2);
    $account->setEmail('sanket@gmail.com');
    echo "Initial email";
    $email2= $account->getInitialEmail();
    dump($email2);//Got Initital email id
    $mail=$account->get('mail')->value;
    dump($mail);//works fine and got current setEmail

    //Working with super user having id=1 and name is root
    //Therefor if user is change result in comment is also change

    //Working with Roles
    $addRole = $account->addRole('Anonomous');
    $assignRoles=$account->getRoles();
    dump($assignRoles);//works fine and Anonomous added
    $account->removeRole('Anonomous');
    $assignRoles=$account->getRoles();
    dump($assignRoles);//Anonomous removed
    $checkRoles = $account->hasRole('Anonomous');
    dump($checkRoles);//false
    $checkRoles = $account->hasRole('authenticated');
    dump($checkRoles);//true

    //Working with password
    $password = $account->getPassword();
    dump($password);//^ "$S$EIOY3bHxxXlVaTOeoPOn7/waMl7M6YTNE4L3.i6mKnvg6ZjTQTyX"
    $account -> setPassword('sanket12131'); 
    $newPassword = $account->getPassword();
    dump($newPassword);

    //working with time
    $accountCreateTime = $account -> getCreatedTime();
    dump($accountCreateTime);// "1666112833"
    $lastLoginTime = $account -> getLastLoginTime();
    dump($lastLoginTime);// "1672722645"

    //Active and block user
    $checkActive=$account->isActive();
    dump($checkActive);//true
    $checkBlock=$account->isBlocked();
    dump($checkBlock);//false
    $account->activate();
    $checkActive=$account->isActive();
    dump($checkActive);//true
    

    $data = [
      'username' => $userName,
      'mail' => $mail,
      'assignRoles' => $assignRoles,
    ];
    echo "<pre>";
    print_r($data);

    exit;
    $build['content'] = [
      '#type' => 'item',
      '#markup' => $this->t('It works!'),
    ];

    return $build;
  }

}
