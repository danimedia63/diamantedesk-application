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

namespace Diamante\AutomationBundle\Rule\Action;

use Diamante\AutomationBundle\Action\ArgumentParser;
use Diamante\AutomationBundle\Model\Change;

class ExecutionContext
{
    protected $attributes = [];
    protected $target;
    protected $targetChangeset;
    protected $actionType;
    protected $actionArguments;

    public function __construct($target, $targetChangeset)
    {
        $this->target           = $target;
        $this->targetChangeset  = $targetChangeset;
    }

    public function addAttribute($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function getAttribute($name)
    {
        if ($this->hasAttribute($name)) {
            return $this->attributes[$name];
        }

        return null;
    }

    public function hasAttribute($name)
    {
        return array_key_exists($name, $this->attributes);
    }

    public function getActionType()
    {
        return $this->actionType;
    }

    public function setAction($actionString)
    {
        $parser = ArgumentParser::getInstance();
        $parser->parse($actionString);
        $this->actionType = $parser->getActionType();
        $this->actionArguments = $parser->getActionArguments();
    }

    public function getActionArguments()
    {
        return $this->actionArguments;
    }

    public function getTarget()
    {
        return $this->target;
    }

    /**
     * @return Change[]
     */
    public function getTargetChangeset()
    {
        return $this->targetChangeset;
    }

}