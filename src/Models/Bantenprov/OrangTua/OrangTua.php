<?php namespace Bantenprov\OrangTua\Models\Bantenprov\OrangTua;

use Illuminate\Database\Eloquent\Model;

/**
 * The OrangTua class.
 *
 * @package Bantenprov\OrangTua
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */

class OrangTua extends Model
{
   

    protected $table = 'orangtuas';
    
    protected $fillable = [
        'nomor_un',
        'no_kk',
        'alamat_ortu',
        'nama_ayah',
        'nama_ibu',
        'kerja_ayah',
        'pendidikan_ayah',
        'kerja_ibu',
        'pendidikan_ibu',
        'no_telp',
        'user_id'

    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
