-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 03 Oca 2022, 17:54:42
-- Sunucu sürümü: 10.4.17-MariaDB
-- PHP Sürümü: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `phpblog`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazilar`
--

CREATE TABLE `yazilar` (
  `yazi_id` int(11) NOT NULL,
  `yazi_baslik` text COLLATE utf8_turkish_ci NOT NULL,
  `yazi_link` text COLLATE utf8_turkish_ci NOT NULL,
  `yazi_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `yazi_resim` text COLLATE utf8_turkish_ci NOT NULL,
  `yazi_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yazilar`
--

INSERT INTO `yazilar` (`yazi_id`, `yazi_baslik`, `yazi_link`, `yazi_aciklama`, `yazi_resim`, `yazi_tarih`) VALUES
(1, 'Kibar Feyzo', 'kibar-feyzo', 'Merhaba dünya', 'https://i0.wp.com/blog.fontawesome.com/wp-content/uploads/2021/12/image-save-the-date.png?resize=1%2C1&ssl=1', '2022-01-02 08:14:59'),
(2, 'Merhaba Dünya', 'merhaba-dunya', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus recusandae dolores eligendi, omnis amet aliquid sapiente ipsa iusto ipsam repellat, error ut ex suscipit saepe dolorem cupiditate aliquam! Molestiae, sed. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus recusandae dolores eligendi, omnis amet aliquid sapiente ipsa iusto ipsam repellat, error ut ex suscipit saepe dolorem cupiditate aliquam! Molestiae, sed. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus recusandae dolores eligendi, omnis amet aliquid sapiente ipsa iusto ipsam repellat, error ut ex suscipit saepe dolorem cupiditate aliquam! Molestiae, sed. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus recusandae dolores eligendi, omnis amet aliquid sapiente ipsa iusto ipsam repellat, error ut ex suscipit saepe dolorem cupiditate aliquam! Molestiae, sed. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus recusandae dolores eligendi, omnis amet aliquid sapiente ipsa iusto ipsam repellat, error ut ex suscipit saepe dolorem cupiditate aliquam! Molestiae, sed. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus recusandae dolores eligendi, omnis amet aliquid sapiente ipsa iusto ipsam repellat, error ut ex suscipit saepe dolorem cupiditate aliquam! Molestiae, sed. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus recusandae dolores eligendi, omnis amet aliquid sapiente ipsa iusto ipsam repellat, error ut ex suscipit saepe dolorem cupiditate aliquam! Molestiae, sed. Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus recusandae dolores eligendi, omnis amet aliquid sapiente ipsa iusto ipsam repellat, error ut ex suscipit saepe dolorem cupiditate aliquam! Molestiae, sed. ', 'https://i0.wp.com/blog.fontawesome.com/wp-content/uploads/2021/10/header-nerd.png?resize=1%2C1&amp;ssl=1', '2022-01-02 08:25:26');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `yazilar`
--
ALTER TABLE `yazilar`
  ADD PRIMARY KEY (`yazi_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `yazilar`
--
ALTER TABLE `yazilar`
  MODIFY `yazi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
