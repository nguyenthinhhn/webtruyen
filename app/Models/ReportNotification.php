<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportNotification extends Model
{
	protected $table = 'report_notifications';
    protected $fillable = [
        'template_name',
    ];
}
