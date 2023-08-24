<?php

namespace App\Event;

use Cake\Datasource\ModelAwareTrait;
use Cake\Event\EventListenerInterface;

class UsersListener implements EventListenerInterface
{
    use ModelAwareTrait;

    /**
     * @return string[]
     */
    public function implementedEvents(): array
    {
        return [
            \CakeDC\Users\Plugin::EVENT_AFTER_LOGIN => 'afterLogin',
        ];
    }

    /**
     * @param \Cake\Event\Event $event
     */
    public function afterLogin(\Cake\Event\Event $event)
    {
        $user = $event->getData('user');

        // debug($user['id']);
        //your custom logic
        //$this->loadModel('SomeOptionalUserLogs')->newLogin($user);
        $this->loadModel('Employees');
        $this->loadModel('Users');

        if($user['role']=='user'){

            $employee = $this->Employees->find()->where(['Employees.user_id' => $user['id']])->first();

            // debug(!$employee);

            if(!$employee){

                $event->setResult([
                    'plugin' => false,
                    'controller' => 'Employees',
                    'action' => 'employeeBioData',
                ]);
            
            }else{

                //If you want to use a custom redirect
            $event->setResult([
                'plugin' => false,
                'controller' => 'Employees',
                'action' => 'view',
                $employee->id
            ]);

            }
            // debug($employee);

            
        }
    }
}