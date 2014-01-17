<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

abstract class AbstractController extends AbstractActionController
{
    private static $rackspace;

    protected function getRackspace()
    {
        if (!self::$rackspace) {
            self::$rackspace = $this->getServiceLocator()->get('OpenCloud');
        }

        return self::$rackspace;
    }

    protected function render(array $options = array())
    {
        return new ViewModel($options);
    }
}