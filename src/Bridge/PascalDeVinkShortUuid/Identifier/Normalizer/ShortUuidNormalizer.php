<?php

/*
 * This file is part of the API Platform project.
 *
 * (c) Kévin Dunglas <dunglas@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace ApiPlatform\Core\Bridge\PascalDeVinkShortUuid\Identifier\Normalizer;

use ApiPlatform\Core\Exception\InvalidIdentifierException;
use PascalDeVink\ShortUuid\ShortUuid;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class ShortUuidNormalizer implements DenormalizerInterface
{
    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        
        // try {
            $shortUuid = new ShortUuid();
            return $shortUuid->decode($data);
        // } catch (InvalidUuidStringException $e) {
        //     throw new InvalidIdentifierException($e->getMessage());
        // }

    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        
        return is_a($type, ShortUuid::class, true);
    }
}