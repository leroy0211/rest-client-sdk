<?php

namespace Mapado\RestClientSdk\Exception;

use GuzzleHttp\Exception\RequestException;

/**
 * Class RestException
 * @author Julien Deniau <julien.deniau@mapado.com>
 */
class RestException extends \RuntimeException
{
    private $path;

    private $params;

    private $response;

    public function __construct($message, $path, array $params = [], $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->path = $path;
        $this->params = $params;
        if ($previous instanceof RequestException) {
            $this->response = $previous->getResponse();
        }
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
