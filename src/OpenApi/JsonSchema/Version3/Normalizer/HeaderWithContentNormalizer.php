<?php

declare(strict_types=1);

/*
 * This file has been auto generated by Jane,
 *
 * Do no edit it directly.
 */

namespace Jane\OpenApi\JsonSchema\Version3\Normalizer;

use Jane\JsonSchemaRuntime\Reference;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerAwareTrait;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class HeaderWithContentNormalizer implements DenormalizerInterface, NormalizerInterface, DenormalizerAwareInterface, NormalizerAwareInterface
{
    use DenormalizerAwareTrait;
    use NormalizerAwareTrait;

    public function supportsDenormalization($data, $type, $format = null)
    {
        return $type === 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\HeaderWithContent';
    }

    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof \Jane\OpenApi\JsonSchema\Version3\Model\HeaderWithContent;
    }

    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (!\is_object($data)) {
            throw new InvalidArgumentException();
        }
        if (isset($data->{'$ref'})) {
            return new Reference($data->{'$ref'}, $context['document-origin']);
        }
        $object = new \Jane\OpenApi\JsonSchema\Version3\Model\HeaderWithContent();
        $data = clone $data;
        if (property_exists($data, 'description')) {
            $object->setDescription($data->{'description'});
            unset($data->{'description'});
        }
        if (property_exists($data, 'required')) {
            $object->setRequired($data->{'required'});
            unset($data->{'required'});
        }
        if (property_exists($data, 'deprecated')) {
            $object->setDeprecated($data->{'deprecated'});
            unset($data->{'deprecated'});
        }
        if (property_exists($data, 'allowEmptyValue')) {
            $object->setAllowEmptyValue($data->{'allowEmptyValue'});
            unset($data->{'allowEmptyValue'});
        }
        if (property_exists($data, 'content')) {
            $values = new \ArrayObject([], \ArrayObject::ARRAY_AS_PROPS);
            foreach ($data->{'content'} as $key => $value) {
                $value_1 = $value;
                if (\is_object($value)) {
                    $value_1 = $this->denormalizer->denormalize($value, 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\MediaTypeWithExample', 'json', $context);
                }
                if (\is_object($value) and isset($value->{'examples'})) {
                    $value_1 = $this->denormalizer->denormalize($value, 'Jane\\OpenApi\\JsonSchema\\Version3\\Model\\MediaTypeWithExamples', 'json', $context);
                }
                $values[$key] = $value_1;
            }
            $object->setContent($values);
            unset($data->{'content'});
        }
        foreach ($data as $key_1 => $value_2) {
            if (preg_match('/^x-/', $key_1)) {
                $object[$key_1] = $value_2;
            }
        }

        return $object;
    }

    public function normalize($object, $format = null, array $context = [])
    {
        $data = new \stdClass();
        if (null !== $object->getDescription()) {
            $data->{'description'} = $object->getDescription();
        }
        if (null !== $object->getRequired()) {
            $data->{'required'} = $object->getRequired();
        }
        if (null !== $object->getDeprecated()) {
            $data->{'deprecated'} = $object->getDeprecated();
        }
        if (null !== $object->getAllowEmptyValue()) {
            $data->{'allowEmptyValue'} = $object->getAllowEmptyValue();
        }
        if (null !== $object->getContent()) {
            $values = new \stdClass();
            foreach ($object->getContent() as $key => $value) {
                $value_1 = $value;
                if (\is_object($value)) {
                    $value_1 = $this->normalizer->normalize($value, 'json', $context);
                }
                if (\is_object($value)) {
                    $value_1 = $this->normalizer->normalize($value, 'json', $context);
                }
                $values->{$key} = $value_1;
            }
            $data->{'content'} = $values;
        }
        foreach ($object as $key_1 => $value_2) {
            if (preg_match('/^x-/', $key_1)) {
                $data->{$key_1} = $value_2;
            }
        }

        return $data;
    }
}
