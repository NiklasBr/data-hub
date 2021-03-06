<?php
/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Enterprise License (PEL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 * @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Bundle\DataHubBundle\Event\GraphQL\Model;

use Pimcore\Event\Traits\RequestAwareTrait;
use Pimcore\Event\Traits\ResponseAwareTrait;
use Symfony\Component\EventDispatcher\Event;
use Pimcore\Bundle\DataHubBundle\GraphQL\Mutation\MutationType;

class MutationTypeEvent extends Event
{
    use RequestAwareTrait;
    use ResponseAwareTrait;

    /**
     * @var MutationType
     */
    protected $mutationType;

    /**
     * @return MutationType
     */
    public function getMutationType()
    {
        return $this->mutationType;
    }

    /**
     * @param MutationType $mutationType
     */
    public function setMutationType(MutationType $mutationType)
    {
        $this->mutationType = $mutationType;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     */
    public function setConfig(array $config): void
    {
        $this->config = $config;
    }

    /**
     * @return array
     */
    public function getContext(): array
    {
        return $this->context;
    }

    /**
     * @param array $context
     */
    public function setContext(array $context): void
    {
        $this->context = $context;
    }

    /**
     * @var array
     */
    protected $config;

    /**
     * @var array
     */
    protected $context;


    /**
     * MutationEvent constructor.
     * @param MutationType $mutationType
     * @param $config
     * @param $context
     */
    public function __construct(MutationType $mutationType, $config, $context)
    {
        $this->mutationType = $mutationType;
        $this->config = $config;
        $this->context = $context;
    }
}
