<?php
/*
 * Copyright (c) 2014 Eltrino LLC (http://eltrino.com)
 *
 * Licensed under the Open Software License (OSL 3.0).
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *    http://opensource.org/licenses/osl-3.0.php
 *
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@eltrino.com so we can send you a copy immediately.
 */
namespace Diamante\UserBundle\Model\ApiUser\Notifications\Events;

use Diamante\DeskBundle\Model\Shared\DomainEvent;
use Symfony\Component\EventDispatcher\Event;

class ApiUserPasswordWasChanged extends Event implements DomainEvent
{
    /**
     * @return string
     */
    public function getEventName()
    {
        return 'apiUserPasswordWasChanged';
    }

    /**
     * @return string
     */
    public function getHeaderText()
    {
        return 'your password has been changed';
    }
}
