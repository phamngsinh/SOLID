<?php 
/**

Nguyên tắc đơn nhiệm

Nguyên tắc đơn nhiệm phát biểu rằng: mỗi class hay method chỉ nên có một và chỉ một công năng (a.ka. chịu trách nhiệm cho một việc). Thường thì nguyên tắc này rất dễ bị vi phạm, kiểu như một class User chịu trách nhiệm cho rất nhiều việc trong ứng dụng, từ validate email cho tới đăng nhập, gửi email v.v. Những class làm quá nhiều việc khác nhau như vậy thường được gọi là god object.

Nguyên tắc này được lần đầu giới thiệu bởi Robert C. Martin (Principles of Object Oriented Design), ông định nghĩa rằng “responsibility” là một lý do để thay đổi

**/
class Book {
 
    function getTitle() {
        return "A Great Book";
    }
 
    function getAuthor() {
        return "John Doe";
    }
 
    function turnPage() {
        // pointer to next page
    }
 
 
    // function locate(Book $book) {
    //     // returns the position in the library
    //     // ie. shelf number & room number
    //     $libraryMap->findBookBy($book->getTitle(), $book->getAuthor());
    // }
    function getCurrentPage() {
        return "current page content";
    }
 
}
 
class BookLocator {
 
    function locate(Book $book) {
        // returns the position in the library
        // ie. shelf number & room number
        $libraryMap->findBookBy($book->getTitle(), $book->getAuthor());
    }
 
}