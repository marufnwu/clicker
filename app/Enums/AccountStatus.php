<?php
namespace App\Enums;


enum AccountStatus : int{
    case Under_Review = 2;
    case Active = 1;
    case Banned = 0;
}

