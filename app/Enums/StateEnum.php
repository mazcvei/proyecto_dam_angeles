<?php

namespace App\Enums;

enum StateEnum: string
{
    case PREPARACION = "PREPARACION";
    case ENVIADO = "ENVIADO";
    case PAGADO = "PAGADO";
    case ENTREGADO = "ENTREGADO";
    case PENDIENTE_PAGO = "PENDIENTE_PAGO";
    case CANCELADO = "CANCELADO";
}
