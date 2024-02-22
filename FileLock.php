<?php

/**
 * Класс, представляющий собой механизм блокировки файла.
 */
class FileLock {
    /**
     * @var string Путь к файлу блокировки.
     */
    private $lockFile;

    /**
     * Конструктор класса.
     *
     * @param string $lockFile Путь к файлу блокировки.
     */
    public function __construct($lockFile) {
        $this->lockFile = $lockFile;
    }

    /**
     * Получает блокировку файла.
     *
     * @return bool Успешность установки блокировки.
     */
    public function Lock(): bool {
        try {
            if (file_exists($this->lockFile)) {
                // Если файл блокировки существует, он удаляется.
                unlink($this->lockFile);
            }
            // Записывает в файл идентификатор процесса, который установил блокировку.
            return file_put_contents($this->lockFile, getmypid());

        } catch (Throwable $e) {
            // В случае ошибки возвращает false.
            return false;
        }
    }

    /**
     * Снимает блокировку файла.
     *
     * @return bool Успешность снятия блокировки.
     */
    public function UnLock(): bool {
        try {
            if (file_exists($this->lockFile)) {
                // Если файл блокировки существует, он удаляется.
                return unlink($this->lockFile);
            }
        } catch (Throwable $e) {
            // В случае ошибки возвращает false.
            return false;
        }
    }
}