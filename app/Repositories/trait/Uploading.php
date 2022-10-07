<?php

namespace App\Repositories\trait;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Request;
use PhpParser\Builder\Property;

trait Uploading
{

    protected array $photo;

    /**
     * @param \Illuminate\Http\Request  $file
     * @param object $object
     * @param string $method
     * @param string $columnFileName
     * @param string $storageFolderName
     * @return void
     */
    protected function uploadFile($file, string $storageFolderName,  object $object, string $columnFileName,  string  $method)
    {
        if ($file) {

            $this->checkIsValidFile($file);
            $this->checkTheExistingFileToDelete($storageFolderName, $object->$columnFileName);
            $namePicture = $this->changeFileName($file);
            $this->storeTheImagePathInDataBase($object, $method, $columnFileName, $namePicture);
            $this->storeTheImageInFolderPublic($file, $storageFolderName, $namePicture);
        }
    }

    /**
     * @param array $files
     * @param object $object
     * @param string $method
     * @param string $columnFileName
     * @param string $storageFolderName
     * @return void
     */
    protected function uploadFiles($files,   $subPhoto = [], object $object, string $method, string $columnFileName, string $storageFolderName)
    {
        if ($files) {
            $this->checkTheExistingFilesToDelete($subPhoto, $storageFolderName, $columnFileName);
            foreach ($files as $file) {
                $this->checkIsValidFile($file);
                $namePicture = $this->changeFileName($file);
                $this->storeTheImageInFolderPublic($file, $storageFolderName, $namePicture);
                $this->storeTheImagePathInDataBase($object, $method, $columnFileName, $namePicture);
            }
        }
    }

    protected function checkIsValidFile($file)
    {
        if (!$file->isValid()) {
            return redirect()->back()->with('error', 'There Is Something wrong With Uploading Photos');
        }
    }

    protected function changeFileName($request)
    {
        $namePicture = time() . '_' . uniqid() . '_' . $request->getClientOriginalName();
        return  $namePicture;
    }

    protected function storeTheImagePathInDataBase($object, $method,  $columnFileName, $namePicture)
    {
        $object->$method([

            $columnFileName  => $namePicture,
        ]);
    }

    protected function storeTheImageInFolderPublic($file, $storageFolderName, $namePicture)
    {
        $file->storeAs("$storageFolderName/", $namePicture, 'public');
    }

    protected function checkTheExistingFileToDelete($storagePathName,  $fileName)
    {
        $search_path_picture = public_path("storage/$storagePathName/" . $fileName);
        if (File::exists($search_path_picture)) {
            File::delete($search_path_picture);
        }
    }

    protected function checkTheExistingFilesToDelete($files, $storagePathName,  $columnFileName)
    {
        foreach ($files as $file) {
            $search_path_picture = public_path("storage/$storagePathName/" . $file->$columnFileName);
            if (File::exists($search_path_picture)) {
                File::delete($search_path_picture);
                $file->delete();
            }
        }
    }










    // /**
    //  * @param array $files
    //  * @param string $storageFolderName
    //  * @param object $object
    //  * @param string $columnName
    //  */
    // protected function uploadFiles(array $files,  object $object, string $columnName)
    // {
    //     foreach ($files as $file) {
    //         if ($file->isValid()) {

    //             $namePicture = $this->changeFileName($file);

    //             $this->updateFileInDataBase($object,  $columnName, $namePicture);
    //         } else {
    //         }
    //     }
    // }
}
