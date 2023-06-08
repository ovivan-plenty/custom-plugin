<?php

namespace CustomPlugin\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Modules\Authorization\Services\AuthHelper;
use Plenty\Modules\Account\Contact\Contracts;


class CustomPluginController extends Controller
{
    /**
     * @return string
     */
    public function getHelloWorldPage()
    {
        /** @var \Plenty\Modules\Account\Contact\Contracts\ContactRepositoryContract $contactRepo */
        $contactRepo = pluginApp(ContactRepositoryContract::class);

        /** @var \Plenty\Modules\Authorization\Services\AuthHelper $authHelper */
        $authHelper = pluginApp(AuthHelper::class);

        $contact = null;

        $contact = $authHelper->processUnguarded(
            function () use ($contactRepo, $contact) {
                return $contactRepo->findContactById(42);
            }
        );

        return json_encode($contact);
    }
}
