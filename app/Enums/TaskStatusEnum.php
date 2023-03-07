<?php

namespace App\Enums;

enum TaskStatusEnum:string {
    case InProgress = 'in-progress';
    case Done = 'done';
}