<?php

namespace Hodi;

class Response
{

    protected $result = [
        'created_at' => null,
        'status' => false,
        'code' => null,
        'error_message' => null,
        'result' => [

        ]
    ];

    public function __construct()
    {
        $this->result['created_at'] = new \DateTime();
    }

    public function setCreatedAt(\DateTime $val)
    {
        return $this->setField('created_at', $val);
    }

    public function setStatus($val)
    {
        return $this->setField('status', $val);
    }

    public function setErrorMessage($val)
    {
        return $this->setField('error_message', $val);
    }

    public function setResult($data)
    {
        $this->setField('result', $data);
    }

    private function setField($field, $val)
    {
        if (isset($this->result[$field])) {
            $this->result[$field] = $val;
        }
        return $this;
    }

}