
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id13533918_apatmentwale`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `image_path` longtext COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_path`, `userid`) VALUES
(37, 'images/kakashi2.jpg', 38),
(38, 'images/itachi.jpg', 40),
(39, 'images/itachi2.jpg', 40),
(40, 'images/kakshi.jpg', 38),
(41, 'images/civilfinal.PNG', 42),
(42, 'images/saske2.jpg', 41);

-- --------------------------------------------------------

--
-- Table structure for table `isFollowing`
--

CREATE TABLE `isFollowing` (
  `id` int(11) NOT NULL,
  `follower` int(11) NOT NULL,
  `isFollowing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `isFollowing`
--

INSERT INTO `isFollowing` (`id`, `follower`, `isFollowing`) VALUES
(10, 40, 38),
(11, 38, 40),
(12, 43, 40),
(17, 41, 38);

-- --------------------------------------------------------

--
-- Table structure for table `profilePic`
--

CREATE TABLE `profilePic` (
  `id` int(11) NOT NULL,
  `image_path` longtext COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profilePic`
--

INSERT INTO `profilePic` (`id`, `image_path`, `userid`) VALUES
(37, '1599756602.png', 0),
(38, '1599757134.png', 0),
(39, '1599757364.png', 40),
(40, '1599758200.png', 40),
(41, '1599759108.png', 40),
(42, '1599759302.png', 40),
(43, '1599759415.png', 40),
(44, '1599759742.png', 38),
(45, '1599759802.png', 38),
(46, '1599759821.png', 38),
(47, '1599759857.png', 38),
(48, '1599759896.png', 38),
(49, '1599759912.png', 40),
(50, '1599759923.png', 40),
(51, '1599759945.png', 40),
(52, '1599761730.png', 40),
(53, '1599761893.png', 40),
(54, '1599762188.png', 40),
(55, '1599762190.png', 40),
(56, '1599762204.png', 38),
(57, '1599765067.png', 38),
(58, '1599765067.png', 38),
(59, '1599765067.png', 38),
(60, '1599765068.png', 38),
(61, '1599765068.png', 38),
(62, '1599981309.png', 43),
(63, '1599983016.png', 41);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `password` text COLLATE utf8_unicode_ci NOT NULL,
  `username` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `username`) VALUES
(38, 'kakashi', 'fa24875c0fe57bf6ff05d0219313ccc0', 'kakashi'),
(40, 'itachi', '9aae769c6ef53661c665a5896395b224', 'itachi'),
(41, 'saske', 'f5082c4ef2da9b7a7bc5ad3462e474cc', 'saske'),
(42, 'devilsfriend665@gmail.com', '21bb2f9a94624c18fd3b6c189afc8941', 'devilsfriend665@gmail.com'),
(43, 'naruto', 'a1b23c65fa9b5c43782f4db01e108cf6', 'naruto');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `isFollowing`
--
ALTER TABLE `isFollowing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profilePic`
--
ALTER TABLE `profilePic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `isFollowing`
--
ALTER TABLE `isFollowing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `profilePic`
--
ALTER TABLE `profilePic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
