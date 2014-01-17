<?php

namespace Application\Controller;

use Guzzle\Http\Exception\ClientErrorResponseException;

class CloudFilesController extends AbstractController
{
    private function getObjectStoreService()
    {
        return $this->getRackspace()->objectStoreService('cloudFiles', 'ORD');
    }

    public function indexAction()
    {
        return $this->render(array(
            'containers' => $this->getObjectStoreService()->listContainers(array('prefix' => 'zf2-test'))
        ));
    }

    public function containerAction()
    {
        if (!($name = $this->params('name'))) {
            $this->redirect()->toRoute('cloud-files', array('action' => 'index'));
        }

        $container = false;

        try {
            $container = $this->getObjectStoreService()->getContainer($name);
        } catch (ClientErrorResponseException $e) {
        }

        return $this->render(array(
            'container' => $container,
            'files'     => $container->objectList()
        ));
    }

    public function fileAction()
    {
        if (!($containerName = $this->params('container'))) {
            $this->redirect()->toRoute('cloud-files', array('action' => 'index'));
        }

        if (!($name = $this->params('name'))) {
            $this->redirect()->toRoute('cloud-files/container', array('name' => $containerName));
        }

        $file = false;

        try {
            $container = $this->getObjectStoreService()->getContainer($containerName);
            $file = $container->getPartialObject($name);
        } catch (ClientErrorResponseException $e) {
        }

        return $this->render(array('file' => $file));
    }
}