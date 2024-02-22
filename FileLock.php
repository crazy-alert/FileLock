<?php

class FileLock {
    private $lockFile;

    public function __construct($lockFile) {
        $this->lockFile = $lockFile;
    }

    public function Lock():bool {
    try {
        if (file_exists($this->lockFile)) {
            unlink($this->lockFile);
        }
        return file_put_contents($this->lockFile, getmypid());
   
    } catch (Throwable $e) {
        return false;
    }
    }

    public function UnLock():bool {
      try{
        if (file_exists($this->lockFile)) {
            return unlink($this->lockFile);
        }
      }catch(Throwable $e){
        return false;
      }
    }
}
