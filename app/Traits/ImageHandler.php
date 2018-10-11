<?php

namespace App\Traits;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use File;
use App\ProductImage;
use Session;

trait ImageHandler{


    /*========= Singel image Store and resize =============*/
    /*========= Singel image Store and resize =============*/
    private function singel_image_resize_store_in_folder($imageInfo, $folderName){

//        $newfolderName = $this->createFolderName($folderName);
        $path = $this->distinationPath($folderName);

        $imageName = $this->createImageName($imageInfo);
        $imagePath = $path.$imageName;
        $imageUrl= $this->singelproductImageStoreAndResize($imageInfo, $imagePath);
        return $imageUrl;
    }



    //Resize and Uplode Shop LOgo Image
    private function singelproductImageStoreAndResize($imageInfo, $imagePath)
    {
        $image = Image::make($imageInfo->getRealPath());
        $image->resize(150, 150);
        $image->save($imagePath);
        return $imagePath;
    }


    //make a Custom Banner Image Name
    private function createImageName($imageInfo)
    {
        $imageType =$imageInfo->getClientMimeType();
        //get Image Mine Type
        $ext = substr($imageType, strrpos($imageType, '/') +1);
        //get Current Date time String
        $date = $this->currentTime();
        //concrite a new image Name
        $newName = $date.'.'.$ext;
        //return image name
        return $newName;
    }

    //Image Distination url
    private function distinationPath($folderName)
    {
        //Create image Store Path
        $path = 'public/images/'.$folderName.'/';

        //cheak Folder all ready Exits or not
        if(!File::exists($path)){
            //if no Folder Exits then Create new One
            File::makeDirectory($path);
        }

        //Return the folder path
        return $path;
    }


    // get Current Time Functio
    private function currentTime()
    {
        return Carbon::now()->format('Ymdhis');
    }

}