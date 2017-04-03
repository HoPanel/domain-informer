<?php

namespace Hodi;

class Response
{

    const RESONSE_TYPE_IP = 2;
    const RESONSE_TYPE_DOMAIN = 1;

    protected $result = [
        'created_at' => null,
        'status' => false,
        'code' => null,
        'error_message' => null,
        'type' => null,
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

    public function setType($val)
    {
        $val = (is_numeric($val) && $val <= 2 && $val > 0) ? $val : null;
        $this->setField('type', $val);
    }

    private function setField($field, $val)
    {
        if (isset($this->result[$field])) {
            $this->result[$field] = $val;
        }
        return $this;
    }

}