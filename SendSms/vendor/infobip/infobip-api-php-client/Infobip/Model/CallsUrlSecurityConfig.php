<?php

// phpcs:ignorefile

declare(strict_types=1);

/**
 * Infobip Client API Libraries OpenAPI Specification
 *
 * OpenAPI specification containing public endpoints supported in client API libraries.
 *
 * Contact: support@infobip.com
 *
 * This class is auto generated from the Infobip OpenAPI specification through the OpenAPI Specification Client API libraries (Re)Generator (OSCAR), powered by the OpenAPI Generator (https://openapi-generator.tech).
 *
 * Do not edit manually. To learn how to raise an issue, see the CONTRIBUTING guide or contact us @ support@infobip.com.
 */

namespace Infobip\Model;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation as Serializer;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;
use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

#[DiscriminatorMap(typeProperty: "type", mapping: [
    "BASIC" => "\Infobip\Model\CallsBasicUrlSecurityConfig",
    "CallsBasicUrlSecurityConfig" => "\Infobip\Model\CallsBasicUrlSecurityConfig",
    "CallsHmacUrlSecurityConfig" => "\Infobip\Model\CallsHmacUrlSecurityConfig",
    "HMAC" => "\Infobip\Model\CallsHmacUrlSecurityConfig",
])]
class CallsUrlSecurityConfig implements ModelInterface
{
    public const DISCRIMINATOR = 'type';
    public const OPENAPI_MODEL_NAME = 'CallsUrlSecurityConfig';

    public const OPENAPI_FORMATS = [
        'type' => null
    ];

    /**
     */
    public function __construct(
        #[Assert\Choice(['BASIC','HMAC',])]

    protected ?string $type = null,
    ) {
    }

    #[Ignore]
    public function getModelName(): string
    {
        return self::OPENAPI_MODEL_NAME;
    }

    #[Ignore]
    public static function getDiscriminator(): ?string
    {
        return self::DISCRIMINATOR;
    }

    public function getType(): mixed
    {
        return $this->type;
    }

    public function setType($type): self
    {
        $this->type = $type;
        return $this;
    }
}
