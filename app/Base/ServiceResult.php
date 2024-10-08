<?php

namespace App\Base;

class ServiceResult
{
public function __construct(public bool $success, public mixed $data = null)
{
}
}
