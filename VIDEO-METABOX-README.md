# VideoClub Video Metabox Features

## Tổng quan
Theme VideoClub đã được cập nhật với các metapost options tương tự như theme Eroz, cho phép bạn quản lý thông tin video một cách chi tiết và chuyên nghiệp.

## Các tính năng mới

### 1. Video Options Metabox
Khi tạo hoặc chỉnh sửa bài viết, bạn sẽ thấy một metabox mới có tên "Video Options" với các trường sau:

- **Duration**: Thời lượng video (ví dụ: 1:30:45)
- **Video Embed**: Mã nhúng video (iframe)
- **Original Name**: Tên gốc của video
- **Description**: Mô tả chi tiết về video
- **Download Link**: Liên kết tải xuống video
- **Movie Code 1, 2, 3**: Mã định danh phim
- **Video Trailer**: URL video trailer
- **Image URL**: URL hình ảnh tùy chỉnh

### 2. Hiển thị Frontend

#### Video Player
- Video player được hiển thị ở đầu bài viết
- Hỗ trợ nhúng iframe từ các nền tảng video
- Hiển thị trailer nếu có
- Responsive design cho mobile

#### Video Metadata
- Thông tin chi tiết được hiển thị bên dưới video player
- Bao gồm duration, original name, description, download link, movie codes
- Layout đẹp mắt và dễ đọc

#### Sidebar Information
- Widget "Video Information" trong sidebar
- Hiển thị thông tin tóm tắt về video
- Chỉ hiển thị khi có dữ liệu

## Cách sử dụng

### 1. Tạo bài viết mới
1. Vào WordPress Admin → Posts → Add New
2. Điền tiêu đề và nội dung bài viết
3. Cuộn xuống phần "Video Options"
4. Điền các thông tin video cần thiết:
   - **Duration**: Nhập thời lượng (ví dụ: 1:30:45 hoặc 5430 giây)
   - **Video Embed**: Dán mã iframe từ nền tảng video
   - **Original Name**: Tên gốc của video
   - **Description**: Mô tả chi tiết
   - **Download Link**: URL tải xuống
   - **Movie Codes**: Mã định danh phim
   - **Video Trailer**: URL trailer
   - **Image URL**: URL hình ảnh

### 2. Lưu và xem kết quả
1. Nhấn "Publish" hoặc "Update"
2. Xem bài viết trên frontend
3. Video player và metadata sẽ được hiển thị tự động

## Các file đã được tạo/cập nhật

### Files mới:
- `/inc/metabox.php` - Logic metabox
- `/template-parts/video-player.php` - Template video player
- `/template-parts/video-info.php` - Template sidebar info
- `/assets/css/video-metabox.css` - Styles cho video metabox
- `VIDEO-METABOX-README.md` - File hướng dẫn này

### Files đã cập nhật:
- `/functions.php` - Include metabox và enqueue CSS
- `/template-parts/content-single.php` - Include video player
- `/sidebar.php` - Include video info

## Helper Functions

### `videoclub_get_meta($post_id, $key, $single = true)`
Lấy giá trị metabox:
```php
$duration = videoclub_get_meta(get_the_ID(), 'videoclub_duration');
```

### `videoclub_format_duration($seconds)`
Format thời lượng:
```php
$formatted = videoclub_format_duration('5430'); // Returns "01:30:30"
```

## Tùy chỉnh

### Thêm trường mới
1. Thêm trường vào `videoclub_metabox_callback()` trong `/inc/metabox.php`
2. Thêm vào array `$fields` trong `videoclub_save_metabox()`
3. Cập nhật template để hiển thị

### Thay đổi styles
Chỉnh sửa file `/assets/css/video-metabox.css`

## Lưu ý
- Tất cả dữ liệu được sanitize và validate
- Hỗ trợ nonce security
- Responsive design
- Tương thích với theme hiện tại

## Hỗ trợ
Nếu có vấn đề hoặc cần hỗ trợ, vui lòng liên hệ developer.
