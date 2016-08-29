<?php 
/*Nguyên tắc này phát biểu rằng implementation của một interface không nên bị phụ thuộc vào những methods mà nó không dùng. 
Điều này có nghĩa là các interface phải được sắp xếp và phân chia hợp lý.
 Thay vì có một FAT interface chứa tất cả các methods cần được thi công thì nó nên được chia nhỏ ra mà class nào implement nó cũng không có method thừa.
*/


interface SessionHandlerInterface
{
    public function close();
    public function destroy($sessionId);
    // public function gc($maxLifeTime);
    public function open($savePath, $name);
    public function read($sessionId);
    public function write($sessionId, $sessionData);
}
intferface GarbageCollectorInterface
{
    public function gc($maxLifeTime);
}