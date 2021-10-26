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
STEAM_AUTH_API_KEYS=C115D84B801CC601FC8FD5AD38715B7F
```

Mở terminal và tiến hành migrate và chạy chương trình với 2 câu lệnh 
```
php artisan migrate:fresh --seed
php artisan serve
```


## Thực hiện chỉnh sửa

Developer muốn thực hiện chỉnh sửa các tính năng, có thể tìm theo các file theo đường dẫn trong cấu trúc thư mục như sau:

| Tính năng  | Đường dẫn cấu trúc thư mục đến các trang | 
| ------------- |:-------------:|
| Danh sách map và position và video  | resources\js\pages\Map.vue 
| Trang user chi tiết |resources\js\pages\UserDetail.vue |
| Trang video chi tiết|resources\js\pages\VideoDetail.vue|
| Trang tạo một position đi kèm video mới|resources\js\pages\CreateNade.vue|

Ngoài ra, do sử dụng Vue, nên cấu trúc project cũng có sự thay đổi. Đó là việc sử dụng thêm layout, component thành phần, helpers, router.

Đường dẫn đến chúng được trình bày ở dưới đây 
```
- Các component được sử dụng chung : resources\js\components\common
- Các component thành phần lẻ : resources\js\components\elements
- Layout(static layout): resources\js\layouts                            
- Router : resources\js\router
- Helper: resources\js\helpers
```

2 thành phần quan trọng nhất của bất kỳ project Vue nào 

- app.js (được đặt tại resources\js\app.js) chịu trách nhiệm    
    + thêm plugin 
    + thêm library sử dụng
    + khai báo toàn bộ layout sử dụng trong Project
    + khai báo global các component lẻ thành phần
- App.vue (được đặt tại resources\js\App.vue) chịu trách nhiệm
    + quyết định layout sử dụng của từng template Vue (dynamic layout)
   

## Hướng dẫn sử dụng trang web ( với người dùng cá nhân ) 

Chúng tôi cung cấp một và chỉ một phương thức đăng nhập, đó là thông qua Steam\ 
!(/public/exampleimg/signinwithsteam.png)

Người dùng có thể xem chi tiết các video do mình đăng tải, thêm mới video\
!(/public/exampleimg/signinfunction.png)

Người dùng có thể tìm kiếm thông tin qua các đường dẫn các bản đồ\
!(/public/exampleimg/maplist.png)

Người dùng có thể lọc thông tin theo loại bomb\
!(/public/exampleimg/bombtype.png)

Chọn từng SVG render ra video tương ứng vị trí đó\
!(/public/exampleimg/svgexample.png)

Chọn từng video render ra trang video chi tiết tương ứng\
!(/public/exampleimg/videoexample.png)
