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

namespace Pimcore\Bundle\DataHubBundle\GraphQL\DocumentElementMutationFieldConfigGenerator;

use GraphQL\Type\Definition\InputObjectType;
use GraphQL\Type\Definition\Type;
use Pimcore\Bundle\DataHubBundle\GraphQL\DocumentElementType\AreablockDataInputType;
use Pimcore\Bundle\DataHubBundle\GraphQL\Service;

class Image extends Base
{

    //TODO extend it with markers, hotspots etc.

    /**
     * Image constructor.
     * @param Service $graphQlService
     * @param \Pimcore\Bundle\DataHubBundle\GraphQL\DocumentElementInputProcessor\Image $processor
     */
    public function __construct(Service $graphQlService, \Pimcore\Bundle\DataHubBundle\GraphQL\DocumentElementInputProcessor\Image $processor)
    {
        parent::__construct($graphQlService);
        $this->processor = $processor;
    }

    /**
     */
    public function getDocumentElementMutationFieldConfig()
    {
        return [
            'arg' => new InputObjectType(
                [
                    'name' => 'document_element_input_image',
                    'fields' => [
                        '_tagName' => Type::nonNull(Type::string()),
                        'id' => Type::int(),               // the target asset
                        'alt' => Type::string()
                    ]
                ]
            ),
            'processor' => [$this->processor, 'process']
        ];
    }

}
