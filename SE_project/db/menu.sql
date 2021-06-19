-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 18, 2021 lúc 09:38 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `restaurant_manager`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `ID` int(4) NOT NULL,
  `Name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Price` float NOT NULL,
  `Ammount` int(4) NOT NULL,
  `Note` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Decription` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`ID`, `Name`, `Price`, `Ammount`, `Note`, `Picture`, `Decription`) VALUES
(1, 'Gà Đốt Lá Trúc Ô Thum', 300000, 50, '', 'C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/Ga_hinh-1.jpg', 'Gà Đốt Lá Chúc Ô Thum là một món ăn đặt sản của vùng Bảy Núi ở An Giang. Thực khách muốn thưởng thức gà đốt lá chúc Ô Thum, thì phải chờ đợi tối thiểu 40 phút để đầu bếp thực hiện các công đoạn chế biến. Ăn gà đốt lá chúc Ô Thum, thực khách cần phải kiên nhẫn chờ đợi nhưng khi món ăn lên, hương vị đậm đà, thơm ngon của món ăn sẽ bù đắp lại công chờ đợi một cách xứng đáng.\r\nĐể làm món gà đốt lá chúc Ô Thum, người ta phải chọn nguyên liệu rất kỹ lưỡng. Gà để làm món ăn này phải là gà đồi, giống gà ta mà mỗi con chỉ có trọng lượng từ 1,3kg đến 1.8kg, loại gà này tuy nhỏ nhưng thịt rất chắc và ngọt. Đặc biệt, người ta không làm sẵn gà để bán cho thực khách, mà khi khách gọi thì gà mới được thịt, tẩm ướp và chế biến. Chính vì vậy thịt gà luôn tươi ngon, ngọt nước. Điều tạo nên vị ngon của món gà đốt lá chúc Ô Thum, không chỉ nằm ở nguyên liệu mà còn nằm ở bí quyết chế biến riêng của người dân tại đây. Ngoài các gia vị thường thấy như muối, sả, ớt, tỏi thì một loại gia vị đặc biệt cho món ăn này đó chính là lá chúc, người ta sẽ ướp gà với loại lá này để tạo vị ngon đặc trưng.\r\nGà đốt lá chúc Ô Thum chuẩn vị sau khi đốt sẽ được lót một lớp lá sả, lá chúc cho thêm dầu, rồi đốt tiếp từ 15-20 phút để da vàng giòn. Lửa đốt gà phải đốt lửa thật to, sau đó nhỏ dần để thịt gà chín đều. Gà đốt khi lên mâm sẽ có một lớp da giòn, màu vàng xuộm, vị ngọt đậm đà và đặc biệt là cái mùi thơm đặc trưng không lẫn đi đâu được.'),
(2, 'Bánh Xèo Miền Tây', 90000, 500, '', 'C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/Banh_Xeo_hinh-3.jpg', 'Bánh xèo có mặt ở miền Tây đã từ rất lâu đời, đến nay đã trở thành một món ăn không thể thiếu trong những buổi hội hè, vui chơi của người dân nơi đây. Bánh xèo miền Tây mang trong mình những nét rất riêng, cái \"hồn cốt\" của ẩm thực miền Tây Nam Bộ mà không thể lẫn vào đâu được. \r\nCó thể nói, bánh xèo là món bánh dân dã, đặc trưng của miền sông nước. Các nguyên liệu để làm nên món bánh thơm ngon này đều quen thuộc, dễ tìm. Quy trình để chế biến bánh xèo cũng rất dễ dàng, độc đáo không quá cầu kỳ.\r\nChỉ cần một ít bột gạo xay nhuyễn trộn cùng với bột nghệ để tạo nên màu vàng bắt mắt cho bánh, sau đó cho thêm ít muối để tạo vị đậm đà, có thể cho thêm nước dừa tùy theo khẩu vị của từng người.\r\nKhi mỡ trong chảo gang đã nóng sôi lên, đổ trực tiếp bột gạo vào chảo tráng đều, sau đó cho tôm, thịt ba chỉ, đậu xanh và hành lá đã thái nhỏ vào chảo và đậy nắp. Khoảng 3 - 4 phút sẽ cho ra lò một chiếc bánh xèo vàng rộm, nóng hổi, thơm phức cả góc bếp.  '),
(3, 'Cá Hú Kho Tộ', 100000, 100, '', 'C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/Ca_Kho_hinh-3.jpg', 'Những món cá kho luôn là món ăn chính trong bữa cơm hằng ngày của gia đình Việt. Cá hú kho tộ là món ăn dân dã luôn được người Việt ưa chuộng và lựa chọn trong mỗi bữa ăn. Hương vị đậm đà của cá kho được ăn kèm với cơm trắng nóng hổi đã tạo nên một nét đặc trưng của truyền thống Việt Nam. Cái vị ngọt mềm, thơm ngậy của thịt cá, chút mằn mặn của nước mắm se se vị cay của ớt đã tạo nên hương  vị đặc trưng của món ăn này.'),
(4, 'Beefsteak', 50000, 120, '', 'C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/Bo_hinh-4.jpg', 'Chúng được nướng lên hoặc áp chảo dưới những nhiệt độ khác nhau, cho ra đời những miếng steak có độ chín khác nhau. Đặc biệt, steak nhất định phải ăn kèm với sốt và các loại rau của quả ăn kèm. Chính vì thế, đây là một món ăn chưa đầy đủ dưỡng chất, có một thành phần dinh dưỡng được cân nhắc.'),
(5, 'Cơm Chiên Hải Sản', 75000, 60, '', 'C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/Com_Chien_hinh-2.png', 'Hải sản luôn là một nguồn cung cấp khoáng chất thiết yếu như canxi, sắt, magie, vitamin A, B6, C… thiết yếu cho cơ thể. Cơm chiên hải sản là sự kết hợp của chất đạm và khoáng chất của hải sản, vitamin, chất xơ của rau củ và tinh bột của cơm tạo nên một món ngon hấp dẫn đầy đủ dinh dưỡng.\r\nCơm chiên hải sản cũng xuất hiện trong các nhà hàng, các bữa tiệc… vừa thơm ngon, bổ dưỡng lại đẹp mắt. Tuy nhiên, để làm cơm rang hải sản ngon, giòn tại nhà thì cũng cần có bí quyết riêng. Bếp Eva hướng dẫn cách làm cơm chiên hải sản ngon tại nhà cực đơn giản, cơm rang giòn ngon, hải sản ngọt đậm vị, rau củ hài hòa cô cùng hấp dẫn.'),
(6, 'Gà Hấp Xì Dầu', 70000, 150, '', 'C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/Ga_Hap_hinh-1.jpg', 'Gà hấp xì dầu cũng là một món ăn khá đơn giản chỉ việc đem gà ướp với xì dầu rồi đem hấp là có một món ăn rất hấp dẫn có thịt mềm, vị đậm đà cho bữa cơm gia đình.'),
(7, 'Mực Ống Nhồi Thịt', 150000, 40, '', 'C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/Muc_hinh-2.jpg', 'Mực Nhồi Thịt - món ăn ngon cơm, cực dễ làm tại nhà. Các làm mực nhồi thịt (mực dồn thịt) đơn giản, có thịt mực ống nhai giòn sựt, nhân thịt băm bùi béo, đậm đà, ăn ngon mà không hề bị ngấy. Bên cạnh các cách chế biến mực thông thường như chiên, xào, nướng thì mực nhồi thịt cũng là một ý tưởng hay ho làm mới thêm vào thực đơn gia đình nhà bạn nhé.'),
(8, 'Nộm Sứa', 40000, 80, '', 'C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/Nom_Sua_hinh-5.jpg', 'Nộm sứa (hay còn gọi là gỏi sứa) là món ăn ngon được rất nhiều người yêu thích. Nộm sứa có thể làm khai vị hay ăn kèm cơm cũng đều rất ngon, từng miếng sứa trong vắt, giòn sần sật hòa thấm vị chua ngọt của chanh đường hấp dẫn người thưởng thức.'),
(9, 'Salad', 50000, 300, '', 'C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/Salad_hinh-3.jpg', 'Salad  có thể nói là một món ăn rất được lòng mọi người. Khi mà bạn cảm thấy ngán những bữa ăn quá nhiều “đạm”, thì salad chính là sự lựa chọn tuyệt vời nhất.\r\nMón salad với các loại rau tươi ngon, vị chua ngọt hài hòa, chút vị béo của sốt mayonnaise nữa không chỉ đem lại cảm giác ngon miệng mà còn cung cấp nguồn dinh dưỡng lành mạnh. Đặc biệt còn rất tốt cho chế độ  giảm cân.'),
(10, 'Súp Cá Hồi', 150000, 60, '', 'C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/Sup_Ca_hinh-3.png', 'Cá hồi là một loài cá giàu dinh dưỡng với nhiều cách chế biến khác nhau, đặc biệt là các món súp. '),
(11, 'Súp Cua', 25000, 100, '', 'C:/xampp/htdocs/Restaurant-POS-2.0/SE_project/images/Sup_Cua_hinh-6.jpg', 'Súp cua là món ăn giàu chất dinh dưỡng, phù hợp với cả trẻ nhỏ và người già nên được ưa chuộng hiện nay.\r\nNhư chúng ta đã biết, cua biển là một trong những loại hải sản được ưa chuộng, bởi thịt cua có vị ngọt, dai và hàm lượng chất dinh dưỡng trong cua cực kỳ cao. Cua biển có chứa nhiều canxi có tác dụng giúp xương chắc khỏe. Mặt khác các vitamin A, B1, B2 có trong cua giúp giảm nguy cơ thoái hóa và tốt cho mắt sáng khỏe. Ngoài ra, cua còn là thực phẩm có công dụng giảm đau, thanh nhiệt hiệu quả. \r\n\r\nCua biển được chế biến thành nhiều món ăn khác nhau như: cua biển hấp bia, cà ri cua, cua biển rang muối,… Mỗi một món ăn chế biến từ cua đều có mang một hương vị độc đáo, hấp dẫn riêng mà chỉ cần thưởng thức một lần là lại muốn thưởng thức lần nữa. Trong đó, món súp cua là món ăn phổ biến nhất, đặc biệt là các em nhỏ vô cùng yêu thích. Súp cua thơm ngon, bổ dưỡng tốt cho người già, người mới ốm dậy, trẻ em suy dinh dưỡng, là món khai vị lý tưởng trong bữa tiệc gia đình ấm cúng.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
