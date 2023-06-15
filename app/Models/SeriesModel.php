<?php

namespace App\Models;

use Petty\Database\Model;

class SeriesModel extends Model
{
	protected string $table = 'series';
	protected string $primaryKey = 'id';
}