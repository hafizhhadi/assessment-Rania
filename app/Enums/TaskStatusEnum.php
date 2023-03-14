<?php

namespace App\Enums;

enum TaskStatusEnum: string
{
    case InProgress = 'In-progress';
    case Done = 'Done';
}
