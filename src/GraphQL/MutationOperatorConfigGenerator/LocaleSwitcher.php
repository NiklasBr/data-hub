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
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PEL
 */

namespace Pimcore\Bundle\DataHubBundle\GraphQL\MutationOperatorConfigGenerator;

class LocaleSwitcher extends Base
{
    /**
     * @param mixed $nodeDef
     * @param null $class
     * @param null $container
     *
     * @return mixed
     */
    public function getGraphQlMutationOperatorConfig($nodeDef, $class = null, $container = null, $params = [])
    {
        $processor = new \Pimcore\Bundle\DataHubBundle\GraphQL\InputProcessor\LocaleSwitcherOperator($nodeDef);
        $processor->setGraphQLService($this->getGraphQlService());

        $factories = $this->getGraphQlService()->getMutationTypeGeneratorFactories();

        $typeName = strtolower($nodeDef["attributes"]["class"]);
        $factory = $factories->get('typegenerator_' . "mutation" . 'operator_' . $typeName);
        $determinedType = $factory->resolveInputTypeFromNodeDef($nodeDef, $class, $container);

        return [
            'arg' => $determinedType,
            'processor' => [$processor, 'process']
        ];
    }

}
