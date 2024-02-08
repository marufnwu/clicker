<?php
namespace App\Enums;

enum PaymentRequestStatus : int{
    case PENDING = 0;
    case COMPLETE = 1;
    case REJECTED = 2;
}
