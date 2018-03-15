<?php

namespace Bantenprov\OrangTua\Models\Bantenprov\OrangTua;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrangTua extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'orang_tuas';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'label',
        'description',
    ];
}
