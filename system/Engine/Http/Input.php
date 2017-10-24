<?php

namespace Systemblast\Engine\Http;

class Input
{
    protected $request;

    protected $jsonData;

    protected $fromUrlencodedData;

    public function __construct()
    {
        $this->request            = request();
        $this->jsonData           = [];
        $this->fromUrlencodedData = [];
    }

    /**
     * Get all request input
     *
     * @return array
     */
    public function getAll()
    {
        return $this->combineAllData();
    }

    /**
     * Get request input by input key
     *
     * @param  string|null  $key
     * @param  string|null  $default
     * @return string|object|null|array
     */
    public function get(string $key = null, $default = null)
    {
        return $this->getAll()[$key] ?? $default;
    }

    /**
     * combine all requet input into single array
     *
     * @return array
     */
    private function combineAllData()
    {
        // if http method is PUT and content-type is application/x-www-form-urlencoded
        // we need to parse the string as an array
        if (
            $this->request->getMethod() == 'PUT' &&
            in_array('application/x-www-form-urlencoded', $this->request->getHeader('content-type'))
        ) {
            parse_str($this->request->getBody()->getContents(), $this->fromUrlencodedData);

        }

        // if header content-type is application/json, we need to decode the json input
        if (in_array('application/json', $this->request->getHeader('content-type'))) {
            $jsonData       = json_decode($this->request->getBody()->getContents(), true);
            $this->jsonData = ($jsonData !== null) ? $jsonData : $this->jsonData;
        };

        return array_merge_recursive(
            $this->request->getParsedBody(),
            $this->request->getQueryParams(),
            $this->request->getUploadedFiles(),
            $this->jsonData,
            $this->fromUrlencodedData
        );
    }
}
