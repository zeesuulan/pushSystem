-- phpMyAdmin SQL Dump
-- version 4.1.13
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2014-10-21 14:14:52
-- 服务器版本： 5.6.21
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `GCM`
--

-- --------------------------------------------------------

--
-- 表的结构 `download_log`
--

DROP TABLE IF EXISTS `download_log`;
CREATE TABLE IF NOT EXISTS `download_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_path` varchar(200) NOT NULL,
  `download_num` int(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `download_log`
--

INSERT INTO `download_log` (`id`, `file_path`, `download_num`) VALUES
(1, 'error_path', 13),
(2, '/pushsystem/ufile/hjpdsphhh1.jpg', 3),
(3, '/pushsystem/ufile/2.jpg', 1),
(4, '/pushsystem/ufile/2.apk', 2),
(5, 'http://www.baidu.com', 1),
(6, 'http://d.hiphotos.baidu.com/image/w=310/sign=2a0c4998cf11728b302d8a23f8fcc3b3/d01373f082025aaf5f03b8c2f9edab64034f1a82.jpg', 1),
(7, '(done)', 2);

-- --------------------------------------------------------

--
-- 表的结构 `flashgame`
--

DROP TABLE IF EXISTS `flashgame`;
CREATE TABLE IF NOT EXISTS `flashgame` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `register_id` text NOT NULL,
  `device_id` varchar(100) DEFAULT NULL,
  `app_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `app_id` varchar(100) DEFAULT NULL,
  `version` varchar(10) DEFAULT NULL,
  `device_info` text,
  `other_info` text,
  `country` varchar(10) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `time` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33511 ;

--
-- 转存表中的数据 `flashgame`
--

INSERT INTO `flashgame` (`id`, `register_id`, `device_id`, `app_name`, `app_id`, `version`, `device_info`, `other_info`, `country`, `city`, `time`) VALUES
(11836, 'APA91bFznggDhP4Yi0CZRoyf6y4_ZjPJQmSygYypZ5kxcKhV4e0NQLbsx00uU6K5ZCKfkqrVPgdlGFrXatZktSJ-IIdJtlT1yhrmfnc28HUdNZKzXbT09sEM3jiKOPibEQGT_oxOex0WeK25mtm2SdLx2vs_RVAIYgnFFwE1tXk2xo2HTb0h-cQ', 'e2f9f4ca01580ebd90a683f4b07b77e9', '  Cat  Around Asia\n  小猫环游亚洲\n', 'g.Q0FUQVJPVU5EQVNJQQ.CatAroundAsia', '5.3', '{"screenH":552,"osversion":"4.0.3","manufacturer":"Android Linux","dpi":160,"os":"Linux 3.0.8-CL448962-user","productbrand":"samsung","language":"en","screenW":1024,"productname":"espressorfxx"}', '{"gcm":"784737284606","publisher":""}', 'SA', 'Riyadh', '2014-05-18'),
(12598, 'APA91bEaPLZpHJXvDLQjROfMT3eiMZshd90l-xqGDn3BjFNnglq7ICqgnrUHd5eI5akeH2KQs9R7o0jJ_IBEcwfOYWzOSV7CI6pm-IpSyB39X06y9psZzgK-8lHROU9Gr-ylroyI9c44Q0hg2IhWlUktFkXlwhb1LSwfs7rmdd2-LIkcoBm_wuY', 'c32268eb113040fdf4d80a2ba97b8141', '  Cat  Around Asia\n  小猫环游亚洲\n', 'g.Q0FUQVJPVU5EQVNJQQ.CatAroundAsia', '5.3', '{"dpi":160,"osversion":"4.0.4","screenH":752,"screenW":1280,"os":"Linux 3.0.8-1060237","productbrand":"samsung","language":"en","manufacturer":"Android Linux","productname":"espresso10rfxx"}', '{"gcm":"784737284606","publisher":""}', 'SA', 'Abha', '2014-04-20'),
(17748, 'APA91bERdUcXxerxLKNwDGpePL5pcffiqNqMor6U0uR9esLF5d9Zf22xLUK3OTD4GNkuq0ebBHk5n8PXFIJNFxUW-d4gXdeq5qEHPOBSceGeMR4FZYxz0sQ-jqliBD2KKrpQFHCqsQ5zKhTCwN7q4zSsrkbDnYDxmuW4iRoyeNI-iytwg1PmM2Y', '8fb81096a8d91c77e4a5ca8131052fd1', '  Cheese Barn\n  奶酪老鼠\n', 'g.WUP.Q0hFRVNFQkFSTldVUA.CheeseBarn', '5.3', '{"screenH":444,"osversion":"4.1.1","screenW":800,"dpi":120,"os":"Linux 3.0.36+","language":"en","productname":"rk2928sdk","manufacturer":"Android Linux","productbrand":"EMERSON"}', '{"publisher":"WUP","gcm":"784737284606"}', 'US', 'Tye', '2014-05-12'),
(18102, 'APA91bF04646u5vsF5lHBAO_8XyoNkRoIFfvY1QYb6tnNPvG_4qobwQYDA27Rb3TmZSm97r4Fglat5B0joisNYKy_c4_RaYu8uEqu9qbEpFWfvQ1KqeWO5gSrEYDrcjO_mzSb0JUBN6J5qY97SBlB7VeVMCs1l_wHgKN40Qkk958niC7gcDTrmY', '345640a204b102714ef5d2bd8e2dad7c', '  Cheese Barn\n  奶酪老鼠\n', 'g.WUP.Q0hFRVNFQkFSTldVUA.CheeseBarn', '5.3', '{"dpi":120,"osversion":"4.0.4","manufacturer":"Android Linux","screenH":444,"os":"Linux 3.0.8+","productbrand":"iNet","language":"en","screenW":800,"productname":"nuclear_evb"}', '{"gcm":"784737284606","publisher":"WUP"}', 'US', '', '2014-04-25'),
(21543, 'APA91bEh0FZh2XQB9NoSvAECd1aKCU-YHkSwulXBTgQvbA99HiMysm1Hjm-Pe_PCgNNvJOOkPN7s5Uu0feor1yDLy3x6aVdL3uO8b7OI6m08OlhbZM_XM7eH8E1izZa2JPkbdEvTimA7oHlPLRhnppFCgXgUfydEWb_DLa3NlXmbyWhp7HqvurE', 'ec6bf5788e34147909860a4ba0912f81', '  Cheese Barn\n  奶酪老鼠\n', 'g.WUP.Q0hFRVNFQkFSTldVUA.CheeseBarn', '5.3', '{"os":"Linux 3.0.8+","language":"en","productname":"nuclear_evb","productbrand":"iNet","screenW":800,"screenH":444,"osversion":"4.0.4","dpi":120,"manufacturer":"Android Linux"}', '{"gcm":"784737284606","publisher":"WUP"}', 'US', 'Tehachapi', '2014-07-27'),
(21697, 'APA91bFq_aFXRXiUWeSIzX371Y7N1cgAnvxd6Ssjd5SQPrAJO2SjmkK2X1a3x8Rj2vJ6x9WqC0hzFFCr-TuApGfL5Ui-yqtQ-xUtVfNrd-AejKg1wvvmwySvmOa9xLafoHV7Vngaesxrdnok4IMvP1H1hHqskw_qqPQUvXzjUCPCtIbZuK6fuCo', '5554208c8a74b55dd7b0fcdcf70354f9', '  Cheese Barn\n  奶酪老鼠\n', 'g.WUP.Q0hFRVNFQkFSTldVUA.CheeseBarn', '5.3', '{"os":"Linux 3.0.36+","dpi":120,"manufacturer":"Android Linux","productbrand":"EMERSON","screenH":444,"language":"en","osversion":"4.1.1","productname":"rk2928sdk","screenW":800}', '{"gcm":"784737284606","publisher":"WUP"}', 'US', 'Pfafftown', '2014-07-09'),
(26031, 'APA91bGHuKNTlRsW9ob03nbPB8ppakdSZ93PCDNDUj95HBH2QtUZuprqdgcFfCz_8LmMM9Mmgj2jxniQpk3iMLqmZaDurZNNPSqwgBIbeI-oev1QWukqD5kykUhfIeXuMpfOEmftqANaCl2YMyr2w1FPGKArJxbUvaDkoj3-BDAcARn6PP2NdE8', '76a9909fdc62dbfbbf8f0d9486ca9aeb', '  Snail Bob 2\n  蜗牛鲍勃2\n', 'g.CAIB.U05BSUxCT0IyQ0FJQg.SnailBob2', '5.3', '{"os":"Linux 3.0.36+","language":"en","dpi":120,"productname":"rk2928sdk","screenW":800,"osversion":"4.1.1","screenH":444,"manufacturer":"Android Linux","productbrand":"EMERSON"}', '{"gcm":"784737284606","publisher":"CAIB"}', 'US', 'Minneapolis', '2014-04-16'),
(26205, 'APA91bGUB7jWCb7MvEFUVhXB2Na-N9NaZRLGg_dQI6e654zWBj_ivpe-U9wZytWFiQKPAML8It2fROxHg8UI3DVYkf7Ep16T3tFIoVG8Q9b3uryHvvsvtn5x6MvTfXgV-aNJG-9RjWvzcOSp9Yk9XQ3AioKMF_1M04vUX0y5aWitl0yszkTbruI', 'ecd7416f0d5f274ccba7f74d6190d78f', '  Snail Bob 3\n  蜗牛鲍勃3\n', 'g.CAIB.U05BSUxCT0IzQ0FJQg.SnailBob3', '5.3', '{"screenW":800,"productname":"nuclear_evb","dpi":120,"manufacturer":"Android Linux","productbrand":"iNet","os":"Linux 3.0.8+","language":"en","screenH":444,"osversion":"4.0.4"}', '{"gcm":"784737284606","publisher":"CAIB"}', 'RS', '', '2014-05-03'),
(26344, 'APA91bG1M9QUu1VpsiZ9boZ1nzgBl-rXhCsvp8XujoGNoYQlSd3R5KrVkk_PGVPaUilTJLqT9Un0Av7Utb1-q_r_9FqugyhjCuaMwayrQVXcsnu7F8ROLnQ53777BtLJN3eXwXc3G3I3YAsrwefMS-amaI8gZIhYKsOXAh7TT5O9T8tFqu0HwQo', 'cc2e6496297b78a4425dca69bf09bdee', '  Treasure Rush\n  夺宝奇兵历险记\n', 'z.VFJFQVNVUkVSVVNI.TreasureRush', '5.3', '{"dpi":160,"os":"Linux 3.0.31-1261897","osversion":"4.2.2","productname":"espresso10wifibby","screenH":752,"language":"en","productbrand":"samsung","manufacturer":"Android Linux","screenW":1280}', '{"publisher":"","gcm":"784737284606"}', 'US', 'Clarksville', '2014-04-19'),
(26897, 'APA91bFaJkcNzvHS9-7KgD9cVPw6pqcltJonWxYaOOynxzGwI7zgQ4NxNCwZLPkx5ZewL1HwYF3C_EyrBEalqjqtUsw3nMSx1tgHTVXbnt0CQY8YehcsEQ1K5Jul8MIrHOd7wufx9OnZcF5ruzWsglczfLVg20739u2W3iRM1Qe1tD4cb06EQt86iW28P7j28KkaiPczyWIx', '0b0bfeacadbf94bc22171abc5678ff6a', '  Snail Bob 2\n  蜗牛鲍勃2\n', 'g.CAIB.U05BSUxCT0IyQ0FJQg.SnailBob2', '5.3', '{"os":"Linux 3.4.5","language":"en","dpi":240,"productname":"ALLVIEW","screenW":800,"osversion":"4.2.2","screenH":480,"manufacturer":"Android Linux","productbrand":"ALLVIEW"}', '{"gcm":"784737284606","publisher":"CAIB"}', 'RO', '', '2014-07-04'),
(27369, 'APA91bEP6l76ZnnXQKWFXB97rej409Y-byC5s9DIQsVnRUnWJmaKzeFWcY7xCEFt8XO6EGahh44nPDxvv54zw1KebuKtrbnW718ROsNI3qHXIl-i5B2XGbg03VmOwGB6PTMt9K0KSzn-I_vXZwe_T4D4g-h2iOIxIQV6uaDm9bV_DMjcOi4KufA', '44b27f162c4b4862e1a207dc41882f49', '  Bubble Tub\n  泡泡浴缸\n', 'g.HQJ.QlVCQkxFVFVCSFFK.BubbleTub', '5.3', '{"os":"Linux 3.0.8+","screenH":564,"osversion":"4.1.1","dpi":120,"productbrand":"polaroid","language":"en","screenW":1024,"manufacturer":"Android Linux","productname":"polaroid"}', '{"publisher":"HQJ","gcm":"784737284606"}', 'US', 'Winneconne', '2014-04-16'),
(28961, 'APA91bGtzxYEmuROcZbLLdqDMy2xR9-1cMe8-VnTi8jMNygY8br271dCLSmV0WKU7qaZSfuvU9j3kMEqwyLjylpQMq7r6pTsL4dZGQFE1HLmHcoeUjUasHZ-l3inTUKZaR68uMnI2gn6vR-wVVD0meqhnstwdKd6PA', 'db62f3b585533159eba387699b3289da', '  My Little Army\n  小小军队\n', 'wup.com.game.MyLittleArmy', '5.5', '{"os":"Linux 3.0.8","osversion":"4.0.3","dpi":160,"screenW":1024,"productname":"g04ref","language":"nl","productbrand":"MID","manufacturer":"Android Linux","screenH":720}', '{"gcm":"784737284606","publisher":"WUP"}', 'NL', '', '2014-04-20'),
(29216, 'APA91bFNoljCP8OEHqBtTec4_5-10otZURImhWkFCLdrwHjhQZ9tgBhkXsWEA9K4QGa5QmIM37x97RfpeuXNNQJp-b3oA_qYKb1G6KrTnnVmYzvQZVKP47rhUaInKXoLMheCN9ZorqG_h5JfUWY08s2G8llU8lGFEA', '698a66e028bed003f39163fd754b101f', '  Falling Blocks\n  七彩方块雨\n', 'caib.com.game.FallingBlocks', '5.4', '{"os":"Linux 3.4.5-1273223-user","dpi":160,"osversion":"4.1.2","productbrand":"samsung","screenH":600,"language":"en","screenW":1024,"manufacturer":"Android Linux","productname":"lt023gxx"}', '{"publisher":"CAIB","gcm":"784737284606"}', 'SA', '', '2014-09-20'),
(29248, 'APA91bGDA9fokHEyM8oyVX61WuG3F2piAZjA_r024RHJMOSZHFZMWLSQW-QcpnEPn-_CO-ivi2QwomHXrGNUeWl47MxB3bpZRCwo6ZVLDoGxB4K7sY18Dwwl9gxYOA3KofgJzlx7knOxvHUokEezyvNzzUv3cSWzhw', '698a66e028bed003f39163fd754b101f', '  Bomberman\n  炸弹人\n', 'ykw.com.game.Bomberman', '5.6', '{"os":"Linux 3.4.5-1272676-user","screenH":600,"dpi":160,"manufacturer":"Android Linux","productbrand":"samsung","productname":"lt023gxx","osversion":"4.1.2","language":"en","screenW":1024}', '{"publisher":"YKW","gcm":"784737284606"}', 'SA', '', '2014-04-25'),
(29250, 'APA91bGV-UYf1msmD3xCXcwW3i8-BAvQgUmK6B_6YhYQ57WkGxDTDsxhGtcOCqqEbwRqf3jRWRCZPfhXhXQP3sH7qB3_ce904zdAc8miR5CFc3buX57ghyQ42kW-jWz6SkRntpbwePJOuAwhdW-f2Tfz3ltPUmJCdg', '698a66e028bed003f39163fd754b101f', '  Cheese Barn\n  原来小偷是这货\n', 'ykw.com.game.CheeseBarn', '5.6', '{"os":"Linux 3.4.5-1272676-user","screenH":600,"productbrand":"samsung","screenW":1024,"osversion":"4.1.2","dpi":160,"language":"en","productname":"lt023gxx","manufacturer":"Android Linux"}', '{"gcm":"784737284606","publisher":"YKW"}', 'SA', '', '2014-08-30'),
(29316, 'APA91bF_jOt9FBFSisnHrKLYX4MZf6bBtE3TPjlqP-nVZV5z4xzXLVAKQE9Sgm_uiUjO_cDCymSzSI8VTLd45wokMGA5wbZuKyDWBb_0cR678vqOVbQWf7BcW5IGegflxncN7wS07YpES4gMBeaYKb-9RPseZtFqLA', '52f613f79f89f1e1110e85a1310682d2', '  Apple Boom\n  苹果泡泡\n', 'xzh.com.game.AppleBoom', '5.4', '{"os":"Linux 3.0.8+","productname":"nuclear_evb","screenW":800,"productbrand":"iNet","dpi":160,"osversion":"4.0.4","language":"fr","screenH":432,"manufacturer":"Android Linux"}', '{"publisher":"XZH","gcm":"784737284606"}', 'FR', '', '2014-05-09'),
(29318, 'APA91bHoFAVaFcAcGUBYq-UBJJheKR0691K6cx5ViqMYvu3AABkNejkD7ceJ4xc5YvNf0GW4yES_IGGoxuyjqePEiX13gI--sUz_JhVXWOxxxuxU3UogT-LxBBiT-Vx2kILcBt3g57UHOfm7sEObkm8Ssu5cFUd3JQ', '8c796ba7a3ec521c458782c033e7d242', '  Cactus Mccoy\n  仙人掌妖怪\n', 'ykw.com.game.CactusMccoy', '5.6', '{"screenW":800,"osversion":"4.1.1","screenH":444,"manufacturer":"Android Linux","productbrand":"rk2928sdk","os":"Linux 3.0.36+","language":"es","dpi":120,"productname":"rk2928sdk"}', '{"gcm":"784737284606","publisher":"YKW"}', 'MX', '', '2014-05-12'),
(29455, 'APA91bHUnFV5yn83HsVhfByA1L5iNNdKs6XZiY2CCTn77x55__Iz-lqYp51kd-q6n9mv29i6Z1W4LiikW0QvnmxY-UnwaceCXVYrEcscRIn8vF5qDY558DO_9uNUw7BD_iU51MDeBBDnw-EgT0ckvhPuCjslGNhLPg', '70c9c612132b31640addd885f53b2f6b', '  Cheese Barn\n  原来小偷是这货\n', 'ykw.com.game.CheeseBarn', '5.6', '{"os":"Linux 3.0.36+","productname":"rk2928sdk","productbrand":"rk2928sdk","dpi":120,"osversion":"4.1.1","language":"es","screenW":800,"manufacturer":"Android Linux","screenH":444}', '{"gcm":"784737284606","publisher":"YKW"}', 'MX', '', '2014-09-19'),
(29658, 'APA91bEVnu7xU0Zp4M_ZaUaE_6ZVPtCyEtDLZLwwYMp_VCyqmTe3iJm9Kz1nPGVqvXXIaW78bdY-Oj-PuwRdLNZv4vTULa7RWTR88NtG_NXCxATE5IUqUVrWXTRurt65u3_xFDOaAauJs-pulbjNNpEa14SReiHaYA', '0a0d908f8cc6fec7e8d6f1c71771cd9d', '  Ancient Jewels\n  珠宝迷阵\n', 'hqj.com.game.AncientJewels', '5.4', '{"os":"Linux 3.0.36+","productname":"rk2928sdk","osversion":"4.1.1","screenH":444,"screenW":800,"language":"es","productbrand":"rk2928sdk","manufacturer":"Android Linux","dpi":120}', '{"publisher":"HQJ","gcm":"784737284606"}', 'MX', 'Aguascalientes', '2014-04-17'),
(30219, 'APA91bG9JhOC_GoDQcZL1k4JZc4XLnXCGMMYzPJ3aYN_DLK3BGvUY5w7Gz6b0C2quLALiKYiuZvbkCRmePnPxZz7cVDH2Qhk4CX2fu0Ep5dwjqBibXQI3IZZoxmiA8o8JB_CbU4uCjAeFyCT9GV3n2tzdnc_uT5h9w', '2895e2527bde5f04e8c858a84c7221e2', '  Cactus Mccoy\n  仙人掌妖怪\n', 'ykw.com.game.CactusMccoy', '5.6', '{"os":"Linux 2.6.32.9","productbrand":"samsung","osversion":"2.2.1","dpi":160,"productname":"GT-P1010","screenW":1024,"language":"fr","screenH":600,"manufacturer":"Android Linux"}', '{"gcm":"784737284606","publisher":"YKW"}', 'BE', 'Brussels', '2014-09-07'),
(30354, 'APA91bGkLhe8KmOK3RXFis_TXwOZ1OWlx2_zJ1LkW95QKRXjVaK2fskvKUsjugLKgquze7R2ZQDS4cZjYQmEw8a9cbG13Hp9YT31ILHXWWwypGxAPa3gqE-dGpRJgCKCvnMhOnbQ5gyWwF3OkfPpfLzUw5_l7PIuOg', 'da6fb329c62015dfb9a333f9a8389d1d', '  Cheese Barn\n  原来小偷是这货\n', 'ykw.com.game.CheeseBarn', '5.6', '{"os":"Linux 3.0.36+","language":"es","productname":"rk2928sdk","screenH":444,"productbrand":"rk2928sdk","dpi":120,"osversion":"4.1.1","screenW":800,"manufacturer":"Android Linux"}', '{"gcm":"784737284606","publisher":"YKW"}', 'MX', '', '2014-07-25'),
(30508, 'APA91bG6Nxe2sD2dThgnXvBiHmt3Ipb-inFnePQfP5fMe7nzM8hcFZIHrjb-0VOkrsodNfeJpS05tplu_MRka_dje9RRzMRilsmiJyfVHTKV6JaWUG7lfKZB72laTyQvl1XHZLNKkJ-t8-3fQEoF6OIVaOzWbR6WeVviSSCiqu3bRavqVc04tPo', 'a01b2549e40a9d9a668d25d8eced9ca8', '  Pour The Fish\n  润泽小鱼\n', 'wup.com.game.PourTheFish', '5.6', '{"dpi":160,"productname":"rk30sdk","osversion":"4.2.2","screenW":758,"os":"Linux 3.0.36+","language":"es","screenH":480,"manufacturer":"Android Linux","productbrand":"rk30sdk"}', '{"gcm":"784737284606","publisher":"WUP"}', 'US', 'Chicago', '2014-08-24'),
(30989, 'APA91bGEUHczQBFfjxHY3PwZAWXNF5tLb2w8hdrCpbvROnsgOes1hTsZ0P53dhwWVtmmSGFFDTN3XoGhnciPz0eXFrfNBOHxebIw5OzNlzLZfKvZYfxQ5SMDg1HPCeUc0sanD7qfSaPc6-2q4DgFdsYSwxxAS23bDg', '410faca815d9108dcd5209f89618a412', '  Candy Crush\n  糖果粉碎传奇\n', 'ykw.com.game.CandyCrush', '5.6', '{"os":"Linux 3.0.13","screenW":960,"osversion":"4.0.4","productname":"i-mobile IQ 1","dpi":240,"productbrand":"alps","language":"en","manufacturer":"Android Linux","screenH":540}', '{"gcm":"784737284606","publisher":"YKW"}', 'TH', '', '2014-04-25'),
(31067, 'APA91bELehsMEEq2TUZ3SKZ4lo44d_BagrHfr_usxDmlZPd-oVBgNeCVEb6YNuvfZjEsQppLp_piQyQ027lJyGxhe7m_93MzR2wSVAgeRRYCV1cdcVBaPLAFzAvr1sVYx8XCnmuRyZbYkHYMJwcLUxYf2ZzNfY2vPwf58xf4IHVznLIeb1GhIs0', 'f341e2336736afa7d5c50dfb7834ee4d', '  Christmas House\n  装扮圣诞小屋\n', 'ykw.com.game.ChristmasHouse', '5.6', '{"os":"Linux 3.4.43-00002-g493d58a","osversion":"4.3","dpi":213,"productname":"WW_epad","productbrand":"asus","screenH":736,"language":"en","manufacturer":"Android Linux","screenW":1280}', '{"gcm":"784737284606","publisher":"YKW"}', 'SY', '', '2014-07-09'),
(32241, 'APA91bEpzILPaYJ9a6oxwLT7LEbfBY9W7CQdMYQBqBPAiYcf8SUWXcd-_A5fRcPkxqxcfU_irhUOs-F-y6gKcIIXB1OjVLnAaGpqUNmtlaaUKpCnXd9wsJ8f4rCSYAmFbBHnbq0EdDgDnPK7j86Z1v2eh7ssPG6lyNnjpDUywmYBMwW7HstamWg', '19dd7db2186bd79544bf21fdbe2d9b61', '  Cute Beauty Dress Up\n  装扮气质女生\n', 'ykw.com.game.CuteBeautyDressUp', '5.6', '{"os":"Linux 3.4.0-g43a9ba9","language":"en","productbrand":"Sony","manufacturer":"Android Linux","screenH":1080,"productname":"C6602_1270-8384","screenW":1794,"dpi":480,"osversion":"4.2.2"}', '{"gcm":"784737284606","publisher":"YKW"}', 'EG', '', '2014-04-19'),
(32293, 'APA91bGCZgxPfj891Og69MGrKo4fpD61iBSFMmlbxNPubd1bGEQFQCx_KoukXNBow2g2Qb21NkWRM0J4u82OLT6mwuvputnqK1xJos70XQIdAZnyLCHIrYyqZ2iMjBwvOrvvPDRHE4V8zpgd4pCJpwSky7SMf71cww', '801de627668674ffa2c5fa34ad0acd7a', '  Christmas House\n  装扮圣诞小屋\n', 'ykw.com.game.ChristmasHouse', '5.6', '{"os":"Linux 3.0.36+","productbrand":"EMERSON","language":"en","screenW":800,"productname":"rk2928sdk","dpi":120,"osversion":"4.1.1","manufacturer":"Android Linux","screenH":444}', '{"gcm":"784737284606","publisher":"YKW"}', 'US', 'Craigsville', '2014-04-22'),
(32547, 'APA91bHYMnDeeFSBlUOmg04rgYsvxwiL0Al6BKnjZwmjMvOkb3B0PhR1xtLpCUsYiB3WWDR5hIUo_TM59uLExB8QPqO4RYo7e5PCAqMQwFgoopeUK9dsy8gBWnOBFuTqNKBjJZ3F2YIbuvwLqKrqLReLKyEadfii2g', '4c1831fec33b9a01e4c683b975cd6545', '  Christmas House\n  装扮圣诞小屋\n', 'ykw.com.game.ChristmasHouse', '5.6', '{"os":"Linux 3.0.36+","productbrand":"rk2928sdk","language":"es","screenW":800,"productname":"rk2928sdk","dpi":120,"osversion":"4.1.1","manufacturer":"Android Linux","screenH":444}', '{"gcm":"784737284606","publisher":"YKW"}', 'MX', 'Monterrey', '2014-07-30'),
(33417, 'APA91bFyte8yMvo1Uqtp0xaXq-nUNrpTwt1LnhnoWRJ5IRlvG6BWoJsVupgtSoCGbk2w0_SL2IH6hB1ZCEehcWxZkzVRPr3Qb039cUAZKU2d7NPYzxtOTuebxD5nrkd3SWw7TZJbjgrKGpyq-TL3M8PXXQS14nz2Zw', 'f44ce9fe4ea50aa0d1d39bab567016de', '  Bomberman\n  炸弹人\n', 'ykw.com.game.Bomberman', '5.6', '{"dpi":120,"productname":"rk2928sdk","screenW":800,"productbrand":"rk2928sdk","os":"Linux 3.0.36+","osversion":"4.1.1","language":"es","manufacturer":"Android Linux","screenH":444}', '{"gcm":"784737284606","publisher":"YKW"}', 'MX', 'Mexico', '2014-04-21'),
(33435, 'APA91bGWwk17aQDVtk7f2CBzwvNLfFuhOLuLbfRHzEHevdGX09ksp4ua9UdHCkSkAp_hoKjVmOXxrnnMCvLjGIiXoxEtsb1fNlYOnTsakevkVPDKoaZjqDjUg45_0qFE0XaoxnBfu0QssrhdgY1UbacC3sroVsy-FaXDLmC-H3knp9LvWun4_uI', 'fb2105802d45544328794b27061bcf91', '  Papa''s Hot Doggeria\n  爸爸的热狗店\n', 'hqj.com.game.PapasHotDoggeria', '5.4', '{"dpi":160,"screenW":1024,"osversion":"4.1.1","screenH":552,"os":"Linux 3.0.36+","productname":"rk2928sdk","language":"es","manufacturer":"Android Linux","productbrand":"PMID708X"}', '{"publisher":"HQJ","gcm":"784737284606"}', 'MX', 'Hidalgo', '2014-09-20'),
(33510, 'APA91bFB5x-tNXtPUzOv1KNtiXh4L53ceLtikCAWwml2Z159XVALee1qld5OLMzOTwpR8gVqfDDpscnAT3PTS0-7w82FfFr_-DYg88DZVBqB0flMXFwuss1BLQ6fDKMVCLq1tW86n7R6IosNrqkKEucNolw38VWIjcfpBnsCwa6KN9ZM89Y6GjQ', 'ecbedffc3c5f49bf07b9d5efd9bb14f3', '  Disaster Will Strike\n  灾难灭蛋\n', 'ykw.com.game.DisasterWillStrike', '5.6', '{"os":"Linux 3.0.31-748978","osversion":"4.1.2","dpi":320,"productname":"m0xx","screenW":1280,"screenH":720,"language":"en","manufacturer":"Android Linux","productbrand":"samsung"}', '{"gcm":"784737284606","publisher":"YKW"}', 'SD', '', '2014-08-08');

-- --------------------------------------------------------

--
-- 表的结构 `push_log`
--

DROP TABLE IF EXISTS `push_log`;
CREATE TABLE IF NOT EXISTS `push_log` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `task_id` int(255) NOT NULL,
  `operator` varchar(20) NOT NULL,
  `datetime` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- 转存表中的数据 `push_log`
--

INSERT INTO `push_log` (`id`, `task_id`, `operator`, `datetime`, `type`) VALUES
(1, 1, 'admin', '14141414-1010-0101 0', 'repush'),
(2, 1, 'admin', '2014-10-01 03:20:43', 'single'),
(3, 1, 'admin', '2014-10-01 11:22:36', 'single'),
(4, 6, 'admin', '2014-10-07 20:08:32', 'single'),
(5, 18, 'admin', '2014-10-19 22:13:07', 'single'),
(6, 18, 'admin', '2014-10-19 22:19:35', 'single'),
(7, 18, 'admin', '2014-10-19 22:20:15', 'single'),
(8, 18, 'admin', '2014-10-19 22:21:01', 'single'),
(9, 18, 'admin', '2014-10-19 22:22:16', 'single'),
(10, 18, 'admin', '2014-10-19 22:23:28', 'single'),
(11, 18, 'admin', '2014-10-19 22:26:24', 'single'),
(12, 18, 'admin', '2014-10-19 22:26:47', 'single'),
(13, 18, 'admin', '2014-10-19 22:27:06', 'single'),
(14, 18, 'admin', '2014-10-19 22:27:20', 'single'),
(15, 18, 'admin', '2014-10-19 22:27:40', 'single'),
(16, 18, 'admin', '2014-10-19 22:37:28', 'single'),
(17, 18, 'admin', '2014-10-19 22:37:55', 'single'),
(18, 7, 'admin', '2014-10-19 22:38:10', 'single'),
(19, 7, 'admin', '2014-10-19 22:38:35', 'single'),
(20, 7, 'admin', '2014-10-19 22:39:05', 'single'),
(21, 7, 'admin', '2014-10-19 22:39:30', 'single'),
(22, 7, 'admin', '2014-10-19 22:39:52', 'single'),
(23, 7, 'admin', '2014-10-19 22:41:33', 'single'),
(24, 7, 'admin', '2014-10-19 22:41:54', 'single'),
(25, 5, 'admin', '2014-10-19 22:42:23', 'single'),
(26, 5, 'admin', '2014-10-20 22:22:17', 'single'),
(27, 5, 'admin', '2014-10-20 22:22:25', 'single'),
(28, 5, 'admin', '2014-10-20 22:26:30', 'single'),
(29, 5, 'admin', '2014-10-20 22:57:35', 'single'),
(30, 1, 'admin', '2014-10-20 22:58:10', 'single'),
(31, 10, 'admin', '2014-10-20 22:58:48', 'single'),
(32, 12, 'admin', '2014-10-20 22:58:55', 'single'),
(33, 1, 'admin', '2014-10-20 22:59:02', 'single'),
(34, 5, 'admin', '2014-10-20 22:59:07', 'single'),
(35, 5, 'admin', '2014-10-20 23:01:51', 'single'),
(36, 5, 'admin', '2014-10-20 23:02:46', 'single'),
(37, 5, 'admin', '2014-10-20 23:04:23', 'single'),
(38, 5, 'admin', '2014-10-20 23:06:05', 'single'),
(39, 1, 'admin', '2014-10-21 20:56:04', 'single'),
(40, 5, 'admin', '2014-10-21 20:56:13', 'single'),
(41, 5, 'admin', '2014-10-21 20:57:01', 'single'),
(42, 5, 'admin', '2014-10-21 20:59:03', 'single'),
(43, 5, 'admin', '2014-10-21 20:59:53', 'single'),
(44, 5, 'admin', '2014-10-21 21:06:20', 'single'),
(45, 5, 'admin', '2014-10-21 21:07:08', 'single'),
(46, 5, 'admin', '2014-10-21 21:07:28', 'single'),
(47, 5, 'admin', '2014-10-21 21:08:13', 'single'),
(48, 5, 'admin', '2014-10-21 21:09:29', 'single'),
(49, 5, 'admin', '2014-10-21 21:09:58', 'single'),
(50, 5, 'admin', '2014-10-21 21:33:31', 'single'),
(51, 5, 'admin', '2014-10-21 21:48:57', 'repush'),
(52, 5, 'admin', '2014-10-21 21:49:10', 'repush'),
(53, 5, 'admin', '2014-10-21 21:49:32', 'repush'),
(54, 5, 'admin', '2014-10-21 21:50:40', 'repush'),
(55, 5, 'admin', '2014-10-21 21:50:54', 'repush'),
(56, 5, 'admin', '2014-10-21 21:51:36', 'repush'),
(57, 5, 'admin', '2014-10-21 21:52:33', 'repush'),
(58, 5, 'admin', '2014-10-21 21:52:46', 'repush'),
(59, 5, 'admin', '2014-10-21 21:54:30', 'repush'),
(60, 4, 'admin', '2014-10-21 22:09:55', 'repush'),
(61, 4, 'admin', '2014-10-21 22:11:05', 'repush'),
(62, 5, 'admin', '2014-10-21 22:11:20', 'single');

-- --------------------------------------------------------

--
-- 表的结构 `push_task`
--

DROP TABLE IF EXISTS `push_task`;
CREATE TABLE IF NOT EXISTS `push_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `file` varchar(255) NOT NULL,
  `country` varchar(200) DEFAULT NULL,
  `language` varchar(200) DEFAULT NULL,
  `push_num` int(30) NOT NULL,
  `repush` int(1) NOT NULL DEFAULT '0',
  `push_time` date NOT NULL,
  `priority` int(1) NOT NULL DEFAULT '0',
  `success` int(20) NOT NULL DEFAULT '0',
  `total` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `push_task`
--

INSERT INTO `push_task` (`id`, `title`, `content`, `image`, `file`, `country`, `language`, `push_num`, `repush`, `push_time`, `priority`, `success`, `total`) VALUES
(1, '123123', '123123\r\n123\r\n123\r\n', '/pushsystem/uimage/sysxsy-9631139258.jpg', '/pushsystem/ufile/hjpdsphhh1.jpg', 'RO', 'de', 123, 0, '2014-09-06', 0, 0, 0),
(4, '333', '332', '/pushsystem/uimage/sysxsy-9631139258.jpg', '/pushsystem/ufile/hjpdsphhh1.jpg', 'RS', '', 3333, 0, '2014-09-30', 1, 0, 0),
(5, '32123', '3123213', '/pushsystem/uimage/sysxsy-9631139258.jpg', '/pushsystem/ufile/hjpdsphhh1.jpg', 'RS', '', 3333, 0, '2014-09-30', 0, 14, 14),
(6, '(done)', '(done)', '/pushsystem/uimage/sysxsy-9631139258.jpg', '(done)', '', '', 3232, 0, '2014-10-01', 1, 0, 0),
(10, '2332', '323232', '/pushsystem/uimage/1.jpg', '/pushsystem/ufile/2.apk', 'SA|US|RS|RO|NL|FR|MX', '', 500, 0, '2014-10-05', 0, 0, 0),
(11, '3232', '3232', '/pushsystem/uimage/1.jpg', '/pushsystem/ufile/2.apk', 'a:12:{i:0;s:2:"SA";i', NULL, 500, 0, '2014-10-07', 0, 0, 0),
(12, '3232', '3232', '/pushsystem/uimage/1.jpg', '/pushsystem/ufile/2.apk', 'SA|US|RS|RO|NL|FR|MX', '', 500, 0, '2014-10-07', 0, 0, 0),
(13, '3232', '3232', '/pushsystem/uimage/1.jpg', '/pushsystem/ufile/2.apk', 'SA|US|RS|RO|NL|FR|MX', '', 500, 0, '2014-10-07', 0, 0, 0),
(14, '3232', '3232', '/pushsystem/uimage/1.jpg', '/pushsystem/ufile/2.apk', 'SA|US|RS|RO|NL|FR|MX', '', 500, 0, '2014-10-07', 0, 0, 0),
(16, '3333333', '2222222', '/pushsystem/uimage/1.jpg', '/pushsystem/ufile/2.apk', 'SA|US|RS|RO|NL|FR|MX', 'zh|en|fr|de|it|ja|ko', 2000, 0, '2014-10-07', 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `repush_task`
--

DROP TABLE IF EXISTS `repush_task`;
CREATE TABLE IF NOT EXISTS `repush_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` varchar(255) NOT NULL,
  `image` varchar(200) NOT NULL,
  `file` varchar(255) NOT NULL,
  `country` varchar(200) DEFAULT NULL,
  `language` varchar(200) DEFAULT NULL,
  `push_num` int(30) NOT NULL,
  `repush` int(1) NOT NULL DEFAULT '0',
  `push_time` date NOT NULL,
  `priority` int(1) NOT NULL DEFAULT '0',
  `index` int(30) NOT NULL DEFAULT '0',
  `success` int(20) NOT NULL DEFAULT '0',
  `total` int(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `title` (`title`),
  KEY `index` (`index`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `repush_task`
--

INSERT INTO `repush_task` (`id`, `title`, `content`, `image`, `file`, `country`, `language`, `push_num`, `repush`, `push_time`, `priority`, `index`, `success`, `total`) VALUES
(1, '1', '123333', '/pushsystem/uimage/1.jpg', '/pushsystem/ufile/2.apk', 'SA|US|RS|RO|NL|FR|MX|BE|TH|SY|EG|SD', 'zh|en|fr|de|it|ja|ko|pl|tr|es|da|cs|ru|xu', 500, 1, '0000-00-00', 1, 0, 0, 0),
(2, '2', '123333', '/pushsystem/uimage/1.jpg', '/pushsystem/ufile/2.apk', 'SA|US|RS|RO|NL|FR|MX|BE|TH|SY|EG|SD', 'zh|en|fr|de|it|ja|ko|pl|tr|es|da|cs|ru|xu', 500, 1, '0000-00-00', 0, 0, 0, 0),
(3, '3', '1233334444', '/pushsystem/uimage/1.jpg', '/pushsystem/ufile/2.apk', 'SA|US|RS|RO|NL|FR|MX|BE|TH|SY|EG|SD', 'zh|en|fr|de|it|ja|ko|pl|tr|es|da|cs|ru|xu', 500, 1, '0000-00-00', 0, 0, 0, 0),
(4, '4', '1233334444', '/pushsystem/uimage/1.jpg', '/pushsystem/ufile/2.apk', '', '', 500, 1, '0000-00-00', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `group` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `group`) VALUES
(1, 'admin', 'admin', 1),
(5, '123', '123', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
