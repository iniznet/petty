<?php

namespace App\Models;

use Petty\Database\Model;

class GroupModel extends Model
{
	protected string $table = 'groups';
	protected string $primaryKey = 'id';
}