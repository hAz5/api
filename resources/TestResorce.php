<?php
declare(strict_types=1);

namespace App\JsonApi\Resource;

use App\Model\Entity\Skill;
use Cake\I18n\I18n;
use Cake\ORM\Locator\LocatorAwareTrait;
use WoohooLabs\Yin\JsonApi\Schema\Relationship\ToManyRelationship;
use WoohooLabs\Yin\JsonApi\Transformer\AbstractResourceTransformer;

/**
 * Skill Resource Transformer
 * @package App\Resource
 */
class SkillResourceTransformer extends AbstractResourceTransformer
{
    use LocatorAwareTrait;

    /**
     * {@inheritdoc}
     */
    public function getType($skill): string
    {
        return 'skills';
    }

    /**
     * {@inheritdoc}
     */
    public function getId($skill): string
    {
        return (string)$skill->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getMeta($skill): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getLinks($skill)
    {
        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes($skill): array
    {
        return [
            'slug' => function (Skill $skill) {
                return $skill->slug;
            },
            'title' => function (Skill $skill) {
                if (!$skill->title) {
                    return $skill->translation(I18n::getLocale())->title;
                }

                return $skill->title;
            },
            'created_at' => function (Skill $skill) {
                return $skill->created_at;
            },
            'updated_at' => function (Skill $skill) {
                return $skill->updated_at;
            }
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultIncludedRelationships($skill): array
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function getRelationships($skill): array
    {
        return [
            'users' => function (Skill $skill) {
                return ToManyRelationship::create()
                    ->setData($skill->users, new UserResourceTransformer());
            },
        ];
    }
}
