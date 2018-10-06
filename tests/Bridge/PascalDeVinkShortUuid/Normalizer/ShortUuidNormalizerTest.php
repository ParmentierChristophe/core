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

namespace ApiPlatform\Core\Tests\Bridge\PascalDeVinkShortUuid\Normalizer;

use ApiPlatform\Core\Bridge\PascalDeVinkShortUuid\Identifier\Normalizer\ShortUuidNormalizer;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

use PascalDeVink\ShortUuid\ShortUuid;

class ShortUuidNormalizerTest extends TestCase
{
    public function testDenormalizeUuid()
    {
        $uuid = Uuid::uuid4();
        $encoded = (new ShortUuid())->encode($uuid);
        // $uuid = ShortUuid::uuid4();
        $normalizer = new ShortUuidNormalizer();
        $this->assertTrue($normalizer->supportsDenormalization($encoded, ShortUuid::class));
        $this->assertEquals($uuid, $normalizer->denormalize($encoded, ShortUuid::class));
    }

    public function testNoSupportDenormalizeUuid()
    {
        $uuid = 'notanuuid';
        $normalizer = new ShortUuidNormalizer();
        $this->assertFalse($normalizer->supportsDenormalization($uuid, ''));
    }

    public function testFailDenormalizeUuid()
    {
        $this->expectException(\ApiPlatform\Core\Exception\InvalidIdentifierException::class);

        $uuid = 'notanuuid';
        $normalizer = new ShortUuidNormalizer();
        $this->assertTrue($normalizer->supportsDenormalization($uuid, ShortUuid::class));
       $test =  $normalizer->denormalize($uuid, ShortUuid::class);
       $encoded = (new ShortUuid())->encode($test);

        var_dump($encoded);
    }
}
