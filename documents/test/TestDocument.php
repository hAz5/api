<?php
declare(strict_types=1);

namespace App\JsonApi\Document\Kpis;

use WoohooLabs\Yin\JsonApi\Document\AbstractSingleResourceDocument;
use WoohooLabs\Yin\JsonApi\Schema\JsonApiObject;
use WoohooLabs\Yin\JsonApi\Schema\Link;
use WoohooLabs\Yin\JsonApi\Schema\Links;

/**
 * kpis Document
 * @package App\Document
 */
class KpiDocument extends AbstractSingleResourceDocument
{
    /**
     * {@inheritdoc}
     */
    public function getJsonApi()
    {
        return new JsonApiObject('1.0');
    }

    /**
     * {@inheritdoc}
     */
    public function getMeta(): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getLinks()
    {
        return Links::createWithoutBaseUri(
            [
                'self' => new Link('/kpis/' . $this->getResourceId())
            ]
        );
    }
}
