<?php

namespace enums;

enum UserType:string
{
    case Normal = 'normal';
    case Vendor = 'vendor';
    case Admin = 'Admin';
    case Moderator = 'Moderator';
}