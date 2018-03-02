<?php
declare(strict_types=1);

namespace App\JsonApi\Document\Kpis;

use WoohooLabs\Yin\JsonApi\Document\AbstractCollectionDocument;
use WoohooLabs\Yin\JsonApi\Schema\JsonApiObject;
use WoohooLabs\Yin\JsonApi\Schema\Links;

/**
 * kpis Document
 * @package App\JsonApi\Document
 */
class KpisDocument extends AbstractCollectionDocument
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
        return Links::createWithoutBaseUri()
            ->setPagination('/kpis', $this->domainObject);
    }
}
