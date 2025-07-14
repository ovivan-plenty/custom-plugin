<?php

namespace CustomPlugin\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Modules\Authorization\Services\AuthHelper;
use Plenty\Modules\Item\Item\Contracts\ItemRepositoryContract;


class CustomPluginController extends Controller
{
    /**
     * @return string
     */
    public function getHelloWorldPage()
    {
        /** @var Plenty\Modules\Item\Item\Contracts\ItemRepositoryContract $itemRepo */
        $itemRepo = pluginApp(ItemRepositoryContract::class);

        /** @var \Plenty\Modules\Authorization\Services\AuthHelper $authHelper */
        $authHelper = pluginApp(AuthHelper::class);

        $contact = null;

        $contact = $authHelper->processUnguarded(
            function () use ($itemRepo, $contact) {
                return $itemRepo->show(42);
            }
        );

        return json_encode($contact);
    }
}
