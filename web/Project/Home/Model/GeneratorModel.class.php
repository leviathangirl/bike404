<?php

namespace Home\Model;

class GeneratorModel
{
    public function generateImgUrl($result)
    {
        $id = $result['id'];
        $imgInJson = $result['image'];
        $imgArray = json_decode($imgInJson);
        if (!$imgArray) {
            $this->returnFailure('$imgInJson Error', 1);
        }
        foreach ($imgArray as $imgName) {
            $imgUrlList[] = C('IMG_PREFIX').$id.'/'.$imgName;
        }

        return $imgUrlList;
    }
}
