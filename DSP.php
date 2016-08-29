<?php 

// Nguyên tắc nghịch đảo phụ thuộc
/*Để dễ hiểu thì code càng gần với ngôn ngữ máy hoặc làm những việc càng cơ bản thì gọi là low-level code (ví dụ: truy vấn trực tiếp database, đọc ghi xuống file, network v.v). Còn code nào xử lý logic và sử dụng các thư viện low-level thì được gọi là…high-level code.

Nguyên tắc này nói rằng, high-level code không nên phụ thuộc vào low-level code. Thay vào đó high-level nên phụ thuộc vào một abstraction mà hỗ trợ tương tác với low-level code đó, nhưng không được phụ thuộc chi tiết của low-level code đó.

Nghe thì có vẻ lằn nhằn, nhưng chúng ta có thể hiểu nguyên tắc này dễ dàng hơn qua ví dụ vi phạm DIP sau

*/
/**
Giả sử chúng ta có một class Authenticator, class này tương tác trực tiếp với MySQL, và sử dụng hàm md5 để mã hoá password. Dễ thấy class đó vi phạm cả 2 nguyên tắc trên của DIP. Vì theo nguyên tắc trên, Authenticator là high-level code, nó không nên phụ thuộc vào code tương tác với MySQL (có thể là Eloquent hay raw SQL) và chi tiết cụ thể là sử dụng hàm md5 để hash password.
**/
class Authenticator
{
    public function __construct($DatabaseConnection $db)
    {
        $this->db = $db;
    }
 
    public function findUser($id)
    {
        return $this->db->exec("select * from users where id = ?", array($id));
    }
 
    public function authenticate($credentials)
    {
        //Authenticate the users
    }
}
/**
Thay vào đó cả hai nên được inject vào Authenticator. Điều này có lợi là chúng ta có thể dễ dàng thay thế MySQL bằng NoSQL (hay làm những việc khác như connect với Facebook, Google), và thay thế md5bằng một hàm băm hay mã hoá khác an toàn hơn.
*/
class Authenticator
{
    public function __construct(UserProviderInterface $users,
                                HasherInterface $hash)
    {
        $this->users = $users;
        $this->hash = $hash;
    }
}
