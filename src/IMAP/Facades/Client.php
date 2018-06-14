<?php
/*
* File:     Client.php
* Category: Facade
* Author:   M. Goldenbaum
* Created:  19.01.17 22:21
* Updated:  -
*
* Description:
*  -
*/

namespace Rgiordano\IMAP\Facades;

use Illuminate\Support\Facades\Facade;
use Rgiordano\IMAP\ClientManager;

/**
 * Class Client
 *
 * @package Rgiordano\IMAP\Facades
 */
class Client extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() {
        return ClientManager::class;
    }
}