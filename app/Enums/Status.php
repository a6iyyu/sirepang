<?php

declare(strict_types=1);

namespace App\Enums;

enum Status: string
{
    case DITERIMA = 'DITERIMA';
    case DITOLAK = 'DITOLAK';
    case MENUNGGU = 'MENUNGGU';
}