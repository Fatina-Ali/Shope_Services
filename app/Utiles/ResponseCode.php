<?php
namespace App\Utiles ;


class ResponseCode{
    const Success = 200;
    const Not_Found =404;
    const Unauthorized =401;
    const Unsupported_Media_Type = 415;
    const Payload_Too_Long = 413;
    const Internal_Server_Error = 500;
    const Bad_request = 400;
    const ORDER_PENDING = 202;
    const ORDER_DENIED = 403;
}
