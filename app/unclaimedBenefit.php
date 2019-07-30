<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class unclaimedBenefit extends Model
{
    protected $table = "unclaimed_benefits";

    protected $fillable = [

            'industry_number',
            'id_number',
            'current_employer'  ,
            'previous_employer' ,
            'contact_number'    ,
            'hear'              ,
            'status'            ,
            'first_name'        ,
            'maiden_name'       ,
            'surname'           ,
            'email_address'     ,
            'date_birth'        ,
            'country'           ,
            'address'           ,

    ];
}
