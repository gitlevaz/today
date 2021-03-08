<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class member extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' =>$this->id,
            'fname' =>$this->fname,
            // 'lname' =>$this->lname,
            // 'divition' =>$this->divition,
            // 'dob' =>$this->dob,
            // 'summery' =>$this->summery
        ]; 
    }
}
