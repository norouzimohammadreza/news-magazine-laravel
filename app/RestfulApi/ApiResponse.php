<?php

namespace App\RestfulApi;

use App\Enums\ResponseStatusEnum;

class ApiResponse
{
    private ?string $message = null;
    private mixed $data = null;
    private int $status = ResponseStatusEnum::OK->value;
    private array $appends = [];

    public function setMessage(string $message)
    {
        return $this->message = $message;
    }

    public function setData(mixed $data)
    {
        return $this->data = $data;
    }

    public function setStatus(int $status)
    {
        return $this->status = $status;
    }

    public function setAppends(array $appends)
    {
        return $this->appends = $appends;
    }

    public function response()
    {
        $body = [];
        if (!$this->message == null) {
            $body['message'] = $this->message;
        }
        if (!$this->data == null) {
            $body['data'] = $this->data;
        }
        $body = $body + $this->appends;

        return response()->json($body, $this->status);
    }
}
