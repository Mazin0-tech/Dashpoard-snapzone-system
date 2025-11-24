<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'email2',
        'email3',
        'phone',
        'phone2',
        'phone3',
        'subject',
        'message',
        'address',
        'iframe'
    ];

    /**
     * الحقول التي يجب أن تكون قابلة للقبول كقيم فارغة
     */
    protected $nullable = [
        'email2',
        'email3',
        'phone2',
        'phone3',
        'address',
        'iframe'
    ];

    /**
     * إعداد النموذج ليقبل القيم الفارغة للحقول الاختيارية
     */
    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->nullable) && $value === '') {
            $value = null;
        }

        return parent::setAttribute($key, $value);
    }
}