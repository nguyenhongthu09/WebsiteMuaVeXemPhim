<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PhimSeeder extends Seeder
{
    public function run()
    {
        // 1. Khi seeder thì ta muốn xóa toàn bộ dữ liệu ở table đó
        DB::table('phims')->delete();

        // Reset id về lại 1
        DB::table('phims')->truncate();

        // 2. Ta sẽ thêm mới phim bằng lệnh create
        DB::table('phims')->insert([
            [
                'ten_phim'          => "Nữ Danh Ca Huyền Thoại",
                'slug_ten_phim'     => "nu-danh-ca-huyen-thoai",
                'dao_dien'          => "Kasi Lemmons",
                'dien_vien'         => "Naomi Ackie Ashton Sanders Moses Ingram Lance A. Williams Stanley Tucci",
                'the_loai'          => "Âm Nhạc",
                'thoi_luong'        => 120,
                'ngay_khoi_chieu'   => "2022-12-23",
                'avatar'            => "https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/6267b74e91e52594264385.jpg",
                'mo_ta'             => "I Wanna Dance with Somebody là bộ phim sắp ra mắt về biểu tượng âm nhạc quá cố, Whitney Houston. Naomi Ackie vào vai chính Whitney Houston trong bộ phim tiểu sử âm nhạc, dựa trên cuộc đời nữ ca sĩ nổi tiếng. Do Kasi Lemmons đạo diễn và kịch của người từng nhận đề cử Oscar là Anthony McCarten, tác phẩm sẽ đưa khán giả vào một cuộc hành trình đầy cảm xúc, tràn đầy năng lượng thông qua sự nghiệp và âm nhạc của Houston.",
                'trailer'           => "https://www.youtube.com/watch?v=qlxSoMlMgmk",
                'tinh_trang'        => 2,
            ],

            [
                'ten_phim'          => "Chuyến Đi Nhớ Đời: Tiểu Đội Gấu Bay",
                'slug_ten_phim'     => "chuyen-di-nho-doi-tieu-doi-gau-bay",
                'dao_dien'          => "Vasiliy Rovenskiy",
                'dien_vien'         => "Daniil Medvedev, Bernard Jacobsen, Stephen Thomas Ochsner, Liza Klimova, Kate Lann",
                'the_loai'          => "Hoạt Hình",
                'thoi_luong'        => 90,
                'ngay_khoi_chieu'   => "2022-12-23",
                'avatar'            => "https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/639321333ba82520327373.jpeg",
                'mo_ta'             => "Đón Giáng Sinh trên khinh khí cầu chính thức trở thành “idea” đỉnh nhất được thực hiện tại các rạp trên toàn quốc chỉ có ở Chuyến Đi Nhớ Đời: Tiểu Đội Gấu Bay.",
                'trailer'           => "https://www.youtube.com/watch?v=slR_C8KWtRs&feature=youtu.be",
                'tinh_trang'        => 2,
            ],

            [
                'ten_phim'          => "Ăn Cưới Gặp Ăn Cướp",
                'slug_ten_phim'     => "an-cuoi-gap-an-cuop",
                'dao_dien'          => "Jason Moore",
                'dien_vien'         => "Jennifer Lopez, Josh Duhamel, Jennifer Coolidge, Sônia Braga, Lenny Kravitz",
                'the_loai'          => "Hành Động Hài, Hành động",
                'thoi_luong'        => 100,
                'ngay_khoi_chieu'   => "2022-12-30",
                'avatar'            => "https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/639c4107b9ae1367964871.jpeg",
                'mo_ta'             => "Cặp đôi Darcy (Jennifer Lopez thủ vai) và Tom (Josh Duhamel thủ vai) mời cả gia đình và những người bạn thân thiết đến một hòn đảo tại Philippines để tham dự lễ cưới của cả hai. Những lo lắng, tranh cãi vụn vặt của Darcy và Tom khiến mối quan hệ của hai người rơi vào tình trạng “báo động” ngay trước hôn lễ. Và mọi chuyện trở nên tệ hại thực sự khi một băng cướp ập vào lễ cưới, bắt cóc tất cả khách mời làm con tin. Darcy và Tom phải cùng nhau đối đầu với băng cướp, để rồi nhận ra tình yêu của họ tuyệt vời đến nhường nào. ",
                'trailer'           => "https://www.youtube.com/watch?v=4Upkl_HqR9I",
                'tinh_trang'        => 2,
            ],

            [
                'ten_phim'          => "Avatar 2: Dòng Chảy Của Nước",
                'slug_ten_phim'     => "avatar-2-dong-chay-cua-nuoc",
                'dao_dien'          => "James Cameron",
                'dien_vien'         => "Kate Winslet, Zoe Saldana, Sam Worthington, Sigourney Weaver, Oona Chaplin",
                'the_loai'          => "Hành Động, Khoa Học Viễn Tưởng, Phiêu Lưu",
                'thoi_luong'        => 192,
                'ngay_khoi_chieu'   => "2022-12-16",
                'avatar'            => "https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/6279e78130231059285890.jpeg",
                'mo_ta'             => "Câu chuyện của “Avatar: Dòng Chảy Của Nước” lấy bối cảnh 10 năm sau những sự kiện xảy ra ở phần đầu tiên. Phim kể câu chuyện về gia đình mới của Jake Sully (Sam Worthington thủ vai) cùng những rắc rối theo sau và bi kịch họ phải chịu đựng khi phe loài người xâm lược hành tinh Pandora. ",
                'trailer'           => "https://www.youtube.com/watch?v=qRYLXirsJPQ",
                'tinh_trang'        => 1,
            ],

            [
                'ten_phim'          => "Jailangkung: Búp Bê Gọi Hồn",
                'slug_ten_phim'     => "jailangkung-bup-be-goi-hon",
                'dao_dien'          => "Kimo Stamboel",
                'dien_vien'         => "Syifa Hadju, Dwi Sasono, Titi Kamal, Giulio Parengkuan, Mike Lucock",
                'the_loai'          => "Khoa Học Viễn Tưởng, Kinh Dị",
                'thoi_luong'        => 92,
                'ngay_khoi_chieu'   => "2022-12-09",
                'avatar'            => "https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/63870c6878014131191472.jpeg",
                'mo_ta'             => "Một câu chuyện mới trong series JAILANGKUNG cực kỳ ăn khách ở Indonesia. Gia đình cậu bé Kinan đi du lịch đến một ngôi làng, họ không biết rằng ngôi làng gần đây xảy ra nhiều vụ mất tích trẻ em vào buổi chiều tối. Hôm ấy, Kinan mất tích, gia đình tìm kiếm trong vô vọng. Trên đường đi họ tìm được con búp bê Jailangkung có khả năng liên lạc với thế giới bên kia. Và họ cũng dần nhận ra sự kỳ quặc của những người dân trong làng … Liệu họ có tìm được Kinan? Liệu họ có nên triệu hồi Jailangkung? Và những sự mất tích, tử vong của trẻ em gần đây là do thực thể siêu nhiên hay có sự nhúng tay của con người?",
                'trailer'           => "https://www.youtube.com/watch?v=Mw4BBBKh4gg",
                'tinh_trang'        => 1,
            ],

            [
                'ten_phim'          => "One Piece Film Red",
                'slug_ten_phim'     => "one-piece-film-red",
                'dao_dien'          => "Goro Taniguchi",
                'dien_vien'         => "Shuuichi Ikeda, Mayumi Tanaka, Kazuya Nakai, Akemi Okamura, Kappei Yamaguchi",
                'the_loai'          => "Hoạt Hình, Phiêu Lưu",
                'thoi_luong'        => 115,
                'ngay_khoi_chieu'   => "2022-11-25",
                'avatar'            => "https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/63439b379b15e195782022.jpeg",
                'mo_ta'             => "Bối cảnh One Piece Film Red diễn ra ở hòn đảo âm nhạc Elegia, nơi diva nổi tiếng bậc nhất thế giới tên Uta thực hiện buổi biểu diễn trực tiếp đầu tiên trước công chúng. Uta đứng trên sân khấu với một ước mơ giản dị rằng ”Âm nhạc của tôi sẽ khiến cho thế giới hạnh phúc”. Đằng sau hình ảnh cô ca sĩ sở hữu giọng hát ở “đẳng cấp hoàn toàn khác” là một thân thế vô cùng bí ẩn được che giấu.",
                'trailer'           => "https://www.youtube.com/watch?v=7Ma1uab-bQM",
                'tinh_trang'        => 0,
            ],

            [
                'ten_phim'          => "Mèo Đi Hia: Điều Ước Cuối Cùng",
                'slug_ten_phim'     => "meo-di-hia-dieu-uoc-cuoi-cung",
                'dao_dien'          => "Joel Crawford",
                'dien_vien'         => "Antonio Banderas, Florence Pugh, Salma Hayek, Olivia Colman, Wagner Moura",
                'the_loai'          => "Hoạt Hình, Phiêu Lưu",
                'thoi_luong'        => 103,
                'ngay_khoi_chieu'   => "2022-11-30",
                'avatar'            => "https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/6384c1b54b7c6826593912.jpeg",
                'mo_ta'             => "Puss phát hiện ra rằng niềm đam mê phiêu lưu mạo hiểm của anh đã gây ra hậu quả: Anh đã đốt cháy 8 trong số 9 mạng sống của mình, bây giờ chỉ còn lại đúng một mạng. Anh ta bắt đầu một cuộc hành trình để tìm Điều ước cuối cùng thần thoại trong Rừng Đen nhằm khôi phục lại chín mạng sống của mình. Chỉ còn một mạng sống, đây có lẽ sẽ là cuộc hành trình nguy hiểm nhất của Puss.",
                'trailer'           => "https://www.youtube.com/watch?v=dpxEGogRrpM&feature=youtu.be",
                'tinh_trang'        => 2,
            ],

            [
                'ten_phim'          => "Đêm Hung Tàn",
                'slug_ten_phim'     => "dem-hung-tan",
                'dao_dien'          => "Tommy Wirkola",
                'dien_vien'         => "David Harbour, John Leguizamo, Beverly D'Angelo, Alex Hassell, Alexis Louder",
                'the_loai'          => "Hành Động, Hài Hước",
                'thoi_luong'        => 110,
                'ngay_khoi_chieu'   => "2022-12-02",
                'avatar'            => "https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/636a45fddfe33047131000.jpg",
                'mo_ta'             => "Ông Già Noel David Harbour cực dark chính thức mở bát cho mùa lễ Giáng Sinh năm nay. Khi một nhóm lính đánh thuê tấn công một gia đình giàu có, ông già Noel phải bước vào để cứu họ (và lễ Giáng sinh).",
                'trailer'           => "https://www.youtube.com/watch?v=oP49QhYsMdo",
                'tinh_trang'        => 2,
            ],

            [
                'ten_phim'          => "Cuộc Diễu Hành Thầm Lặng",
                'slug_ten_phim'     => "cuoc-dieu-hanh-tham-lang",
                'dao_dien'          => "Hiroshi Nishitani",
                'dien_vien'         => "Masaharu Fukuyama, Ko Shibasaki, Kazuki Kitamura, Kippei Shiina, Rei Dan",
                'the_loai'          => "Tâm Lý, Gia Đình",
                'thoi_luong'        => 130,
                'ngay_khoi_chieu'   => "2022-12-09",
                'avatar'            => "https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/6368daa75a3f2154006183.jpeg",
                'mo_ta'             => "Tác phẩm trinh thám nổi tiếng từ nhà văn lừng danh Higashino Keigo mang tên CUỘC DIỄU HÀNH THẦM LẶNG sẽ được chuyển thể lên màn ảnh với bộ phim cùng tên, theo chân nhà vật lý học Yukawa Manabu hay còn gọi là 'giáo sư Galileo'. Bộ phim sẽ xoay quanh cái c.hết của một cô gái trẻ nổi tiếng. Nghi phạm của vụ án lại được phóng thích vì thiếu chứng cứ. 'Giáo sư Galileo' phải trở thành vị thám tử để điều tra vụ án.",
                'trailer'           => "https://www.youtube.com/watch?v=4CBMJIIVeoQ",
                'tinh_trang'        => 0,
            ],

            [
                'ten_phim'          => "Chìa Khóa Trăm Tỷ",
                'slug_ten_phim'     => "chia-khoa-tram-ty",
                'dao_dien'          => "Võ Thanh Hòa",
                'dien_vien'         => "Thu Trang Kiều Minh Tuấn Jun Vũ Bùi Anh Tú NSND Kim Xuân",
                'the_loai'          => "Hành Động, Hài Hước",
                'thoi_luong'        => 117,
                'ngay_khoi_chieu'   => "2022-02-01",
                'avatar'            => "https://hcm01.vstorage.vngcloud.vn/v1/AUTH_0e0c1e7edc044168a7f510dc6edd223b/media-prd/cache/short/61dbacc5534e0113997407.jpeg",
                'mo_ta'             => "Chìa Khoá Trăm Tỷ bắt đầu khi một sát thủ khét tiếng vô tình bị mất trí vì một tai nạn bất ngờ, rồi bắt đầu một cuộc sống mới bằng nghề diễn viên quần chúng. Chuyện gì sẽ xảy ra nếu chàng diễn viên quần chúng này quên hẳn cuộc đời sát thủ để trở thành một ngôi sao hành động? Liệu sự nghiệp diễn viên và cô quản lý bất đắc dĩ có giúp hắn thay đổi quá khứ mãi mãi và sống trọn vẹn một cuộc đời mới? Một bộ phim hài-hành động nhưng cũng đầy sự ấm áp về hành trình 'đổi đời' của một kẻ giết thuê để mưu sinh.",
                'trailer'           => "https://www.youtube.com/watch?v=KTRgySgAZro",
                'tinh_trang'        => 0,
            ],
        ]);

        // php artisan db:seed --class="PhimSeeder"
    }
}
