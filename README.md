<p align="center" style="color:red; font-size: 2rem; font-weight: bold">Clone CSGO Nades</p>

## Về trang web Clone Nade CSGO

Đây là trang web được viết lại bằng Laravel, nhằm mục đích học hỏi từ trang web gốc của Mellet Solbakk: [CSGO Nades ](https://www.csgonades.com/).
Trang web giúp người dùng tìm được các kiến thức cần thiết liên quan đến trò chơi Counter Strike: Global Offensive (dưới đây viết tắt là CS:GO) do Steam phát hành.

## Tiến độ hiện tại

Hiện tại, trang web đã có thể thao tác được hầu hết tính năng giống trang web gốc:
1. Đăng nhập với Steam
2. Tìm được danh sách các vị trí bom theo bản đồ trong trò chơi CS:GO.
3. Đưa ra các video tương ứng với các vị trí trong mục 2
4. Người dùng có thể tự thêm cho mình các vị trí và video theo bản đồ trong mục 2 và 3 
5. Người dùng có thể kiểm soát được video do ai tiến hành upload và đưa ra bình luận cá nhân. 
6. Cung cấp một số bài viết liên quan đến các config trong trò chơi CS:GO

## Hướng dẫn sử dụng Git này ( cho người phát triển )

Developer khi tải về vui lòng chỉnh sửa lại 1 số file 

<p style="color:blue; font-weight: bold; ">.env</p>

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE= *tên database bạn muốn sử dụng*
DB_USERNAME= *tên người sử dụng database*
DB_PASSWORD=* password của người sử dụng database*
```

Mở terminal và tiến hành migrate và chạy chương trình với 2 câu lệnh 
```
php artisan migrate:fresh --seed
php artisan serve
```


## Thực hiện chỉnh sửa

Developer muốn thực hiện chỉnh sửa các tính năng, có thể tìm theo các file theo đường dẫn trong cấu trúc thư mục như sau:

| Tính năng  | Đường dẫn cấu trúc thư mục | File JS đi kèm |
| ------------- |:-------------:|------:|
| Danh sách map và position  | resources\views\mapview.blade.php    |public\js\mappages.js|
| Danh sách video theo position      |      |public\js\mappages.js|
| Trang user chi tiết |resources\views\user-detail-page.blade.php|public\js\user-detail-page.js|
| Trang video chi tiết|resources\views\video-detail-page.blade.php|public\js\user-detail-page.js|
| Trang tạo một position đi kèm video mới|resources\views\createnade.blade.php|public\js\createnadepages.js|

## Hướng dẫn sử dụng trang web ( với người dùng cá nhân ) 

Chúng tôi cung cấp một và chỉ một phương thức đăng nhập, đó là thông qua Steam 
![signin](/public/exampleimg/signinwithsteam.png)

Người dùng có thể xem chi tiết các video do mình đăng tải, thêm mới video
![siginfunction](/public/exampleimg/signinfunction.png)

Người dùng có thể tìm kiếm thông tin qua các đường dẫn các bản đồ
![maplist](/public/exampleimg/maplist.png)

Người dùng có thể lọc thông tin theo loại bomb
![bombtype](/public/exampleimg/bombtype.png)

Chọn từng SVG render ra video tương ứng vị trí đó
![svg](/public/exampleimg/svgexample.png)

Chọn từng video render ra trang video chi tiết tương ứng 
![video](/public/exampleimg/videoexample.png)
