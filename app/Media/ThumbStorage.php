<?php


namespace App\Media;


use Illuminate\Filesystem\FilesystemAdapter;

trait ThumbStorage
{
    public function getStorage()
    {
        return \Storage::disk($this->getDiskDriver());
    }

    protected function getDiskDriver(){
        return config('filesystems.default');
    }

    protected function getAbsolutePath(FilesystemAdapter $storage, $fileRelativePath){
        return $storage->getDriver()->getAdapter()->applyPathPrefix($fileRelativePath);
    }
}
