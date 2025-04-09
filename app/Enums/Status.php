<?php

namespace App\Enums;

enum Status: string
{
    case DITERIMA = 'DITERIMA';
    case DITOLAK = 'DITOLAK';
    case MENUNGGU = 'MENUNGGU';
}