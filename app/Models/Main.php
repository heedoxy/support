<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Hekmatinasser\Verta\Verta;

class Main extends Model
{
    use HasFactory;

    public function getCreatedAtShAttribute()
    {
        return new Verta($this->created_at);
    }

    public function getCreatedAtShDateAttribute()
    {
        return explode(' ', $this->getCreatedAtShAttribute())[0];
    }

    public function getCreatedAtShTimeAttribute()
    {
        return explode(' ', $this->getCreatedAtShAttribute())[1];
    }

    public function getUpdatedAtShAttribute()
    {
        return new Verta($this->updated_at);
    }

    public function getUpdatedAtShDateAttribute()
    {
        return explode(' ', $this->getUpdatedAtShAttribute())[0];
    }

    public function getUpdatedAtShTimeAttribute()
    {
        return explode(' ', $this->getUpdatedAtShAttribute())[1];
    }

}
