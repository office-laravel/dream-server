<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dream extends Model
{
    use HasFactory;
    protected $table = 'dreams';
    protected $fillable = [
        'title',
        'content',
        'question',
        'status',
        'notes',
        'slug',
        'gender',
        'martial',
        'age',
    ];
    protected $appends= ['status_conv'];
    public function getStatusConvAttribute(){
        $conv="";
       if($this->status==2){      
        $conv="بانتظار الموافقة";
       }else if ($this->status==0){
        $conv="مرفوض";
       } else if($this->status==1){
        $conv="موافق";
       }else{
        $conv="-";
       }     
            return  $conv;
     }
 
}
