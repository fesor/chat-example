<?php

namespace Chat\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ChatController extends Controller
{
    /**
     * @Route("/channels", methods={"GET"})
     */
    public function listOfChannels()
    {
        return $this->json([
            'data' => [
                [
                    'id' => 'fm84n2i4n2',
                    'name' => '',
                    'metadata' => [
                        'type' => 'chat',
                    ],
                ],
            ],
        ]);
    }
}
