<?php

namespace ChurchTools\Api2\Endpoint;

class GetTemplateById extends \Jane\OpenApiRuntime\Client\BaseEndpoint implements \Jane\OpenApiRuntime\Client\Psr7Endpoint
{
    protected $templateId;
    /**
     * 
     *
     * @param int $templateId ID of appointment template
     */
    public function __construct(int $templateId)
    {
        $this->templateId = $templateId;
    }
    use \Jane\OpenApiRuntime\Client\Psr7EndpointTrait;
    public function getMethod() : string
    {
        return 'GET';
    }
    public function getUri() : string
    {
        return str_replace(array('{templateId}'), array($this->templateId), '/calendars/appointments/templates/{templateId}');
    }
    public function getBody(\Symfony\Component\Serializer\SerializerInterface $serializer, $streamFactory = null) : array
    {
        return array(array(), null);
    }
    public function getExtraHeaders() : array
    {
        return array('Accept' => array('application/json'));
    }
    /**
     * {@inheritdoc}
     *
     * @throws \ChurchTools\Api2\Exception\GetTemplateByIdForbiddenException
     * @throws \ChurchTools\Api2\Exception\GetTemplateByIdNotFoundException
     *
     * @return null|\ChurchTools\Api2\Model\CalendarsAppointmentsTemplatesTemplateIdGetResponse200
     */
    protected function transformResponseBody(string $body, int $status, \Symfony\Component\Serializer\SerializerInterface $serializer, ?string $contentType = null)
    {
        if (200 === $status && mb_strpos($contentType, 'application/json') !== false) {
            return $serializer->deserialize($body, 'ChurchTools\\Api2\\Model\\CalendarsAppointmentsTemplatesTemplateIdGetResponse200', 'json');
        }
        if (401 === $status) {
        }
        if (403 === $status) {
            throw new \ChurchTools\Api2\Exception\GetTemplateByIdForbiddenException();
        }
        if (404 === $status) {
            throw new \ChurchTools\Api2\Exception\GetTemplateByIdNotFoundException();
        }
    }
}