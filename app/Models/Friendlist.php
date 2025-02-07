<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Friendlist extends Model

{
    public function fromUser(): BelongsTo {
        return $this->belongsTo(User::class, 'from_user_id');
    }
}
