<?php

namespace CustomPlugin\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Modules\Account\Address\Contracts\AddressRepositoryContract;
use Plenty\Modules\Authorization\Services\AuthHelper;


class CustomPluginController extends Controller
{
    /**
     * @return string
     */
    public function getHelloWorldPage()
    {
        /** @var \Plenty\Modules\Account\Address\Contracts\AddressRepositoryContract $addressRepo */
        $addressRepo = pluginApp(AddressRepositoryContract::class);

        /** @var \Plenty\Modules\Authorization\Services\AuthHelper $authHelper */
        $authHelper = pluginApp(AuthHelper::class);

        $address = null;

        $address = $authHelper->processUnguarded(
            function () use ($addressRepo, $address) {
                return $addressRepo->findAddressById(42);
            }
        );

        return json_encode($address);
    }
}