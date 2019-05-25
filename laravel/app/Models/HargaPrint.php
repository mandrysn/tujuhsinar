<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HargaPrint extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    public function Harga()
    {
    	return $this->belongsTo(Harga::class);
    }
    public function Editor()
    {
        return $this->belongsTo(Editor::class);
    }

    public function Finishing()
    {
        return $this->belongsTo(Editor::class,'editor_id');
    }
    public function Barang()
    {
    	return $this->belongsTo(Barang::class);
    }

    public function getTipeAttribute(){
        $data = '';
        switch ($this->tipe_print) {
            case '1':
                $data = "1 Sisi";
                break;
            case '2':
                $data = "2 Sisi";
                break;
           
            default:
                $data = "";
                break;
        }
        return $data;
    }

    public function getUkuranKertasAttribute(){
        $data = '';
        switch ($this->ukuran) {
            case '1':
                $data = "A4";
                break;
            case '2':
                $data = "F4";
                break;
            case '3':
                $data = "A3";
                break;
            default:
                $data = "";
                break;
        }
        return $data;
    }

    public function getKakinyaAttribute(){
        $kaki = '';
        switch ($this->kaki) {
            case '1':
                $kaki = "X-Banner";
                break;
            case '2':
                $kaki = "Roll Banner";
                break;
            case '3':
                $kaki = "Y Banner";
                break;
            case '3':
                $kaki = "Rollup";
                break;
            case '4':
                $kaki = "Toneup";
                break;
            default:
                $kaki = "";
                break;
        }
        return $kaki;
    }
}
