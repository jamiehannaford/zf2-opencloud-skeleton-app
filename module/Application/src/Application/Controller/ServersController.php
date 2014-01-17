<?php

namespace Application\Controller;

class ServersController extends AbstractController
{
    private function getComputeService()
    {
        return $this->getRackspace()->computeService('cloudServersOpenStack', 'ORD');
    }

    public function indexAction()
    {
        $imageArray = $flavorArray = array();

        $images = $this->getComputeService()->imageList();
        foreach ($images as $image) {
            $imageArray[$image->id] = $image->name;
        }

        $flavors = $this->getComputeService()->flavorList();
        foreach ($flavors as $flavor) {
            $flavorArray[$flavor->id] = $flavor->name;
        }

        return $this->render(array(
            'servers' => $this->getComputeService()->serverList(),
            'images'  => $imageArray,
            'flavors' => $flavorArray,
        ));
    }
}