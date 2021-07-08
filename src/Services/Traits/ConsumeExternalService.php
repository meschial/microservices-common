<?php

namespace Marcosfgti\MicroservicesCommon\Services\Traits;

trait ConsumeExternalService
{
  public function headers(array $headers = [])
  {
    $headerToken = [
      "Accept" => "application/json",
      "Authorization" => $this->token,
    ];

    $headers = array_merge($headerToken, $headers);

    return Http::withHeaders($headers);
  }

  public function request(
      string $method,
      string $endPoint,
      array $formParams = [],
      array $headers = []
  ) {
    return $this->headers($headers)
        ->$method($this->url . $endPoint, $formParams);
  }
}