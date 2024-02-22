### Класс FileLock

#### Описание
`FileLock` - это класс, который обеспечивает блокировку файла для предотвращения конкурирующих операций над файлом в многопоточном и многопроцессорном окружении.

#### Использование
1. Создание экземпляра класса:
   ```php
   $lockFile = new FileLock('lockFile.txt');
   ```

2. Получение блокировки:
   ```php
   $lockFile->Lock();
   ```

3. Снятие блокировки:
   ```php
   $lockFile->UnLock();
   ```

#### Методы
1. `Lock()`: Устанавливает блокировку файла. Возвращает `true` в случае успеха и `false` в случае ошибки. 
2. `UnLock()`: Снимает блокировку файла. Возвращает `true` в случае успеха и `false` в случае ошибки.

#### Пример использования
```php
// Создание экземпляра класса
$lockFile = new FileLock('lockFile.txt');

// Получение блокировки
if (!$lockFile->Lock()) {
    // блокировка не получена, выходим
    exit;
}

//...
//...

// Снятие блокировки
$lockFile->UnLock();

```

### Благодарность
Благодарим за использование класса FileLock. Если у вас есть вопросы или предложения по улучшению класса, пожалуйста, свяжитесь с нами.

Данный класс разработан для обеспечения безопасной работы с файлами в многопоточной и многопроцессорной среде.# FileLock