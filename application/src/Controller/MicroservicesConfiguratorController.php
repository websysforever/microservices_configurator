<?php

declare(strict_types=1);

namespace App\Controller;

use App\Service\ConfigProvider\Configurator;
use App\Service\Form\FormConstructor;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MicroservicesConfiguratorController extends AbstractController
{
    /** @var Configurator */
    private Configurator $configurator;
    /** @var FormConstructor */
    private FormConstructor $formConstructor;

    public function __construct(Configurator $configurator, FormConstructor $formConstructor)
    {
        $this->configurator = $configurator;
        $this->formConstructor = $formConstructor;
    }

    /**
     * @Route("/configs", methods={"GET"}, name="show_configs")
     */
    public function listConfigurations()
    {
        $configs = $this->configurator->getAllConfigs();
        $forms = $this->formConstructor->createForms($configs);

        return $this->render('config/index.html.twig', ['forms' => $forms]);
    }

    /**
     * @Route("/configs/{microservice_uuid}/save", methods={"POST"}, name="save_configs")
     */
    public function saveConfigurations()
    {
        // TODO Доделать
        return new Response('test save');
    }
}