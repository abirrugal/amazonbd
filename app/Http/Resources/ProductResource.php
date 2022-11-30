<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $includeData = [];

        if(isset($data['child_category'])){
            foreach($data['child_category'] as $key=> $child){   
                if(isset($child['products'])){

                }
                foreach($child['childs'] as $childItems){
                    foreach($childItems['products'] as $productId => $product){
                        $includeData[$productId] = $product['id'];
                    }
                }
            }
        }
      
      return $includeData;
    }
}
