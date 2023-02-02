<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaiVietSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // 1. Khi seeder thì ta muốn xóa toàn bộ dữ liệu ở table đó
         DB::table('quan_ly_bai_viets')->delete();

         // Reset id về lại 1
         DB::table('quan_ly_bai_viets')->truncate();

         // 2. Ta sẽ thêm mới phim bằng lệnh create
         DB::table('quan_ly_bai_viets')->insert([
             [
                 'tieu_de'          => "Wednesday: Những điều thú vị chắc chắn bạn chưa hề biết về chị Tư",
                 'mo_ta_ngan'       => "Nếu yêu thích series Wednesday và 'chị Tư', các bạn không nên bỏ lỡ bài viết dưới đây đâu nhé, chắc chắn sẽ mang đến những điều hay ho chưa ai kể bạn nghe đâu!",
                 'noi_dung'         => "Gia đình Addams là một trong những tác phẩm tiêu biểu của nghệ sĩ hoạt hình Charles Addams trong tác phẩm comic cùng tên. Kể từ khi được chuyển thể thành phim truyền hình lần đầu vào năm 1964, mình thấy Gia đình Addams đã trở thành một phần không thể thiếu của văn hoá đại chúng Mỹ và toàn thế giới. Từ đó, hàng loạt các tác phẩm “ăn theo” được ra mắt và phiên bản mới nhất vừa được công chiếu trên Netflix vào tháng 11/2022 vừa qua. Wednesday leo thẳng lên BXH những bộ phim được xem nhiều nhất trên toàn thế giới. Tuy nhiên, bài viết hôm nay chúng ta sẽ không nói thêm về series đình đám cuối năm này của Netflix nữa, mà mình sẽ kể cho các bạn nghe một số điều thú vị mà có thể bạn chưa biết về cô nàng “sống nội tâm” nhưng bị ép phải hướng ngoại – Wednesday Addams.
                                        Wednesday Addams là người thuộc tính cách INTJ (introversion – hướng nội, intuitive – trực giác, thinking - suy nghĩ, judging – đánh giá). Vì thế, cô nàng là sự pha trộn độc đáo giữa người suy nghĩ nhiều những lại rất thực tế, có khả năng duy trì sự tập trung cao độ, rất giỏi trong việc lên kế hoạch và thực hiện nó một cách trôi chảy. Theo mình tìm hiểu thì được biết, những người mang tính cách INTJ có thể “chạy” trong đầu về rất nhiều kịch bản về những tình huống sẽ diễn ra với tốc độ cực nhanh.
                                        Bên cạnh đó, “chị Tư” cũng có có nền tảng kiến thức sâu rộng và bẩm sinh là người rất giỏi giải quyết vấn đề. Trong giao tiếp, Wednesday sẽ đi thẳng vào vấn đề và rất ghét đối phương vòng vo. Dựa trên đặc điểm tính cách của Wednesday, fan hâm mộ của cô nàng và bộ phim đã nghiên cứu rất kỹ, đưa ra dự đoán về cung hoàng đạo của “chị Tư” là Bọ Cạp ấy. Cung Bọ Cạp thuộc nguyên tố Nước trong chiêm tinh học, cùng với Song Ngư và Cự Giải. Biểu tượng của Bọ Cạp đúng như tên gọi của nó, đại diện cho sự mãnh mẽ, quyết liệt.
                                        Vì những người thuộc cung Bọ Cạp luôn say mê với mọi việc mình làm, hiển nhiên chị Tư cũng không ngoại lệ. Cô ấy thích thử thách và luôn có kế hoạch rõ ràng để đạt được mục tiêu của mình, kế hoạch mà cô ấy luôn kiên định thực hiện đến cùng. Thông thường, những người thuộc cung hoàng đạo Bọ Cạp dễ bị thu hút bởi những vị trí quyền lực, và đó là điều mà bạn có thể thấy ở chị Tư.",
                 'hinh_anh'         => "https://static1.dienanh.net/upload/202301/c1d8781f-16a2-499c-b51b-778bbdb006ab.jpeg,https://static1.dienanh.net/upload/202301/d49dad41-787d-4f33-86aa-48bc68b4dd9f.png",
                 'is_open'          => 1,
             ],

             [
                'tieu_de'          => "Tà Ác Long - những phản diện cuối cùng của Dragon Ball GT",
                'mo_ta_ngan'       => "Tà Ác Long là một nhóm gồm 7 con rồng bóng tối, được sinh ra từ năng lượng tiêu cực của Ngọc Rồng và là những phản diện cuối cùng của Dragon Ball GT.",
                'noi_dung'         => "Mặc dù Dragon Ball GT không phải một anime canon trong thương hiệu Dragon Ball của Toriyama Akira, nhưng nó vẫn là một series tuyệt vời bởi những ý tưởng có phần vô cùng thú vị, cùng dàn phản diện vô cùng ấn tượng. Về lý thuyết thì “boss cuối” của series này là Omega Shenron, trạng thái tối thượng của Syn Shenron/Nhất Tinh Long. Vậy, hãy điểm lại danh sách 7 Tà Ác Long trong Dragon Ball GT nhé!
                                        Nguồn gốc
                                        Jaaku Ryuu (Tà Ác Long) là những sinh vật xấu xa được tạo ra nhờ phần năng lượng tiêu cực tích tụ mỗi khi Ngọc Rồng được sử dụng. Sau 7 lần triệu hồi Thần Long và dùng điều ước, vào lần kế tiếp khi tập hợp đủ 7 viên, Kokuen no Ryuu (Hắc Yên Chi Long, Rồng Khói Đen) sẽ xuất hiện thay vì Thần Long như thông thường. Sau đó, nó tách ra và trở thành 7 Tà Ác Long, mỗi con sở hữu một viên Ngọc Rồng.
                                        Haze Shenron

                                        Haze Shenron/Nhị Tinh Long vốn là Tà Ác Long sở hữu viên Ngọc Rồng 2 sao, được sinh ra nhờ điều ước hồi sinh cha của Upa - bạn cũ thời thơ ấu của Goku. Năng lực của Nhị Tinh Long là tạo ra khói, sương mù độc và gây ô nhiễm cấp tốc trong diện rộng, từ từ làm suy yếu năng lượng của đối thủ cho đến khi họ bất lực. Hắn là Tà Ác Long đầu tiên mà Goku cùng Pan đối đầu, cũng là tên yếu nhất và dễ đánh bại nhất.
                                        Rage Shenron

                                        Rage Shenron/Ngũ Tinh Long vốn là Tà Ác Long sở hữu viên Ngọc Rồng 5 sao, được sinh ra nhờ điều ước hồi sinh Goku của Vũ Thiên Lão Sư, khi Nappa và Vegeta xâm lược Trái Đất. Vì lý do này, Goku mới đùa rằng hắn và anh cũng giống như anh em vậy. Ngũ Tinh Long có ngoại hình vô cùng nhỏ, thậm chí không cao tới đầu gối của Goku hay Pan, trông giống như một con thằn lằn hồng mũm mĩm vậy.",
                'hinh_anh'         => "https://static1.dienanh.net/upload/202212/b3602cf5-b27d-405c-b3f3-3a60aed8c4d8.jpg,https://static1.dienanh.net/upload/202212/9289703e-d03e-4c3a-9736-24cdead34512.jpg,https://static1.dienanh.net/upload/202212/defe9660-d0a8-497d-b621-ccc3d5de6a4d.png",
                'is_open'          => 1,
            ],

            [
                'tieu_de'          => "No Way Home gây bão toàn cầu, Sony vẫn chưa sản xuất phần 4",
                'mo_ta_ngan'       => "Sony mất quá nhiều thời gian để xác nhận tương lai của Người Nhện sau No Way Home, lãng phí những gì mà bộ phim đã tạo ra ở hồi kết.",
                'noi_dung'         => "Spider-Man: No Way Home đề cập đến sự hỗn loạn và bí ẩn của đa vũ trụ trong MCU, mở đường cho tương lai của Người Nhện - thứ mà Sony có thể sẽ lãng phí. Sau khi hé lộ những mối nguy hiểm của việc tác động đến đa vũ trụ ở Loki, MCU đã đào sâu hơn vào khái niệm này với No Way Home, chứng kiến ​​sự trở lại của các nhân vật phản diện từ vũ trụ Người Nhện, hai phiên bản Peter Parker trước đây.
                                        Giải pháp duy nhất cho sự hỗn loạn đa vũ trụ này là sử dụng một câu thần chú khiến thế giới quên đi Peter Parker là ai, và lần này, câu thần chú đã thành công. Ở cuối No Way Home, Peter Parker phải bắt đầu lại từ đầu và dù đây là một kết thúc đen tối, nó cũng mở ra tương lai cho không chỉ phiên bản Người Nhện của MCU mà còn cho các biến thể của Spider-Man.

                                        Tuy nhiên, Sony có thể sẽ lãng phí tất cả khi mất quá nhiều thời gian để đi vào sản xuất một số dự án Người Nhện. Cụ thể là gì, hãy cùng tôi tìm hiểu nhé.
                                        Việc bị những người thân nhất lãng quên và sự ra đi của dì May đã tạo ra một tương lai khá u uất cho Spider-Man của MCU, thế nhưng nó cũng mở đường cho cuốn truyện tranh nổi tiếng được chuyển thể lên màn ảnh rộng. Cùng với việc No Way Home mở ra cánh cửa cho tương lai của Người Nhện, phần phim thứ tư đã được thông báo là đang được phát triển.
                                        Trong khi chờ đợi thông báo chính thức về phần 4, cần nhớ các phiên bản Spider-Man khác cũng có tương lai xán lạn sau No Way Home. Như chúng ta đã biết, Tobey Maguire và Andrew Garfield đã quay trở lại với vai Người Nhện trong No Way Home. Bộ phim không chỉ đưa họ trở lại để hợp tác và cố vấn cho Spider-Man mới mà còn mở đường cho sự trở lại của hai Người Nhện này.",
                'hinh_anh'         => "https://static1.dienanh.net/upload/202301/ba1dd635-8935-4b5f-a867-c7d3fcccad9f.jpeg,https://static1.dienanh.net/upload/202301/bff251c5-6ccd-45c8-8ffb-8006f41bc2a3.jpeg,https://static1.dienanh.net/upload/202301/12b2b10c-0596-4012-af9c-d697e2e0103a.jpeg",
                'is_open'          => 1,
            ],

            [
                'tieu_de'          => "Avatar 2 tiếp tục thống trị phòng vé, đánh bật Harry Potter khỏi danh sách top 15 phim có doanh thu cao nhất mọi thời đại trên toàn cầu.",
                'mo_ta_ngan'       => "Mặc dù có bề ngoài trông giống mèo, nhưng thực ra Goose/Chewie vốn là một chủng người ngoài hành tinh có năng lực vô cùng nguy hiểm.",
                'noi_dung'         => "Thành công tại phòng vé của Avatar: The Way Of Water đã đưa bộ phim vào danh sách 15 phim có doanh thu cao nhất mọi thời đại trên toàn cầu, đánh bật Harry Potter And The Deathly Hallows: Part 2. Bộ phim được chờ đợi từ lâu của James Cameron ra mắt vào giữa tháng 12 sau 13 năm chờ đợi, nhận được lời khen ngợi không chỉ vì hình ảnh mà còn vì thông điệp mạnh mẽ về gia đình và môi trường.
                                        Với doanh thu 86,3 triệu USD trong bốn ngày cuối tuần dịp năm mới, Avatar: The Way Of Water đã nâng tổng doanh thu trên toàn cầu lên 1,4 tỷ USD. Điều đó có nghĩa là bộ phim hiện đã vượt qua Black Panther (1,382 tỷ USD) và Star Wars Episode VIII: The Last Jedi (1,332 tỷ USD) đẩy Harry Potter Và Bảo Bối Tử Thần: Phần 2 (1,342 tỷ USD) ra khỏi top 15 phim có doanh thu cao nhấtmọi thời đại trên toàn cầu.

                                        Giống như hầu hết các bộ phim khác, doanh thu của Avatar: The Way Of Water phần lớn đến từ các thị trường quốc tế - nơi bộ phim thu về 957 triệu USD. Thị trường nội địa chỉ đóng góp hơn 440 triệu USD.
                                        Bản thân James Cameron đã ước tính rằng với kinh phí 350 triệu USD cùng với 100 triệu USD cho quảng bá, Avatar 2 cần thu về hơn 1,5 tỷ USD để được coi là thành công. Phần tiếp theo vẫn có thành tích khá tốt trong tuần thứ ba công chiếu, thậm chí doanh thu tại Bắc Mỹ còn tăng so với cuối tuần trước. Đây là doanh thu cuối tuần thứ ba cao thứ 4 lịch sử.

                                        Với việc Black Panther, Avengers: Endgame đều thu về 700 triệu USD tại Bắc Mỹ, Avatar 2 có thể mong đợi điều tương tự. Không có đối thủ cạnh tranh, bộ phim sẽ tiếp tục hốt bạc ở thị trường quốc tế, nhiều khả năng vượt qua cả cột mốc 2 tỷ ban đầu.",
                'hinh_anh'         => "https://static1.dienanh.net/upload/202301/18625979-945c-47d2-b1c2-c4930259446a.jpeg,https://static1.dienanh.net/upload/202301/e04ae5a1-8640-4b9c-b1c6-2c8b39d2ac6c.jpeg,https://static1.dienanh.net/upload/202301/57334364-0009-44a0-9cc4-3192e76d9480.jpeg",
                'is_open'          => 1,
            ],

            [
                'tieu_de'          => "Vũ trụ DC: Tìm hiểu về Zeus - ông bố ngầu lòi của Wonder Woman",
                'mo_ta_ngan'       => "Với những gì mà Zeus đã thể hiện trong Justice League, dễ thấy ông ta là Cổ Thần mạnh nhất trong DCEU từ trước tới nay.",
                'noi_dung'         => "Dù có năng lực thuộc hàng “không được hoành tráng”, nhưng Wonder Woman vẫn là một trong số những siêu anh hùng mạnh hàng đầu của vũ trụ DC. Lý do thì đơn giản thôi, Wonder Woman là con gái của thần Zeus cơ mà. Ấy thế mà khi được đưa lên phim, Zeus lại “tỏi” từ khá sớm và chỉ có màn thể hiện đáng chú ý trong trận chiến với Darkseid từ thời cổ đại. Vậy, hãy cùng tìm hiểu về ông bố này trong bài sau nhé!
                                        Nguồn gốc

                                        Cũng giống như những gì được ghi chép trong thần thoại, Zeus vốn là người con thứ sáu của Cronus và Rhea. Khi các anh chị của Zeus ra đời, Cronus vì sợ bản thân mình sẽ bị con cái lật đổ giống như hắn từng làm với cha mình là Uranus, nên đã quyết định nuốt từng người một. Do đó, khi Zeus được sinh ra, Rhea đã nhờ Gaia giấu Zeus tại một hòn đảo, còn Rhea thì dùng một cục đá để lừa Cronus rằng đó là con mình.
                                        Tại nơi đó, Zeus đã tập luyện và ngày càng trở nên mạnh mẽ hơn. Khi trưởng thành, anh đã quay trở lại giải cứu 5 anh chị trong bụng Cronus, sau đó cùng nhau lập nên một liên minh nhằm chiến đấu với các Titan. Kết quả là phe Zeus chiến thắng và trở thành thế hệ thần mới thống trị Olympus, trong khi phe Titan phải chịu trừng phạt. Atlas phải nâng bầu trời vĩnh viễn, còn Cronus bị nhốt ở Tartarus. Những Titan đổi phe từ trước đó đều được ân xá.
                                        Zeus sau đó đã cùng vô số những nữ thần, phàm sinh sinh ra thế hệ thần thánh và á thần kế tiếp. Một trong số những tình nhân của ông là Hippolyta - nữ hoàng của người Amazons, sinh ra công chúa Diana tức Wonder Woman sau này. Khi Diana rời khỏi đảo Thiên Đường, Zeus đã lệnh cho Phobos và Deimos cấy ghép những ký ức sai lệch vào đầu cô, nhằm ngăn cô tìm đường trở về quê hương.
                                        Tuy nhiên, Zeus vẫn âm thầm dõi theo hành trình của con gái và sẵn sàng ra mặt khi cần thiết. Trong thời điểm Darkseid “đi săn” các á thần để hấp thụ sức mạnh, Zeus đã tới cứu và cả 2 người họ đã có trận thư hùng vô cùng khủng khiếp. Tuy nhiên, sau cùng thì Zeus vẫn bại trận do bị Darkseid hút sức mạnh, tan rã thành cát bụi.",
                'hinh_anh'         => "https://static1.dienanh.net/upload/202212/afd291ea-9c43-4e90-985c-5e2ffc49e3eb.jpg,https://static1.dienanh.net/upload/202212/a3231e15-1b8c-41e9-9336-a8053ca1a949.jpg,https://static1.dienanh.net/upload/202212/4c0a6f25-20e2-4770-92a5-b5fcbcdc555b.jpg",
                'is_open'          => 1,
            ],

            [
                'tieu_de'          => "X-Men sẽ xuất hiện thế nào trong MCU?",
                'mo_ta_ngan'       => "Trong MCU, rất có thể Celestials và Eternals sẽ có vai trò nào đó dẫn tới sự hình thành cộng đồng dị nhân.",
                'noi_dung'         => "Dù mọi thứ chưa được khẳng định, nhưng với mọi điều kiện thuận lợi hiện có cùng sự tồn tại của Deadpool 3, Marvel Studios ắt hẳn đã có những kế hoạch riêng để đem X-Men cùng dị nhân có thể xuất hiện trong MCU, nhưng giờ chúng ta cũng chỉ có thể đoán mà thôi. Vậy, hãy cùng thử đoán xem mọi thứ sẽ diễn ra thế nào trong bài này nhé!
                Những dị nhân đã xuất hiện

                Cho đến nay, những dị nhân chính thức trong MCU mới chỉ có 3 người, bao gồm Ms. Marvel Kamala Khan, Namor và giáo sư Charles Xavier của vũ trụ 838. Nếu không có gì thay đổi, “Deadpool và đồng bọn” sẽ là những cái tên kế tiếp. Theo những dự đoán, Deadpool sẽ có tác động nào đó tới TVA và sinh ra một thực tại nơi cộng đồng dị nhân tồn tại, nhưng bản thân mình không nghĩ điều này khả thi.
                Theo mình, sự tồn tại của “Deadpool và đồng bọn” cùng lắm cũng chỉ để “khẳng định” cho việc các dị nhân hiện hữu trong MCU mà thôi. Trong She-Hulk, từng xuất hiện một trang tin chứa bài viết có tiêu đề “Người đàn ông đánh nhau bằng móng vuốt kim loại trong một cuộc ẩu đả ở quán bar”. Nghe rất quen đúng không? Còn ai vào đây ngoài Wolverine/Logan nữa. Tất nhiên, Logan của Hugh Jackman cũng sẽ góp mặt trong Deadpool 3.
                Bối cảnh của MCU có phần khác biệt so với vũ trụ dị nhân của Fox

                Ở vũ trụ dị nhân của Fox, những người có siêu năng lực thường phải chịu cảnh bị phân biệt đối xử, bị kỳ thị bởi những người xung quanh. Đơn giản là vì họ quá khác biệt, họ sở hữu những quyền năng khiến mọi người ghen tị và đồng thời cũng khiến họ sợ hãi. Nhìn chung, những dị nhân đều rất nguy hiểm. Nhưng ở MCU thì khác, khi những người có siêu năng lực rất nổi bật với công chúng và hơn hết, họ được truyền cảm hứng từ những anh hùng.
                Nói cách khác, một người có siêu năng lực ở MCU dễ trở thành “người nổi tiếng”, thậm chí được hâm mộ như những idol thực thụ. Mặc dù vẫn dính vào vô số ý kiến tranh cãi trái chiều của dư luận, nhưng bề ngoài thì họ vẫn được người dân Trái Đất mến mộ. Cũng không có sự phân biệt gì về mặt góc nhìn giữa những người có năng lực và những người sở hữu X-Gene, có nghĩa là những dị nhân chẳng có lý do gì để bị “nhìn với con mắt khác” so với những người sở hữu năng lực thuộc loại khác.
                ",
                'hinh_anh'         => "https://static1.dienanh.net/upload/202212/9cda9598-ac73-4ee9-a5dd-a01e902a4ec1.jpg,https://static1.dienanh.net/upload/202212/6d56dee6-4ab6-4708-b468-ee8bed13f5a6.jpg,https://static1.dienanh.net/upload/202212/e890d6ab-ce67-40a4-842b-5f08b9793a47.jpg",
                'is_open'          => 1,
            ],

         ]);

         // php artisan db:seed --class="BaiVietSeeder"
     }

}
