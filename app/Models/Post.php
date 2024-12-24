<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
//use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Post extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'slug',
        'meta_key',
        'content',
        'category_id',
        'sequence',
        'status',
        'update_user_id',
        'create_user_id',
        'notes',   
        'code',              
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
 
     
  public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withDefault();
    }
  
   
}
