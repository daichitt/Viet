<?php

namespace App;
namespace App\Models; //Laravel8よりModlsの中にあるようになっている

use Illuminate\Database\Eloquent\Model;
//==========ここから追加==========
use Illuminate\Database\Eloquent\Relations\BelongsTo;
//==========ここまで追加==========

class Article extends Model
{

    //==========ここから追加==========
    protected $fillable = [
        'title',
        'body',
    ];
    //==========ここまで追加==========
    
    //==========ここから追加==========
    public function user(): BelongsTo
    {
        // return $this->belongsTo('App\User');
        return $this->belongsTo(User::class);
    }
    //==========ここまで追加==========
}

