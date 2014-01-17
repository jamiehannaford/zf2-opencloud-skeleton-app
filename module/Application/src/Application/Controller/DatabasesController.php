<?php

namespace Application\Controller;

class DatabasesController extends AbstractController
{
    private function getDatabaseService()
    {
        return $this->getRackspace()->databaseService('cloudDatabases', 'ORD');
    }

    public function indexAction()
    {
        $imageArray = $flavorArray = array();

        $flavors = $this->getDatabaseService()->flavorList();
        foreach ($flavors as $flavor) {
            $flavorArray[$flavor->id] = $flavor->name;
        }

        return $this->render(array(
            'databases' => $this->getDatabaseService()->instanceList(),
            'flavors'   => $flavorArray,
        ));
    }
}