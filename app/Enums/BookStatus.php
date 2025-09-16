<?php

namespace App\Enums;

enum BookStatus: Int
{
    case Pending = 0;
    case Placed = 1;
    case NotReturned = 2;
    case Returned = 3;
    case Cancelled = 4;
}
