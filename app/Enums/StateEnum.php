<?php

namespace App\Enums;

enum StateEnum: string
{
    case PREPARACION = "PREPARACIÓN";
    case ENVIADO = "ENVIADO";
    case PAGADO = "PAGADO";
    case ENTREGADO = "ENTREGADO";
    case PENDIENTE_PAGO = "PENDIENTE DE PAGO";
    case CANCELADO = "CANCELADO";
}
